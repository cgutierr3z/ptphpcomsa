<?php

class databaseConnection{
    protected  $connection = NULL;

    private function __construct (){}

    public static function connect(){
        try {
            $config = include 'config.php';
            $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];

            $connection = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
            return $connection;

        }catch(PDOException $e) {
            $_SESSION['error'] = true;
            $_SESSION['message'] = "PROBLEMAS DE CONEXION A LA BD" . $e->getMessage();
        }
    }

    public function close(){
        $this->connection = null;
    }
} 
?>