<?php
require_once('../controller/db_connection.php');

class ProductModel {
    private $uid;
    private $pname;
    private $refcode;
    private $price;
    private $stock;

    private $pdo;

    public function __GET($param){ return $this->$param;}
    public function __SET($param,$data){return $this->$param = $data;}

    public function __CONSTRUCT() {
        $this->pdo = databaseConnection::connect();
    }

    public function getAll() {
        try{
            $result = [];

            $sql = "SELECT * FROM product";
            $stm = $this->pdo->query($sql);
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
                $prod = new ProductModel();
                $prod->__SET('uid', $r->uid);
                $prod->__SET('pname', $r->pname);
                $prod->__SET('refcode', $r->refcode);
                $prod->__SET('price', $r->price);
                $prod->__SET('stock', $r->stock);

                $result[] = $prod;
            }
            return $result;
        }catch(Exception $e){
            $_SESSION['error'] = true;
            $_SESSION['message'] = "ERROR: listando los productos" . $e->getMessage();
        }
    }

    public function get($uid){
        try{
            $sql = "SELECT * FROM product WHERE uid = ?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array($uid));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $prod = new ProductModel();
            $prod->__SET('uid', $r->uid);
            $prod->__SET('pname', $r->pname);
            $prod->__SET('refcode', $r->refcode);
            $prod->__SET('price', $r->price);
            $prod->__SET('stock', $r->stock);

            return $prod;
        }catch(Exception $e){
            $_SESSION['error'] = true;
            $_SESSION['message'] = "ERROR: obteniendo producto " . $e->getMessage();
        }
    }

    public function delete($uid){
        try{
            $sql = "DELETE FROM product WHERE uid = ?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array($uid));

            $_SESSION['error'] = false;
            $_SESSION['message'] = ( $stm ) ? 'PRODUCTO ELIMINADO CON EXITO' : 'NO SE PUDO ELIMIAR EL PRODUCTO';

        } catch (Exception $e){
            $_SESSION['error'] = true;
            $_SESSION['message'] = "ERROR: eliminando producto" . $e->getMessage();
        }
    }

    public function edit(ProductModel $data){
        try{
            $sql = "UPDATE product SET 
                        pname   = ?, 
                        refcode = ?,
                        price   = ?, 
                        stock   = ?
                    WHERE uid = ?";

            $stm =  $this->pdo->prepare($sql);
            
            $stm->execute(
                array(
                    $data->__GET('pname'), 
                    $data->__GET('refcode'), 
                    $data->__GET('price'),
                    $data->__GET('stock'),
                    $data->__GET('uid')
                )
            );

            $_SESSION['error'] = false;
            $_SESSION['message'] = ( $stm ) ? 'PRODUCTO EDITADO CON EXITO' : 'NO SE PUDO EDITAR EL PRODUCTO';	

        } catch (Exception $e){
            $_SESSION['error'] = true;
            $_SESSION['message'] = "ERROR: actualizando producto" . $e->getMessage();
        }
    }

    public function editStock(ProductModel $data){
        try{
            $sql = "UPDATE product SET 
                        stock   = ?
                    WHERE uid = ?";

            $stm =  $this->pdo->prepare($sql);
            
            $stm->execute(
                array(
                    $data->__GET('stock'),
                    $data->__GET('uid')
                )
            );

            $_SESSION['error'] = false;
            $_SESSION['message'] = ( $stm ) ? 'STOCK DE PRODUCTO EDITADO CON EXITO' : 'NO SE PUDO EDITAR EL STOCK DE PRODUCTO';	

        } catch (Exception $e){
            $_SESSION['error'] = true;
            $_SESSION['message'] = "ERROR: actualizando stock de producto" . $e->getMessage();
        }
    }

    public function add(ProductModel $data){
        try{
            $sql = "INSERT INTO product (pname,refcode,price,stock) VALUES (?, ?, ?, ?)";
            $stm = $this->pdo->prepare($sql);

            $stm->execute(
                array(
                    $data->__GET('pname'), 
                    $data->__GET('refcode'), 
                    $data->__GET('price'),
                    $data->__GET('stock')
                )
            );

            $_SESSION['error'] = false;
            $_SESSION['message'] = ( $stm ) ? 'PRODUCTO REGISTRADO CON EXITO' : 'NO SE PUDO REGISTRAR EL PRODUCTO';	

        }catch(Exception $e){
            $_SESSION['error'] = true;
            $_SESSION['message'] = "ERROR: creando producto." . $e->getMessage();
        }
    }
}