$(document).on("change", ".jumlah", function () {
  var index = -1;
  var dataId = $(this).data("id");
  // Find the index of the item with the matching id
  for (var i = 0; i < itemsToAdd.length; i++) {
      if (itemsToAdd[i].id === dataId) {
          index = i;
          break;
      }
  }
  var dataHarga = $(this).data("harga");
  var harga = parseInt(dataHarga);
  var jumlah = parseInt(itemsToAdd[index].quantity);
  var total = (harga * jumlah).toLocaleString('id-ID');
  // Update the total value in the corresponding table cell
  $('td.total[data-id="' + dataId + '"]').text("Rp"+total);
  updateTotalPrice();
});

function addItemToTable(item) {
  var index = $('#dataTable tbody tr').length + 1;
  var tempItem = dataList[item.id-1];
  var row = '<tr>' +
      '<td class="text-center">' + index + '</td>' +
      '<td>' + tempItem.id_produk + '</td>' +
      '<td>' + tempItem.nama + '</td>' +
      '<td> Rp' + tempItem.harga.toLocaleString('id-ID') + '</td>' +
      '<td>' +
      '<input class="jumlah" value="1" type="number" min="1" data-id="' + tempItem.id + '" data-harga="' + tempItem.harga + '" onchange="updateQuantity(this)" oninput="validateQuantity(this)">' +
      '</td>' +
      '<td class="total" data-id="' + tempItem.id + '">'+ 'Rp' + tempItem.harga.toLocaleString('id-ID') +'</td>' +
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

function updateQuantity(input) {
  var id = $(input).data('id');
  var quantity = parseInt($(input).val());
  var itemIndex = itemsToAdd.findIndex(i => i.id === id);
  if (itemIndex !== -1) {
      itemsToAdd[itemIndex].quantity = quantity;
  }
  updateTotalPrice();
}

var itemsToAdd = []; // Array to store items to be added

// Event listener for adding item
$('.btn-add-item').on('click', function() {
  var productId = $(this).data('id');
  var quantity = 1; // You can change this as per your requirement

  var newItem = {
      id: productId,
      quantity: quantity
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

$("#storeTransaction").on("click", function () {
  var id_pembeli = $("#id_pembeli").val();
  var jenis = $("#jenis").val();
  var csrfToken = $('meta[name="csrf-token"]').attr('content');

  // Check if the stock is sufficient for each item
  var stockSufficient = true;
  itemsToAdd.forEach(function(item) {
      if (item.quantity > item.stok) {
          stockSufficient = false;
          return false; // Exit the loop early if stock is insufficient
      }
  });

  if (!stockSufficient) {
      alert("Stok produk tidak mencukupi!");
      return; // Exit the function if stock is insufficient
  }

  // Send itemsToAdd array to the controller using AJAX
  $.ajax({
      url: "/simpan_transaksi",
      type: "POST",
      headers: {
          'X-CSRF-TOKEN': csrfToken
      },
      data: {
          id_pembeli: id_pembeli,
          jenis: jenis,
          items: itemsToAdd,
          id_pegawai: id_pegawai,
      },
      success: function (response) {
          alertify.success('Data Tersimpan!');
          console.log("Data Tersimpan!");
          console.log(response);
      },
      error: function (xhr) {
          alertify.error('Data Gagal Tersimpan!');
          console.log("Data Gagal Tersimpan!");
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
  var total = 0;

  // Loop through each .total element
  $('.total').each(function() {
      // Extract the numerical value and remove the currency symbol
      var value = $(this).text().replace('Rp', '').replace(',', '');
      // Parse the value as a float and add it to the total
      total += parseFloat(value);
  });

  // Format the total with proper thousand separators and currency symbol
  var formattedTotal = 'Rp' + (total*1000).toLocaleString('id-ID');

  // Update the content of the total price element
  $('#totalPrice').text(formattedTotal);
}




// Function to update index column
function updateIndexColumn() {
  $('#dataTable tbody tr').each(function(index) {
      $(this).find('td:first').text(index + 1);
  });
}

function validateQuantity(input) {
  if (input.value === '') {
      input.value = 1;
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

