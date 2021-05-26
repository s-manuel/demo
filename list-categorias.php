<?php
    $rootPath = "";
    include('templates/header.php');
    include ("pages/conexionbdd.php");
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
			<?php 
				if (isset($_GET['error'])): ?>
					<div class="alert alert-warning alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>Nota..!</strong> El registro no se puede eliminar porque hay pruductos relacionados a la categoría
					</div>
				<?php endif ?>
			<div class="table-responsive">
			  <table class="table table-bordered">
			  	 <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Categoría</th>
				      <th scope="col">Opción</th>
				    </tr>
				  </thead>
				  <?php
	              $selectp = $con->prepare("select * from categoria_productos");
	              $selectp->execute();
	              $i=1;
	            ?>
				  <tbody>
				  		<?php
	                while ($fila = $selectp->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) { ?>
	                	<tr>
	                		<th scope="row"><?php $i++ ?></th>
	                		<td> <?php echo $fila[1] ?> </td>
	                		<td>
	                			<a href="./pages/php/delCategoria.php?id=<?php echo$fila[0];?>" class="btn btn-sm btn-danger">Eliminar</a>
	                			<a href="./edit-categorias.php?id=<?php echo$fila[0];?>" class="btn btn-sm btn-info">Actualizar</a>
	                		</td>
	                	</tr>
	              <?php 
	                }
	              ?>
				   </tbody>
			  </table>
			</div>
		</div>
	</div>
</div>

<?php
include('templates/footer.php');
?>
</script>