<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {

	function __construct()
  {
    parent::__construct();
    $this->load->library('session'); 
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation'); 
  }
	public function index()
	{
		$this->load->view('head');
		$this->load->view('menu');
		$this->load->view('reportes/reportes');
		$this->load->view('footer');
	}
}