var DataTable = require( 'datatables.net' );
require( 'datatables.net-responsive' );
 
let table = new DataTable('#myTable', {
    responsive: true
});

