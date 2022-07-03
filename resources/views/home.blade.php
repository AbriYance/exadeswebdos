@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Estadísticas</h1>
@stop

@section('content')	
    <!-- Main content -->
    <section class="content">
	
	
	<!-- TARJETAS -->
	<div class="row w-100">
                    <div class="col-md-3">
                        {{-- Updatable --}}
                        <x-adminlte-small-box title="{{ $numSocios }}" text="Socios" icon="fas fa-users text-dark"
                        theme="danger" url="socios" url-text="Ver Socios" id="sbUpdatable"/>
                    </div>

                    <div class="col-md-3">
                        {{-- Updatable --}}
                        <x-adminlte-small-box title="{{ $numAlquileres }}" text="Alquileres" icon="fas fa-shopping-cart text-dark"
                        theme="info" url="alquilers" url-text="Ver Alquileres" id="sbUpdatable"/>
                    </div>

                    <div class="col-md-3">
                        {{-- Updatable --}}
                        <x-adminlte-small-box title="{{ $numPeliculas }}" text="Peliculas" icon="fas fa-video text-dark"
                        theme="success" url="peliculas" url-text="Ver Peliculas" id="sbUpdatable"/>
                    </div>

                    <div class="col-md-3">
                    {{-- Updatable --}}
                        <x-adminlte-small-box title="{{ $numFormatos }}" text="Formatos" icon="fas fa-film text-dark"
                        theme="purple" url="formatos" url-text="Ver Formatos" id="sbUpdatable"/>
                    </div>
            </div>

	  <!-- GRÁFICOS -->

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-warning">
                <h3 class="widget-user-username">{{ $datap['nombre'] }}</h3>
                <h5 class="widget-user-desc">Pelicula Más Alquilada</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="/vendor/adminlte/dist/img/oscar.jpg" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">{{ $datap['num_alq'] }}</h5>
                      <span class="description-text"># ALQUILADAS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">{{ $datap['generonombre'] }}</h5>
                      <span class="description-text">GENERO</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">{{ $datap['formatonombre'] }}</h5>
                      <span class="description-text">FORMATO</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->

			      <!-- PIE CHART -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title"># Alquileres de Peliculas Por Formato</h3>

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
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
            <!-- AREA CHART -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"># Alquileres de Películas por Genero</h3>

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
                  <canvas id="myChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>


          <!-- /.col (LEFT) -->
		      <div class="col-md-6">
            <!-- /.card -->
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Ganancias de Alquileres</h3>
                  <a href="javascript:void(0);">Ver reporte</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg"> $ {{ $sumaIngresos }}</span>
                    <!-- <span>Historial De Alquileres</span> -->
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 53.1%
                    </span>
                    <span class="text-muted">Desde el último mes</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="sales-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-pink"></i> Año anterior
                  </span>

                  <span>
                    <i class="fas fa-square text-success"></i> Este año
                  </span>
                </div>
              </div>
            </div>
            <!-- /.card -->

            <!-- BAR CHART -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title"># Socios Registrados Por Mes</h3>

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
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- Poropo -->
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Registro de Socios</h3>
                  <a href="javascript:void(0);">Ver Reporte</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">{{ $numSocios }}</span>
                    <!-- <span>Visitors Over Time</span> -->
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 12.5%
                    </span>
                    <span class="text-muted">Respecto al último mes</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="visitors-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> Año anterior
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Este año
                  </span>
                </div>
              </div>
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col (RIGHT) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
	
  <!-- /.content-wrapper -->
  <footer class="">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

	<script>
	$(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

	//  PRIMER GRÁFICO
	const cData = JSON.parse(`<?php echo $data; ?>`);
    console.log(cData);
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: cData.label,
        datasets: [{
            label: '# Películas por Generos',
            data: cData.data,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
        },
        options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
    })

	// VARIABLES PARA EL RESTO DE GRÁFICOS

	// SOCIOS POR MES
	var sociosData = {
      labels  : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
      datasets: [
        {
          label               : 'Año Anterior',
          backgroundColor     : '#0FB2F0',
          borderColor         : '#0FB2F0',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : '#0FB2F0',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#0FB2F0',
          data                : [{{$eneroSocio2021}},{{$febreroSocio2021}},{{$marzoSocio2021}},{{$abrilSocio2021}},{{$mayoSocio2021}},{{$junioSocio2021}},{{$julioSocio2021}},{{$agostoSocio2021}},{{$septiembreSocio2021}},{{$octubreSocio2021}},{{$noviembreSocio2021}},{{$diciembreSocio2021}}]
        },
        {
          label               : 'Año Actual',
          backgroundColor     : '#E9F00F',
          borderColor         : '#E9F00F',
          pointRadius         : false,
          pointColor          : '#E9F00F',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#E9F00F',
          data                : [{{$eneroSocio2022}},{{$febreroSocio2022}},{{$marzoSocio2022}},{{$abrilSocio2022}},{{$mayoSocio2022}},{{$junioSocio2022}},{{$julioSocio2022}},{{$agostoSocio2022}},{{$septiembreSocio2022}},{{$octubreSocio2022}},{{$noviembreSocio2022}},{{$diciembreSocio2022}}]
        },
      ]
    }

	// ALQUILERES POR MES
	var alquileresData = {
      labels  : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
      datasets: [
        {
          label               : 'Año Anterior',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [{{$eneroAlquiler2021}},{{$febreroAlquiler2021}},{{$marzoAlquiler2021}},{{$abrilAlquiler2021}},{{$mayoAlquiler2021}},{{$junioAlquiler2021}},{{$julioAlquiler2021}},{{$agostoAlquiler2021}},{{$septiembreAlquiler2021}},{{$octubreAlquiler2021}},{{$noviembreAlquiler2021}},{{$diciembreAlquiler2021}}]
        },
        {
          label               : 'Año Actual',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [{{$eneroAlquiler2022}},{{$febreroAlquiler2022}},{{$marzoAlquiler2022}},{{$abrilAlquiler2022}},{{$mayoAlquiler2022}},{{$junioAlquiler2022}},{{$julioAlquiler2022}},{{$agostoAlquiler2022}},{{$septiembreAlquiler2022}},{{$octubreAlquiler2022}},{{$noviembreAlquiler2022}},{{$diciembreAlquiler2022}}]
        },
      ]
    }


    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
  	// FORMATOS POR GENEROS
	  var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData       = {
      labels: cData.labelF,
      // labels: $dataPeliculas['nomForAlqPeli'],
      datasets: [
        {
          data: cData.dataF,
          // data: $dataPeliculas['forAlqPeli'],
          backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
          borderWidth: 1,
          hoverOffset: 4
        }
      ]
    }
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, sociosData)
    var temp0 = sociosData.datasets[0]
    var temp1 = sociosData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = $.extend(true, {}, alquileresData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
		})
	})


  //

  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode = 'index'
  var intersect = true

  var $salesChart = $('#sales-chart')
  // eslint-disable-next-line no-unused-vars
  var salesChart = new Chart($salesChart, {
    type: 'bar',
    data: {
      labels: ['ENE', 'FEB', 'MAR', 'ABR', 'MAY', 'JUN', 'JUL','AGO','SEP','OCT','NOV','DIC'],
      datasets: [
        {
          backgroundColor: '#E13289',
          borderColor: '#E13289',
          data: [{{$eneroIngresoA2021}},{{$febreroIngresoA2021}},{{$marzoIngresoA2021}},{{$abrilIngresoA2021}},{{$mayoIngresoA2021}},{{$junioIngresoA2021}},{{$julioIngresoA2021}},{{$agostoIngresoA2021}},{{$septiembreIngresoA2021}},{{$octubreIngresoA2021}},{{$noviembreIngresoA2021}},{{$diciembreIngresoA2021}}]
        },
        {
          backgroundColor: '#35B947',
          borderColor: '#35B947',
          data: [{{$eneroIngresoA2022}},{{$febreroIngresoA2022}},{{$marzoIngresoA2022}},{{$abrilIngresoA2022}},{{$mayoIngresoA2022}},{{$junioIngresoA2022}},{{$julioIngresoA2022}},{{$agostoIngresoA2022}},{{$septiembreIngresoA2022}},{{$octubreIngresoA2022}},{{$noviembreIngresoA2022}},{{$diciembreIngresoA2022}}]
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        mode: mode,
        intersect: intersect
      },
      hover: {
        mode: mode,
        intersect: intersect
      },
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          // display: false,
          gridLines: {
            display: true,
            lineWidth: '4px',
            color: 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks: $.extend({
            beginAtZero: true,

            // Include a dollar sign in the ticks
            callback: function (value) {
              if (value >= 1000) {
                value /= 1000
                value += 'k'
              }

              return '$' + value
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          },
          ticks: ticksStyle
        }]
      }
    }
  })


  var $visitorsChart = $('#visitors-chart')
  // eslint-disable-next-line no-unused-vars
  var visitorsChart = new Chart($visitorsChart, {
    data: {
      labels: ['ENE', 'FEB', 'MAR', 'ABR', 'MAY', 'JUN', 'JUL','AGO','SEP','OCT','NOV','DIC'],
      datasets: [{
        type: 'line',
        data: [{{$eneroSocio2021}},{{$febreroSocio2021}},{{$marzoSocio2021}},{{$abrilSocio2021}},{{$mayoSocio2021}},{{$junioSocio2021}},{{$julioSocio2021}},{{$agostoSocio2021}},{{$septiembreSocio2021}},{{$octubreSocio2021}},{{$noviembreSocio2021}},{{$diciembreSocio2021}}],
        backgroundColor: 'transparent',
        borderColor: '#007bff',
        pointBorderColor: '#007bff',
        pointBackgroundColor: '#007bff',
        fill: false
        // pointHoverBackgroundColor: '#007bff',
        // pointHoverBorderColor    : '#007bff'
      },
      {
        type: 'line',
        data: [{{$eneroSocio2022}},{{$febreroSocio2022}},{{$marzoSocio2022}},{{$abrilSocio2022}},{{$mayoSocio2022}},{{$junioSocio2022}},{{$julioSocio2022}},{{$agostoSocio2022}},{{$septiembreSocio2022}},{{$octubreSocio2022}},{{$noviembreSocio2022}},{{$diciembreSocio2022}}],
        backgroundColor: 'tansparent',
        borderColor: '#ced4da',
        pointBorderColor: '#ced4da',
        pointBackgroundColor: '#ced4da',
        fill: false
        // pointHoverBackgroundColor: '#ced4da',
        // pointHoverBorderColor    : '#ced4da'
      }]
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        mode: mode,
        intersect: intersect
      },
      hover: {
        mode: mode,
        intersect: intersect
      },
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          // display: false,
          gridLines: {
            display: true,
            lineWidth: '4px',
            color: 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks: $.extend({
            beginAtZero: true
          }, ticksStyle)
        }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          },
          ticks: ticksStyle
        }]
      }
    }
  })
	</script>

    <script> console.log('Hi!'); </script>
@stop