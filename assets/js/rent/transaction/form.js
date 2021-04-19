$(document).ready(function(){
  $('#select-customer').on('change', function(){
    hide_show_customer_detail($(this).val());
  });
  hide_show_customer_detail($('#select-customer').val());
});

function hide_show_customer_detail(customer_val) {
  if (customer_val == "") {
    $('#input-customer-name').parents('.form-group').show();
  } else {
    $('#input-customer-name').parents('.form-group').hide();
  }
}
