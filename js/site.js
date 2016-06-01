// Enable Select2
$('select').select2();

// Enable Clear Function
$(".select2-select").select2({
  allowClear: true,
});

// Populate placeholders
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
