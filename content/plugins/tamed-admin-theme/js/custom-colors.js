jQuery(document).ready(function($){

  $('.custom-color').wpColorPicker();

  $('.wp-color-result').click( function() {
    var id = $(this).id;
    var parent = $(this).parent();
    var input = parent.find('.custom-color');
    var inputId = input.attr('id');

    document.getElementById(inputId).setAttribute("name", inputId);
  });

  $('.wp-color-result:before').click( function() {
    alert("yep");
  });

  $('#remove_customColors_button').click( function() {
    $('.custom-color').val('');
    $('.wp-color-result').css('background-color', 'transparent');
  });

});