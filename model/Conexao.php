<?php

class Conexao {
    private static $mycon;
    
    public static function connect($host = "mysql.hostinger.com.br", $user = "u254814085_carbo", $pass = "123456", $database = "u254814085_carbo") {

        if (!self::$mycon){
            $con = mysqli_connect($host, $user, $pass, $database);
        
            if (!$con) {
                die("Erro de conexão: " . mysqli_error($con));
            } else {
                self::$mycon = $con;
            }
        }
        return self::$mycon;
    }
    
    public static function close() {
        mysqli_close(self::$mycon);
    }
    public static function lastId() {
        return mysqli_insert_id(self::$mycon);
    }
}
