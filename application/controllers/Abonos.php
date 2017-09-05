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
	public function index()
	{
		$data['listaabonos'] = $this->abonosModel->listaAbonos();
		$this->load->view('head');
		$this->load->view('menu');
		$this->load->view('abonos/abonos',$data);
		$this->load->view('footer');
	}

	public function cancelar(){
		$idabono = $this->uri->segment(3);
		$idedocta = $this->uri->segment(4);
		if(isset($idabono)){
			$this->abonosModel->cancelaAbono($idabono);			
			$acumulado   = $this->abonosModel->getTotalAbonado($idedocta);
		    $totalabonos = $this->abonosModel->getTotalAbonos($idedocta);
			$this->estadosdecuentaModel->updateMontos($idedocta,$acumulado,$totalabonos);
			header("Location:".base_url()."estadosdecuenta/detalleEstadodeCuenta/".$idedocta);
		}else{
			header("Location:".base_url()."estadosdecuenta/detalleEstadodeCuenta/".$idedocta);
		}
	}

	public function editar(){
		if($_POST){
			$this->abonosModel->updateAbono();
			$idedocta = $_POST['idedocta'];
			$acumulado   = $this->abonosModel->getTotalAbonado($this->input->post('idedocta'));
		    $totalabonos = $this->abonosModel->getTotalAbonos($this->input->post('idedocta'));
			$this->estadosdecuentaModel->updateMontos($idedocta,$acumulado,$totalabonos);
			header("Location:".base_url()."estadosdecuenta/detalleEstadodeCuenta/".$idedocta);
		}else{
			$idabono = $this->uri->segment(3);
			$idedocta = $this->uri->segment(4);
			if(isset($idabono)){
				$data["abono"] = $this->abonosModel->getAbonoporId($idabono);
				if($data["abono"]->result()){
					$this->load->view('head');
					$this->load->view('menu');
					$this->load->view('abonos/editar',$data);
					$this->load->view('footer');
				}else{
					header("Location:".baser_url()."estadosdecuenta/detalleEstadodeCuenta/".$idedocta);
				}
				
			}else{
				header("Location:".baser_url()."estadosdecuenta/detalleEstadodeCuenta/".$idedocta);
			}
		}
	}

	public function nuevo(){
		 $data = array(
		 	'abono'       => $this->input->post('abono'),
		 	'modopago'    => $this->input->post('modopago'),
		 	'abonadopor'  => strtoupper($this->input->post('abonadopor')),
		 	'recibidopor' => strtoupper($this->input->post('recibidopor')),
		 	'idedocta'    => $this->input->post('idedocta')
		 );

		 $this->abonosModel->agregarAbono($data);
		 $acumulado   = $this->abonosModel->getTotalAbonado($this->input->post('idedocta'));
		 $totalabonos = $this->abonosModel->getTotalAbonos($this->input->post('idedocta'));
		 $this->estadosdecuentaModel->updateMontos($this->input->post('idedocta'),$acumulado,$totalabonos);
		
		 $response = array(
		 	'mensaje'=>"ok",
		 	'acumulado' => $acumulado,
		 	'total' => $totalabonos
		 );
		 echo json_encode($response);
	}

	public function ver(){
		$idabono = $this->uri->segment(3);
		$idedocta = $this->uri->segment(4);
		if(isset($idabono)){
			$data['datos'] = $this->abonosModel->getAbonoporId($idabono);
			$this->load->view('head');
			$this->load->view('menu');
			$this->load->view('abonos/ver',$data);
			$this->load->view('footer');			
		}else{
				if(isset($idedocta)){
					header("Location:".base_url()."estadosdecuenta/detalleEstadodeCuenta/".$idedocta);
				}else{
					header("Location:".base_url()."abonos");
				}
				
		}
		
	}

}