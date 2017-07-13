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
			'fechacreacion'=> $data['fechacreacion']
		);				
		$this->db->insert('tblocalizadores',$data);
	}

	function insertEdoCta($data){
		$data = array(
			'cvelocalizador' => $data['localizador'], 
			'montooriginal' => $data['tarifa'],
			'fechacreacion' => $data['fechacreacion'],
		);
		$this->db->insert('tbedocta',$data);
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
		$this->db->where('idlocalizador',(int) $id);
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
			'statuspago'  => $result['statuspago'], 
			'cantidadabonos'  => $result['cantidadabonos'], 
			'fechaultimoabono'  => $dateUltimoAbono, 
			'statusedocta'  => $result['statusedocta'] 
		);
		$this->db->where('idedocta',$result['idedocta']);   
        $this->db->update('tbedocta',$data);
	}
}
?>