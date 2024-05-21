<?php

class Conexion{

    static public function conectar(){

    try 
    
    {    
        $conn = new PDO("mysql:host=localhost;dbname=market-pos","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $conn;
    } 
    
    catch (PDOException $e)
        {
                echo 'Falló la conexión: ' . $e->getMessage();
        }
    }
}