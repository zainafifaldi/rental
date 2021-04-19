<?php
$header = [
  'title' => 'Add New Item',
  'breadcrumbs' => [
    ['<i class="fa fa-gem"></i>', 'rent/items'],
    ['Items', 'rent/items'],
    ['New', NULL],
  ],
];
$this->load->view('web/templates/rent/header', $header);
?>

<div class="container-fluid mt--6">
  <div class="row justify-content-center">
    <div class=" col ">
      <div class="card">
        <div class="card-header bg-transparent">
          <h3 class="mb-0" id="item-title">New Item</h3>
        </div>
        <div class="card-body">
          <form action="<?=site_url('rent/items/create')?>" method="POST">
            <?php $this->load->view('web/rent/item/_form', ['item' => null]) ?>

            <div class="form-group row">
              <label for="btn-save" class="col-sm-2 col-form-label"></label>
              <div class="col-sm-10">
                <button type="submit" id="btn-save" class="btn btn-primary">Tambah Barang</button>
                <a href="<?=site_url('rent/items')?>" id="btn-cancel" class="btn btn-warning">Batal</a>
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
