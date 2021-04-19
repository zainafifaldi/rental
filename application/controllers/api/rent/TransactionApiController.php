<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include APPPATH . "controllers/api/RentApiBaseController.php";

class TransactionApiController extends RentApiBaseController {

  public function __construct() {
    parent::__construct();
  }

  public function index($item_id) {
    $item = $this->item->detail($item_id);
    $transactions = $this->transaction->item_member($item_id);

    echo json_encode([
      'item'              => $item,
      'transactions'      => $transactions,
      'transactions_html' => $this->load->view('api/rent/transaction/_item_transactions', ['transactions' => $transactions], true),
    ]);
  }
}
