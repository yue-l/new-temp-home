$('#newjobsubmit').click(function () {
  $('#refuelregform').submit();
});

$('#job-date').datetimepicker({
  format: 'DD/MM/YYYY HH:mm',
  defaultDate: new Date(),
});
