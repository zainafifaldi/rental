<?php
$header = [
  'title' => 'Edit Transaction',
  'breadcrumbs' => [
    ['<i class="fa fa-book"></i>', 'rent/transactions'],
    ['Transactions', 'rent/transactions'],
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
          <h3 class="mb-0" id="item-title">Edit Transaction</h3>
        </div>
        <div class="card-body">
          <form action="<?=site_url("rent/transactions/update")?>" method="POST">
            <input type="hidden" name="id" value="<?=$transaction->id?>">

            <?php $this->load->view('web/rent/transaction/_form', ['transaction' => $transaction]) ?>

            <div class="form-group row">
              <label for="btn-save" class="col-sm-2 col-form-label"></label>
              <div class="col-sm-10">
                <button type="submit" id="btn-save" class="btn btn-primary">Simpan</button>
                <a href="<?=site_url('rent/transactions')?>" id="btn-cancel" class="btn btn-warning">Batal</a>
                <!-- <a href="<?=site_url('rent/items?content='.$transaction->item_id)?>" id="btn-cancel" class="btn btn-warning">Batal</a> -->
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php $this->load->view('web/templates/rent/footer') ?>

</div>

<script src="<?=base_url('assets/js/rent/transaction/form.js')?>"></script>
<script src="<?=base_url('assets/js/rent/item_type_select.js')?>"></script>
<script src="<?=base_url('assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')?>"></script>
