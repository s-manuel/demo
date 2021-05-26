<?php
    $rootPath = "";
    include('templates/header.php');
    include ("pages/conexionbdd.php");
    $select = $con->prepare("select * from categoria_productos WHERE idCatgoriaProducto =:cod");
	 $select->execute(array(':cod' => $_GET['id']) );
	 $fila = $select->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT);
    $catgoria = $fila['nombre'];
    $codigo = $fila['idCatgoriaProducto'];
?>

<div class="container" style="padding: 10px 0 40px 0;" >
	<p class="h4 pt-3 pb-3" style="padding: 10px 0 10px 0; ">Administrador</p>
	<div class="row">
		<div class="col-md-3">
			<div class="sub-menu">
			  	<ul class="nav flex-column">
			  		<li class="nav-item">
						<a class="nav-link active" href="list-categorias.php">Listar</a>
						<a class="nav-link active" href="insert-categorias.php">Insertar</a>
					</li>
			  	</ul>
			 </div>
		</div>
		<div class="col-md-9">
			<form action="pages/php/insertCategoria.php" method="POST" class="form-horizontal">
				<div class="card">
					<div class="card-body">
						<div class="form-group">
		    				<label for="nombre">Actualizar el nombre de la catgoría </label>
		    				<input name="codigo" type="hidden" value="<?php echo $codigo ?>">
							<input class="form-control" type="text" name="nombre" value="<?php echo $catgoria ?>" placeholder="......." required />
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