<?php
require_once('../controller/db_connection.php');

class SaleModel {
    private $uid;
    private $uidProduct;
    private $uidCustomer;
    private $nItems;
    private $totalPrice;

    private $pdo;

    public function __GET($param){ return $this->$param;}
    public function __SET($param,$data){return $this->$param = $data;}

    public function __CONSTRUCT() {
        $this->pdo = databaseConnection::connect();
    }

    public function getAll() {
        try{
            $result = [];

            $sql = "SELECT * FROM sale";
            $stm = $this->pdo->query($sql);
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
                $prod = new SaleModel();
                $prod->__SET('uid', $r->uid);
                $prod->__SET('uidProduct', $r->uidProduct);
                $prod->__SET('uidCustomer', $r->uidCustomer);
                $prod->__SET('nItems', $r->nItems);
                $prod->__SET('totalPrice', $r->totalPrice);

                $result[] = $prod;
            }
            return $result;
        }catch(Exception $e){
            $_SESSION['error'] = true;
            $_SESSION['message'] = "ERROR: listando las ventas" . $e->getMessage();
        }
    }

    public function get($uid){
        try{
            $sql = "SELECT * FROM sale WHERE uid = ?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array($uid));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $prod = new SaleModel();
            $prod->__SET('uid', $r->uid);
            $prod->__SET('uidProduct', $r->uidProduct);
            $prod->__SET('uidCustomer', $r->uidCustomer);
            $prod->__SET('nItems', $r->nItems);
            $prod->__SET('totalPrice', $r->totalPrice);

            return $prod;
        }catch(Exception $e){
            $_SESSION['error'] = true;
            $_SESSION['message'] = "ERROR: obteniendo la venta " . $e->getMessage();
        }
    }

    public function delete($uid){
        try{
            $sql = "DELETE FROM sale WHERE uid = ?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array($uid));

            $_SESSION['error'] = false;
            $_SESSION['message'] = ( $stm ) ? 'VENTA ELIMINADO CON EXITO' : 'NO SE PUDO ELIMIAR LA VENTA';

        } catch (Exception $e){
            $_SESSION['error'] = true;
            $_SESSION['message'] = "ERROR: eliminando venta" . $e->getMessage();
        }
    }

    public function edit(SaleModel $data){
        try{
            $sql = "UPDATE sale SET 
                        uidProduct   = ?, 
                        uidCustomer = ?,
                        nItems   = ?, 
                        totalPrice   = ?
                    WHERE uid = ?";

            $stm =  $this->pdo->prepare($sql);
            
            $stm->execute(
                array(
                    $data->__GET('uidProduct'), 
                    $data->__GET('uidCustomer'), 
                    $data->__GET('nItems'),
                    $data->__GET('totalPrice'),
                    $data->__GET('uid')
                )
            );

            $_SESSION['error'] = false;
            $_SESSION['message'] = ( $stm ) ? 'VENTA EDITADA CON EXITO' : 'NO SE PUDO EDITAR LA VENTA';	

        } catch (Exception $e){
            $_SESSION['error'] = true;
            $_SESSION['message'] = "ERROR: actualizando venta" . $e->getMessage();
        }
    }

    public function add(SaleModel $data){
        try{
            $sql = "INSERT INTO sale (uidProduct,uidCustomer,nItems,totalPrice) VALUES (?, ?, ?, ?)";
            $stm = $this->pdo->prepare($sql);

            $stm->execute(
                array(
                    $data->__GET('uidProduct'), 
                    $data->__GET('uidCustomer'), 
                    $data->__GET('nItems'),
                    $data->__GET('totalPrice')
                )
            );

            $_SESSION['error'] = false;
            $_SESSION['message'] = ( $stm ) ? 'VENTA REGISTRADA Y STOCK ACTUALIZADO CON EXITO' : 'NO SE PUDO REGISTRAR LA VENTA';	

        }catch(Exception $e){
            $_SESSION['error'] = true;
            $_SESSION['message'] = "ERROR: creando venta" . $e->getMessage();
        }
    }
}