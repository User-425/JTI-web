function addItemToTable(item) {
  var index = $('#dataTable tbody tr').length + 1;
  var tempItem = dataList[item.id-1];
  var row = '<tr>' +
      '<td class="text-center">' + index + '</td>' +
      '<td>' + tempItem.id_produk + '</td>' +
      '<td>' + tempItem.nama + '</td>' +
      '<td>' +
      '<input class="jumlah" value="1" type="number" min="1" data-id="' + tempItem.id + '"  onchange="updateQuantity(this)" oninput="validateQuantity(this)">' +
      '</td>' +
      '<td>' + 
      '<input class="harga" value="1" type="number" min="1" data-id="' + tempItem.id + '" onchange="updatePrice(this)" oninput="validateQuantity(this) updateTotalPrice()">' +
      '</td>' +
      '<td style="width:20%">' +
      '<button type="button" class="btn btn-danger btn-icon-split btn-sm removeItem" data-id="' + tempItem.id + '">' +
      '<span class="icon text-white-50">' +
      '<i class="fas fa-trash"></i>' +
      '</span>' +
      '<span class="text">Hapus</span>' +
      '</button>' +
      '</td>' +
      '</tr>';
  var table = $('#dataTable').DataTable();
  table.row.add($(row)).draw();
  updateTotalPrice();
  updateIndexColumn(); // Update index column immediately
}

var itemsToAdd = []; // Array to store items to be added

// Event listener for adding item
$('.btn-add-item').on('click', function() {
  var productId = $(this).data('id');
  var quantity = 1; 
  var price = 1;

  var newItem = {
      id: productId,
      quantity: quantity,
      price:price,
  };

  var existingItemIndex = itemsToAdd.findIndex(item => item.id === productId);
  
  if (existingItemIndex !== -1) {
      // If item already exists, update its quantity
      itemsToAdd[existingItemIndex].quantity += quantity;
  } else {
      itemsToAdd.push(newItem);
      addItemToTable(newItem);
      console.log("Data Successfully Inserted");
      console.log(itemsToAdd);
  }
});

// Event listener for storing transaction
$("#storeTransaction").on("click", function () {
  var id_pemasok = $("#id_pemasok").val();
  var csrfToken = $('meta[name="csrf-token"]').attr('content');
  // Send itemsToAdd array to the controller using AJAX
  $.ajax({
    url: "/simpan_penyediaan",
    type: "POST",
    headers: {
      'X-CSRF-TOKEN': csrfToken
    },
    data: {
      id_pemasok: id_pemasok,
      items: itemsToAdd,
      id_pegawai: id_pegawai,
    },
    success: function (response) {
      alertify.success('Data Tersimpan!');
      console.log("Data Terkirim!");
      console.log(response);
    },
    error: function (xhr) {
      alertify.error('Data Gagal Tersimpan!');
      console.log("Data Gagal Terkirim!");
      console.error(xhr);
    },
  });
});
// });

// Event listener for removing item
$(document).on('click', '.removeItem', function() {
  var productId = $(this).data('id');
  var indexToRemove = itemsToAdd.findIndex(item => item.id === productId);
  if (indexToRemove !== -1) {
      itemsToAdd.splice(indexToRemove, 1); // Remove item from array
      var table = $('#dataTable').DataTable();
      table.row($(this).closest('tr')).remove().draw(); // Remove row from DataTable
      updateTotalPrice(); // Update total price after removing item
      updateIndexColumn();
  }
});

// Update Total
function updateTotalPrice() {
  let totalPrice = 0;
  itemsToAdd.forEach(item => {
    totalPrice += item.price;
  });
  const formattedPrice = totalPrice.toLocaleString();
  $('#totalPrice').text("Rp"+formattedPrice);
}


function updateQuantity(input) {
  var id = $(input).data('id');
  var quantity = parseInt($(input).val());
  var itemIndex = itemsToAdd.findIndex(i => i.id === id);
  if (itemIndex !== -1) {
      itemsToAdd[itemIndex].quantity = quantity;
  }
  updateTotalPrice();
}

function updatePrice(input) {
  var id = $(input).data('id');
  var price = parseInt($(input).val());
  var itemIndex = itemsToAdd.findIndex(i => i.id === id);
  if (itemIndex !== -1) {
      itemsToAdd[itemIndex].price = price;
  }
  updateTotalPrice();
}
// Function to update index column
function updateIndexColumn() {
  $('#dataTable tbody tr').each(function(index) {
      $(this).find('td:first').text(index + 1);
  });
}

function validateQuantity(input) {
  if (input.value === '') {
      // input.value = 1;
  } 
}

////////////////////// Data Table //////////////////////
// $(document).ready(function () {
  
  var t = $("#produkTable").DataTable({
    columnDefs: [
      {
        targets: [0], // Targeting the first column (index column)
        orderable: false, // Disable sorting for this column
        searchable: false,
      },
    ],
    order: [[1, "asc"]],
  });

// dataTable.on("draw.dt", function () {
//   var PageInfo = dataTable.page.info();
//   dataTable.column(0, { page: "current" }).nodes().each(function (cell, i) {
//       cell.innerHTML = i + 1 + PageInfo.start;
//   });
// });

t.on("draw.dt", function () {
  var PageInfo = $("#produkTable").DataTable().page.info();
  t.column(0, { page: "current" })
    .nodes()
    .each(function (cell, i) {
      cell.innerHTML = i + 1 + PageInfo.start;
    }); 
});
