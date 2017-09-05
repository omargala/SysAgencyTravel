<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estadosdecuenta extends CI_Controller {

	function __construct()
 {
   parent::__construct();
   $this->load->library('session'); 
   $this->load->helper(array('form', 'url'));
   $this->load->library('form_validation'); 
 }
	public function index()
	{
		$data['listaestadosdecuenta'] = $this->estadosdecuentaModel->listaEstadosdeCuenta();
		$this->load->view('head');
		$this->load->view('menu');
		$this->load->view('estadosdecuenta/estadosdecuenta',$data);
		$this->load->view('footer');
	}

	public function detalleEstadodeCuenta(){
		$idlocalizador = $this->uri->segment(3);
		$data['detallelocalizador']=$this->localizadoresModel->getLocalizadorDetallado($idlocalizador);
		$result = $this->estadosdecuentaModel->getIddoctaporIdLocalizador($idlocalizador);	
		foreach ($result->result() as $dato) {
			$idedocta = $dato->idedocta;
		}
		$data['listadeabonos']=$this->abonosModel->getAbonosporIdEdoCta($idedocta);
		if ($data['listadeabonos']->result()) {
			$this->load->view('head');
			$this->load->view('menu');
			$this->load->view('estadosdecuenta/estadodecuenta',$data);
			$this->load->view('footer');
		}else{
			$data['mensaje'] = " no se encontraró información de abonos";
			$this->load->view('head');
			$this->load->view('menu');
			$this->load->view('estadosdecuenta/estadodecuenta',$data);
			$this->load->view('footer');
		}
		
	}	
}