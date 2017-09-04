<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Abono extends CI_Controller {

	function __construct()
 {
   parent::__construct();
   $this->load->library('session'); 
   $this->load->helper(array('form', 'url'));
   $this->load->library('form_validation'); 
 }
/*public function index()
{

}*/

	public function nuevo(){
		if ($_POST) {
			$this->abonosModel->agregarAbono($id);
			header("Location:".base_url()."estadosdecuenta");
		}else{
			header("Location:".base_url()."estadosdecuenta");
		}
	}
}