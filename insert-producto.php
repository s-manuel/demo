<?php
    $rootPath = "";
    include('templates/header.php');
    include ("pages/conexionbdd.php");
    $selectCategorias = $con->prepare("select * from categoria_productos");
    $selectCategorias->execute();
?>

<div class="container" style="padding: 10px 0 40px 0;" >
	<p class="h4 pt-3 pb-3" style="padding: 10px 0 10px 0; ">Administrador</p>
	<div class="row">
		<div class="col-md-3">
			<div class="sub-menu">
			  	<ul class="nav flex-column">
			  		<li class="nav-item">
						<a class="nav-link active" href="list-producto.php">Listar</a>
						<a class="nav-link active" href="insert-producto.php">Insertar</a>
					</li>
			  	</ul>
			 </div>
		</div>
		<div class="col-md-9">
			<form action="pages/php/insertProducto.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
				<div class="card">
					<div class="card-body">
						<div class="form-group">
		    				<label for="nombre">Ingresar el nombre del producto </label>
							<input class="form-control" type="text" name="nombre" placeholder="......." required />
						</div>

						<div class="form-group">
		    				<label for="precio">Ingresar el precio </label>
							<input class="form-control" type="text" name="precio" placeholder="......." required />
						</div>

						<div class="form-group">
							<label for="catgoria">Actualizar la categoría </label>
							<select name="catgoria" class="form-control">
								<?php while ($fila = $selectCategorias->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)):?>
		                     <option value="<?php echo strtolower($fila[0]) ?>" ><?php echo $fila[1] ?></option>
		                 <?php endwhile ?>
							</select>
						</div>

					  <div class="form-group">
					    <label for="imagen">Seleccionar una imagen</label>
					    <input type="file" class="form-control-file" name="imagen" required />
					  </div>
					  <div class="form-group">
						  <input type="submit" name="btnguardar" class="btn btn-primary"/>
						</div>
					 </div>
				</div>
			</form>
		</div>
	</div>
</div>

<?php
include('templates/footer.php');
?>
</script>