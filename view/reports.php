<?php 
include "../template/header.php"; 
include('../model/sale.model.php');
include('../model/customer.model.php');
include('../model/product.model.php');

require_once('../controller/db_connection.php');
$pdo = databaseConnection::connect();

$venta = new SaleModel();

$cliente = new CustomerModel();

$producto = new ProductModel();

?>
  <!-- Aquí el código HTML de la aplicación -->

  <main role="main" class="container" >

    <?php 
	session_start();
	if(isset($_SESSION['message'])){
	?>
        <div class="alert alert-<?php echo ($_SESSION['error']) ?  "danger" :  "success"; ?> alert-dismissible fade show" role="alert">
            <b><?php echo $_SESSION['message']; ?></b>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
	<?php
		unset($_SESSION['message']);
	}
    ?>
    <h1>Reporte 5 Clientes con mas compras </h1>
    <table class="table table-hover" style="width:100%">
        <thead>
            <tr>
                <th>CLIENTE</th>
                <th>COMPRAS</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        
        try{
            $sql = "SELECT COUNT(uid) AS compras, uidCustomer AS cliente FROM sale GROUP BY uidCustomer ORDER BY compras DESC LIMIT 5";
            $stm = $pdo->query($sql);
            $stm->execute();
            $report1 = $stm->fetchAll(PDO::FETCH_OBJ);
            
            #print_r($report1);
        }catch(Exception $e){
            $_SESSION['error'] = true;
            $_SESSION['message'] = "ERROR: listando las ventas" . $e->getMessage();
        }

        foreach($report1 as $ven) { 
        ?>
            <tr>
                <td><?php echo $ven->cliente; ?> <?php echo $cliente->get($ven->cliente)->__GET('fname'); ?> <?php echo $cliente->get($ven->cliente)->__GET('lname'); ?></td>
                <td><?php echo $ven->compras; ?></td>
            </tr>
        <?php 
        }
        ?>
        <tbody>
        <tfoot>
            <tr>
                <th>CLIENTE</th>
                <th>COMPRAS</th>
            </tr>
        </tfoot>
    </table>

    <h1>Reporte 5 Productos con mas compras </h1>
    <table class="table table-hover" style="width:100%">
        <thead>
            <tr>
                <th>PRODUCTO</th>
                <th>COMPRAS</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        
        try{
            $sql = "SELECT COUNT(uid) AS compras, uidProduct AS producto FROM sale GROUP BY uidProduct ORDER BY compras DESC LIMIT 5";
            $stm = $pdo->query($sql);
            $stm->execute();
            $report2 = $stm->fetchAll(PDO::FETCH_OBJ);
            
            #print_r($report1);
        }catch(Exception $e){
            $_SESSION['error'] = true;
            $_SESSION['message'] = "ERROR: listando las ventas" . $e->getMessage();
        }

        foreach($report2 as $ven) { 
        ?>
            <tr>
                <td><?php echo $ven->producto; ?> <?php echo $producto->get($ven->producto)->__GET('pname'); ?> </td>
                <td><?php echo $ven->compras; ?></td>
            </tr>
        <?php 
        }
        ?>
        <tbody>
        <tfoot>
            <tr>
                <th>PRODUCTO</th>
                <th>COMPRAS</th>
            </tr>
        </tfoot>
    </table>

    <h1>Reporte 5 Clientes, Productos total compras </h1>
    <table class="table table-hover" style="width:100%">
        <thead>
            <tr>
                <th>CLIENTE</th>
                <th>PRODUCTO</th>
                <th>COMPRAS</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        
        try{
            $sql = "SELECT SUM(totalPrice) AS compras, uidProduct AS producto, uidCustomer AS cliente FROM sale GROUP BY cliente, producto ORDER BY compras DESC LIMIT 5";
            $stm = $pdo->query($sql);
            $stm->execute();
            $report3 = $stm->fetchAll(PDO::FETCH_OBJ);
            
            #print_r($report1);
        }catch(Exception $e){
            $_SESSION['error'] = true;
            $_SESSION['message'] = "ERROR: listando las ventas" . $e->getMessage();
        }

        foreach($report3 as $ven) { 
        ?>
            <tr>
                <td><?php echo $ven->cliente; ?> <?php echo $cliente->get($ven->cliente)->__GET('fname'); ?> <?php echo $cliente->get($ven->cliente)->__GET('lname'); ?></td>
                <td><?php echo $ven->producto; ?> <?php echo $producto->get($ven->producto)->__GET('pname'); ?> </td>
                <td>$<?php echo $ven->compras; ?></td>
            </tr>
        <?php 
        }
        ?>
        <tbody>
        <tfoot>
            <tr>
                <th>CLIENTE</th>
                <th>PRODUCTO</th>
                <th>COMPRAS</th>
            </tr>
        </tfoot>
    </table>


  </main>

<?php include "../template/footer.php"; ?>