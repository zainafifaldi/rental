$(document).ready(function(){
  $('#select-type, #select-item').on('change', function(){
    load_item_content($('#select-item').val());
  });

  load_item_content($('#select-item').val());
});

function load_item_content(itemID) {
  $.ajax({
    type: 'GET',
    url: SITE_URL + '/api/rent/items/' + itemID + '/transactions',
    dataType: 'json',
    success: function(data) {
      var totalTransaction = count_total_transaction(data.transactions),
          liabilityLeft = data.item.buy_price - totalTransaction[0],
          monthTarget = liabilityLeft / data.item.rent_base_price;

      var buyDate = dateFormat(data.item.buy_date + ' 00:00:00');

      if(!Number.isInteger(monthTarget)) monthTarget = Math.floor(monthTarget) + '-' + (Math.floor(monthTarget) + 1);

      $('#item-title').text(data.item.name + ' (' + data.item.color + ')');
      $('#card-buy-amount').text(numberFormat(data.item.buy_price));
      $('#card-buy-date').text(buyDate);
      $('#card-rent-amount').text(numberFormat(data.item.rent_base_price));
      $('#card-return-amount').text(numberFormat(liabilityLeft));
      $('#card-return-long-period').text(monthTarget);
      $('#card-revenue-amount').text(numberFormat(totalTransaction[0]));
      $('#card-revenue-total-amount').text(numberFormat(totalTransaction[0] + totalTransaction[1]));

      if(liabilityLeft < 0) {
        $('#card-return-amount').text('+' + numberFormat(liabilityLeft*(-1)));
        $('#card-return-long-period').text('-');
        $('#card-return-amount').addClass('text-success');
        $('#card-return-long-period').removeClass('text-success');
        $('#card-return-text').text('Profit');
      } else {
        $('#card-return-amount').removeClass('text-success');
        $('#card-return-long-period').addClass('text-success');
        $('#card-return-text').text('Sisa Balik Modal');
      }

      $("#table-item-transactions tbody").html(data.transactions_html);

      $('#edit-item-button').attr('href', SITE_URL + '/rent/items/' + itemID + '/edit');
    }
  });
}

function count_total_transaction(transactions) {
  var total_amount = 0;
  var total_shipping = 0;
  for(var i = 0; i < transactions.length; i++) {
    total_amount += parseInt(transactions[i].price);
    total_shipping += parseInt(transactions[i].shipping_fee);
  }

  return [total_amount, total_shipping];
}
