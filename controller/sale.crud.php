<?php
session_start();
require_once('../model/sale.model.php');
include('../model/customer.model.php');
include('../model/product.model.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$ven = new SaleModel();
	// Se valida cual variable se recibe via _POST para ejecutar las acciones:
	// $_POST['add'] crear
	// $_POST['edit'] actualizar
	// $_POST['delete'] eliminar
	if (isset($_POST['add'])) {
        $ven->__SET('uidProduct',   $_REQUEST['uidProduct']);

        $producto = new ProductModel();
        $prod = $producto->get($_REQUEST['uidProduct']);

        $ven->__SET('uidCustomer', $_REQUEST['uidCustomer']);
        $ven->__SET('nItems',   $_REQUEST['nItems']);

        if($prod->__GET('stock') >= $_REQUEST['nItems']){
            $nstock = ($prod->__GET('stock') - $_REQUEST['nItems']);
            $_SESSION['error'] = true;
            $_SESSION['message'] = 'STOCK DE PRODUCTO ACTUALIZADO';
        }else{
            $_SESSION['error'] = true;
            $_SESSION['message'] = 'LA CANTIDAD DE ITEMS DE LA VENTA SUPERA EL STOCK DISPONIBLE DEL PRODUCTO';
            header('Location: ../view/sale.view.php');
            exit();
        }
        
        $prod->__SET('stock',   $nstock);
        $prod->editStock($prod);

        $tprice = ($_REQUEST['nItems'] >= 5) ? ($prod->__GET('price') * $_REQUEST['nItems'] * 0.9) : ($prod->__GET('price') * $_REQUEST['nItems']);
        $ven->__SET('totalPrice',   $tprice);

        $ven->add($ven);
        header('Location: ../view/sale.view.php');
    }elseif (isset($_POST['edit'])) {
        $ven->__SET('uid',     $_REQUEST['uid']); 
        $ven->__SET('uidProduct',   $_REQUEST['uidProduct']); 
        $ven->__SET('uidCustomer', $_REQUEST['uidCustomer']);
        $ven->__SET('nItems',   $_REQUEST['nItems']);
        $ven->__SET('totalPrice',   $_REQUEST['totalPrice']);

        $ven->edit($ven);
        header('Location: ../view/sale.view.php');
    }elseif(isset($_POST['delete'])) {

        $v = $ven->get($_POST['uid']);
        $producto = new ProductModel();
        $prod = $producto->get($v->__GET('uidProduct'));
        $nstock =  ($prod->__GET('stock') + $v->__GET('nItems'));
        $prod->__SET('stock',   $nstock);
        $prod->editStock($prod);

		$ven->delete($_POST['uid']);
		header('Location: ../view/sale.view.php');
  }
?>
