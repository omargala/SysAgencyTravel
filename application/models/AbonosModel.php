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
		$result = $this->getAbonoporId($id);
		foreach ($result->result() as $dato) {
			$this->idabono       = $dato->idabono;
			$this->idedocta      = $dato->idedocta;
			$this->abonadopor    = $dato->abonadopor;
			$this->recibidopor   = $dato->recibidopor;
			$this->montoabono    = $dato->montoabono;
			$this->fechaabono    = $dato->fechaabono;
			$this->modopagoabono = $dato->modopagoabono;
			$this->cancelado     = 1;
		}
		$this->db->where("idabono",(int) $id);
		$this->db->update("tbdetalleedocta",$this);
	}

	function listaAbonos(){
		$this->db->join('tbdetalleedocta','tbedocta.idedocta = tbdetalleedocta.idedocta');
		$this->db->join('tblocalizadores','tbedocta.idlocalizador = tblocalizadores.idlocalizador');
		$query = $this->db->get('tbedocta');
		return $query->result();
	}
 function getAbonoporId($idabono){
 	$this->db->where('idabono',$idabono);
		$query = $this->db->get('tbdetalleedocta');
		return $query;
 }
	function getAbonosporIdEdoCta($idedocta){		
		$this->db->where('idedocta',(int)$idedocta);
		$query = $this->db->get('tbdetalleedocta');
		return $query;
	}
function getTotalAbonado($idedocta){
	$this->db->select_sum("montoabono");
	$this->db->where("idedocta",$idedocta);
	$this->db->where("cancelado",0);
	$query = $this->db->get("tbdetalleedocta");
	return $query->row()->montoabono;
}
function getTotalAbonos($idedocta){
	$this->db->select();
	$this->db->where("idedocta",$idedocta);
	$this->db->where("cancelado",0);
	$query = $this->db->get("tbdetalleedocta");
	$TotalAbonos = count($query->result());
	return $TotalAbonos;
}
function updateAbono(){
		$this->idabono      = $_POST['idabono'];
		$this->idedocta      = $_POST['idedocta'];
		$this->abonadopor    = strtoupper($_POST['abonadopor']);
		$this->recibidopor   = strtoupper($_POST['recibidopor']);
		$this->montoabono    = $_POST['montoabono'];
		$this->fechaabono    = $_POST['fechaabono'];
		$this->modopagoabono = $_POST['modopagoabono'];
		if(isset($_POST['cancelado'])){
			$this->cancelado    = (int) $_POST['cancelado'];
		}else{
			$this->cancelado    = 0;
		}
		$this->db->where("idabono",$this->idabono);
		$this->db->update("tbdetalleedocta",$this);
}

}
?>