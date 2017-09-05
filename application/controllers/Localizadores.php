<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Localizadores extends CI_Controller {

	function __construct()
 {
  	parent::__construct();
   $this->load->helper(array('form', 'url'));
   $this->load->library('form_validation'); 
 }
	public function index()
	{
		$data['listalocalizadores'] = $this->localizadoresModel->listaLocalizadores();
		$this->load->view('head');
		$this->load->view('menu');
		$this->load->view('localizadores/localizadores',$data);
		$this->load->view('footer');		
	}

	public function cancelar(){
		$idlocalizador = $this->uri->segment(3);
		$this->localizadoresModel->cancelaLocalizador($idlocalizador);
		$this->estadosdecuentaModel->cancelaEstadoCuenta($idlocalizador);
		header("Location:".base_url()."Localizadores");
	}

	public function editar(){
		if ($_POST) {
			$idlocalizador = $this->input->post('id');
			$this->localizadoresModel->updateLocalizador($idlocalizador);
			$this->estadosdecuentaModel->updateEstadodecuenta($idlocalizador);
			header("Location:".base_url()."Localizadores");
		}else{
			$idlocalizador = $this->uri->segment(3);
			if (isset($idlocalizador)) {
				$data['localizador'] = $this->localizadoresModel->getLocalizadorPorId($idlocalizador);
				$this->load->view('head');
				$this->load->view('menu');
				$this->load->view('localizadores/editar',$data);
				$this->load->view('footer');
			}else{
				header("Location:".base_url()."Localizadores");
			}
		}
	}

	public function nuevo(){
		if ($_POST) {			
			$this->localizadoresModel->agregarLocalizador();
			$idlocalizador = $this->localizadoresModel->getUltimoLocalizador();
			$this->estadosdecuentaModel->agregarEstadoCuenta($idlocalizador);
			header("Location:".base_url()."Localizadores");
		}else{
			$this->load->view('head');
			$this->load->view('menu');
			$this->load->view('localizadores/nuevo');
			$this->load->view('footer');
		}
	}
	
	public function ver(){		
			$idlocalizador = $this->uri->segment(3);
			if (isset($idlocalizador)) {
				$data['localizador'] = $this->localizadoresModel->getLocalizadorDetallado($idlocalizador);
				$this->load->view('head');
				$this->load->view('menu');
				$this->load->view('localizadores/ver',$data);
				$this->load->view('footer');
			}else{
				header("Location:".base_url()."Localizadores");
			}
		}
}