$(document).ready(function() {
    var t = $('#dataTable').DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]]
    } );
  
    // Trigger draw.dt event once the document is loaded
    triggerDrawEvent();
  
    // Define the event handler for draw.dt event
    t.on('draw.dt', function () {
      triggerDrawEvent();
    });
  
    // Function to handle draw.dt event
    function triggerDrawEvent() {
      var PageInfo = $('#dataTable').DataTable().page.info();
      t.column(0, { page: 'current' }).nodes().each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
    }
  });
  