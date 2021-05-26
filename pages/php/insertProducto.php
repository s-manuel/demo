<?php
   
   $rootPath = "";
   include('../conexionbdd.php');
   $nombre;
   $precio;
   $cantidad;
   $categoria;
   $nombreImagen;

   if(isset($_POST['btnguardar']))
   {

      $GLOBALS["nombre"] = $_POST['nombre'];
      $GLOBALS["precio"] = $_POST['precio'];
      $GLOBALS["categoria"] = $_POST["catgoria"];
      $imagen = $_FILES['imagen']['name'];
      $tmp_name = $_FILES["imagen"]["tmp_name"];
      $imgSize = $_FILES['imagen']['size'];

      $repositorio = '../../img/';
    
      $extension = strtolower(pathinfo($imagen,PATHINFO_EXTENSION));
      $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
      $GLOBALS["nombreImagen"] = rand(1000,1000000).".".$extension;
       
      if(in_array($extension, $valid_extensions)){   
          // Check file size '5MB'
          if($imgSize < 5000000)    {
            move_uploaded_file($tmp_name,$repositorio.$nombreImagen);
          }
          else{
           $errMSG = "Solo se admite 5MB";
          }
      } else{
       $errMSG = "Solo se admite JPG, JPEG, PNG & GIF ";  
      }
   
      if(!isset($errMSG))
      {
            $stmt = $con->prepare('INSERT INTO productos(nombre,precio,imagen,categoriaProductoId)VALUES(:nom,:pre,:img,:idCat)');
            $stmt->bindParam(':nom',$_POST["nombre"]);
            $stmt->bindParam(':pre',$GLOBALS["precio"]);
            $stmt->bindParam(':img',$GLOBALS["nombreImagen"]);
            $stmt->bindParam(':idCat',$GLOBALS["categoria"]);
            
            if($stmt->execute()){
               header("Location:../../list-producto.php");
            }else{
               $errMSG = "Error al guardar los datos";
            }
      }

   }else{

      if ($_FILES['imagen']['name'] != '') {
        
          $result = unlink('../../img/'.$_POST['imgAntrior']);
          if ($result) {

              $imagen = $_FILES['imagen']['name'];
              $tmp_name = $_FILES["imagen"]["tmp_name"];
              $imgSize = $_FILES['imagen']['size'];

              $extension = strtolower(pathinfo($imagen,PATHINFO_EXTENSION));
              $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
              $GLOBALS["nombreImagen"] = rand(1000,1000000).".".$extension;
               
              if(in_array($extension, $valid_extensions)){   
                  // Check file size '5MB'
                  if($imgSize < 5000000)    {
                    move_uploaded_file($tmp_name, '../../img/'.$nombreImagen);
                  }
                  else{
                   $errMSG = "Solo se admite 5MB";
                  }
              } else{
                $errMSG = "Solo se admite JPG, JPEG, PNG & GIF ";  
              }
          } else {
            echo "Problemas al eliminar la imagen. ";
          }
      } else {
        $GLOBALS["nombreImagen"] = $_POST['imgAntrior'];
      }

      $categoria = $_POST['nombre'];
      $codigo = $_POST['codigo'];
      $stmt = $con->prepare('UPDATE productos SET nombre =:nom, precio= :pre, imagen= :img, categoriaProductoId= :idCat WHERE idProducto =:cod');
      $stmt->bindParam(':nom',$_POST["nombre"]);
      $stmt->bindParam(':pre',$_POST["precio"]);
      $stmt->bindParam(':img',$GLOBALS["nombreImagen"]);
      $stmt->bindParam(':idCat',$_POST["catgoria"]);
      $stmt->bindParam(':cod', $codigo);
            
      if($stmt->execute()){
          header("Location:../../list-producto.php");
      }else{
         $errMSG = "Error al guardar los datos";
      }
      
   }

?>
