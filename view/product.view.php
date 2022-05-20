<?php
include "../template/header.php";
include('../model/product.model.php');

$producto = new ProductModel();
$listaProductos=$producto->getAll();
?>
  <!-- Aquí el código HTML de la aplicación -->
  <main role="main" class="container" >
    <h1>Listado de productos
        <a class="btn btn-primary" role="button"  href="#addnew" data-toggle="modal">
            <i class="bi bi-plus-square-fill"> </i> Añadir Nuevo Producto
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

    <table id="tableProductos" class="display" style="width:100%">
        <thead>
          <tr>
              <th>UID</th>
              <th>NOMBRE</th>
              <th>REFERENCIA</th>
              <th>PRECIO ($COP)</th>
              <th>STOCK</th>              
              <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach($listaProductos as $prod) {
          ?>
            <tr>
              <td><?php echo $prod->__GET('uid'); ?></td>
              <td><?php echo $prod->__GET('pname'); ?></td>
              <td><?php echo $prod->__GET('refcode'); ?></td>
              <td><?php echo $prod->__GET('price'); ?></td>
              <td><?php echo $prod->__GET('stock'); ?></td>
              
              <td>
                <a class="btn btn-outline-primary" role="button" href="#edit_<?php echo $prod->__GET('uid'); ?>" data-toggle="modal">
                  <i class="bi bi-pencil-square"></i>
                </a>
              
                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal" data-whatever="<?php echo $prod->__GET('uid'); ?>">
                  <i class="bi bi-trash-fill"></i>
                </button>
              </td>
            </tr>
            <?php include('../template/editProduct.form.php'); ?>
          <?php
          }
          ?>
        <tbody>
        <tfoot>
          <tr>
          <th>UID</th>
              <th>NOMBRE</th>
              <th>REFERENCIA</th>
              <th>PRECIO ($COP)</th>
              <th>STOCK</th>              
              <th></th>
          </tr>
        </tfoot>
    </table>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Continuar con la eliminación del producto?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                                        
            </div>
            <div class="modal-footer">
                <form action='../controller/product.crud.php' method="post">

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
<?php include('../template/addProduct.form.php'); ?>

<?php include "../template/footer.php"; ?>
