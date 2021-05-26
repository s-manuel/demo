<?php
    $rootPath = "";
    include('templates/header.php');
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
		    				<label for="nombre">Ingresar el nombre de la catgoría </label>
							<input class="form-control" type="text" name="nombre" placeholder="......." required />
						</div>
					  <div class="form-group">
						  <input type="submit" name="btnguardar" value="Guardar" class="btn btn-primary"/>
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