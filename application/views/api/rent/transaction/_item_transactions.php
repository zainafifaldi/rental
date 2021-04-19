<?php
  $day_sum = 0;
  $price_sum = 0;
  $shipping_sum = 0;
  $number = 1;
?>

<?php
  foreach ($transactions as $transaction) {
    $bg_status = 'bg-default';

    switch($transaction->status) {
      case 0:
        $bg_status = 'bg-danger';
        break;
      case 1:
        $bg_status = 'bg-success';
        break;
      case 2:
        $bg_status = 'bg-default';
        break;
    }
?>
    <tr class="<?=$this->transaction->get_current_status_alert($transaction) ? '' : 'bg-danger text-white'?>">
      <td><?=$number?></td>
      <th scope="row">
        <div class="media align-items-center">
          <div class="media-body">
            <span class="name mb-0 text-sm"><?=$transaction->customer_name?> - <?=$transaction->address?></span>
          </div>
        </div>
      </th>
      <td class="text-center"><?=date('d M Y', strtotime($transaction->start_date))?></td>
      <td class="text-center"><?=date('d M Y', strtotime($transaction->end_date))?></td>
      <td class="text-right"><?=number_format(($transaction->price + $transaction->shipping_fee), 0, ',', '.')?></td>
      <td>
        <span class="badge badge-dot mr-4">
          <i class="<?=$bg_status?>"></i>
          <span class="status"><?=$this->transaction->get_status($transaction)?></span>
        </span>
      </td>
      <td class="text-right">
        <div class="dropdown">
          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
            <a class="dropdown-item" href="#">Detail</a>
            <a class="dropdown-item" href="<?=site_url("rent/transactions/{$transaction->id}/edit")?>">Ubah</a>
            <?php if ($transaction->status == 0) { ?>
              <a class="dropdown-item" href="javascript:confirm('Ubah status jadi Disewa?') ? window.location='<?=site_url("rent/transactions/{$transaction->id}/{$transaction->item_id}/status/1/1")?>':void(0)">Mulai Sewa</a>
            <?php } else if ($transaction->status == 1) { ?>
              <a class="dropdown-item" href="javascript:confirm('Ubah status jadi Dikembalikan?') ? window.location='<?=site_url("rent/transactions/{$transaction->id}/{$transaction->item_id}/status/2/1")?>':void(0)">Kembalikan</a>
            <?php } ?>
            <a class="dropdown-item" href="javascript:confirm('Yakin menghapus transaksi ini?') ? window.location='<?=site_url("rent/transactions/{$transaction->id}/{$transaction->item_id}/delete/1")?>':void(0)">Hapus</a>
          </div>
        </div>
      </td>
    </tr>
<?php
    $day_sum += (int)$transaction->rent_long_day;
    $price_sum += (int)$transaction->price;
    $shipping_sum += (int)$transaction->shipping_fee;
    $number++;
  }
?>
