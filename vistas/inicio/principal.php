<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Indicadores Clave</title>
    <link rel="stylesheet" href="../assets/css/SideBarStyle.css">
    <link rel="stylesheet" href="../assets/css/indexTrabajo.css">
    
    <style>
        body {
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 70%;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .dashboard {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .metric {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        .metric h3 {
            font-size: 24px;
            margin: 0 0 10px;
        }

        .metric p {
            font-size: 40px;
            margin: 0;
            color: #2c3e50;
        }

        .month {
            font-size: 18px;
            color: #7f8c8d;
            margin-top: 5px;
        }

        .icon {
            font-size: 40px;
            margin-bottom: 10px;
            color: #16a085;
        }

        .chart-container {
            margin-top: 40px;
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%; /* Usa todo el ancho disponible */
            height: auto; /* Ajusta la altura automáticamente */
        }

        #myChart {
            width: 100%;
            height: 400px; /* Altura inicial */
            max-width: 100%; /* No exceder el ancho del contenedor */
        }
    </style>
</head>
<body>

<div class="container">
    <div class="dashboard">
        <div class="metric">
            <div class="icon">🌾</div>
            <h3>Total de Hectáreas Trabajadas</h3>
            <p><?php echo $totalHectareas; ?></p>
            <div class="month">Mes: <?php echo date('F Y'); ?></div>
        </div>
        <div class="metric">
            <div class="icon">📝</div>
            <h3>Cantidad de Trabajos Realizados</h3>
            <p><?php echo $totalTrabajos; ?></p>
            <div class="month">Mes: <?php echo date('F Y'); ?></div>
        </div>
        <div class="metric">
            <div class="icon">👤</div>
            <h3>Cliente Más Activo</h3>
            <p><?php echo $ClienteMasActivo; ?></p>
            <div class="month">Mes: <?php echo date('F Y'); ?></div>
        </div>
    </div>

    <div class="chart-container">
        <canvas id="myChart"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Crear gráfico
  const ctx = document.getElementById('myChart').getContext('2d');

  const myChart = new Chart(ctx, {
      type: 'line',
      data: {
          datasets: [{
              label: 'Hectáreas Trabajadas por Mes',
              data: <?php echo json_encode($Hectareasmensuales); ?>,
              borderColor: 'rgba(75, 192, 192, 1)',
              backgroundColor: 'rgba(75, 192, 192, 0.2)',
              borderWidth: 2,
              fill: true
          }]
      },
      options: {
          responsive: true,
          maintainAspectRatio: false, // Permitir ajuste flexible
          scales: {
              y: {
                  beginAtZero: true,
                  title: {
                      display: true,
                      text: 'Hectáreas'
                  }
              },
              x: {
                  title: {
                      display: true,
                      text: 'Meses'
                  }
              }
          },
          plugins: {
              legend: {
                  display: true,
                  position: 'top'
              },
              tooltip: {
                  enabled: true
              }
          }
      }
  });

  // Redimensionar al cambiar el tamaño de la ventana
  window.addEventListener('resize', () => {
      myChart.resize(); // Ajustar gráfico dinámicamente
  });
</script>

    <!-- Incluir Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
