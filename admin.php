<?php
    $rootPath = "";
    include('templates/header.php');
?>

<div class="container" style="padding: 10px 0 40px 0;" >
	<p class="h4 pt-3 pb-3" style="padding: 10px 0 10px 0; ">Administrador</p>
	<div class="row">
		<div class="col-md-3">
			<div class="sub-menu">
			  	<ul class="nav nav-pills flex-column">
			  		<li class="nav-item">
						<a class="nav-link active" href="list-producto.php">Productos</a>
						<a class="nav-link active" href="list-categorias.php">Categorías productos</a>
					</li>
			  	</ul>
			 </div>
		</div>
	</div>
</div>

<?php
include('templates/footer.php');
?>
</script>