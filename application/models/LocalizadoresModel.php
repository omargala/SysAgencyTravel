<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class LocalizadoresModel extends CI_Model {
	public $cvelocalizador;
	public $ttoo;
	public $otroespecificacion;
	public $servicio;
	public $tipotarifa;
	public $numhabs;
	public $titular;
	public $tarifapublica;
	public $fechain;
	public $fechaout;
	public $planalimentos;
	public $adultos;
	public $menores;
	public $cancelado;
	public $fechacreacion;
	public $pagado;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	function agregarLocalizador(){
		$this->cvelocalizador= $_POST['cvelocalizador'];
		$this->ttoo  			     = strtoupper($_POST['ttoo']);
		$this->otroespecificacion = strtoupper($_POST['otro']);
		$this->servicio  			 = strtoupper($_POST['servicio']);
		$this->tipotarifa  		= strtoupper($_POST['tipotarifa']);
		$this->numhabs  			  = $_POST['numhabs'];
		$this->titular  			  = strtoupper($_POST['titular']);
		$this->tarifapublica  			   = $_POST['tarifa'];
		$this->fechain  			  = $_POST['fechain'];
		$this->fechaout  			 = $_POST['fechaout'];
		$this->planalimentos = strtoupper( $_POST['planalimentos']);
		$this->adultos  			  = $_POST['adultos'];
		$this->menores  			  = $_POST['menores'];
		$this->cancelado     = 0;
		$this->pagado        = 0;
		$this->fechacreacion = date("Y-m-d");
		if($this->db->insert("tblocalizadores",$this)){
			if($this->db->affected_rows()){
				return true;
			}else{
				return false;
			}
		};
	}

	function cancelaLocalizador($id){
		$result = $this->getLocalizadorPorId($id);
		foreach ($result as $dato) {
			$this->cvelocalizador= $dato->cvelocalizador;   
			$this->ttoo  			     = $dato->ttoo;
			$this->otroespecificacion = $dato->otroespecificacion;
			$this->servicio  			 = $dato->servicio;
			$this->tipotarifa  		= $dato->tipotarifa;
			$this->numhabs  			  = $dato->numhabs;
			$this->titular  			  = $dato->titular;
			$this->tarifapublica = $dato->tarifapublica;
			$this->fechain  			  = $dato->fechain;
			$this->fechaout  			 = $dato->fechaout;
			$this->planalimentos = $dato->planalimentos;
			$this->adultos  			  = $dato->adultos;
			$this->menores  			  = $dato->menores;
			$this->pagado        = (int) $dato->pagado;
			$this->fechacreacion = $dato->fechacreacion;
			$this->cancelado     = 1;
		}
		$this->db->where("idlocalizador",(int) $id);
		$this->db->update("tblocalizadores",$this);
	}
	
	function getLocalizadorDetallado($idlocalizador){		
		$this->db->join('tbedocta','tbedocta.idlocalizador = tblocalizadores.idlocalizador');
		$this->db->where('tblocalizadores.idlocalizador',(int) $idlocalizador);
		$query = $this->db->get('tblocalizadores');
		return $query->result();
	}

	function getLocalizadorPorId($idlocalizador){
		$this->db->where('idlocalizador',(int) $idlocalizador);
		$query = $this->db->get('tblocalizadores');
		return $query->result();
	}
	
	function getUltimoLocalizador(){
			$this->db->select_max('idlocalizador');
			$result = $this->db->get('tblocalizadores');
			foreach ($result->result() as $r) {
					$id = $r->idlocalizador;
			}
			return($id);
	}
	
	function listaLocalizadores(){
		$query = $this->db->get("tblocalizadores");
		if($query->num_rows()>0) return $query->result();
		return false;
	}

	function updateLocalizador($idlocalizador){
		$this->cvelocalizador= $_POST['cvelocalizador'];
		$this->ttoo  			     = strtoupper($_POST['ttoo']);
		$this->otroespecificacion = strtoupper($_POST['otro']);
		$this->servicio  			 = strtoupper($_POST['servicio']);
		$this->tipotarifa  		= strtoupper($_POST['tipotarifa']);
		$this->numhabs  			  = $_POST['numhabs'];
		$this->titular  			  = strtoupper($_POST['titular']);
		$this->tarifapublica  			   = $_POST['tarifa'];
		$this->fechain  			  = $_POST['fechain'];
		$this->fechaout  			 = $_POST['fechaout'];
		$this->planalimentos = strtoupper( $_POST['planalimentos']);
		$this->adultos  			  = $_POST['adultos'];
		$this->menores  			  = $_POST['menores'];
		$result = $this->getLocalizadorPorId($idlocalizador);
		if(isset($_POST['canceladoLocalizador'])){
			$this->cancelado = (int) $_POST['canceladoLocalizador'];
		}else{
			$this->cancelado = 0;
		}			
		
		foreach ($result as $dato) {
			$this->pagado          = (int) $dato->pagado;
			$this->fechacreacion   = $dato->fechacreacion;
		}
		$this->db->where("idlocalizador",(int) $idlocalizador);
		$this->db->update("tblocalizadores",$this);
	}

}
?>
