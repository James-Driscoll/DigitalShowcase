$(function(){
    $(".chzn-select").chosen();
});


$(document).ready(function() {
  $(".js-example-basic-single").select2();
});


$('select').select2();


function displayCurrentValue(selectedObject, currentSearchTerm) {
  return currentSearchTerm;
}

$("#e1").select2({
  nextSearchTerm: displayCurrentValue
});
