<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RentCustomerModel extends CI_Model {

  protected static $table_name = 'rent_customers';

  public function __construct() {
    parent::__construct();
    $this->load->database();
  }

  public function insert($data) {
    $this->db->insert($this::$table_name, $data);
    return $this->db->insert_id();
  }

  public function update($id, $data) {
    return $this->db->where('id', $id)->update($this::$table_name, $data);
  }

  public function all() {
    return $this->db->get($this::$table_name)->result(); 
  }

  public function all_name_ordered() {
    return $this->db->order_by('name')->get($this::$table_name)->result();
  }
}
