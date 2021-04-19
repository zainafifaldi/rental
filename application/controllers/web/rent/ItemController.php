<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include APPPATH . "controllers/web/RentBaseController.php";

class ItemController extends RentBaseController {

  private static $title = "Haza Baby";
  private static $viewTemplate = "web/templates/rent/main";
  private static $viewFolder = "web/rent/item";

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $items = $this->item->all_default_order();
    $view_data = [
      'items'             => $items,
      'type_items'        => $this->item->generate_type_items($items, $this->input->get('content')),
      'types'             => $this->item->get_types(),
      'transactions'      => $this->get_transactions($items),
      'selected_content'  => $this->input->get('content'),
    ];
    $this->view('index', $view_data);
  }

  public function new() {
    $this->view('new');
  }

  public function create() {
    $item = $this->build_item();
    $item['created_at'] = date('Y-m-d H:i:s');
    $item_id = $this->item->insert($item);

    redirect('rent/items?content='.$item_id);
  }

  public function edit($id) {
    $view_data = [
      'item'  => $this->item->detail($id),
    ];
    $this->view('edit', $view_data);
  }

  public function update() {
    $item = $this->build_item();
    $this->item->update($this->input->post('id'), $item);

    redirect('rent/items?content='.$this->input->post('id'));
  }

  public function delete($id) {
    $this->item->delete($id);

    redirect('rent/items');
  }

  private function get_transactions($items) {
    $transactions = [];
    foreach($items as $item) {
      $transactions[$item->id] = $this->transaction->item_member($item->id);
    }

    return $transactions;
  }

  private function build_item() {
    return [
      'type'            => $this->input->post('type'),
      'name'            => $this->input->post('name'),
      'color'           => $this->input->post('color'),
      'buy_date'        => date('Y-m-d', strtotime($this->input->post('buy_date'))),
      'buy_price'       => $this->input->post('buy_price'),
      'rent_base_price' => $this->input->post('rent_base_price'),
      'updated_at'      => date('Y-m-d H:i:s'),
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
