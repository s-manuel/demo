<?php
	session_start();
   $rootPath = "";
   include('templates/header.php');
   include_once('api/Config/Config.php');
   include_once('api/Config/Sample.php');
?>


<!-- SECTION -->
<div class="container" style="padding: 15px 0 50px 0;">

	<div class="section-title">
		<h3 class="title">Tu carrito de compras </h3>
	</div>

	<?php
		$products = $con->query("select * from productos");
		if(isset($_SESSION["carrito"]) && !empty($_SESSION["carrito"])):
	?>
	
	<table class="table table-bordered">
		<thead>
			<th>Cantidad</th>
			<th>Producto</th>
			<th>Precio Unitario</th>
			<th>Total</th>
			<th>Opción</th>
		</thead>
		<?php 
		global $total;
		foreach($_SESSION["carrito"] as $c):
			$products = $con->prepare("select * from productos where idProducto=:id");
			$products->execute(array(':id'=>intval($c["productoId"]) ));
			$fila =  $products->fetch(PDO::FETCH_ASSOC);
			?>
		<tr>
			<th><?php echo $c["cantidad"];?></th>
			<td><?php echo $fila['nombre'];?></td> 
			<td>$ <?php echo $fila['precio']; ?></td> 
			<td>$ <?php echo $c["cantidad"]*$fila['precio'];  ?></td>
			<td>
			<?php
				$found = false;
				foreach ($_SESSION["carrito"] as $c) { if($c["productoId"]==$fila['idProducto']){ $found=true; break; }}
			?>
				<a href="./pages/php/delfromcart.php?id=<?php echo $c["productoId"];?>" class="btn btn-danger">Eliminar</a>
			</td>
		</tr>
		<?php
			$total = $total +  $c["cantidad"]*$fila['precio'];
			endforeach
		?>
	</table>

	<table class="table table-bordered">
		<tr>
			<th>Total</th>
			<td> <input type="hidden" class="total" id="total" value="<?php echo $total; ?>"> <?php echo $total; ?></td>
		</tr>
	</table>

	<?php else:?>
		<p class="alert alert-warning">El carrito esta vacio.</p>
		<a href="./index.php" class="btn btn-success btn-sm">Ver productos</a>
	<?php endif;?>

	<!-- Checkout Options -->
   <div class="form-group">
       <div class="col-sm-offset-5 col-sm-7">
           <!-- Container for PayPal Shortcut Checkout -->
           <p id="error" class="hidden">Please check the checkbox</p>
<label><input id="check" type="checkbox"> Check here to continue</label>

           <div id="paypal-button-container"></div>
       </div>
   </div>

</div>
<!-- /SECTION -->
<?php
include('templates/footer.php');
?>
