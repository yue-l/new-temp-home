
// to uppercase
$('#vehicle-plate').focusout(function() {
   $(this).val($(this).val().toUpperCase());
})

$('#refuelRegBtn').click(function () {
   $('#refuelregform').submit();
});

$('#carRegBtn').click(function () {
   $('#carregisterform').submit();
});
$('#careerUpdateBtn').click(function () {
   $('#careerupdateform').submit();
});
$('.removeCarBtn').click(function () {
  if(confirm("Do you want to delete the selected car??")) {
    removeCar($(this).val());
  }
});

$(document).ready(function () {
  $('#fueltickets-table').DataTable({
    "lengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
  });
});

// remove

function removeCar(id) {
  $.ajax({
    type: "POST",
    data: { "id": id },
    url: 'removecar',
    success: function (data) {
      $('#' + data).attr('hidden', '');
    },
    error: function () {
      alert('Failed to Delete item - unexpected error');
    }
  });
}
