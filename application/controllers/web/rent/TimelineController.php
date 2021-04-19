<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include APPPATH . "controllers/web/RentBaseController.php";

class TimelineController extends RentBaseController {

  private static $title = "Haza Baby";
  private static $viewTemplate = "web/templates/rent/main";
  private static $viewFolder = "web/rent/timeline";

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $view_data = [
      'timeline'  => $this->transaction->timeline(),
    ];
    $this->view('index', $view_data);
  }

  public function calendar() {
    $view_data = [
      'timeline'  => $this->transaction->timeline(),
    ];
    $this->view('calendar', $view_data);
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
