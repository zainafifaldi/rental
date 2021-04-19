<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include APPPATH . "controllers/web/RentBaseController.php";

class TransactionController extends RentBaseController {

  private static $title = "Haza Baby";
  private static $viewTemplate = "web/templates/rent/main";
  private static $viewFolder = "web/rent/transaction";

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $view_data = [

    ];
    $this->view('index', $view_data);
  }

  public function new() {
    $repeat_form = ($this->input->get('repeat') == 'true') ? 1 : NULL;

    $view_data = [
      'customers'   => $this->customer->all_name_ordered(),
      'items'       => $this->item->all_name_ordered(),
      'repeat_form' => $repeat_form,
    ];
    $this->view('new', $view_data);
  }

  public function edit($id) {
    $view_data = [
      'customers'   => $this->customer->all_name_ordered(),
      'items'       => $this->item->all_name_ordered(),
      'transaction' => $this->transaction->detail($id),
    ];
    $this->view('edit', $view_data);
  }

  public function create() {
    $customer_id = $this->set_customer();

    $transaction = $this->build_transaction($customer_id);
    $transaction['created_at'] = date('Y-m-d H:i:s');
    $this->transaction->insert($transaction);

    $redirect_url = "rent/transactions";
    // $redirect_url = "rent/items?content={$transaction['item_id']}";
    if ($this->input->get('repeat')) {
      if ($this->input->get('quick')) {
        $redirect_url = 'rent/transactions/new/quick?repeat=true';
      }
      else {
        $redirect_url = 'rent/transactions/new?repeat=true';
      }
    }

    redirect($redirect_url);
  }

  public function update() {
    $customer_id = $this->set_customer();

    $transaction = $this->build_transaction($customer_id);
    $this->transaction->update($this->input->post('id'), $transaction);

    redirect('rent/items?content='.$transaction['item_id']);
  }

  public function update_status($id, $item_id, $status, $source) {
    $transaction = [
      'status'      => $status,
      'updated_at'  => date('Y-m-d H:i:s'),
    ];
    $this->transaction->update($id, $transaction);

    if($source == 1) redirect('rent/items?content='.$item_id);
    else if($source == 2) redirect('rent/transactions/timeline');
  }

  public function delete($id, $item_id, $source) {
    $this->transaction->delete($id);

    if($source == 1) redirect('rent/items?content='.$item_id);
    else if($source == 2) redirect('rent/transactions/timeline');
  }

  /** JSON */

  public function _list($item_id) {

  }

  private function set_customer() {
    $customer_id = $this->input->post('customer');
    if (!$customer_id) {
      $customer = [
        'name'        => $this->input->post('customer_name'),
        'address'     => $this->input->post('customer_address'),
        'created_at'  => date('Y-m-d H:i:s'),
        'updated_at'  => date('Y-m-d H:i:s'),
      ];
      $customer_id = $this->customer->insert($customer);
    }
    return $customer_id;
  }

  private function build_transaction($customer_id) {
    return [
      'customer_id'   => $customer_id,
      'item_id'       => $this->input->post('item'),
      'item_type'     => $this->input->post('item_type'),
      'price'         => $this->input->post('price'),
      'shipping_fee'  => $this->input->post('shipping_fee'),
      'payment'       => $this->input->post('payment'),
      'transfer_plan' => $this->input->post('transfer_plan'),
      'cash_plan'     => $this->input->post('cash_plan'),
      'book_date'     => date('Y-m-d', strtotime($this->input->post('book_date'))),
      'start_date'    => date('Y-m-d', strtotime($this->input->post('start_date'))),
      'end_date'      => date('Y-m-d', strtotime($this->input->post('end_date'))),
      'notes'         => $this->input->post('notes'),
      'status'        => $this->input->post('status'),
      'updated_at'    => date('Y-m-d H:i:s'),
    ];
  }

  private function view($view, $data = []) {
    $default_data = [
      'title' => $this::$title,
      'view'  => $this::$viewFolder . '/' . $view,
    ];
    $data = array_merge($default_data, $data);
    $this->load->view($this::$viewTemplate, $data);
  }
}
