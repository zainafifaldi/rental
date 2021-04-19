<?php
$header = [
  'title' => 'Transactions',
  'breadcrumbs' => [
    ['<i class="fa fa-book"></i>', 'rent/transactions'],
    ['Transactions', NULL],
  ],
  'buttons' => [
    ['<i class="fa fa-plus"></i> Tambah', 'warning', 'rent/transactions/new'],
    ['<i class="fa fa-plus-square"></i> Tambah Cepat', 'danger', 'rent/transactions/new/quick'],
  ]
];
$this->load->view('web/templates/rent/header', $header);
?>