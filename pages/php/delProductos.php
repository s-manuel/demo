<?php 
	
	include('../conexionbdd.php');

	if(isset($_GET['id'])){
		$id=trim($_GET['id']);

		$select = $con->prepare("select * from productos WHERE idProducto =:cod");
	 	$select->execute(array(':cod' => $_GET['id']) );
	 	$data=$select->fetchAll(PDO::FETCH_ASSOC);

	 	$result = unlink('../../img/'.$data[0]['imagen']);

	 	if ($result) {
	 			$stmt = $con->prepare('DELETE FROM productos WHERE idProducto =:cod');
	   		$stmt->bindParam(':cod',$id);
			   if($stmt->execute()){
			      header("Location:../../list-producto.php");
			   }else{
			      $errMSG = "Error al guardar los datos";
			   }
	 	} else {
	 
	 		header("Location:../../list-producto.php?error=error");
	 	}
	 	
	}else{
		 header("Location:../../index.php");
	}

 ?>