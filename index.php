<?php
	session_start();
   $rootPath = "";
   include('templates/header.php');
?>
<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h3 class="title">Nuestros productos</h3>
					</div>
				</div>
				<!-- /section title -->

				<!-- Products tab & slick -->
				<div class="col-md-12">
					<div class="row">

						<?php

		              	$select = $con->prepare("select * from productos");
		              	$select->execute();
		            ?>

		            <?php
		             	while ($fila = $select->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {

		             	$found = false;
							if(isset($_SESSION["carrito"])){ 
								foreach ($_SESSION["carrito"] as $c) {
								 	if($c["productoId"]==$fila[0]){
								  		$found=true;
								  		break;
									}
								}
							}

		             ?>
		             		<div class="col-md-3">
		             			<div class="card">
									  <img src="img/<?php echo $fila[4] ?>" style="max-width: 200px; max-height: 200px" class="card-img-top" alt="...">
									  <div class="card-body add-to-cart">
									  		Pecio : <span class="badge badge-primary"><?php echo $fila[2] ?></span>
									  		<?php if($found): ?>
												<a href="carrito-compras.php" class="btn btn-info">Agregado</a>
											<?php else: ?>
											<form class="form-inline" method="post" action="./pages/php/addtocart.php">
												<input type="hidden" name="productoId" value="<?php echo $fila[0]; ?>">
												<button type="submit" class="add-to-cart-btn btn-secondary "><i class="fa fa-shopping-cart"></i> Agregar al carrito</button>
											</form>	
											<?php endif; ?>
									  </div>
									</div>
									
	                  	</div>
	                 <?php 
	                   }
	               ?>

					</div>
				</div>
				<!-- Products tab & slick -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
<!-- /SECTION -->
<?php
include('templates/footer.php');
?>
</script>