<?php
$header = [
  'title' => 'Timeline',
  'breadcrumbs' => [
    ['<i class="fa fa-book"></i>', 'rent/timeline'],
    ['Timeline', NULL],
  ],
];
$this->load->view('web/templates/rent/header', $header);
?>

<div class="container-fluid mt--6">
  <div class="row justify-content-center">
    <div class=" col ">
      <div class="card">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0" id="item-title">Table View</h3>
            </div>
            <div class="col">
              <ul class="nav nav-pills justify-content-end">
                <li class="nav-item mr-2 mr-md-0">
                  <a href="#" class="nav-link py-2 px-3 active">
                    <span class="d-none d-md-block">Table</span>
                    <!-- <span class="d-md-none">M</span> -->
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?=site_url('rent/timeline/calendar')?>" class="nav-link py-2 px-3">
                    <span class="d-none d-md-block">Calendar</span>
                    <!-- <span class="d-md-none">W</span> -->
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="table-responsive" id="table-item-transactions">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama - Domisili</th>
                <th scope="col">Tujuan</th>
                <th scope="col">Durasi</th>
                <th scope="col">Tanggal Sewa</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Harga + Ongkir</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody class="list">
              <?php
                $number = 1;
                foreach ($timeline as $transaction) {
                  $this->load->view('web/rent/timeline/_index_record', ['number' => $number, 'record' => $transaction]);
                  $number++;
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <?php $this->load->view('web/templates/rent/footer') ?>

</div>
