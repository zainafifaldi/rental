$(document).ready(function(){
  $('#select-type').on('change', function(){
    hide_show_item_option($(this).val());
  });

  hide_show_item_option($('#select-type').val(), true);
});

function hide_show_item_option(typeID, firstRender = false) {
  $('#select-item > option:not([data-type-id="'+ typeID +'"])').hide();
  $('#select-item > option[data-type-id="'+ typeID +'"]').show();

  if(!firstRender) {
    var newVal = $('#select-item > option[data-type-id="'+ typeID +'"]').first().val();
    $('#select-item').val(newVal);
  }
}
