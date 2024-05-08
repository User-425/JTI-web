$(document).ready(function () {
  var t = $("#dataTable").DataTable({
    columnDefs: [
      {
        searchable: false,
        orderable: false,
        targets: 0,
      },
    ],
    order: [[1, "asc"]],
  });

  var t = $("#produkTable").DataTable({
    columnDefs: [
      {
        searchable: false,
        orderable: false,
        targets: 0,
      },
    ],
    order: [[1, "asc"]],
  });

  t.on("draw.dt", function () {
    var PageInfo = $("#dataTable").DataTable().page.info();
    t.column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });

  t.on("draw.dt", function () {
    var PageInfo = $("#produkTable").DataTable().page.info();
    t.column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });


  $(".jumlah").on("input", function () {
    var harga = parseFloat($(this).data("harga"));
    var jumlah = parseInt($(this).val());
    var total = harga * jumlah;
    $(this).closest("tr").find(".total").text(total);
  });
});
