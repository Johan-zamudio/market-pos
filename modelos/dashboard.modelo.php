<?php

require_once "conexion.php";
class DashboardModelo{

    static public function mdlGetDatosDashboard(){

        $stmt = conexion::conectar()->prepare('call prc_ObtenerDatosDashboard()');

        $stmt -> execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);


    }
}