
$(document).ready(function() {
    
var id = function (id){
    return document.getElementById(id);
};
var table = id('example');
var totRowIndex = table.getElementsByTagName('tr').length;
 
 /* EXAMPLE 2
     *********************** */
    var tf2Config = {
        base_path: 'tablefilter/',
        alternate_rows: true,
        rows_counter: true,
        btn_reset: true,
        loader: true,
        status_bar: true,
        locale: 'en-US',
        col_types: [
            'string', 'number', 'string',
            'number', 'string', 'date'
        ],
        on_filters_loaded: function(tf){
            tf.setFilterValue(5, '');
            tf.filter();
        }
    };

    var tf2 = new TableFilter('example', tf2Config);
    tf2.init();

} );


    // var filtersConfig = {
    //     base_path: 'tablefilter/',
    //     col_0: 'checklist',
    //     col_1: 'select',
    //     col_2: 'multiple',
    //     col_8: 'none',
    //     col_widths: [
    //         '180px', '120px', '120px',
    //         '100px', '100px', '100px',
    //         '100px', '100px', '100px'
    //     ]
    // };
    // var tf = new TableFilter('demo', filtersConfig);
    // tf.init();