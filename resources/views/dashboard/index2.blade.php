@extends('layouts.master')

@push('css')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('assets/modules/jqvmap/dist/jqvmap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/weather-icon/css/weather-icons.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/weather-icon/css/weather-icons-wind.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css') }}">

<!-- Fontfaces CSS-->
<link rel="stylesheet" href="{{ asset('css/font-face.css') }}" media="all">

<!-- Main CSS-->
<link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}" media="all">
@endpush

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-dark">
                        <i class="fas fa-database"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h3>Total Taksi</h3>
                        </div>
                        <div class="card-body ">
                            <p id="total_taksi">
                                0</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-road"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h3>Total Trip Angkot</h3>
                        </div>
                        <div class="card-body ">
                            <p id="total_trip_angkot">
                                0</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-taxi"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h3>Total Angkot</h3>
                        </div>
                        <div class="card-body ">
                            <p id="total_angkot">
                                0</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-traffic-light"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h3>Total Angkot Beroperasi</h3>
                        </div>
                        <div class="card-body ">
                            <p id="total_angkot_beroperasi">
                                0</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-shuttle-van"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h3>Angkot Bandung</h3>
                        </div>
                        <div class="card-body ">
                            <p id="total_angkot_bandung">
                                0</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="fas fa-car-side"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h3>Angkot AKDP</h3>
                        </div>
                        <div class="card-body ">
                            <p id="total_angkot_akdp">
                                0</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- STATISTIC CHART-->
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div id="container"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div id="container2"></div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div id="container3"></div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div id="container_5"></div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card ">
                    <div id="container_6"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card ">
                    <div id="container_7"></div>
                </div>
            </div>

        </div>

</div>

@endsection

@push('js')

