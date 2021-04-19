<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RentItemModel extends CI_Model {

  protected static $table_name = 'rent_items';
  protected static $trx = 'rent_transactions';

  protected static $type = [
    1   => "Bouncer",
    2   => "Playmat",
    3   => "Bike",
    99  => "Other",
  ];

  public function __construct() {
    parent::__construct();
    $this->load->database();
  }

  public function get_types() {
    return $this::$type;
  }

  public function get_type($item) {
    return $this::$type[$item->type];
  }

  public function insert($data) {
    $this->db->insert($this::$table_name, $data);
    return $this->db->insert_id();
  }

  public function update($id, $data) {
    return $this->db->where('id', $id)->update($this::$table_name, $data);
  }

  public function delete($id) {
    return $this->db->where('id', $id)->delete($this::$table_name);
  }

  public function detail($id) {
    return $this->db->where('id', $id)->get($this::$table_name)->row();
  }

  public function all() {
    return $this->db->get($this::$table_name)->result(); 
  }

  public function all_default_order() {
    return $this->db->order_by('type')->order_by('name')->get($this::$table_name)->result(); 
  }

  public function all_name_ordered() {
    return $this->db->order_by('name')->get($this::$table_name)->result();
  }

  public function total_transaction($item) {
    return $this->db->select("SUM(price) AS total_transaction")->where('item_id', $item->id)->get($this::$trx)->row()->total_transaction;
  }

  public function generate_type_items($items, $selected_item = null) {
    $type_items = [];
    foreach($items as $item) {
      if(!isset($type_items[$item->type])) $type_items[$item->type] = ['active' => false, 'content' => []];
      if($item->id == $selected_item) $type_items[$item->type]['active'] = true;
      array_push($type_items[$item->type]['content'], $item);
    }

    return $type_items;
  }
}
