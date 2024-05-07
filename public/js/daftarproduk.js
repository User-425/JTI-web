$(document).ready(function() {
  $('#deleteModal').on('show.bs.modal', function(e) {
      var id = $(e.relatedTarget).data('id');
      $('#deleteForm').attr('action', '/pegawai/produk/' + id);
  });
});