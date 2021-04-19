<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RentTransactionModel extends CI_Model {

  protected static $table_name = 'rent_transactions';
  protected static $customer = 'rent_customers';

  protected static $status = [
    0 => "Dibooking",
    1 => "Disewa",
    2 => "Kembali"
  ];

  protected static $purpose = [
    'rent'   => "<i class='fa fa-arrow-up text-success'></i> Antar",
    'return' => "<i class='fa fa-arrow-down text-info'></i> Ambil",
  ];

  public function __construct() {
    parent::__construct();
    $this->load->database();

    // $this->db->query("SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");
  }

  public function get_status($transaction) {
    return $this::$status[$transaction->status];
  }

  public function get_statuses() {
    return $this::$status;
  }
  
  public function get_purpose_desc($transaction) {
    return $this::$purpose[$transaction->purpose];
  }

  public function get_current_status_alert($transaction) {
    if ($transaction->current_status == 0 && $transaction->status == 0) {
      return false;
    }
    else if ($transaction->current_status == 1 && $transaction->status != 2) {
      return false;
    }
    return true;
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

  public function item_member($item_id) {
    return $this->db->select("*")
      ->select("{$this::$table_name}.id")
      ->select("{$this::$customer}.name AS customer_name")
      ->select($this->rent_long_day_query())
      ->select($this->current_status_query())
      ->where("{$this::$table_name}.item_id", $item_id)
      ->join("{$this::$customer}", "{$this::$customer}.id={$this::$table_name}.customer_id")
      ->get($this::$table_name)
      ->result();
  }

  public function detail($id) {
    return $this->db->where('id', $id)->get($this::$table_name)->row();
  }

  public function timeline() {
    $rent_state = 1;
    $return_state = 2;

    return $this->db->query("
      SELECT *,
        union_{$this::$table_name}.id,
        {$this::$customer}.name AS customer_name,
        {$this->rent_long_day_query()},
        {$this->current_status_query()}
      FROM (
        SELECT *, start_date AS coming_date, 'rent' AS purpose FROM {$this::$table_name} WHERE DATE_ADD(start_date, INTERVAL 5 DAY) >= NOW()
        UNION
        SELECT *, start_date AS coming_date, 'rent' AS purpose FROM {$this::$table_name} WHERE start_date < NOW() AND status < {$rent_state}
        UNION
        SELECT *, end_date AS coming_date, 'return' AS purpose FROM {$this::$table_name} WHERE DATE_ADD(end_date, INTERVAL 5 DAY) >= NOW()
        UNION
        SELECT *, end_date AS coming_date, 'return' AS purpose FROM {$this::$table_name} WHERE end_date < NOW() AND status < {$return_state}
      ) union_{$this::$table_name}
      JOIN {$this::$customer} ON {$this::$customer}.id = union_{$this::$table_name}.customer_id
      ORDER BY coming_date ASC")->result();
  }

  public function rent_long_day_query() {
    return "DATEDIFF(end_date,start_date) AS rent_long_day";
  }

  public function current_status_query() {
    return "CASE WHEN NOW() < start_date THEN -1 WHEN NOW() >= start_date AND NOW() <= end_date THEN 0 WHEN NOW() > end_date THEN 1 END AS current_status";
  }
}
