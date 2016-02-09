jQuery(document).ready( function($) {
  // Order updating
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
    var removals = new Array();
  }

  // Removing items
  $('#tamed-menu-order li span').click( function() {
    // Get data
    var page = $(this).parent().data("page");
    var name = $(this).parent().children('p').text();

    // Add data to array
    removals.push({
      "name": name,
      "page": page
    });

    // Remove item from list
    $(this).parent().remove();
    itemsUpdate();

    // Send array to hidden input
    var stringed_removals = JSON.stringify(removals);
    $("#tamed_menu_removals_input").val(stringed_removals);
  });

  // Restoring items
  $('#tamed-menu-removals li span').click( function() {
    // Get data
    var page = $(this).parent().data("page");
    var name = $(this).parent().children('p').text();

    // Get index and remove from array
    var index = removals.map(function(x) {return x.page; }).indexOf(page);
    removals.splice(index, 1);

    // Change state of item
    $(this).text("item will be re-added when saved");
    $(this).parent('li').addClass("tamed-reAdd");

    // Send array to hidden input
    var stringed_removals = JSON.stringify(removals);
    $("#tamed_menu_removals_input").val(stringed_removals);
  });

});