<?php

$operacion_n = new OperacionData();
$operacion_n->dinero_dejado = 0;
$operacion_n->total= $_POST['total'];
$operacion_n->fecha_entrada = $_POST["fecha_entrada"];
$operacion_n->fecha_salida = $_POST["fecha_salida"];
$operacion_n->id_tipo_pago = $_POST["id_tipo_pago"]; 
$operacion_n->voucher = "NULL";
$operacion_n->id_proceso=$_POST['id_proceso'];
$operacion_n->add();
// setcookie("added",$p->title);

?>



 				<table summary="Mi tabla" aria-describedby="descripcion" class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope = "col">Acción</th>
                        <th scope = "col">Fecha ocup.</th>
                        <th scope = "col">Descripción</th>
                        <th scope = "col">Habitación</th>
                        <th scope = "col">Precio</th>
                      </tr> 
                    </thead> 
                    <tbody>
                    <?php $salida = ProcesoData::getById($_POST['id_proceso']); ?>
                    <?php $sub=0; $total=0; ?>
                    <?php $operaciones = OperacionData::getAllProceso($salida->id);
                    if(isset($operaciones)){ ?>
                    <?php foreach($operaciones as $operacion):?> 
                      <tr> 
                        <td></td>
                        <td><?php echo $operacion->fecha_entrada; ?></td>
                        <td><?php echo $salida->getHabitacion()->getCategoria()->nombre; ?></td>
                        <td><?php echo $salida->getHabitacion()->nombre; ?></td>
                        <td><strong>$  <?php echo number_format($operacion->total,2,'.',','); ?></strong></td>
                      </tr> 
                    <?php $sub=$operacion->dinero_dejado+$sub; $total=$operacion->total+$total; ?>
                    <?php endforeach; ?>
                    <?php } ?>
                      

                    </tbody> 
                    <tfoot>
                      <th id="subtotal" colspan="4"><strong class="pull-right">Sub-total</strong></th>
                      <th id="boton"><strong><button class="btn btn-primary"> <strong>$  <?php echo number_format($total,2,'.',','); ?></strong></button></strong></th>
                    </tfoot>
                   
                  </table>