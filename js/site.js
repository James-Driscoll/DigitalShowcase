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

$(".tags-industry").select2({
  placeholder: "Add an Industry tag"
});
$(".tags-technology").select2({
  placeholder: "Add a Technology tag"
});
$(".tags-programme").select2({
  placeholder: "Add a Programme tag"
});
$(".tags-partner").select2({
  placeholder: "Add a Partner tag"
});