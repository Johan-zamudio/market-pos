<?php

class DashboardControlador{

    static public function crtGetDatosDashBoard(){

        $datos = DashboardModelo::mdlGetDatosDashboard();
        return $datos;
    }


    static public function crtGetVentasMesActual(){

        $ventasMesActual = DashboardModelo::mdlGetVentasMesActual();
        return $ventasMesActual;
    }


}