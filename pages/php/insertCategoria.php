<?php

   include('../conexionbdd.php');
   $categoria;

   if(isset($_POST['btnguardar']))
   {

      $categoria = $_POST['nombre'];  
      $stmt = $con->prepare('INSERT INTO categoria_productos(nombre)VALUES(:nom)');
      $stmt->bindParam(':nom',$categoria);
            
      if($stmt->execute()){
         header("Location:../../list-categorias.php");
      }else{
         $errMSG = "Error al guardar los datos";
      }

   }else{

      $categoria = $_POST['nombre'];
      $codigo = $_POST['codigo'];
      $stmt = $con->prepare('UPDATE categoria_productos SET nombre =:nom WHERE idCatgoriaProducto =:cod');
      $stmt->bindParam(':nom',$categoria);
      $stmt->bindParam(':cod',$codigo);
            
      if($stmt->execute()){
         header("Location:../../list-categorias.php");
      }else{
         $errMSG = "Error al guardar los datos";
      }
   }

?>
