
<?php 
     date_default_timezone_set('America/Lima');
     $hoy = date("Y-m-d");
     $hora = date("H:i:s");
                    
?>

<style type="text/css">
  table.dataTable thead .sorting:after {
    opacity: 0.0;
    content: "\e150";
}

table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after {
    opacity: 0.0;
}
</style>
<div class="row">

 <section class="content-header">
      <h3>
        <span class="fa fa-file-text-o"></span> REPORTE RANGO DE FECHAS: PRODUCTOS 
        <small>Avance</small>
      </h3> 
      <ol class="breadcrumb">
        <li><a href="index.php?view=reserva"><span class="fa fa-home"></span> Inicio</a></li>
        <li><a href="#">Reportes</a></li>
        <li class="active">Reporte productos</li>
      </ol>
</section>
</div>




<style type="text/css">
  
  .hh:hover{
    background-color: white;
  }
  .small-box-footer {
    position: relative;
    text-align: center;
    padding: 0px 0;
    color: #fff;
    color: rgba(255,255,255,0.8);
    display: block;
    z-index: 10;
    background: rgba(0,0,0,0.1);
    text-decoration: none;
}
.nav-tabs-custom>.nav-tabs>li>a {
    color: #3c8dbc;
    font-weight: bold;
    border-radius: 0 !important;
}
.nav-tabs-custom>.nav-tabs>li.active {
    border-top-color: #00a65a;
}
.h5, h5 {
    margin-top: 0px;
    margin-bottom: 0px;
}
</style>



<br>
<div class="row">

      <div  class="col-md-4">
          <div class="box box-success box-solid">
            
            <!-- /.box-header -->
           
              <div class="box-body" style="text-align: left;">

                <table summary="Mi tabla" aria-describedby="descripcion">
                  <th scope = "col"style="width: 50%;"></th>
                  <th scope = "col"style="width: 45%;"></th>
                  <tr>
                      <td><h5>FECHA INICIO:</h5></td>
                      <td><h5 class="control-label text-red"><?php echo $_POST['start']; ?></h5></td>
                  </tr>
                  <tr>
                      <td><h5>FECHA FIN:</h5></td>
                      <td><h5 class="control-label text-red"><?php echo $_POST['end']; ?></h5></td>
                  </tr>
    
                </table>
  
              </div>

             

     

          </div>
          <!-- /.box -->
      </div>

</div>

<section>
<div class="row">

  <div class="col-md-12">
          <!-- Custom Tabs (Pulled to the right) -->

          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs" style="background-color: #d2d6de;">
            
              <li class="active"><a href="#tab_2" data-toggle="tab">Venta de productos</a></li>
              
            </ul>
            <div class="tab-content ">
              
              <!-- /.tab-pane --> 
              <div class="tab-pane active" id="tab_2">
                <?php $reporproducts = ProcesoVentaData::getReporteDiario($hoy);
                if(count($reporproducts)>0){
                  // si hay usuarios
                  ?>
                  <table summary="Mi tabla" aria-describedby="descripcion" id="example2" class="table table-bordered table-hover">

                  <thead style="color: black; background-color: #d2d6de;">
                        <th scope = "col">Nº</th> 
                        <th scope = "col">Habitación</th>
                        <th scope = "col">Artículo</th>
                        <th scope = "col">Cantidad</th>
                        <th scope = "col">Precio unitario</th>
                        <th scope = "col">Total</th>
                        <th scope = "col">Hora </th> 
                  </thead> 
                   <?php $numero=0;?>
                   <?php $subtotal2=0;?>
                   <?php foreach($reporproducts as $reporproduct):?>
                   <?php $numero=$numero+1;?>
                   <?php if($reporproduct->fecha_creada!=NULL){ ?>
                      <tr>
                        <td><?php echo $numero; ?></td>
                        <td><?php if($reporproduct->id_operacion!=NULL){ echo $reporproduct->getProceso()->getHabitacion()->nombre;}else{echo "Venta libre";} ?></td>
                        <td><?php echo $reporproduct->getProducto()->nombre; ?></td>
                        <td><strong><?php echo $reporproduct->cantidad; ?></strong></td>
                        <td><strong>$   <?php echo number_format($reporproduct->precio,2,'.',','); ?></strong></td>
                        <?php $subtotal1=$reporproduct->cantidad*$reporproduct->precio; ?>
                        <td><strong>$   <?php echo number_format($subtotal1,2,'.',','); ?></strong></td>
                        <td><?php echo date($reporproduct->fecha_creada); ?></td>
                      </tr> 
                    <?php $subtotal2=$subtotal1+$subtotal2; ?>
                    <?php }; ?>
                    <?php endforeach; ?>

                    <tfoot style="color: black; background-color: #e3e4e6;">
                        <th scope = "col" colspan="5"><p class="pull-right">Total</p></th>
                        <th scope = "col"><strong>$   <?php echo number_format($subtotal2,2,'.',','); ?></strong> </th> 
                        <th scope = "col"></th>
                    </tfoot>

                  </table>

               <?php }else{ 
            echo"<h4 class='alert alert-success'>NO HAY NINGUNA VENTA HOY </h4>";

                };
                ?>
              </div>
              <!-- /.tab-pane -->
              
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>

    </div>
</div>

</section>





     
      
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->

<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
   
  });
</script>

<script>
  $(function () {
    $("#example2").DataTable();
   
  });
</script>
