<?php

class DashboardControlador{

    static public function crtGetDatosDashBoard(){

        $datos = DashboardModelo::mdlGetDatosDashboard();
        return $datos;
    }
}