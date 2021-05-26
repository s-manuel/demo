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
						<a class="nav-link active" href="list-producto.php">Listar</a>
						<a class="nav-link active" href="insert-producto.php">Insertar</a>
						<a class="nav-link active" href="admin.php">Ir al Menu</a>
					</li>
			  	</ul>
			 </div>
		</div>
		<div class="col-md-9">
			<div class="table-responsive">
			  <table class="table table-bordered">
			  	 <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Nombre</th>
				      <th scope="col">Precio</th>
				      <th scope="col">Imagen</th>
				      <th style="width: 19rem;">Opciones</th>
				    </tr>
				  </thead>
				  <?php
	              $selectp = $con->prepare("select * from productos");
	              $selectp->execute();
	              $i=1;
	            ?>
				  <tbody>
				  		<?php
	                while ($fila = $selectp->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)): ?>
	                	<tr>
	                		<th scope="row"><?php echo $i++ ?></th>
	                		<td> <?php echo $fila[1] ?> </td>
	                		<td> <?php echo $fila[2] ?> </td>
	                		<td> <img src="img/<?php echo $fila[4] ?>" class="img-fluid" alt="..." style="max-width: 100px; max-height: 100px" />  </td>
	                		<td style="width: 19rem;">
	                			<a href="./pages/php/delProductos.php?id=<?php echo$fila[0];?>" class="btn btn-sm btn-danger">Eliminar</a>
	                			<a href="./edit-productos.php?id=<?php echo$fila[0];?>" class="btn btn-sm btn-info">Actualizar</a>
	                		</td>
	                	</tr>
	              <?php  endwhile  ?>
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