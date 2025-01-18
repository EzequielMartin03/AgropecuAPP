
$(document).ready(function() {
  // Inicializa Select2 para los selectores de clientes, aguateros y fumigadores
  $('#ClienteSelect,#AguateroSelect,#FumigadorSelect').select2({
      placeholder: 'Selecciona una opción', 
      allowClear: true // Permite limpiar la selección
  });
});

$(document).ready(function() {
  // Inicializa Select2 para los selectores mySelect y mySelect2
  $('#mySelect, #mySelect2').select2({
    placeholder: 'Selecciona una o más opciones', // Muestra un texto de marcador de posición
    allowClear: true, // Permite limpiar la selección
    width: 'resolve' // Ajusta automáticamente el ancho del select
  });
});

document.addEventListener('DOMContentLoaded', function() {
  // Obtiene los parámetros de la URL actual
  const urlParams = new URLSearchParams(window.location.search);
  // Obtiene el valor del parámetro 'tab', o asigna 'Cliente' si no existe
  const activeTab = urlParams.get('tab') || 'Cliente'; 

  // Selecciona el botón y el contenido de la pestaña activa
  const tabButton = document.querySelector(`#${activeTab}-tab`);
  const tabContent = document.querySelector(`#${activeTab}`);
  // Si existen el botón y el contenido, muestra la pestaña activa
  if (tabButton && tabContent) {
    new bootstrap.Tab(tabButton).show();
  }

  // Configura el evento click para actualizar el parámetro en la URL cuando se cambie de pestaña
  document.querySelectorAll('#filterTabs .nav-link').forEach(button => {
    button.addEventListener('click', function() {
      // Obtiene el ID de la pestaña seleccionada y elimina el sufijo '-tab'
      const tabId = this.id.replace('-tab', '');
      // Crea un nuevo objeto URL a partir de la URL actual
      const url = new URL(window.location.href);
      // Actualiza el parámetro 'tab' en la URL con el nuevo ID
      url.searchParams.set('tab', tabId);
      // Cambia la URL en la barra de direcciones del navegador sin recargar la página
      window.history.pushState({}, '', url);
    });
  });
});


// Espera a que el DOM esté completamente cargado antes de ejecutar el siguiente código
$(document).ready(function() {
  // Inicializa DataTables en la tabla con el ID 'TrCliente'
  $('#TrCliente').DataTable({
    "paging": true,        // Habilita la paginación de la tabla
    "lengthMenu": [5, 10, 25, 50],  // Opciones de elementos por página
    "pageLength": 5,       // Número de filas por página por defecto
    "searching": true,     // Habilita la funcionalidad de búsqueda
    "ordering": true,      // Habilita la ordenación de las columnas
    "info": true,          // Muestra información sobre la tabla, como el número de entradas
    "language": {
      "sProcessing": "Procesando...",
      "sLengthMenu": "Mostrar _MENU_ registros",
      "sZeroRecords": "No se encontraron resultados",
      "sEmptyTable": "Ningún dato disponible en esta tabla",
      "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
      "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
      "sSearch": "Buscar:",
      "sUrl": "",
      "sInfoThousands": ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    }
  });
});

