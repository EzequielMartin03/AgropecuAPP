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
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 70%; /* Ajuste del ancho para que se acomode con la sidebar */
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .dashboard {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* Tres columnas */
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
        }

        #myChart {
            width: 100% !important; /* Asegúrate de que el gráfico use todo el ancho disponible */
            height: 400px; /* Ajusta la altura según tus necesidades */
        }
    </style>
</head>
<body>

<div class="container">
   
    <div class="dashboard">
        <!-- Indicador 1: Total de Hectáreas Trabajadas -->
        <div class="metric">
            <div class="icon">🌾</div>
            <h3>Total de Hectáreas Trabajadas</h3>
            <p><?php echo $totalHectareas; ?></p> <!-- Valor dinámico -->
            <div class="month">Mes: <?php echo date('F Y'); ?></div> <!-- Mes actual -->
        </div>

        <!-- Indicador 2: Cantidad de Trabajos Realizados -->
        <div class="metric">
            <div class="icon">📝</div>
            <h3>Cantidad de Trabajos Realizados</h3>
            <p><?php echo $totalTrabajos; ?></p> <!-- Valor dinámico -->
            <div class="month">Mes: <?php echo date('F Y'); ?></div> <!-- Mes actual -->
        </div>

        <!-- Indicador 3: Cliente Más Activo -->
        <div class="metric">
            <div class="icon">👤</div>
            <h3>Cliente Más Activo</h3>
            <p><?php echo $ClienteMasActivo; ?></p> <!-- Valor dinámico -->
            <div class="month">Mes: <?php echo date('F Y'); ?></div> <!-- Mes actual -->
        </div>
    </div>

    <!-- Gráfico de Tendencias -->
    <div class="chart-container">
        <canvas id="myChart"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap CSS -->

<script>
  const ctx = document.getElementById('myChart').getContext('2d');

  const myChart = new Chart(ctx, {
      type: 'line', // Tipo de gráfico (línea)
      data: {
         
          datasets: [{
              label: 'Hectáreas Trabajadas por Mes',
              data: <?php echo json_encode($Hectareasmensuales); ?>, // Datos de ingresos
              borderColor: 'rgba(75, 192, 192, 1)',
              backgroundColor: 'rgba(75, 192, 192, 0.2)',
              borderWidth: 2,
              fill: true // Rellenar el área debajo de la línea
          }]
      },
      options: {
          responsive: true,
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
                      text: 'Meses' // Título del eje X
                  }
              }
          },
          plugins: {
              legend: {
                  display: true,
                  position: 'top' // Posición de la leyenda
              },
              tooltip: {
                  enabled: true // Habilitar tooltips
              }
          }
      }
  });
</script>

</body>
</html>
