/*
Template Name: Skote - Admin & Dashboard Template
Author: Themesbrand
Website: https://themesbrand.com/
Contact: themesbrand@gmail.com
File: Datatables Js File
*/

$(document).ready(function() {
    $('#datatable').DataTable();
      var commonOptions = {
          lengthChange: false,
          buttons: ['copy', 'excel', 'pdf', 'colvis']
        };

    var specificOptions = {
            order: [[0, 'desc']],
        };
    if ($('.order-table').length) {
        specificOptions = {
            order: [[8, 'desc']],
        };
    }else if($('.payment-table').length){
         specificOptions = {
            order: [[2, 'desc']],
        };
    }
    //Buttons examples
    var table = $('#datatable-buttons').DataTable($.extend({}, commonOptions, specificOptions));

    table.buttons().container()
        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');

    $(".dataTables_length select").addClass('form-select form-select-sm');
});