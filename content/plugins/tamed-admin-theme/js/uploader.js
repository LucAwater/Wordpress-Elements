jQuery(document).ready(function($){

  // Uploading logo image
  $('#upload_image_button').click(function() {
    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {
      $('#upload_image').val(attachment.url);
      document.getElementById("tamed_logo_preview").src = attachment.url;
      document.getElementById("remove_image_button").setAttribute("data-image", "present");

      wp.media.editor.send.attachment = send_attachment_bkp;
    }

    wp.media.editor.open();

    return false;
  });

  $('#remove_image_button').click(function() {
    console.log("remove button clicked");

    $('#upload_image').val(' ');
    document.getElementById("tamed_logo_preview").src = ' ';
    document.getElementById("remove_image_button").setAttribute("data-image", "");
  });

  // Uploading image for login background
  $('#upload_bg_image_button').click(function() {
    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {
      $('#upload_bg_image').val(attachment.url);
      document.getElementById("tamed_bg_preview").src = attachment.url;
      document.getElementById("remove_bg_image_button").setAttribute("data-image", "present");

      wp.media.editor.send.attachment = send_attachment_bkp;
    }

    wp.media.editor.open();

    return false;
  });

  $('#remove_bg_image_button').click(function() {
    console.log("remove button clicked");

    $('#upload_bg_image').val(' ');
    document.getElementById("tamed_bg_preview").src = ' ';
    document.getElementById("remove_bg_image_button").setAttribute("data-image", "");
  });

});