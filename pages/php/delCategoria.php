<?php 
	
	include('../conexionbdd.php');

	if(isset($_GET['id'])){
		$id=trim($_GET['id']);

		$select = $con->prepare("select * from productos WHERE idProducto =:cod");
	 	$select->execute(array(':cod' => $_GET['id']) );
	 	$data=$select->fetchAll(PDO::FETCH_ASSOC);
	 	if (count($data)==0) {
	 			$stmt = $con->prepare('DELETE FROM categoria_productos WHERE idCatgoriaProducto =:cod');
	   		$stmt->bindParam(':cod',$id);
			   if($stmt->execute()){
			      header("Location:../../list-categorias.php");
			   }else{
			      $errMSG = "Error al guardar los datos";
			   }
	 	} else {
	 
	 		header("Location:../../list-categorias.php?error=error");
	 	}
	 	
	}else{
		 header("Location:../../index.php");
	}

 ?>