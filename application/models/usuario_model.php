<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class usuario_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	}
	function getUsuarios(){
		$query = $this->db->get('usuario');
		if ($query->num_rows()>0) return $query->result();
		return false;
	}
	function insertUsuario($data){

		$this->db->insert('usuario',$data);
		return true;
	}
	function insertLocalizador($data){
		$dat = array(
			'cvelocalizador'=> $data['localizador'],
			'titular'=> $data['titular'],
			'ttoo'=> $data['ttoo'],
			'otroespecificacion'=> $data['otro'],
			'tarifapublica'=> $data['tarifa'],
			'fechain'=> $data['fechain'],
			'fechaout'=> $data['fechaout'],
			'servicio'=> $data['servicio'],
			'planalimentos'=> $data['planalimentos'],
			'tipotarifa'=> $data['tipotarifa'],
			'numhabs'=> $data['numhabs'],
			'adultos'=> $data['adultos'],
			'menores'=> $data['menores']
		);
		$this->db->insert('tblocalizadores',$dat);
	}
}
?>