<?php
/*
* Agrega el producto a la variable de sesion de productos.
*/
session_start();
if(!empty($_POST)){
	if(isset($_POST["productoId"])){
		// si es el primer producto simplemente lo agregamos
		if(empty($_SESSION["carrito"])){
			$_SESSION["carrito"]=array( array("productoId"=>$_POST["productoId"],"cantidad"=> 1));
		}else{
			// apartie del segundo producto:
			$cart = $_SESSION["carrito"];
			$repeated = false;
			// recorremos el carrito en busqueda de producto repetido
			foreach ($cart as $c) {
				// si el producto esta repetido rompemos el ciclo
				if($c["productoId"]==$_POST["productoId"]){
					$repeated=true;
					break;
				}
			}
			// si el producto es repetido no hacemos nada, simplemente redirigimos
			if($repeated){
				print "<script>alert('Error: Producto Repetido!');</script>";
			}else{
				// si el producto no esta repetido entonces lo agregamos a la variable cart y despues asignamos la variable cart a la variable de sesion
				array_push($cart, array("productoId"=>$_POST["productoId"],"cantidad"=> 1));
				$_SESSION["carrito"] = $cart;
			}
		}
		print "<script>window.location='../../index.php';</script>";
	}
}

?>

