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

<style>

</style>

<div class="container-fluid mt--6">
  <div class="row justify-content-center">
    <div class=" col ">
      <div class="card">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0" id="item-title">Calendar View</h3>
            </div>
            <div class="col">
              <ul class="nav nav-pills justify-content-end">
                <li class="nav-item mr-2 mr-md-0">
                  <a href="<?=site_url('rent/timeline')?>" class="nav-link py-2 px-3">
                    <span class="d-none d-md-block">Table</span>
                    <!-- <span class="d-md-none">M</span> -->
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link py-2 px-3 active">
                    <span class="d-none d-md-block">Calendar</span>
                    <!-- <span class="d-md-none">W</span> -->
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body calendar no-margin" id="calendar">
          <div id='wrap'>
            <div id='calendar'></div>
            <div style='clear:both'></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php $this->load->view('web/templates/rent/footer') ?>

</div>

<script>
var date = new Date();
var d = date.getDate();
var m = date.getMonth();
var y = date.getFullYear();
var event_list = [
  <?php
  foreach ($timeline as $transaction) {
    $current_status_alert = $this->transaction->get_current_status_alert($transaction);
    $rand_hour = rand(0, 9);
  ?>
    {
      id: <?=$transaction->id?>,
      title: '<?=$transaction->customer_name?> - <?=$transaction->address?>',
      start: new Date('<?=$transaction->purpose == 'rent' ? $transaction->start_date : $transaction->end_date?>T0<?=$rand_hour?>:00:00Z'),
      allDay: false,
      className: '<?=$current_status_alert ? ($transaction->purpose == 'rent' ? 'bg-success' : 'bg-info') : 'bg-danger'?>'
    },
  <?php } ?>
];
    
</script>

<!-- <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet"> -->
<script src="<?=base_url('assets/vendor/deepakbisht-calendar/calendar.js')?>"></script>
<script src="<?=base_url('assets/js/rent/timeline/calendar.js')?>"></script>
