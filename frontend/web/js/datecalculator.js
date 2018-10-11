// date time calculation script for front-end events.

// init datetimepicker
$('#input-datetimepicker').datetimepicker({
  format: 'DD/MM/YYYY HH:mm',
  defaultDate: new Date(),
});

// updates all other timezones
$('#updateBtn').click(function() {
  updateDateTime();
  $('#resultpanel').removeAttr('hidden');
});

// error handlding features, replace all the characters except numbers.
$('#modifyDay').on("change", function() {
  updateAlteredDateTime();
});
$('#modifyHour').on("change", function() {
  updateAlteredDateTime();
});
$('#modifyMinute').on("change", function() {
  updateAlteredDateTime();
});
$('#input-datetimepicker').on("click", function() {
  $('#resultpanel').attr("hidden", "");
  $('#resultpanel').find('input:text').val('');
});
$('#input-datetimepicker').focusout(function(){
  if($(this).val().length == 0){
    var temp = new Date();
    var day = temp.getDate();
    var month = temp.getMonth() + 1;
    if(month < 10)
      month = "0" + month;
    var year = temp.getFullYear();
    var hour = temp.getHours();
    var minute = temp.getMinutes();
    $(this).val( day + "/" + month + "/" + year + " " + hour + ":" + minute);
    $('#datevalidation').removeAttr('hidden');
  } else {
    $('#datevalidation').attr("hidden", "");
  }
});
$('#timezone').on("click", function() {
  $('#resultpanel').attr("hidden", "");
  $('#resultpanel').find('input:text').val('');
});

// define update type
function updateCalculationType() {
  var updateType = $('#addoperand').is(':checked') ? 'add' : 'minus';
  return updateType;
}

// simplfy inputs change binding
function updateAlteredDateTime() {
  var hasNonNumeric = false;
  if($('#modifyDay').val().match(/[^0-9]+/g) ||
  $('#modifyHour').val().match(/[^0-9]+/g) ||
  $('#modifyMinute').val().match(/[^0-9]+/g)) {
    $('#modifyDay').val($('#modifyDay').val().replace(/[^0-9]+/g,''));
    $('#modifyHour').val($('#modifyHour').val().replace(/[^0-9]+/g,''));
    $('#modifyMinute').val($('#modifyMinute').val().replace(/[^0-9]+/g,''));
    if($('#modifyDay').val().length == 0){
      $('#modifyDay').val(0);
    }
    if($('#modifyHour').val().length == 0){
      $('#modifyHour').val(0);
    }
    if($('#modifyMinute').val().length == 0){
      $('#modifyMinute').val(0);
    }
    $('#validation-notice').removeAttr('hidden');
  } else {
    $('#validation-notice').attr("hidden", "");
  }
}

// ajax update - Date Time returns a json array for all the datetime data
function updateDateTime() {
  var updateType = updateCalculationType();
  $.ajax({
    type : "POST",
    url: '/apps/datetimecalculate',
    data: {
      currentDatetime : $('#input-datetimepicker').val(),
      timeZone : $('#timezone').val(),
      updateType : updateType,
      day : $('#modifyDay').val(),
      hour : $('#modifyHour').val(),
      minute : $('#modifyMinute').val(),
    },
    success: function (data) {
      setConversionValues(data);
    },
    error: function (notice) {
      alert(notice.responseText);
    },
  });
}

// a helper method, updates html elements
function setConversionValues(data) {
  var response = JSON.parse(data);
  // update text
  $('#utcdisplay').val(response['utc']);
  $('#aestdisplay').val(response['aest']);
  $('#cstdisplay').val(response['cst']);
  $('#mstdisplay').val(response['mst']);
  $('#nzstdisplay').val(response['nzst']);
}
