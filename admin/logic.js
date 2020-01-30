$('.button-collapse').sideNav();

$('.collapsible').collapsible();

$('select').material_select();

$(document).ready( function () {
    $('#myTable').DataTable();
} );


$(document).ready(function() {
    $('#example').DataTable( {
        columnDefs: [
            {
                targets: [ 0, 1, 2 ],
                className: 'mdl-data-table__cell--non-numeric'
            }
        ]
    } );
} );




$('.dropdown-trigger').dropdown();

