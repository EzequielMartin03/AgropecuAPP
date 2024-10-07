$(document).ready(function() {
  // Inicializar Select2 para todos los selects
  $('#ClienteSelect,#AguateroSelect,#FumigadorSelect' ).select2({
      placeholder: 'Selecciona una opción',
      allowClear: true
  });

});




document.addEventListener('DOMContentLoaded', function() {
  const urlParams = new URLSearchParams(window.location.search);
  const activeTab = urlParams.get('tab') || 'todos'; // Por defecto a 'Cliente' si no hay parámetro


  const tabButton = document.querySelector(`#${activeTab}-tab`);
  const tabContent = document.querySelector(`#${activeTab}`);
  if (tabButton && tabContent) {
    new bootstrap.Tab(tabButton).show();
  }

  // Configura el evento click para actualizar el parámetro en la URL
  document.querySelectorAll('#filterTabs .nav-link').forEach(button => {
    button.addEventListener('click', function() {
      const tabId = this.id.replace('-tab', '');
      const url = new URL(window.location.href);
      url.searchParams.set('tab', tabId);
      window.history.pushState({}, '', url);
    });
  });
});


$(document).ready(function() {
  $('#mySelect, #mySelect2').select2({
    placeholder: 'Selecciona una o más opciones',
    allowClear: true,
    width: 'resolve'
  });
});




