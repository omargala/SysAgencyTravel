<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Abonos extends CI_Controller {

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
		 $data = array(
		 	'abono'       => $this->input->post('abono'),
		 	'modopago'    => $this->input->post('modopago'),
		 	'abonadopor'  => strtoupper($this->input->post('abonadopor')),
		 	'recibidopor' => strtoupper($this->input->post('recibidopor')),
		 	'idedocta'    => $this->input->post('idedocta')
		 );
		 $this->abonosModel->agregarAbono($data);
		 $acumulado   = $this->estadosdecuentaModel->getTotalAbonado($this->input->post('idedocta'));
		 $totalabonos = $this->abonosModel->getTotalAbonos($this->input->post('idedocta'));
		 $this->estadosdecuentaModel->updateMontos($this->input->post('idedocta'),$acumulado,$totalabonos);

		 $response = array(
		 	'mensaje' => "ok"
		 );
		 echo json_encode($response);
	}
}