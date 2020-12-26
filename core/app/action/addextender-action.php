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



 				<table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Acción</th>
                        <th>Fecha ocup.</th>
                        <th>Descripción</th>
                        <th>Habitación</th>
                        <th>Precio</th>
                      </tr> 
                    </thead> 
                    <tbody>
                    <?php $salida = ProcesoData::getById($_POST['id_proceso']); ?>
                    <?php $sub=0; $total=0; ?>
                    <?php $operaciones = OperacionData::getAllProceso($salida->id);
                    if(count($operaciones)>0){ ?>
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
                      <th colspan="4"><strong class="pull-right">Sub-total</strong></th>
                      <th><strong><button class="btn btn-primary"> <strong>$  <?php echo number_format($total,2,'.',','); ?></strong></button></strong></th>
                    </tfoot>
                   
                  </table>