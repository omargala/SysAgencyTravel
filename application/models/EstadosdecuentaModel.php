<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EstadosdecuentaModel extends CI_Model {
	public $idedocta;
	public $idlocalizador;
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

	function actualizarMontos($idedocta){

	}

	function agregarEstadoCuenta($idlocalizador){
		$this->idlocalizador= $idlocalizador;
		$this->montooriginal= $_POST['tarifa'];
		$this->acumulado= 0;
		$this->fechacreacion= date("Y-m-d");
		$this->saldo= $_POST['tarifa'];
		$this->cantidadabonos= 0;
		$this->fechaultimoabono= "";
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

	function calculaNuevoSaldo($monto,$acumulado){
		$nuevosaldo = $monto-$acumulado;
		return $nuevosaldo;
	}

	function cancelaEstadoCuenta($idlocalizador){
		$result = $this->getEstadosDeCuentaporId($idlocalizador);
		foreach ($result as $dato) {
			$this->idlocalizador    = $dato->idlocalizador;
			$this->montooriginal    = $dato->montooriginal;
			$this->acumulado        = $dato->acumulado;
			$this->fechacreacion    = $dato->fechacreacion;
			$this->saldo            = $dato->saldo;
			$this->fechaultimoabono = $dato->fechaultimoabono;
			$this->cantidadabonos   = $dato->cantidadabonos;
			$this->cancelado        = 1;
			$this->pagado           = (int) $dato->pagado;
		}
		$this->db->where("idedocta",(int) $idlocalizador);
		$this->db->update("tbedocta",$this);
	}

	function getEstadosDeCuentaporId($id){
		$this->db->where('idedocta',(int) $id);
		$query = $this->db->get('tbedocta');
		return $query->result();
	}

	function getEstadosDeCuentaporIdlocalizador($idlocalizador){
		$this->db->where('idlocalizador',(int) $idlocalizador);
		$query = $this->db->get('tbedocta');
		return $query->result();
	}

	function getIddoctaporIdLocalizador($idlocalizador){
		$this->db->select("*");
		$this->db->where('idlocalizador', (int) $idlocalizador);
		$result = $this->db->get("tbedocta");

	
	}

	function listaEstadosdeCuenta(){
		$this->db->join('tblocalizadores','tbedocta.idlocalizador = tblocalizadores.idlocalizador');
		$query = $this->db->get('tbedocta');
		return $query->result();
	}

	function updateMontos($idedocta,$acumulado,$totalabonos){
		$result = $this->getAbonosporIdEdoCta($idedocta);
		foreach ($query as $dato) {
			$this->idlocalizador    = $dato->idlocalizador;
			$montooriginal          = $dato->montooriginal;
			$this->acumulado        = $acumulado;
			$this->fechacreacion    = $dato->fechacreacion;
			$this->fechaultimoabono = $dato->fechaultimoabono;
			$cantidadabonos   = $dato->cantidadabonos;
			$this->cancelado        = $dato->cancelado;
			$pagado          = (int) $dato->pagado;
		}
		$nuevosaldo = $montooriginal - $this->acumulado;  
		$this->montooriginal = $montooriginal;
		$this->saldo         = $nuevosaldo;
		if($nuevosaldo==0.00){
			$this->pagado = 1;
		}else{
			$this->pagado = (int) $pagado;
		}
		$this->cantidadabonos   = $totalabonos;
		$this->db->where("idedocta",(int) $idedocta);
	 $this->db->update("tbedocta",$this);	
	}

	function updateEstadodecuenta($idlocalizador){
		$result = $this->getEstadosDeCuentaporIdlocalizador($idlocalizador);
		foreach ($result as $dato) {
			$this->idlocalizador     = $dato->idlocalizador;
			$this->montooriginal     = $_POST['tarifa'];
			$this->acumulado         = $dato->acumulado;
			$this->fechacreacion     = $dato->fechacreacion;
			$this->saldo             = $this->calculaNuevoSaldo($this->montooriginal,$this->acumulado);
			$this->cantidadabonos    = $dato->cantidadabonos;
			$this->fechaultimoabono  = $dato->fechaultimoabono;
			$this->pagado            = (int) $dato->pagado;
		}
		if(isset($_POST['canceladoLocalizador'])){
			$this->cancelado  = (int) $_POST['canceladoLocalizador'];
		}else{
			$this->cancelado = 0;
		}
		$this->db->where("idlocalizador",(int) $idlocalizador);
	 $this->db->update("tbedocta",$this);	
	}

}
?>