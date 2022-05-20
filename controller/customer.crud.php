<?php
session_start();
require_once('../model/customer.model.php');

$prod = new CustomerModel();
	// Se valida cual variable se recibe via _POST para ejecutar las acciones:
	// $_POST['add'] crear
	// $_POST['edit'] actualizar
	// $_POST['delete'] eliminar
	if (isset($_POST['add'])) {

        $prod->__SET('fname',   $_REQUEST['fname']);
        $prod->__SET('lname', $_REQUEST['lname']);
        $prod->__SET('email',   $_REQUEST['email']);
        $prod->__SET('address',   $_REQUEST['address']);

        $prod->add($prod);
        header('Location: ../view/customer.view.php');
    }elseif (isset($_POST['edit'])) {
        $prod->__SET('uid',     $_REQUEST['uid']); 
        $prod->__SET('fname',   $_REQUEST['fname']); 
        $prod->__SET('lname', $_REQUEST['lname']);
        $prod->__SET('email',   $_REQUEST['email']);
        $prod->__SET('address',   $_REQUEST['address']);

        $prod->edit($prod);
        header('Location: ../view/customer.view.php');
    }elseif(isset($_POST['delete'])) {
		$prod->delete($_POST['uid']);
		header('Location: ../view/customer.view.php');
  }
?>
