$( function() {
  $( ".datepick" ).datepicker({
    showWeek: true,
    firstDay: 1
  });
  $( ".datepick" ).on("change", function(){
//    var selected = $(this).val();
//    alert(selected);
  });
} );

$(document).ready(function(){
  $('#byDateButton').click(function() {
    $('#byDate').show();
    $('#byCourt').hide();
  });
  $('#byCourtButton').click(function() {
    $('#byCourt').show();
    $('#byDate').hide();
  });
});
