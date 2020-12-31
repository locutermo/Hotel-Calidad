
<link rel="stylesheet" href="assets/js/vendor/footable/css/footable.core.min.css">
<body id="minovate" class="appWrapper sidebar-sm-forced">
<div class="row">
<section class="content-header">
    <ol class="breadcrumb">
      <li><a href="index.php?view=reserva"><em class="fa fa-home"></em> Inicio</a></li>
      <li><a href="#">Administración</a></li>
        <li class="active">Counters</li>
    </ol>
</section> 
</div> 

<!-- row --> 
<div class="row">
  <!-- col -->
  <div class="col-md-12">
    <section class="tile">
      <div class="tile-header dvd dvd-btm">  
        <h1 class="custom-font"><strong>REGISTRO DE </strong> COUNTERS</h1>
        <ul class="controls">
          <li class="remove">
            <a  data-toggle="modal" data-target="#myModal"  ><em class="fa fa-user-plus"></em> REGISTRAR NUEVO COUNTER</a>
          </li>
          <li class="dropdown">
            <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown">
            <em class="fa fa-cog"></em><em class="fa fa-spinner fa-spin"></em>
            </a>
            <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">
                <li>
                  <a role="button" tabindex="0" class="tile-toggle">
                  <span class="minimize"><em class="fa fa-angle-down"></em>&nbsp;&nbsp;&nbsp;Minimize</span>
                  <span class="expand"><em class="fa fa-angle-up"></em>&nbsp;&nbsp;&nbsp;Expand</span>
                  </a>
                </li>
                <li>
                  <a role="button" tabindex="0" class="tile-refresh">
                    <em class="fa fa-refresh"></em> Refresh
                  </a>
                </li>
                <li>
                  <a role="button" tabindex="0" class="tile-fullscreen">
                  <em class="fa fa-expand"></em> Fullscreen
                  </a>
                </li>
            </ul>
          </li>
          <li class="remove"><a role="button" tabindex="0" class="tile-close"><em class="fa fa-times"></em></a></li>
        </ul>
      </div>
      <!-- tile body -->
      <div class="tile-body">
        <div class="form-group">
          <label for="filter" style="padding-top: 5px">Buscar:</label>
          <input id="filter" type="text" class="form-control input-sm w-sm mb-12 inline-block"/>
        </div>


          <?php $users = UserData::getAll();
					if(count($users)>0){
                  // si hay usuarios
                  ?>
                  <table id="searchTextResults" data-filter="#filter" data-page-size="7" class="footable table table-custom" style="font-size: 11px;">

                  <thead style="color: white; background-color: #827e7e;">
                        <th scope = "col">Nº</th> 
                        <th scope = "col">Nombre completo</th>
						            <th scope = "col">Nombre de usuario</th>
						            <th scope = "col">Email</th>
						            <th scope = "col">Activo</th>
						            <th scope = "col">Admin</th>
						            <th scope = "col"></th>
                  </thead>
                   <?php foreach($users as $user):?>
                      <tr>
                        <td><?php echo $user->id; ?></td>
                        <td><?php echo $user->name." ".$user->lastname; ?></td>
                        <td><?php echo $user->username; ?></td>
                        <td><strong><?php echo $user->email; ?></strong></td>
                        <td>
		                    <?php if($user->is_active):?>
								<em class="glyphicon glyphicon-ok"></em>
							<?php endif; ?>
						</td>
						<td>
							<?php if($user->is_admin):?>
								<em class="glyphicon glyphicon-ok"></em>
							<?php endif; ?>
						</td>
                        <td>
                        <a href="index.php?view=edituser&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs"><em class="fa fa-edit"></em>Editar</a>
                        </td>
                      </tr> 
                    <?php endforeach; ?>
                  </table>

               <?php }else{ 
            echo"<h4 class='alert alert-success'>NO HAY REGISTRO</h4>";

                };
                ?>

           </div>
      
</section>
</div>  
</div>

      <div class="modal fade bs-example-modal-xm" id="myModal" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-success">
          <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=adduser" role="form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fa fa-user"></span> INGRESAR NUEVO COUNTER</h4>
              </div>
              <div class="modal-body" style="background-color:#fff !important;">
                
                <div class="row">
                <div class="col-md-offset-1 col-md-10">

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Nombre </span>
                      <input type="text" class="form-control col-md-8" name="name" required placeholder="Ingrese nombre">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Apellido </span>
                      <input type="text" class="form-control col-md-8" name="lastname" required placeholder="Ingrese Apellido">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Username </span>
                      <input type="text" class="form-control col-md-8" name="username" required placeholder="Ingrese Nombre de usuario">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> E-mail </span>
                      <input type="text" class="form-control col-md-8" name="email" required placeholder="Ingrese Correo">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Contrase&ntilde;a </span>
                      <input type="password" class="form-control col-md-8" name="password" required placeholder="Ingrese Contraseña">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Es Admin </span>
                      <input type="checkbox"  name="is_admin"  >
                    </div>
                  </div>

    



                   

                    
                  
                </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-outline">Agregar Datos</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>

      

        <script src="assets/js/vendor/bootstrap/bootstrap.min.js"></script>
        <script src="assets/js/vendor/jRespond/jRespond.min.js"></script>
        <script src="assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>
        <script src="assets/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/js/vendor/animsition/js/jquery.animsition.min.js"></script>
        <script src="assets/js/vendor/screenfull/screenfull.min.js"></script>
        <script src="assets/js/vendor/footable/footable.all.min.js"></script>
        <script src="assets/js/main.js"></script>
         <script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"></script>
 <script>
            $(window).load(function(){

                $('.footable').footable();

            });
</script>


