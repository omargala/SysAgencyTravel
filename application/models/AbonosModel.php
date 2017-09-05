<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AbonosModel extends CI_Model {
	public $idabono;
	public $idedocta;
	public $abonadopor;
	public $recibidopor;
	public $montoabono;
	public $modopagoabono;
	public $cancelado;
	public $fechaabono;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	}

	function agregarAbono($data){
		$this->idedocta      = $data['idedocta'];
		$this->abonadopor    = $data['abonadopor'];
		$this->recibidopor   = $data['recibidopor'];
		$this->montoabono    = $data['abono'];
		$this->fechaabono    = date("Y-m-d");
		$this->modopagoabono = $data['modopago'];
		$this->cancelado     = 0;
		$this->db->insert("tbdetalleedocta",$this);
	}

	function cancelaAbono($id){
		/*$result = $this->getEstadosDeCuentaporId($id);
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
		print_r($this);
		$this->db->where("idedocta",(int) $id);
		$this->db->update("tbedocta",$this);*/
	}

	function listaAbonos(){
		$this->db->join('tbdetalleedocta','tbedocta.idedocta = tbdetalleedocta.idedocta');
		$query = $this->db->get('tbedocta');
		return $query->result();
	}

	function getAbonosporIdEdoCta($idedocta){	
		$this->db->join('tbedocta','tbdetalleedocta.idedocta = tbedocta.idedocta');
		$this->db->where('tbdetalleedocta.idedocta',(int) $idedocta);
		$query = $this->db->get('tbdetalleedocta');
		return $query;
	}
function getTotalAbonado($idedocta){
	$this->db->select_sum("montoabono");
	$this->db->where("idedocta",$idedocta);
	$acumulado = $this->db->get("tbdetalleedocta");
	return $acumulado;
}
function getTotalAbonos($idedocta){
	$this->db->select();
	$this->db->where("idedocta",$idedocta);
	$query = $this->db->get("tbdetalleedocta");
	$TotalAbonos = count($query->result());
	return $TotalAbonos;
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