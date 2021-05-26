<?php
    $rootPath = "";
    include('templates/header.php');
    include ("pages/conexionbdd.php");
    $select = $con->prepare("select * from productos WHERE idProducto =:cod");
	 $select->execute(array(':cod' => $_GET['id']) );
	 $fila = $select->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT);
    $codigo = $fila['idProducto'];
    $producto = $fila['nombre'];
    $precio = $fila['precio'];
    $imgAntrior = $fila['imagen'];
    $codCatgoria = $fila['categoriaProductoId'];

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
						<a class="nav-link active" href="list-productos.php">Listar</a>
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
		    				<label for="nombre">Actualizar el nombre del producto </label>
		    				<input name="codigo" type="hidden" value="<?php echo $codigo ?>">
		    				<input name="imgAntrior" type="hidden" value="<?php echo $imgAntrior ?>">
							<input class="form-control" type="text" name="nombre" value="<?php echo $producto ?>" required />
						</div>

						<div class="form-group">
		    				<label for="precio">Actualizar el precio </label>
							<input class="form-control" type="text" name="precio" value="<?php echo $precio; ?>" required />
						</div>

						<div class="form-group">
							<label for="catgoria">Actualizar la categoría </label>
							<select name="catgoria" class="form-control">
								<?php while ($fila = $selectCategorias->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)):?>
									<?php $selected = $fila[0] == $codCatgoria ? 'selected' : '' ?>
		                     <option value="<?php echo strtolower($fila[0]) ?>" <?php echo  $selected;  ?> ><?php echo $fila[1] ?></option>
		                 <?php endwhile ?>
							</select>
						</div>



						<div class="form-group">
					    <label for="imagen">Seleccionar una imagen</label>
					    <input type="file" class="form-control-file" name="imagen" />
					  </div>

					  <div class="form-group">
						  <input type="submit" name="btnactuaizar" value="Actualizar" class="btn btn-primary"/>
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