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

<!-- -->
<div class="content">
    <div class="container-fluid">
        <!-- Tarjetas Informativas -->
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
                    <a style="cursor:pointer;" class="small-box-footer">Más info <i
                            class="fas fa-arrow-circle-right"></i></a>
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
                    <a style="cursor:pointer;" class="small-box-footer">Más info <i
                            class="fas fa-arrow-circle-right"></i></a>
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
                        <i class="ion ion-ios-cart"></i>
                    </div>
                    <a style="cursor:pointer;" class="small-box-footer">Más info <i
                            class="fas fa-arrow-circle-right"></i></a>
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
                        <i class="ion ion-ios-pie"></i>
                    </div>
                    <a style="cursor:pointer;" class="small-box-footer">Más info <i
                            class="fas fa-arrow-circle-right"></i></a>
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
                        <i class="ion ion-android-remove-circle"></i>
                    </div>
                    <a style="cursor:pointer;" class="small-box-footer">Más info <i
                            class="fas fa-arrow-circle-right"></i></a>
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
                        <i class="ion ion-android-calendar"></i>
                    </div>
                    <a style="cursor:pointer;" class="small-box-footer">Más info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="barChart"
                                style="min-height: 250px; height: 300px; max-height: 350px; width: 100%;">

                            </canvas>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

<script>
    $(document).ready(function () {
        function updateDashboard() {
            $.ajax({
                url: "ajax/dashboard.ajax.php",
                dataType: 'json',
                method: 'POST',
                success: function (respuesta) {
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
        }

        updateDashboard();
        setInterval(updateDashboard, 10000);

        $.ajax({
            url: "ajax/dashboard.ajax.php",
            dataType: 'json',
            method: 'POST',
            data: { 'accion': 1 },
            success: function (respuesta) {
                console.log("respuesta", respuesta);

                var fecha_venta = [];
                var total_venta = [];
                var total_ventas_mes = 0;

                for (let index = 0; index < respuesta.length; index++) {
                    fecha_venta.push(respuesta[index]['fecha_venta']);
                    total_venta.push(respuesta[index]['total_venta']);
                    total_ventas_mes = parseFloat(total_ventas_mes) + parseFloat(respuesta[index]['total_venta']);
                }

                const formatter = new Intl.NumberFormat('es-CL', {
                    style: 'currency',
                    currency: 'CLP',
                    minimumFractionDigits: 0
                });

                $(".card-title").html('Ventas del Mes: ' + formatter.format(total_ventas_mes));

                var barChartCanvas = $("#barChart").get(0).getContext('2d');

                var areaChartData = {
                    labels: fecha_venta,
                    datasets: [{
                        label: 'Ventas del Mes',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        data: total_venta
                    }]
                };

                var barChartData = $.extend(true, {}, areaChartData);
                var temp0 = areaChartData.datasets[0];

                barChartData.datasets[0] = temp0;

                var barChartOptions = {
                    maintainAspectRatio: false,
                    responsive: true,
                    events: [],
                    legend: {
                        display: true
                    },
                    animation: {
                        duration: 500,
                        easing: "easeOutQuart",
                        onComplete: function () {
                            var ctx = this.chart.ctx;
                            ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontFamily, 'normal', Chart.defaults.global.defaultFontSize);
                            ctx.textAlign = 'center';
                            ctx.textBaseline = 'bottom';

                            this.data.datasets.forEach(function (dataset) {
                                dataset.data.forEach(function (data, index) {
                                    var model = dataset._meta[Object.keys(dataset._meta)[0]].data[index]._model;
                                    var scale_max = dataset._meta[Object.keys(dataset._meta)[0]].data[index]._yScale.maxHeight;
                                    ctx.fillStyle = '#444';
                                    var y_pos = model.y - 5;

                                    if ((scale_max - model.y) / scale_max >= 0.93)
                                        y_pos = model.y + 20;
                                    ctx.fillText(data, model.x, y_pos);
                                });
                            });
                        }
                    }
                };

                new Chart(barChartCanvas, {
                    type: 'bar',
                    data: barChartData,
                    options: barChartOptions
                });
            }
        });
    });
</script>
