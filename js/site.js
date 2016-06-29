// Enable Select2
$(".myselect2-select").select2();

// Populate placeholders
$(".tags-vertical").select2({
    tags: "true",
    placeholder: "Add a Vertical tag",
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




var $item = $('.carousel .item');
var $wHeight = $(window).height();
$item.eq(0).addClass('active');
$item.height($wHeight);
$item.addClass('full-screen');

$('.carousel img').each(function() {
  var $src = $(this).attr('src');
  var $color = $(this).attr('data-color');
  $(this).parent().css({
    'background-image' : 'url(' + $src + ')',
    'background-color' : $color
  });
  $(this).remove();
});

$(window).on('resize', function (){
  $wHeight = $(window).height();
  $item.height($wHeight);
});

$('.carousel').carousel({
  interval: 30000,
});
