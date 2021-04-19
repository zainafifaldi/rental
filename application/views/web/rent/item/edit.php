<?php
$header = [
  'title' => 'Edit Item',
  'breadcrumbs' => [
    ['<i class="fa fa-gem"></i>', 'rent/items'],
    ['Items', 'rent/items'],
    ['Edit', NULL],
  ],
];
$this->load->view('web/templates/rent/header', $header);
?>

<div class="container-fluid mt--6">
  <div class="row justify-content-center">
    <div class=" col ">
      <div class="card">
        <div class="card-header bg-transparent">
          <h3 class="mb-0" id="item-title"><?=$item->name?> (<?=$item->color?>)</h3>
        </div>
        <div class="card-body">
          <form action="<?=site_url('rent/items/update')?>" method="POST">
            <input type="hidden" name="id" value="<?=$item->id?>">

            <?php $this->load->view('web/rent/item/_form', ['item' => $item]) ?>

            <div class="form-group row">
              <label for="btn-save" class="col-sm-2 col-form-label"></label>
              <div class="col-sm-10">
                <button type="submit" id="btn-save" class="btn btn-primary">Simpan Perubahan</button>
                <a href="<?=site_url('rent/items?content='.$item->id)?>" id="btn-cancel" class="btn btn-warning">Batal</a>
                <a href="javascript:void(0);" onClick="confirm('Kamu yakin mau menghapus barang ini?\nBarang yang sudah dihapus tidak dapat dikembalikan.') ? window.location = '<?=site_url("rent/items/{$item->id}/delete")?>' : void(0)" class="btn btn-danger" style="float:right;"><i class="fa fa-trash"></i> Hapus</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php $this->load->view('web/templates/rent/footer') ?>

</div>

<script src="<?=base_url('assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')?>"></script>
