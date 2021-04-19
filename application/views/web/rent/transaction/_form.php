<?php
  global $trx;
  $trx = $transaction;

  function autoselect($field, $value) {
    global $trx;
    if ($trx && $trx->{$field} == $value)
      return "selected";
  }

  function autofill($field, $type = 'text') {
    global $trx;
    if ($trx && $trx->{$field}) {
      if ($type == 'date')
        return date('m/d/Y', strtotime($trx->{$field}));
      else
        return $trx->{$field};
    }
  }
?><div class="form-group row">
  <label for="select-customer" class="col-sm-2 col-form-label">Pelanggan</label>
  <div class="col-sm-10">
    <select class="form-control" id="select-customer" name="customer">
      <option value="">Pelanggan baru</option>
      <?php foreach ($customers as $customer) { ?>
        <option value="<?=$customer->id?>" <?=autoselect('customer_id', $customer->id)?>><?=$customer->name?></option>
      <?php } ?>
    </select>
  </div>
</div>
<div class="form-group row">
  <label for="input-customer-name" class="col-sm-2 col-form-label"></label>
  <div class="col-sm-4 col-sm-offset-2">
    <input type="text" class="form-control" id="input-customer-name" name="customer_name" placeholder="Nama">
  </div>
  <div class="col-sm-6">
    <input type="text" class="form-control" id="input-customer-address" name="customer_address" placeholder="Alamat">
  </div>
</div>

<div class="form-group row">
  <label for="select-item" class="col-sm-2 col-form-label">Barang</label>
  <div class="col-sm-4">
    <select class="form-control" id="select-type" name="item_type">
      <?php foreach ($this->item->get_types() as $item_type_id => $item_type_name) { ?>
        <option value="<?=$item_type_id?>" <?=autoselect('item_type', $item_type_id)?>><?=$item_type_name?></option>
      <?php } ?>
    </select>
  </div>
  <div class="col-sm-6">
    <select class="form-control" id="select-item" name="item">
      <option value="">Belum dipilih</option>
      <?php foreach ($items as $item) { ?>
        <option value="<?=$item->id?>" data-type-id="<?=$item->type?>" <?=autoselect('item_id', $item->id)?>><?=$item->name?> (<?=$item->color?>)</option>
      <?php } ?>
    </select>
  </div>
</div>

<div class="form-group row">
  <label for="input-book-date" class="col-sm-2 col-form-label">Tanggal Booking</label>
  <div class="col-sm-10">
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
      </div>
      <input type="text" class="form-control datepicker" id="input-book-date" name="book_date" placeholder="Tanggal Booking" value="<?=autofill('book_date', 'date')?>">
    </div>
  </div>
</div>

<div class="input-daterange datepicker">
  <div class="form-group row">
    <label for="input-start-date" class="col-sm-2 col-form-label">Tanggal Sewa</label>
    <div class="col-sm-5">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
        </div>
        <input type="text" class="form-control datepicker" id="input-start-date" name="start_date" placeholder="Dari" value="<?=autofill('start_date', 'date')?>">
      </div>
    </div>
    <div class="col-sm-5">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
        </div>
        <input type="text" class="form-control datepicker" id="input-end-date" name="end_date" placeholder="Sampai" value="<?=autofill('end_date', 'date')?>">
      </div>
    </div>
  </div>
</div>

<div class="form-group row">
  <label for="input-price" class="col-sm-2 col-form-label">Harga</label>
  <div class="col-sm-5">
    <input type="text" class="form-control" id="input-price" name="price" placeholder="Harga Sewa" value="<?=autofill('price')?>">
  </div>
  <div class="col-sm-5">
    <input type="text" class="form-control" id="input-shipping-fee" name="shipping_fee" placeholder="Ongkir" value="<?=autofill('shipping_fee')?>">
  </div>
</div>

<div class="form-group row">
  <label for="input-transfer-plan" class="col-sm-2 col-form-label">Rencana Jumlah Pembayaran</label>
  <div class="col-sm-5">
    <input type="text" class="form-control" id="input-transfer-plan" name="transfer_plan" placeholder="Transfer" value="<?=autofill('transfer_plan')?>">
  </div>
  <div class="col-sm-5">
    <input type="text" class="form-control" id="input-cash-plan" name="cash_plan" placeholder="Cash" value="<?=autofill('cash_plan')?>">
  </div>
</div>

<div class="form-group row">
  <label for="input-payment" class="col-sm-2 col-form-label">Sudah Dibayar</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="input-payment" name="payment" placeholder="Nominal Dibayar" value="<?=autofill('payment')?>">
  </div>
</div>

<div class="form-group row">
  <label for="input-notes" class="col-sm-2 col-form-label">Keterangan</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="input-notes" name="notes" placeholder="Keterangan" value="<?=autofill('notes')?>">
  </div>
</div>

<div class="form-group row">
  <label for="select-status" class="col-sm-2 col-form-label">Status Sewa</label>
  <div class="col-sm-10">
    <select class="form-control" id="select-status" name="status">
      <?php foreach ($this->transaction->get_statuses() as $status_id => $status_name) { ?>
        <option value="<?=$status_id?>" <?=autoselect('status', $status_id)?>><?=$status_name?></option>
      <?php } ?>
    </select>
  </div>
</div>
