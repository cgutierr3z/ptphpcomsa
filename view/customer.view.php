<?php
include "../template/header.php";
include('../model/customer.model.php');

$cliente = new CustomerModel();
$listaClientes=$cliente->getAll();
?>
  <!-- Aquí el código HTML de la aplicación -->
  <main role="main" class="container" >
    <h1>Listado de Clientes
        <a class="btn btn-primary" role="button"  href="#addnew" data-toggle="modal">
            <i class="bi bi-plus-square-fill"> </i> Añadir Nuevo Cliente
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
              <th>NOMBRE</th>
              <th>APELLIDO</th>
              <th>EMAIL</th>
              <th>DIRECCION</th>              
              <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach($listaClientes as $cli) {
          ?>
            <tr>
              <td><?php echo $cli->__GET('uid'); ?></td>
              <td><?php echo $cli->__GET('fname'); ?></td>
              <td><?php echo $cli->__GET('lname'); ?></td>
              <td><?php echo $cli->__GET('email'); ?></td>
              <td><?php echo $cli->__GET('address'); ?></td>
              
              <td>
                <a class="btn btn-outline-primary" role="button" href="#edit_<?php echo $cli->__GET('uid'); ?>" data-toggle="modal">
                  <i class="bi bi-pencil-square"></i>
                </a>
              
                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal" data-whatever="<?php echo $cli->__GET('uid'); ?>">
                  <i class="bi bi-trash-fill"></i>
                </button>
              </td>
            </tr>
            <?php include('../template/editCustomer.form.php'); ?>
          <?php
          }
          ?>
        <tbody>
        <tfoot>
          <tr>
            <th>UID</th>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
            <th>EMAIL</th>
            <th>DIRECCION</th>                
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
                <form action='../controller/customer.crud.php' method="post">

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
<?php include('../template/addCustomer.form.php'); ?>

<?php include "../template/footer.php"; ?>
