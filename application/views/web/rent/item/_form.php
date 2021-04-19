<?php
  global $global_item;
  $global_item = $item;

  function autoselect($field, $value) {
    global $global_item;
    if ($global_item && $global_item->{$field} == $value)
      return "selected";
  }

  function autofill($field, $type = 'text') {
    global $global_item;
    if ($global_item && $global_item->{$field}) {
      if ($type == 'date')
        return date('m/d/Y', strtotime($global_item->{$field}));
      else
        return $global_item->{$field};
    }
  }
?><div class="form-group row">
  <label for="select-type" class="col-sm-2 col-form-label">Jenis Barang</label>
  <div class="col-sm-10">
    <select class="form-control" id="select-type" name="type">
      <?php foreach ($this->item->get_types() as $item_type_id => $item_type_name) { ?>
        <option value="<?=$item_type_id?>" <?=autoselect('type', $item_type_id)?>><?=$item_type_name?></option>
      <?php } ?>
    </select>
  </div>
</div>

<div class="form-group row">
  <label for="input-name" class="col-sm-2 col-form-label">Nama Barang</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="input-name" name="name" placeholder="Nama Barang" value="<?=autofill('name', 'text')?>">
  </div>
</div>

<div class="form-group row">
  <label for="input-color" class="col-sm-2 col-form-label">Warna</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="input-color" name="color" placeholder="Warna" value="<?=autofill('color', 'text')?>">
  </div>
</div>

<div class="form-group row">
  <label for="input-buy-date" class="col-sm-2 col-form-label">Tanggal Pembelian</label>
  <div class="col-sm-10">
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
      </div>
      <input type="text" class="form-control datepicker" id="input-buy-date" name="buy_date" placeholder="Tanggal Pembelian" value="<?=autofill('buy_date', 'date')?>">
    </div>
  </div>
</div>

<div class="form-group row">
  <label for="input-buy-price" class="col-sm-2 col-form-label">Harga Pembelian</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="input-buy-price" name="buy_price" placeholder="Harga Pembelian" value="<?=autofill('buy_price', 'text')?>">
  </div>
</div>

<div class="form-group row">
  <label for="input-rent-base-price" class="col-sm-2 col-form-label">Harga Sewa per Bulan</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="input-rent-base-price" name="rent_base_price" placeholder="Harga Sewa per Bulan" value="<?=autofill('rent_base_price', 'text')?>">
  </div>
</div>
