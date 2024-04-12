<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Graficas</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!-- Fuentes e iconos -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Archivos CSS -->
  <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS de demostración, no lo incluyas en tu proyecto -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="dark-edition">
  <div class="wrapper">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Grafica
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
              <i class="material-icons">content_paste</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="./dashboard.html">
              <i class="material-icons">dashboard</i>
              <p>Graficas</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('profile.index') }}">
              <i class="material-icons">person</i>
              <p>Mi Perfil</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('about') }}">
              <i class="material-icons">library_books</i>
              <p>Acerca</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Barra de navegación -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top" id="navigation-example">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand">Medidor de Consumo de Energía - Grafica</a>
          </div>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">Cerrar Sesión</p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- Fin de la barra de navegación -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <!-- Gráfico de Consumo de Energía de Potencia por Día -->
              <div class="card">
                <div class="card-header card-header-primary">
                  <p class="card-category">Consumo de Energía de Potencia por Día</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <canvas id="powerConsumptionDay"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <!-- Gráfico de Consumo de Energía de Potencia por Semana -->
              <div class="card">
                <div class="card-header card-header-primary">
                  <p class="card-category">Consumo de Energía de Potencia por Semana</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <canvas id="powerConsumptionWeek"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <!-- Gráfico de Consumo de Energía de Corriente por Día -->
              <div class="card">
                <div class="card-header card-header-primary">
                  <p class="card-category">Consumo de Energía de Corriente por Día</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <canvas id="currentConsumptionDay"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <!-- Gráfico de Consumo de Energía de Corriente por Semana -->
              <div class="card">
                <div class="card-header card-header-primary">
                  <p class="card-category">Consumo de Energía de Corriente por Semana</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <canvas id="currentConsumptionWeek"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Archivos JS principales -->
      <script src="../assets/js/core/jquery.min.js"></script>
      <script src="../assets/js/core/popper.min.js"></script>
      <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
      <script src="https://unpkg.com/default-passive-events"></script>
      <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
      <!-- Coloca esta etiqueta en la cabecera o justo antes de cerrar el cuerpo -->
      <script async defer src="https://buttons.github.io/buttons.js"></script>
      <!-- Plugin de Google Maps -->
      <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
      <!-- Chart.js -->
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <!-- Controlador principal para Material Dashboard: efectos de paralaje, scripts para las páginas de ejemplo, etc. -->
      <script src="../assets/js/material-dashboard.js?v=2.1.0"></script>
      <!-- Métodos de DEMO de Material Dashboard, no lo incluyas en tu proyecto -->
      <script src="../assets/demo/demo.js"></script>
      <script>
        document.addEventListener('DOMContentLoaded', function () {
          // Datos para gráficos de potencia
          const etiquetasPower = {!! json_encode($powerLabels) !!};
          const datosPowerDay = {!! json_encode($powerConsumptionDayData) !!};
          const datosPowerWeek = {!! json_encode($powerConsumptionWeekData) !!};

          // Datos para gráficos de corriente
          const etiquetasCurrent = {!! json_encode($currentLabels) !!};
          const datosCurrentDay = {!! json_encode($currentConsumptionDayData) !!};
          const datosCurrentWeek = {!! json_encode($currentConsumptionWeekData) !!};

          // Gráfico de Consumo de Energía de Potencia por Día
          const ctxPowerDay = document.getElementById('powerConsumptionDay').getContext('2d');
          new Chart(ctxPowerDay, {
            type: 'bar',
            data: {
              labels: etiquetasPower,
              datasets: [{
                label: 'Consumo de Potencia por Día',
                data: datosPowerDay,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
              }]
            },
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            }
          });

          // Gráfico de Consumo de Energía de Potencia por Semana
          const ctxPowerWeek = document.getElementById('powerConsumptionWeek').getContext('2d');
          new Chart(ctxPowerWeek, {
            type: 'bar',
            data: {
              labels: etiquetasPower,
              datasets: [{
                label: 'Consumo de Potencia por Semana',
                data: datosPowerWeek,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
              }]
            },
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            }
          });

          // Gráfico de Consumo de Energía de Corriente por Día
          const ctxCurrentDay = document.getElementById('currentConsumptionDay').getContext('2d');
          new Chart(ctxCurrentDay, {
            type: 'bar',
            data: {
              labels: etiquetasCurrent,
              datasets: [{
                label: 'Consumo de Corriente por Día',
                data: datosCurrentDay,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
              }]
            },
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            }
          });

          // Gráfico de Consumo de Energía de Corriente por Semana
          const ctxCurrentWeek = document.getElementById('currentConsumptionWeek').getContext('2d');
          new Chart(ctxCurrentWeek, {
            type: 'bar',
            data: {
              labels: etiquetasCurrent,
              datasets: [{
                label: 'Consumo de Corriente por Semana',
                data: datosCurrentWeek,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
              }]
            },
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            }
          });
        });
      </script>
    </div>
  </div>
</body>

</html>
