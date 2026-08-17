import 'admin-lte/dist/js/adminlte.js';
import $ from 'jquery';
import DataTable from 'datatables.net-bs5';

window.$ = window.jQuery = $;

// Conectar DataTables con jQuery
DataTable.use($);