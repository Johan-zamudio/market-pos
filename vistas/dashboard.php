<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tablero Principal</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active">Tablero Principal</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <!-- Creamos una fila -->
        <div class="row">
            <div class="col-lg-2">
                <!-- TARJETA TOTAL PRODUCTOS -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h4 id="totalProductos"></h4>
                        <p>Total Productos Registrados</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-clipboard"></i>
                    </div>
                    <a style="cursor:pointer;" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-2">
                <!-- TARJETA TOTAL COMPRAS -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h4 id="totalCompras"></h4>
                        <p>Total Compras</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-cash"></i>
                    </div>
                    <a style="cursor:pointer;" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-2">
                <!-- TARJETA TOTAL VENTAS -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h4 id="totalVentas"></h4>
                        <p>Total de ventas</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-clipboard"></i>
                    </div>
                    <a style="cursor:pointer;" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-2">
                <!-- TARJETA TOTAL GANANCIAS -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h4 id="ganancias"></h4>
                        <p>Total Ganancias</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-clipboard"></i>
                    </div>
                    <a style="cursor:pointer;" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-2">
                <!-- TARJETA PRODUCTOS POCO STOCK -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h4 id="productosPocoStock"></h4>
                        <p>Productos poco stock</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-clipboard"></i>
                    </div>
                    <a style="cursor:pointer;" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-2">
                <!-- TARJETA TOTAL VENTAS DIA ACTUAL -->
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h4 id="ventasHoy"></h4>
                        <p>ventas del día</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-clipboard"></i>
                    </div>
                    <a style="cursor:pointer;" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

<script>
    $(document).ready(function(){
        $.ajax({
            url: "ajax/dashboard.ajax.php",
            dataType: 'json',
            method: 'POST',
            success:function(respuesta){
                console.log("respuesta", respuesta);
                const formatter = new Intl.NumberFormat('es-CL', {
                    style: 'currency',
                    currency: 'CLP',
                    minimumFractionDigits: 0
                });

                $("#totalProductos").html(respuesta[0]["totalProductos"]);
                $("#totalCompras").html(formatter.format(respuesta[0]["totalCompras"]));
                $("#totalVentas").html(formatter.format(respuesta[0]["totalVentas"]));
                $("#ganancias").html(formatter.format(respuesta[0]["ganancias"]));
                $("#productosPocoStock").html(respuesta[0]["productosPocoStock"]);
                $("#ventasHoy").html(formatter.format(respuesta[0]["ventasHoy"]));
            } 
        });
    });
</script>