<script type="text/javascript">
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{url('/data/total_angkot_bandung')}}",
            type: 'POST',
            dataType: 'json',
            beforeSend: function () {
                $('.ajax-loader').css("visibility", "visible");
            },
            success: function (data) {
                console.log(data);
                $('#total_angkot_bandung').text(data[0].total_angkot_bandung);

            }
        })

        $.ajax({
            url: "{{url('/data/total_angkot_akdp')}}",
            type: 'POST',
            dataType: 'json',
            beforeSend: function () {
                $('.ajax-loader').css("visibility", "visible");
            },
            success: function (data) {
                console.log(data);
                $('#total_angkot_akdp').text(data[0].total_angkot_akdp);

            }
        })

        $.ajax({
            url: "{{url('/data/graf_total_taxi')}}",
            type: 'POST',
            dataType: 'json',
            beforeSend: function () {
                $('.ajax-loader').css("visibility", "visible");
            },
            success: function (data) {
                console.log(data);
                $('#total_taksi').text(data[0].total_angkot);

            }
        })

        $.ajax({
            url: "{{url('/data/total_data')}}",
            type: 'POST',
            dataType: 'json',
            beforeSend: function () {
                $('.ajax-loader').css("visibility", "visible");
            },
            success: function (data) {
                console.log(data);
                $('#total_data').text(data[0].total_data);

            }
        })

        $.ajax({
            url: "{{url('/data/total_trip_angkot')}}",
            type: 'POST',
            dataType: 'json',
            beforeSend: function () {
                $('.ajax-loader').css("visibility", "visible");
            },
            success: function (data) {
                console.log(data);
                $('#total_trip_angkot').text(data[0].total_trip_angkot);

            }
        })

        $.ajax({
            url: "{{url('/data/total_angkot_beroperasi')}}",
            type: 'POST',
            dataType: 'json',
            beforeSend: function () {
                $('.ajax-loader').css("visibility", "visible");
            },
            success: function (data) {
                console.log(data);
                $('#total_angkot_beroperasi').text(data[0].total_angkot_beroperasi);

            }
        })

        $.ajax({
            url: "{{url('/data/sp_dashboard_usia_kendaraan')}}",
            type: 'POST',
            dataType: 'json',
            beforeSend: function () {
                $('.ajax-loader').css("visibility", "visible");
            },
            success:function (data) {
                var total =[]
                for (var i = 0; i < data.length; i++) {
                    var obj = data[i];
                    total[i] = parseInt(obj.total);
                }
                // Create the chart
                // chart = new Highcharts.Chart
                Highcharts.chart('container', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: 'Status Kendaraan'
                    },
                    tooltip: {
                        formatter: function () {
                            return '<b>' + this.point.name + '</b><br>Total:' + this.y + '<br>Persentase:' + Highcharts.numberFormat(this.percentage, 2) + '%';
                        }
                    },
                    accessibility: {
                        point: {
                            valueSuffix: '%'
                        }
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.name}</b>',
                            }
                        }
                    },
                    series: [{
                        // name: 'Total',
                        colorByPoint: true,
                        data: [
                            ["TMS (=2009)", total[1]],
                            ["WPT (2010)", total[2]],
                            ["Memenuhi Syarat (>2010)", total[0]]
                        ],
                        size: '90%',
                        innerSize: '50%'
                    }]
                });
            },
            complete: function () {
                $('.ajax-loader').css("visibility", "hidden");
            }
        });
        $.ajax({
            url: "{{url('/data/penumpang_tercatat')}}",
            type: 'POST',
            dataType: 'json',
            beforeSend: function () {
                $('.ajax-loader').css("visibility", "visible");
            },
            success: function (data) {
                //console.log(data);
                var lokasi = [];
                var tercatat = [];
                var penumpang = [];
                if (data == "") {
                    $("#error1").html("Project Worker is Not Available!");
                    $('#myModal1').modal("show");
                    Highcharts.chart('container_5', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: ''
                        },
                        yAxis: {
                            enabled: true,
                            title: {
                                text: 'Days'
                            }
                        },
                        xAxis: {
                            categories: 0
                        },
                        plotOptions: {
                            column: {
                                dataLabels: {
                                    enabled: true
                                }
                            }
                        },
                        series: [{
                            name: 'Mandays',
                            data: 0,
                        }, {
                            name: 'Days',
                            data: 0,
                        }]
                    });
                } else {
                    for (var i = 0; i < data.length; i++) {
                        var obj = data[i];
                        lokasi[i] = obj.Lokasi;
                        console.log(obj);

                        penumpang[i] = parseInt(obj.jumlah_penumpang);
                        tercatat[i] = parseInt(obj.total_tercatat);
                    }
                    Highcharts.chart('container_5', {
                        chart: {
                            zoomType: 'xy'
                        },
                        title: {
                            text: 'Data trip angkot dengan jumlah penumpang berdasarkan titik survey'
                        },
                        subtitle: {
                            text: ''
                        },
                        xAxis: [{
                            categories: lokasi,
                            crosshair: true
                        }],
                        yAxis: [{ // Primary yAxis
                            labels: {
                                format: '{value}',
                                style: {
                                    color: Highcharts.getOptions().colors[1]
                                }
                            },
                            title: {
                                text: 'Tercatat',
                                style: {
                                    color: Highcharts.getOptions().colors[1]
                                }
                            }
                        }, { // Secondary yAxis
                            title: {
                                text: 'Jumlah Penumpang',
                                style: {
                                    color: Highcharts.getOptions().colors[0]
                                }
                            },
                            labels: {
                                format: '{value}',
                                style: {
                                    color: Highcharts.getOptions().colors[0]
                                }
                            },
                            opposite: true
                        }],
                        tooltip: {
                            shared: true
                        },
                        legend: {
                            layout: 'vertical',
                            align: 'left',
                            x: 120,
                            verticalAlign: 'top',
                            y: 100,
                            floating: true,
                            backgroundColor: Highcharts.defaultOptions.legend
                                .backgroundColor || // theme
                                'rgba(255,255,255,0.25)'
                        },
                        series: [{
                            name: 'Penumpang',
                            type: 'column',
                            yAxis: 1,
                            data: penumpang,
                            tooltip: {
                                valueSuffix: ''
                            }

                        }, {
                            name: 'Tercatat',
                            type: 'spline',
                            data: tercatat,
                            tooltip: {}
                        }]
                    });
                }
            },
            complete: function () {
                $('.ajax-loader').css("visibility", "hidden");
            }
        });
        $.ajax({
            url: "{{url('/data/graf_ujikir_angkot')}}",
            type: 'POST',
            dataType: 'json',
            beforeSend: function () {
                $('.ajax-loader').css("visibility", "visible");
            },
            success: function (data) {
                var kd_trayek = [];
                var total = [];
                if (data == "") {
                    $("#error1").html("Project Worker is Not Available!");
                    $('#myModal1').modal("show");
                    Highcharts.chart('container3', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: ''
                        },
                        yAxis: {
                            enabled: true,
                            title: {
                                text: 'Days'
                            }
                        },
                        xAxis: {
                            categories: 0
                        },
                        plotOptions: {
                            column: {
                                dataLabels: {
                                    enabled: true
                                }
                            }
                        },
                        series: [{
                            name: 'Mandays',
                            data: 0,
                        }, {
                            name: 'Days',
                            data: 0,
                        }]
                    });
                } else {
                    for (var i = 0; i < data.length; i++) {
                        var obj = data[i];
                        console.log(obj);
                        kd_trayek[i] = obj.kode_trayek;
                        total[i] = parseInt(obj.total);
                    }
                    Highcharts.chart('container3', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Data Angkot Uji Kir Per Jurusan'
                        },
                        yAxis: {
                            enabled: true,
                            title: {
                                text: ''
                            }
                        },
                        xAxis: {
                            categories: kd_trayek
                        },
                        plotOptions: {
                            column: {
                                dataLabels: {
                                    enabled: true
                                }
                            }
                        },
                        series: [{
                            name: 'Total',
                            data: total,
                        }]
                    });
                }
            },
            complete: function () {
                $('.ajax-loader').css("visibility", "hidden");
            }
        });

        $.ajax({
            url: "{{url('/data/best_angkot')}}",
            type: 'POST',
            dataType: 'json',
            beforeSend: function () {
                $('.ajax-loader').css("visibility", "visible");
            },
            success: function (data) {
                var kd_trayek = [];
                var total = [];
                var plat_no = [];
                if (data == "") {
                    $("#error1").html("Project Worker is Not Available!");
                    $('#myModal1').modal("show");
                    Highcharts.chart('container_6', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: ''
                        },
                        yAxis: {
                            enabled: true,
                            title: {
                                text: 'Days'
                            }
                        },
                        xAxis: {
                            categories: 0
                        },
                        plotOptions: {
                            column: {
                                dataLabels: {
                                    enabled: true
                                }
                            }
                        },
                        series: [{
                            name: 'Mandays',
                            data: 0,
                        }, {
                            name: 'Days',
                            data: 0,
                        }]
                    });
                } else {
                    for (var i = 0; i < data.length; i++) {
                        var obj = data[i];
                        console.log(obj);
                        kd_trayek[i] = obj.kode_trayek;
                        total[i] = parseInt(obj.total);
                        plat_no[i] = obj.plat_no;
                    }
                    Highcharts.chart('container_6', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Angkot Paling Aktif'
                        },
                        yAxis: {
                            enabled: true,
                            title: {
                                text: ''
                            }
                        },
                        xAxis: {
                            categories: plat_no
                        },
                        plotOptions: {
                            column: {
                                dataLabels: {
                                    enabled: true
                                }
                            }
                        },
                        series: [{
                            name: 'Total',
                            data: total,
                        }]
                    });
                }
            },
            complete: function () {
                $('.ajax-loader').css("visibility", "hidden");
            }
        });
        $.ajax({
            url: "{{url('/data/best_jurusan')}}",
            type: 'POST',
            dataType: 'json',
            beforeSend: function () {
                $('.ajax-loader').css("visibility", "visible");
            },
            success: function (data) {
                var kd_trayek = [];
                var total = [];
                if (data == "") {
                    $("#error1").html("Project Worker is Not Available!");
                    $('#myModal1').modal("show");
                    Highcharts.chart('container_7', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: ''
                        },
                        yAxis: {
                            enabled: true,
                            title: {
                                text: 'Days'
                            }
                        },
                        xAxis: {
                            categories: 0
                        },
                        plotOptions: {
                            column: {
                                dataLabels: {
                                    enabled: true
                                }
                            }
                        },
                        series: [{
                            name: 'Mandays',
                            data: 0,
                        }, {
                            name: 'Days',
                            data: 0,
                        }]
                    });
                } else {
                    for (var i = 0; i < data.length; i++) {
                        var obj = data[i];
                        console.log(obj);
                        kd_trayek[i] = obj.kd_trayek;
                        total[i] = parseInt(obj.total);
                    }
                    Highcharts.chart('container_7', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Jurusan Paling Aktif'
                        },
                        yAxis: {
                            enabled: true,
                            title: {
                                text: ''
                            }
                        },
                        xAxis: {
                            categories: kd_trayek
                        },
                        plotOptions: {
                            column: {
                                dataLabels: {
                                    enabled: true
                                }
                            }
                        },
                        series: [{
                            name: 'Total',
                            data: total,
                        }]
                    });
                }
            },
            complete: function () {
                $('.ajax-loader').css("visibility", "hidden");
            }
        });

        $.ajax({
            url: "{{url('/data/graf_pajak_angkot')}}",
            type: 'POST',
            dataType: 'json',
            beforeSend: function () {
                $('.ajax-loader').css("visibility", "visible");
            },
            success: function (data) {
                var kd_trayek = [];
                var total = [];
                if (data == "") {
                    $("#error1").html("Project Worker is Not Available!");
                    $('#myModal1').modal("show");
                    Highcharts.chart('container2', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: ''
                        },
                        yAxis: {
                            enabled: true,
                            title: {
                                text: 'Days'
                            }
                        },
                        xAxis: {
                            categories: 0
                        },
                        plotOptions: {
                            column: {
                                dataLabels: {
                                    enabled: true
                                }
                            }
                        },
                        series: [{
                            name: 'Mandays',
                            data: 0,
                        }, {
                            name: 'Days',
                            data: 0,
                        }]
                    });
                } else {
                    for (var i = 0; i < data.length; i++) {
                        var obj = data[i];
                        //  console.log(obj);
                        kd_trayek[i] = obj.kode_trayek;
                        total[i] = parseInt(obj.total);
                    }
                    Highcharts.chart('container2', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Data Angkot Pembayaran Pajak Per Jurusan'
                        },
                        yAxis: {
                            enabled: true,
                            title: {
                                text: ''
                            }
                        },
                        xAxis: {
                            categories: kd_trayek
                        },
                        plotOptions: {
                            column: {
                                dataLabels: {
                                    enabled: true
                                }
                            }
                        },
                        series: [{
                            name: 'Total',
                            data: total,
                        }]
                    });
                }
            },
            complete: function () {
                $('.ajax-loader').css("visibility", "hidden");
            }
        });

    });
</script>
@endpush