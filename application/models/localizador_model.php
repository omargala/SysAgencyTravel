<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class localizador_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	}
	function getLocalizadores(){
		$query = $this->db->get('tblocalizadores');
		if ($query->num_rows()>0) return $query->result();
		return false;
	}
	function insertLocalizador($data){
		$data = array(
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
			'menores'=> $data['menores'],
			'status' => $data['status'],
			'fechacreacion'=> $data['fechacreacion']
		);				
		$this->db->insert('tblocalizadores',$data);
	}
	function insertEdoCta($data){
		$dataEdoCta = array(
			'cvelocalizador' => $data['localizador'],
			'montooriginal' => $data['tarifa'],
			'acumulado' => 0,
			'fechacreacion' => $data['fechacreacion'],
			'saldo' => 0,
			'cantidadabonos' => 0,
			'statusedocta' => $data['status']
		);
		$this->db->insert('tbedocta',$dataEdoCta);
	}
	function likeLocalizador($cvelocalizador){
		$this->db->select('idlocalizador,cvelocalizador,titular');
	    $this->db->like('cvelocalizador', $cvelocalizador);
		$query = $this->db->get('tblocalizadores');
		if ($query->num_rows()>0) return $query->result();
		return false;
	}
	function likeLocalizadoresRecientes(){
		$this->db->select('idlocalizador,cvelocalizador,titular');
		$this->db->order_by('fechacreacion','DESC');
		$this->db->limit(3);
		$query = $this->db->get('tblocalizadores');
		if ($query->num_rows()>0) return $query->result();
		return false;
	}
	function getClaves(){
		$this->db->select('idlocalizador,cvelocalizador,titular');
		$this->db->order_by('cvelocalizador');
		$query = $this->db->get('tblocalizadores');
		if ($query->num_rows()>0) return $query->result();
		return false;
	}
	function getTitulares(){
		$this->db->select('idlocalizador,titular');
		$this->db->order_by('titular');
		$query = $this->db->get('tblocalizadores');
		if ($query->num_rows()>0) return $query->result();
		return false;
	}
	function getLocalizadorPorId($id){
		$this->db->select("*");
		$this->db->from('tblocalizadores');		
		$this->db->join('tbedocta', 'tbedocta.cvelocalizador = tblocalizadores.cvelocalizador');
		$this->db->where('tblocalizadores.idlocalizador',(int) $id);
		$query = $this->db->get();
		if($query->num_rows()>0) return $query->result();
		return false;
	}
	function abonoById($idedocta){
		$this->db->select("*");
		$this->db->from("tbdetalleedocta");
		$this->db->where("idedocuenta",$idedocta);
		$this->db->order_by('fechaabono');
		$query = $this->db->get();
		if ($query->num_rows()>0) return $query->result();
		return false;
	}
	function abonosPagadosById($idedocta){
		$this->db->select("*");
		$this->db->from("tbdetalleedocta");
		$this->db->where("idedocuenta",$idedocta);
		$this->db->where("statusabono","P");
		$this->db->order_by('fechaabono');
		$query = $this->db->get();
		if ($query->num_rows()>0) return $query->result();
		return false;
	}
	function abonosCanceladosById($idedocta){
		$this->db->select("*");
		$this->db->from("tbdetalleedocta");
		$this->db->where("idedocuenta",$idedocta);
		$this->db->where("statusabono","C");
		$this->db->order_by('fechaabono');
		$query = $this->db->get();
		if ($query->num_rows()>0) return $query->result();
		return false;
	}
	function abonosTodosById($idedocta){
		$this->db->select("*");
		$this->db->from("tbdetalleedocta");
		$this->db->where("idedocuenta",$idedocta);
		$this->db->order_by('fechaabono');
		$query = $this->db->get();
		if ($query->num_rows()>0) return $query->result();
		return false;
	}
	function insertAbono($data){
		$this->db->insert('tbdetalleedocta',$data);
	}
	function getTotalPagado($idedocta){
		$this->db->select_sum('montoabono');
		$this->db->from('tbdetalleedocta');
		$this->db->where('idedocuenta',$idedocta);
		$query = $this->db->get();
		if($query->num_rows()>0) return $query->row()->montoabono;;
		return false;
	}
	function updateSaldoEnEdoCta($data){
		 $this->db->where('cvelocalizador',$data['cvelocalizador']);   
         $this->db->update('tbedocta',$data);
	}
	function updateAcumuladoEnEdoCta($data){
		 $this->db->where('cvelocalizador',$data['cvelocalizador']);   
         $this->db->update('tbedocta',$data);
	}
	function getEdoCuentaPorId($idedocta){
		$this->db->select('*');
		$this->db->from('tbedocta');
		$this->db->where('idedocta',$idedocta);
		$query = $this->db->get();
		if($query->num_rows()>0) return $query->result();
		return false;
	}
	function updateFechaUltimoAbonoTBEdoCta($result){
		$dateUltimoAbono = date("Y-m-d");
		$data = array(
			'cvelocalizador' => $result['cvelocalizador'], 
			'montooriginal'  => $result['montooriginal'], 
			'acumulado' => $result['acumulado'],
			'fechacreacion'  => $result['fechacreacion'], 
			'saldo'  => $result['saldo'], 
			'cantidadabonos'  => $result['cantidadabonos'], 
			'fechaultimoabono'  => $dateUltimoAbono, 
			'statusedocta'  => $result['statusedocta'] 
		);
		$this->db->where('idedocta',$result['idedocta']);   
        $this->db->update('tbedocta',$data);
	}
	function getAllLocalizadores(){
		$this->db->select("*");
		$this->db->from("tblocalizadores");
		$query = $this->db->get();
		if ($query->num_rows()>0) return $query->result();
		return false;
	}
	function getIdLocalizadorCve($data){
		$this->db->select("idlocalizador");
		$this->db->from("tblocalizadores");
		$this->db->where("cvelocalizador",$data['cvelocalizador']);
		$query = $this->db->get();
		if ($query->num_rows()>0) return $query->result();
		return false;
	}
	function getAbonoPorId($idabono){
		$this->db->select('*');
		$this->db->from('tbdetalleedocta');
		$this->db->where('idabono',$idabono);
		$query = $this->db->get();
		if($query->num_rows()>0) return $query->result();
		return false;
	}
	function updateAbono($data){
		$this->db->where("idabono",$data['idabono']);
		$this->db->update("tbdetalleedocta",$data);
	}
	function updateLocalizador($data){
		$dataUpdateLocalizadores = array (
			'cvelocalizador'  => $data['cvelocalizador'],
			'titular'  => $data['titular'],
			'ttoo'  => $data['ttoo'],
			'otroespecificacion'  => $data['otroespecificacion'],
			'tarifapublica'  => $data['tarifapublica'],
			'fechain'  => $data['fechain'],
			'fechaout'  => $data['fechaout'],
			'servicio'  => $data['servicio'],
			'planalimentos' =>  $data['planalimentos'],
			'tipotarifa'  => $data['tipotarifa'],
			'numhabs'  => $data['numhabs'],
			'adultos'  => $data['adultos'],
			'menores'  => $data['menores'],
			'status'  => $data['status'],
			'fechacreacion' => $data['fechacreacion']		
		);
		$dataUpdateEdoCuenta = array (
			'cvelocalizador'  => $data['cvelocalizador'],
			'montooriginal'  => $data['montooriginal'],
			'acumulado'  => $data['acumulado'],
			'fechacreacion'  => $data['fechacreacion'],
			'saldo'  => $data['saldo'],
			'cantidadabonos'  => $data['cantidadabonos'],
			'fechaultimoabono'  => $data['fechaultimoabono'],
			'statusedocta'  => $data['statusedocta']
		);
		$this->db->where("cvelocalizador",$data['cvelocalizador']);
		$this->db->update("tblocalizadores",$dataUpdateLocalizadores);
		$this->db->where("cvelocalizador",$data['cvelocalizador']);
		$this->db->update("tbedocta",$dataUpdateEdoCuenta);
	}
	function getDatosxId($id){
		$this->db->select("*");
		$this->db->from("tblocalizadores");
		$this->db->join("tbedocta","tbedocta.cvelocalizador=tblocalizadores.cvelocalizador");
		$this->db->where("tblocalizadores.idlocalizador",(int)$id);
		$query = $this->db->get();
		if($query->num_rows() > 0) return $query->result();
		return false;
	}
	function cancelaDatosxId($data){
		$dataUpdateLocalizadores = array (
			'cvelocalizador'  => $data['cvelocalizador'],
			'titular'  => $data['titular'],
			'ttoo'  => $data['ttoo'],
			'otroespecificacion'  => $data['otroespecificacion'],
			'tarifapublica'  => $data['tarifapublica'],
			'fechain'  => $data['fechain'],
			'fechaout'  => $data['fechaout'],
			'servicio'  => $data['servicio'],
			'planalimentos' =>  $data['planalimentos'],
			'tipotarifa'  => $data['tipotarifa'],
			'numhabs'  => $data['numhabs'],
			'adultos'  => $data['adultos'],
			'menores'  => $data['menores'],
			'status'  => $data['status'],
			'fechacreacion' => $data['fechacreacion']		
		);
		$dataUpdateEdoCuenta = array (
			'cvelocalizador'  => $data['cvelocalizador'],
			'montooriginal'  => $data['montooriginal'],
			'acumulado'  => $data['acumulado'],
			'fechacreacion'  => $data['fechacreacion'],
			'saldo'  => $data['saldo'],
			'cantidadabonos'  => $data['cantidadabonos'],
			'fechaultimoabono'  => $data['fechaultimoabono'],
			'statusedocta'  => $data['statusedocta']
		);
		$this->db->where("cvelocalizador",$data['cvelocalizador']);
		$this->db->update("tblocalizadores",$dataUpdateLocalizadores);
		$this->db->where("cvelocalizador",$data['cvelocalizador']);
		$this->db->update("tbedocta",$dataUpdateEdoCuenta);
		
	}
}
?>
