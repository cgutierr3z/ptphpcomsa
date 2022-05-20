<?php
require_once('../controller/db_connection.php');

class CustomerModel {
    private $uid;
    private $fname;
    private $lname;
    private $email;
    private $address;

    private $pdo;

    public function __GET($param){ return $this->$param;}
    public function __SET($param,$data){return $this->$param = $data;}

    public function __CONSTRUCT() {
        $this->pdo = databaseConnection::connect();
    }

    public function getAll() {
        try{
            $result = [];

            $sql = "SELECT * FROM customer";
            $stm = $this->pdo->query($sql);
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
                $prod = new CustomerModel();
                $prod->__SET('uid', $r->uid);
                $prod->__SET('fname', $r->fname);
                $prod->__SET('lname', $r->lname);
                $prod->__SET('email', $r->email);
                $prod->__SET('address', $r->address);

                $result[] = $prod;
            }
            return $result;
        }catch(Exception $e){
            $_SESSION['error'] = true;
            $_SESSION['message'] = "ERROR: listando los clientes" . $e->getMessage();
        }
    }

    public function get($uid){
        try{
            $sql = "SELECT * FROM customer WHERE uid = ?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array($uid));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $prod = new CustomerModel();
            $prod->__SET('uid', $r->uid);
            $prod->__SET('fname', $r->fname);
            $prod->__SET('lname', $r->lname);
            $prod->__SET('email', $r->email);
            $prod->__SET('address', $r->address);

            return $prod;
        }catch(Exception $e){
            $_SESSION['error'] = true;
            $_SESSION['message'] = "ERROR: obteniendo el cliente " . $e->getMessage();
        }
    }

    public function delete($uid){
        try{
            $sql = "DELETE FROM customer WHERE uid = ?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array($uid));

            $_SESSION['error'] = false;
            $_SESSION['message'] = ( $stm ) ? 'CLIENTE ELIMINADO CON EXITO' : 'NO SE PUDO ELIMIAR EL CLIENTE';

        } catch (Exception $e){
            $_SESSION['error'] = true;
            $_SESSION['message'] = "ERROR: eliminando cliente" . $e->getMessage();
        }
    }

    public function edit(CustomerModel $data){
        try{
            $sql = "UPDATE customer SET 
                        fname   = ?, 
                        lname = ?,
                        email   = ?, 
                        address   = ?
                    WHERE uid = ?";

            $stm =  $this->pdo->prepare($sql);
            
            $stm->execute(
                array(
                    $data->__GET('fname'), 
                    $data->__GET('lname'), 
                    $data->__GET('email'),
                    $data->__GET('address'),
                    $data->__GET('uid')
                )
            );

            $_SESSION['error'] = false;
            $_SESSION['message'] = ( $stm ) ? 'CLIENTE EDITADO CON EXITO' : 'NO SE PUDO EDITAR EL CLIENTE';	

        } catch (Exception $e){
            $_SESSION['error'] = true;
            $_SESSION['message'] = "ERROR: actualizando cliente" . $e->getMessage();
        }
    }

    public function add(CustomerModel $data){
        try{
            $sql = "INSERT INTO customer (fname,lname,email,address) VALUES (?, ?, ?, ?)";
            $stm = $this->pdo->prepare($sql);

            $stm->execute(
                array(
                    $data->__GET('fname'), 
                    $data->__GET('lname'), 
                    $data->__GET('email'),
                    $data->__GET('address')
                )
            );

            $_SESSION['error'] = false;
            $_SESSION['message'] = ( $stm ) ? 'CLIENTE REGISTRADO CON EXITO' : 'NO SE PUDO REGISTRAR EL CLIENTE';	

        }catch(Exception $e){
            $_SESSION['error'] = true;
            $_SESSION['message'] = "ERROR: creando cliente" . $e->getMessage();
        }
    }
}