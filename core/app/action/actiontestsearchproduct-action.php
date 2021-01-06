
<?php if(isset($_GET["product"])):?>
	<?php
$products = ProductData::getLike($_GET["product"]);
if(isset($products)){
	?>
<h3>Resultados de la Busqueda</h3>
<table summary="Mi tabla" aria-describedby="descripcion" class="table table-bordered table-hover">
	<thead>
		<th scope = "col">Codigo</th>
		<th scope = "col">Nombre</th>
		<th scope = "col">Unidad</th>
		<th scope = "col">Precio unitario</th>
		<th scope = "col">En inventario</th>
		<th scope = "col">Cantidad</th>
		<th scope = "col" style="width:100px;"></th>
	</thead>
	<?php
$products_in_cero=0;
	 foreach($products as $product):
$q= OperationData::getQYesF($product->id);
	?>
	<?php 
	if($q>0):?>
		<form method="post" action="index.php?view=addtocart">
	<tr class="<?php if($q<=$product->inventary_min){ echo "danger"; }?>">
		<td style="width:80px;"><?php echo $product->id; ?></td>
		<td><?php echo $product->name; ?></td>
		<td><?php echo $product->unit; ?></td>
		<td><strong>$<?php echo $product->price_out; ?></strong></td>
		<td>
			<?php echo $q; ?>
		</td>
		<td>
		<input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
		<input type="" class="form-control" required name="q" placeholder="Cantidad de producto ..."></td>
		<td style="width:183px;">
		<button type="submit" class="btn btn-primary"><em class="glyphicon glyphicon-shopping-cart"></em> Agregar a la venta</button>
		</td>
	</tr>
	</form>
<?php else:$products_in_cero++;
?>
<?php  endif; ?>
	<?php endforeach;?>
</table>
<?php if($products_in_cero>0){ echo "<p class='alert alert-warning'>Se omitieron <b>$products_in_cero productos</b> que no tienen existencias en el inventario. <a href='index.php?module=inventary'>Ir al Inventario</a>"; }?>

	<?php
}
?>
<br><hr>
<hr><br>
<?php else:
?>

<?php endif; ?>