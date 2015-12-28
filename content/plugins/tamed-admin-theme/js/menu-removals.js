jQuery(document).ready( function($) {
  function itemsUpdate() {
    var items = [];

    $( "#tamed-menu-order li p" ).each(function() {
      var page = $(this).parent().data("page");

      items.push({
        "name": name,
        "page": page
      });
    });

    var stringed = JSON.stringify(items);
    $("#tamed_menu_list_input").val(stringed);
  };

  if( $("#tamed_menu_removals_input").val() ){
    var removals = JSON.parse($("#tamed_menu_removals_input").val());
  } else {
    var removals = [];
  }

  $('#tamed-menu-order li span').click( function() {
    var page = $(this).parent().data("page");

    removals.push({
      "page": page
    });

    $(this).parent().remove();
    itemsUpdate();

    var stringed_removals = JSON.stringify(removals);
    $("#tamed_menu_removals_input").val(stringed_removals);
  });

});