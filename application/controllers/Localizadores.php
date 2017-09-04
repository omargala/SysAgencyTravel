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
	public function nuevo(){
		if ($_POST) {			
			$this->localizadoresModel->agregarLocalizador();
			$this->EstadosdecuentaModel->agregarEstadoCuenta();
			header("Location:".base_url()."Localizadores");
		}else{
			$this->load->view('head');
			$this->load->view('menu');
			$this->load->view('localizadores/nuevo');
			$this->load->view('footer');		
		}
	}
	public function editar(){
		if ($_POST) {
			$id = $this->input->post('id');
			$this->localizadoresModel->updateLocalizador($id);
			header("Location:".base_url()."Localizadores");
		}else{
			$id = $this->uri->segment(3);
			if (isset($id)) {
				$data['localizador'] = $this->localizadoresModel->getLocalizadorPorId($id);
				$this->load->view('head');
				$this->load->view('menu');
				$this->load->view('localizadores/editar',$data);
				$this->load->view('footer');
			}else{
				header("Location:".base_url()."Localizadores");
			}
		}
	}
}