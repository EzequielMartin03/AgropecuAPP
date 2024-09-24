<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reporte de Trabajos</title>
  <style>
    /* Estilos generales */
    .text-main {
      color: #000; /* Cambiado a negro */
    }

    .text-right {
      text-align: right;
    }

    .text-left {
      text-align: left;
    }

    .font-bold {
      font-weight: bold;
    }

    .mt-4 {
      margin-top: 1rem;
    }

    .mb-4 {
      margin-bottom: 1rem;
    }

    .border-b {
      border-bottom: 1px solid #e5e7eb;
    }

    .px-10 {
      padding-left: 2.5rem;
      padding-right: 2.5rem;
    }

    .py-3 {
      padding-top: 0.75rem;
      padding-bottom: 0.75rem;
    }

    .table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 1rem;
    }

    .table th,
    .table td {
      border: 1px solid #ccc;
      padding: 8px;
      text-align: center;
    }

    .table th {
      background-color: #f3f4f6;
      font-weight: bold;
      color: #374151;
    }

    .table tr:nth-child(even) {
      background-color: #f9fafb;
    }

    .table tr:hover {
      background-color: #f1f5f9;
    }

    /* Flexbox para alinear el cliente y la fecha en una fila */
    .flex-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .flex-item {
      padding: 5px;
    }

    .text-main {
      font-weight: bold;
      color: #000; /* Cambiado a negro */
    }

    /* Ajustes para mover el logo más abajo */
    .logo-container {
      margin-top: 2rem; /* Incrementa este valor para mover el logo más abajo */
    }

    /* Ajustes para mover el contenido más arriba */
    .content-container {
      margin-top: -1rem; /* Disminuye este valor para mover el contenido más arriba */
    }
  </style>
</head>

<body>
  <div>
    <!-- Logo -->
    <div class="py-4 logo-container">
      <div class="px-14 py-6">
        <table class="w-full border-collapse border-spacing-0">
          <tbody>
            <tr>
              <td class="w-full align-top">
                <div>
                  <?php
                  $path = 'assets/img/logo_pulveriagro.png';
                  $type = pathinfo($path, PATHINFO_EXTENSION);
                  $data = file_get_contents($path);
                  $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                  ?>
                  <img src="<?php echo $base64?>" style="height: 4rem;" />
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Flexbox para Fecha y Cliente en una fila -->
    <div class="px-14 mb-4 content-container">
      <div class="flex-row">
        <div class="flex-item text-right">
          <p class="font-bold text-main">Cliente: <?= htmlspecialchars($_SESSION['NombreCliente']) ?></p>
          <p class="font-bold text-main">Detalle de cuenta al <?= date('d/m/y') ?></p>
        </div>
      </div>
    </div>

    <!-- Tabla de resultados con estilos mejorados -->
    <div class="px-14">
      <table class="table">
        <thead>
          <tr>
            <th>Descripción</th>
            <th>Cantidad Hectáreas</th>
            <th>Fecha Trabajo</th>
          </tr>
        </thead>
        <tbody>
          <?php if (isset($resultados) && !empty($resultados)): ?>
            <?php
              $total_hectareas = 0;
              foreach ($resultados as $resultado) {
                $total_hectareas += $resultado->CantidadHectareasTrabajadas;
                ?>
              <tr>
                <td><?= htmlspecialchars($resultado->Descripcion) ?></td>
                <td><?= htmlspecialchars($resultado->CantidadHectareasTrabajadas) ?></td>
                <td><?= htmlspecialchars($resultado->FechaTrabajo) ?></td>
              </tr>
            <?php } ?>
          <?php else: ?>
            <tr>
              <td colspan="3" class="text-center text-neutral-600">No hay resultados disponibles.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Total Hectáreas Trabajadas -->
  <div class="w-full mt-4 border border-gray-300 bg-gray-100">
    <div class="p-4 font-bold text-right">Total Hectáreas Trabajadas:</div>
    <div class="p-4 font-bold text-right"><?php echo number_format($total_hectareas, 2); ?></div>
  </div>
</body>

</html>
