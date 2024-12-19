import './bootstrap'; // Ensure this is correctly set up
import $ from 'jquery'; // Import jQuery
import 'datatables.net'; // Import DataTables
import 'datatables.net-dt/css/datatables.dataTables.css'; // Import DataTables CSS
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();



document.addEventListener('DOMContentLoaded', function () {
    $('#products-table').DataTable({
        responsive: true,
        autoWidth: false,
    });
});

