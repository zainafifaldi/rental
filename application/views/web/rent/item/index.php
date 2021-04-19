<!-- Header -->
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Items</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="<?=site_url('rent/items')?>"><i class="fas fa-gem"></i></a></li>
              <li class="breadcrumb-item active" aria-current="page">Items</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-6 col-5 text-right">
          <div class="row">
            <div class="col-sm-4">
              <select class="form-control form-control-sm" id="select-type">
                <?php
                  foreach ($types as $type_id => $type_name) {
                    if(!array_key_exists($type_id, $type_items)) continue;
                    $active = $type_items[$type_id]['active'] ? 'selected="selected"' : '';

                    ?><option value="<?=$type_id?>" <?=$active?>><?=strtoupper($type_name)?></option><li class="nav-type"><?php
                  }
                ?>
              </select>
            </div>
            <div class="col-sm-4">
              <select class="form-control form-control-sm" id="select-item">
                <?php
                  foreach ($type_items as $type_obj) {
                    foreach ($type_obj['content'] as $item) {
                      $active = ($item->id == $selected_content) ? 'selected="selected"' : '';
                      ?><option data-type-id="<?=$item->type?>" value="<?=$item->id?>" <?=$active?>><?=$item->name?> (<?=$item->color?>)</option><?php
                    }
                  }
                ?>
              </select>
            </div>
            <div class="col-sm-4">
              <a href="#" id="edit-item-button" class="btn btn-sm btn-default"><i class="fas fa-edit"></i> Ubah</a>
              <a href="<?=site_url('rent/items/new')?>" class="btn btn-sm btn-warning"><i class="fas fa-plus"></i> Tambah</a>
            </div>
          </div>
        </div>
      </div>
      <!-- Card stats -->
      <div class="row">
        <div class="col-xl-3 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Beli</h5>
                  <span class="h2 font-weight-bold mb-0" id="card-buy-amount">-</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                    <i class="ni ni-box-2"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-sm">
                <span class="text-nowrap" id="card-buy-date">-</span>
              </p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Sewa Per Bulan</h5>
                  <span class="h2 font-weight-bold mb-0" id="card-rent-amount">-</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                    <i class="ni ni-tag"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-sm">
                <span class="text-nowrap">---</span>
              </p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0" id="card-return-text">Sisa Balik Modal</h5>
                  <span class="h2 font-weight-bold mb-0" id="card-return-amount">-</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                    <i class="ni ni-trophy"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-sm">
                <span class="text-success mr-2 font-weight-bold" id="card-return-long-period">-</span>
                <span class="text-nowrap">Bulan</span>
              </p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Total Pendapatan</h5>
                  <span class="h2 font-weight-bold mb-0" id="card-revenue-amount">-</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                    <i class="ni ni-money-coins"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-sm">
                <span class="text-nowrap">Total Plus Ongkir:</span>
                <span class="text-nowrap mr-2 font-weight-bold" id="card-revenue-total-amount">-</span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid mt--6">
  <div class="row justify-content-center">
    <div class=" col ">
      <div class="card">
        <div class="card-header bg-transparent">
          <h3 class="mb-0" id="item-title">-</h3>
        </div>
        <div class="table-responsive" id="table-item-transactions">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama - Domisili</th>
                <th scope="col">Tanggal Sewa</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Harga + Ongkir</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody class="list"></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <?php $this->load->view('web/templates/rent/footer') ?>

</div>

<script src="<?=base_url('assets/js/rent/item/index.js')?>"></script>
<script src="<?=base_url('assets/js/rent/item_type_select.js')?>"></script>
<script src="<?=base_url('assets/vendor/jquery-dateFormat-master/jquery-dateformat.min.js')?>"></script>
<script src="<?=base_url('assets/vendor/jquery-number-master/jquery.number.min.js')?>"></script>
