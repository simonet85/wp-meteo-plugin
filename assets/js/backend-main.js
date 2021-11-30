( function( $ ){

//Init datatable
$('#table_id').DataTable({
  "ajax" : { 
    "url": 'https://jsonplaceholder.typicode.com/todos',
    "dataSrc": ""
  },
  columns : [
   { "data" : "userId"},
   { "data" : "id"},
   { "data" : "title"},
   { "data" : "completed"}
  ]
});

let table = $('#table_id').DataTable();
    $('#table_id tbody').on('click', 'tr', function () {
        //https://datatables.net/reference/api/row().data()
        // console.log(table.row(this).data()); Get the data for the selected row
        //Returns:array, object
        
        $(".modal-body div span").text("");
        $(".userId span").text(table.row(this).data().userId);
        $(".id span").text(table.row(this).data().id);
        $(".title span").text(table.row(this).data().title);
        $(".completed span").text(table.row(this).data().completed);
        $("#myModal").modal("show");
      });
    
} )( jQuery );

