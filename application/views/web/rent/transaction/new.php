<?php
$header = [
  'title' => 'Add New Transaction',
  'breadcrumbs' => [
    ['<i class="fa fa-book"></i>', 'rent/transactions'],
    ['Transactions', 'rent/transactions'],
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
          <h3 class="mb-0" id="item-title">New Transaction</h3>
        </div>
        <div class="card-body">
          <form action="<?=site_url("rent/transactions/create?repeat={$repeat_form}")?>" method="POST">
            <?php $this->load->view('web/rent/transaction/_form', ['transaction' => null]) ?>

            <div class="form-group row">
              <label for="btn-save" class="col-sm-2 col-form-label"></label>
              <div class="col-sm-10">
                <button type="submit" id="btn-save" class="btn btn-primary">Tambah Transaksi</button>
                <a href="<?=site_url('rent/transactions')?>" id="btn-cancel" class="btn btn-warning">Batal</a>
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
