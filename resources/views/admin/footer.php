<footer class="container-fluid bg-light py-3">
    <div class="row">
      <div class="col-md-12">
        <p class="text-center">© 2023 by Kelompok 3</p>
      </div>
    </div>
  </footer>
</div>
</div>

<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script>
var today = new Date();
var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
var date = today.toLocaleDateString('en-US', options);
document.getElementById('todayDate').innerHTML = date;
</script>

<!-- jQuery UI -->
<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


<!-- Datatables -->
<script src="../assets/js/plugin/datatables/datatables.min.js"></script>



<!-- Sweet Alert -->
<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Atlantis JS -->
<script src="../assets/js/atlantis.min.js"></script>

<!-- Atlantis DEMO methods, don't include it in your project! -->
<script src="../assets/js/setting-demo.js"></script>

<script>
$(document).ready(function() {
  $('#basic-datatables').DataTable({});

  $('#multi-filter-select').DataTable({
    "pageLength": 5,
    initComplete: function() {
      this.api().columns().every(function() {
        var column = this;
        var select = $('<select class="form-control"><option value=""></option></select>')
          .appendTo($(column.footer()).empty())
          .on('change', function() {
            var val = $.fn.dataTable.util.escapeRegex(
              $(this).val()
            );

            column
              .search(val ? '^' + val + '$' : '', true, false)
              .draw();
          });

        column.data().unique().sort().each(function(d, j) {
          select.append('<option value="' + d + '">' + d + '</option>')
        });
      });
    }
  });

  // Add Row
  $('#add-row').DataTable({
    "pageLength": 5,
  });

  var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

  $('#addRowButton').click(function() {
    $('#add-row').dataTable().fnAddData([
      $("#addName").val(),
      $("#addPosition").val(),
      $("#addOffice").val(),
      action
    ]);
    $('#addRowModal').modal('hide');

  });
});
</script>
</body>
 
</html>