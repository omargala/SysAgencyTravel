<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EstadosdecuentaModel extends CI_Model {
	public $cvelocalizador;
	public $montooriginal;
	public $acumulado;
	public $fechacreacion;
	public $saldo;
	public $cantidadabonos;
	public $fechaultimoabono;
	public $cancelado;
	public $pagado;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	}
	function agregarEstadoCuenta(){
		$this->cvelocalizador= $_POST['cvelocalizador'];
		$this->montooriginal= $_POST['tarifa'];
		$this->acumulado= 0;
		$this->fechacreacion= date("Y-m-d");;
		$this->saldo= $_POST['tarifa'];
		$this->cantidadabonos= 0;
		$this->cancelado=0;
		$this->pagado=0;
		if($this->db->insert("tbedocta",$this)){
			if($this->db->affected_rows()){
				return true;
			}else{
				return false;
			}
		};
	}
}
?>