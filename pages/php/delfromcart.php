<?php
/*
* Eliminar un producto del carrito
*/
session_start();
if(!empty($_SESSION["carrito"])){
	$cart  = $_SESSION["carrito"];
	if(count($cart)==1){ unset($_SESSION["carrito"]); }
	else{
		$newcart = array();
		foreach($cart as $c){
			if($c["productoId"]!=$_GET["id"]){
				$newcart[] = $c;
			}
		}
		$_SESSION["carrito"] = $newcart;
	}
}
print "<script>window.location='../../carrito-compras.php';</script>";

?>

