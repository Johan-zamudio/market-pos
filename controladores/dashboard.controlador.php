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

    static public function ctrProductosMasVendidos(){
    
        $productosMasVendidos = DashboardModelo::mdlProductosMasVendidos();
    
        return $productosMasVendidos;
    
    }

    static public function ctrProductosPocoStock(){
    
        $productosPocoStock = DashboardModelo::mdlProductosPocoStock();
    
        return $productosPocoStock;
    
    }


}