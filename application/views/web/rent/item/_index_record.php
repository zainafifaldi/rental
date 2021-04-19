<tr class="<?=$this->transaction->get_current_status_alert($record) ? '' : 'bg-danger text-white'?>">
  <td><?=$number?></td>
  <th scope="row">
    <div class="media align-items-center">
      <div class="media-body">
        <span class="name mb-0 text-sm"><?=$record->customer_name?> - <?=$record->address?></span>
      </div>
    </div>
  </th>
  <td class="text-center"><?=date('d M Y', strtotime($record->start_date))?></td>
  <td class="text-center"><?=date('d M Y', strtotime($record->end_date))?></td>
  <td class="text-right"><?=number_format(($record->price + $record->shipping_fee), 0, ',', '.')?></td>
  <td>
    <span class="badge badge-dot mr-4">
      <i class="bg-warning"></i>
      <span class="status"><?=$this->transaction->get_status($record)?></span>
    </span>
  </td>
  <td class="text-right">
    <div class="dropdown">
      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-ellipsis-v"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
        <a class="dropdown-item" href="#">Detail</a>
        <a class="dropdown-item" href="<?=site_url("rent/transactions/{$record->id}/edit")?>">Ubah</a>
        <?php if ($record->status == 0) { ?>
          <a class="dropdown-item" href="javascript:confirm('Ubah status jadi Disewa?') ? window.location='<?=site_url("rent/transactions/{$record->id}/{$record->item_id}/status/1/1")?>':void(0)">Mulai Sewa</a>
        <?php } else if ($record->status == 1) { ?>
          <a class="dropdown-item" href="javascript:confirm('Ubah status jadi Dikembalikan?') ? window.location='<?=site_url("rent/transactions/{$record->id}/{$record->item_id}/status/2/1")?>':void(0)">Kembalikan</a>
        <?php } ?>
        <a class="dropdown-item" href="javascript:confirm('Yakin menghapus transaksi ini?') ? window.location='<?=site_url("rent/transactions/{$record->id}/{$record->item_id}/delete/1")?>':void(0)">Hapus</a>
      </div>
    </div>
  </td>
</tr>
