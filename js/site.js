// Enable Select2
$("myselect2-select").select2();

// Populate placeholders
$(".tags-industry").select2({
    tags: "true",
    placeholder: "Add an Industry tag",
    allowClear: true
});
$(".tags-technology").select2({
    tags: "true",
    placeholder: "Add a Technology tag",
    allowClear: true
});
$(".tags-programme").select2({
    tags: "true",
    placeholder: "Add a Programme tag",
    allowClear: true
});
$(".tags-partner").select2({
    tags: "true",
    placeholder: "Add a Partner tag",
    allowClear: true
});
