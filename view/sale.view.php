<?php
include "../template/header.php";
include('../model/sale.model.php');
include('../model/customer.model.php');
include('../model/product.model.php');

$venta = new SaleModel();
$listaVentas=$venta->getAll();

$cliente = new CustomerModel();
$listaClientes=$cliente->getAll();

$producto = new ProductModel();
$listaProductos=$producto->getAll();

?>
  <!-- Aquí el código HTML de la aplicación -->
  <main role="main" class="container" >
    <h1>Listado de Ventas
        <a class="btn btn-primary" role="button"  href="#addnew" data-toggle="modal">
            <i class="bi bi-plus-square-fill"> </i> Registrar Venta
        </a>
    </h1>

    <?php 
	session_start();
	if(isset($_SESSION['message'])){
	?>
        <div class="alert alert-<?php echo ($_SESSION['error']) ?  "danger" :  "success"; ?> alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['message']; ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
	<?php
		unset($_SESSION['message']);
	}
    ?>

    <table id="tables" class="table table-hover display" style="width:100%">
        <thead>
          <tr>
              <th>UID</th>
              <th>PRODUCTO</th>
              <th>CLIENTE</th>
              <th>CANTIDAD</th>
              <th>TOTAL VENTA</th>              
              <th></th>
          </tr>
        </thead>
        <tbody>
            <?php
            foreach($listaVentas as $ven) {
            ?>
                <tr>
                <td><?php echo $ven->__GET('uid'); ?></td>
                <td><?php echo $producto->get($ven->__GET('uidProduct'))->__GET('pname'); ?></td>
                <td><?php echo $cliente->get($ven->__GET('uidCustomer'))->__GET('fname'); ?> <?php echo $cliente->get($ven->__GET('uidCustomer'))->__GET('lname'); ?> </td>
                <td><?php echo $ven->__GET('nItems'); ?></td>
                <td><?php echo $ven->__GET('totalPrice'); ?></td>
                
                <td>
                    <a class="btn btn-outline-primary" role="button" href="#edit_<?php echo $ven->__GET('uid'); ?>" data-toggle="modal">
                    <i class="bi bi-pencil-square"></i>
                    </a>
                
                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal" data-whatever="<?php echo $ven->__GET('uid'); ?>">
                    <i class="bi bi-trash-fill"></i>
                    </button>
                </td>
                </tr>
                
            <?php
            }
            ?>
        <tbody>
        <tfoot>
          <tr>
            <th>UID</th>
            <th>PRODUCTO</th>
            <th>CLIENTE</th>
            <th>CANTIDAD</th>
            <th>TOTAL VENTA</th>                  
            <th></th>
          </tr>
        </tfoot>
    </table>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Continuar con la eliminación del cliente?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                                        
            </div>
            <div class="modal-footer">
                <form action='../controller/sale.crud.php' method="post">

                    <div class="form-group">
                        <input type="hidden" class="form-control" name="uid" id="recipient-name">
                        <input type='hidden' name='delete' value='delete'>
                    </div>
                    <button type="button" class="btn btn-default" data-dismiss="modal"> Cancelar</button>
                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"> </i>Eliminar Producto</button>
                </form>
            </div>
            
        </div>
    </div>

  </main>
<?php include('../template/addSale.form.php'); ?>

<?php include "../template/footer.php"; ?>
