<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RentBaseController extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('rent/RentItemModel', 'item');
    $this->load->model('rent/RentCustomerModel', 'customer');
    $this->load->model('rent/RentTransactionModel', 'transaction');
  }
}
