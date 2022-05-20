<?php
session_start();
require_once('../model/product.model.php');

$prod = new ProductModel();
	// Se valida cual variable se recibe via _POST para ejecutar las acciones:
	// $_POST['add'] crear
	// $_POST['update'] actualizar
	// $_POST['delete'] eliminar
	if (isset($_POST['add'])) {

        $prod->__SET('pname',   $_REQUEST['pname']);
        $prod->__SET('refcode', $_REQUEST['refcode']);
        $prod->__SET('price',   $_REQUEST['price']);
        $prod->__SET('stock',   $_REQUEST['stock']);

        $prod->add($prod);
        header('Location: ../view/product.view.php');
    }elseif (isset($_POST['edit'])) {
        $prod->__SET('uid',     $_REQUEST['uid']); 
        $prod->__SET('pname',   $_REQUEST['pname']); 
        $prod->__SET('refcode', $_REQUEST['refcode']);
        $prod->__SET('price',   $_REQUEST['price']);
        $prod->__SET('stock',   $_REQUEST['stock']);

        $prod->edit($prod);
        header('Location: ../view/product.view.php');
    }elseif(isset($_POST['delete'])) {
		$prod->delete($_POST['uid']);
		header('Location: ../view/product.view.php');
  }
?>
