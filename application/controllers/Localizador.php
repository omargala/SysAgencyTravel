<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Localizador extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->library('session'); 
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation'); 
    }
	public function index()
	{
		$this->load->view('head');
		$this->load->view('menu');
		$this->load->view('templates/localizador/opcioneslocalizador');
		$this->load->view('footer');
	}
	public function altaLocalizador()
	{
		$this->load->model('localizador_model');
		$data['recientes'] = $this->localizador_model->likeLocalizadoresRecientes();
		$this->load->view('templates/localizador/altaLocalizador',$data);
	}
	public function listaLocalizadores()
	{	
		$this->load->model('localizador_model');
		$data['todoslocalizadores'] = $this->localizador_model->getLocalizadores();
		$this->load->view('templates/localizador/listalocalizadores',$data);	
	}
	public function registroDatos(){
		$this->load->model('localizador_model');
		$existe = $this->localizador_model->likeLocalizador($this->input->post('localizador'));
		if ($existe) {
			echo json_encode($existe);
		}else{
			// se puede dar de alta
			$status = "A"; // Cuando se da de alta su status será A = Aplicado
			$fechacreacion = date("Y-m-d");
			$data = array(
				'localizador' => $this->input->post('localizador'), 
				'ttoo' => strtoupper($this->input->post('ttoo')), 
				'otro' => strtoupper($this->input->post('otro')), 
				'servicio' => strtoupper($this->input->post('servicio')), 
				'tipotarifa' => strtoupper($this->input->post('tipotarifa')), 
				'numhabs' => $this->input->post('numhabs'), 
				'titular' => strtoupper($this->input->post('titular')), 
				'tarifa' => strtoupper($this->input->post('tarifa')), 
				'fechain' => $this->input->post('fechain'), 
				'fechaout' => $this->input->post('fechaout'), 
				'planalimentos' => strtoupper($this->input->post('planalimentos')), 
				'adultos' => $this->input->post('adultos'), 
				'menores' => $this->input->post('menores'),
				'status' => $status,
				'fechacreacion' => $fechacreacion
			);
			$this->localizador_model->insertLocalizador($data);	
			$this->localizador_model->insertEdoCta($data);
			$data2 = array (
				'mensaje' => "OK"
			);
			echo json_encode($data2);
		}			
	}
	public function pagosAbonos(){
		$this->load->view('templates/localizador/pagosyabonos');
	}
	public function edoCuenta(){
		$data['idLocalizadorFiltro'] = $this->uri->segment(3);
		$this->load->model('localizador_model');
		$data['cvelocalizadores'] = $this->localizador_model->getClaves();
		$data['titulares'] = $this->localizador_model->getTitulares();
		$this->load->view('templates/localizador/estadodecuenta',$data);
	}
	public function consultas(){
		$option = $this->input->post('option');	
		switch ($option) {					
			case 1:  //getTotalPagado		
					$idedocta = $this->input->post('id');			
					$this->load->model('localizador_model');
					$totalPagado = $this->localizador_model->getTotalPagado($idedocta);
					$tp = array(
						'totalpagado' => $totalPagado 
					);
					echo json_encode($tp);
				break;
			case 2:
					$idabono = $this->input->post('id');			
					$this->load->model('localizador_model');
					$data = $this->localizador_model->getAbonoPorId($idabono);
					echo json_encode($data);
				break;
			default:
				# code...
				break;
		}
	}
	public function cancelaAbono(){
		$idabono = $this->input->post('id');
		$this->load->model('localizador_model');
		$data['abonosxid'] = $this->localizador_model->getAbonoPorId($idabono);
		foreach ($data['abonosxid']  as $key => $data) {
			$result = array(
				'idabono'       => $data->idabono,
				'idedocuenta'   => $data->idedocuenta,
				'abonadopor'    => $data->abonadopor,
				'recibidopor'   => $data->recibidopor,
				'montoabono'    => $data->montoabono,
				'fechaabono'    => $data->fechaabono,
				'modopagoabono' => $data->modopagoabono,
				'statusabono'   => "C"
			);
		}
		
		$this->localizador_model->cancelaAbono($result);
		$response = array(
			'mensaje' => "ok => abono cancelado"
		);
		echo json_encode($response);
	}
	public function buscar(){
		$tipo=$this->input->post('tipo');
		$id=$this->input->post('id');
		$this->load->model('localizador_model');
		switch ($tipo) {
			case 1:
				$data = $this->localizador_model->getLocalizadorPorId($id);
				echo json_encode($data);
				break;			
			default:
				# code...
				break;
		}
	}
	public function getAbonosPagados(){
		$this->load->model('localizador_model');
		$data= $this->localizador_model->abonosPagadosById($this->input->post('idedocta'));
		echo json_encode($data);
	}
	public function getAbonosCancelados(){
		$this->load->model('localizador_model');
		$data= $this->localizador_model->abonosCanceladosById($this->input->post('idedocta'));
		echo json_encode($data);
	}
	public function getAbonosTodos(){
		$this->load->model('localizador_model');
		$data= $this->localizador_model->abonosTodosById($this->input->post('idedocta'));
		echo json_encode($data);
	}
	public function registraAbono(){
		$fechaabono = date("Y-m-d");
		$statusabono = "P";
		$idEdoCta = $this->input->post('estadodecuenta');
		$data = array(
			'idedocuenta'   => $idEdoCta,
			'abonadopor'    => $this->input->post('abonadopor'),
			'recibidopor'   => $this->input->post('recibidopor'),
			'montoabono'    => $this->input->post('abono'),
			'fechaabono'    => $fechaabono,
			'modopagoabono' => $this->input->post('modopago'),
			'statusabono'   => $statusabono 
		);
		$this->load->model('localizador_model');
		$this->localizador_model->insertAbono($data);
		$consulta = $this->localizador_model->getEdoCuentaPorId($idEdoCta);
		foreach ($consulta as $key => $value) {
			$result = array(
				'idedocta' => $value->idedocta,
				'cvelocalizador' => $value->cvelocalizador, 
				'montooriginal'  => $value->montooriginal, 
				'acumulado' => $value->acumulado, 
				'fechacreacion'  => $value->fechacreacion, 
				'saldo'  => $value->saldo, 
				'cantidadabonos'  => $value->cantidadabonos, 
				'fechaultimoabono'  => $value->fechaultimoabono, 
				'statusedocta'  => $statusabono
			);
		}
		$this->localizador_model->updateFechaUltimoAbonoTBEdoCta($result);
		$data2 = array(
			'mensaje' => "hecho"
		);
		echo json_encode($data2);
	}
	public function updateAcumulado(){
		$this->load->model('localizador_model');
		$idedocta = $this->input->post('idedocta');
		$acumulado = $this->input->post('acumulado');
		$result = $this->localizador_model->getEdoCuentaPorId($idedocta);
		foreach ($result as $key => $value) {
			$data = array(
				'cvelocalizador' => $value->cvelocalizador, 
				'montooriginal'  => $value->montooriginal, 
				'acumulado' => $acumulado,
				'fechacreacion'  => $value->fechacreacion, 
				'saldo'  => $value->saldo, 
				'cantidadabonos'  => $value->cantidadabonos, 
				'fechaultimoabono'  => $value->fechaultimoabono, 
				'statusedocta'  => $value->statusedocta 
			);
		}
		$this->localizador_model->updateAcumuladoEnEdoCta($data);
		echo json_encode($data);
	}
	public function updateSaldo(){
		$this->load->model('localizador_model');
		$idedocta = $this->input->post('idedocta');
		$saldo = $this->input->post('saldo');
		
		$result = $this->localizador_model->getEdoCuentaPorId($idedocta);
		foreach ($result as $key => $value) {
			$data = array(
				'cvelocalizador' => $value->cvelocalizador, 
				'montooriginal'  => $value->montooriginal, 
				'acumulado' => $value->acumulado,
				'fechacreacion'  => $value->fechacreacion, 
				'saldo'  => $saldo,
				'cantidadabonos'  => $value->cantidadabonos, 
				'fechaultimoabono'  => $value->fechaultimoabono, 
				'statusedocta'  => $value->statusedocta 
			);
		}
		
		$this->localizador_model->updateSaldoEnEdoCta($data);
		$data2 = array(
			'mensaje' => "hecho"
		);
		echo json_encode($data2);
	}
	public function getLocalizadores(){
		$this->load->model('localizador_model');
		$data = $this->localizador_model->getAllLocalizadores();
		echo json_encode($data);
	}
	public function getIdLocalizadorbyCve(){
		$data['cvelocalizador'] = $this->input->post("cvelocalizador");
		$this->load->model("localizador_model");
		$result = $this->localizador_model->getIdLocalizadorCve($data);
		echo json_encode($result);
	}

	public function actualizaAbono(){
		$data = array(
			'idabono' => $this->input->post('idabono'), 
			'idedocuenta' => $this->input->post('idedocuenta'), 
			'abonadopor' => $this->input->post('abonadopor'), 
			'recibidopor' => $this->input->post('recibidopor'), 
			'montoabono' => $this->input->post('montoabono'), 
			'fechaabono' => $this->input->post('fechaabono'), 
			'modopagoabono' => $this->input->post('modopagoabono'), 
			'statusabono' =>$this->input->post('statusabono')
		);
		$this->load->model('localizador_model');
		$this->localizador_model->updateAbono($data);
		$result = array('mensaje' => "actualizado" );
		echo json_encode($result);
	}
	public function updateLocalizador(){
		$idlocalizador = $this->input->post("id");
		$status = $this->input->post("status");
		$this->load->model("localizador_model");
		$result = $this->localizador_model->getDatosxId($idlocalizador);
		foreach ($result as $r) {
			if($status=="NA"){
				if($r->saldo==0){
					$status = "P";
				}else{
					$status = "A";
				}

			}else{
				$status = $this->input->post("status");
			}
			$data = array(
				'idlocalizador'=> $r->idlocalizador, 
				'cvelocalizador'=> $r->cvelocalizador, 
				'titular'=> $r->titular, 
				'ttoo'=> $r->ttoo, 
				'otroespecificacion'=> $r->otroespecificacion, 
				'tarifapublica'=> $r->tarifapublica, 
				'fechain'=> $r->fechain, 
				'fechaout'=> $r->fechaout, 
				'servicio'=> $r->servicio, 
				'planalimentos'=> $r->planalimentos, 
				'tipotarifa'=> $r->tipotarifa, 
				'numhabs'=> $r->numhabs, 
				'adultos'=> $r->adultos, 
				'menores'=> $r->menores, 
				'status'=> $status, 
				'fechacreacion'=> $r->fechacreacion, 
				'montooriginal'=> $r->montooriginal, 
				'acumulado'=> $r->acumulado, 
				'fechacreacion'=> $r->fechacreacion, 
				'saldo'=> $r->saldo, 
				'cantidadabonos'=> $r->cantidadabonos, 
				'fechaultimoabono'=> $r->fechaultimoabono, 
				'statusedocta'=> $status
			);
		}		
		$this->localizador_model->updateLocalizador($data);
		$response = array (
			"mensaje" => "ok"
		);
		echo json_encode($response);
	}
	public function cancelarLocalizador(){
		//CANCELAR IMPLICA: UPDATE A TABLA LOCALIZADOR, 
		//TABLA EDOCTA, PERO NO CANCELA LOS ABONOS AUNQUE ESTÁN LIGADOS
		//SE PUEDE PONER LA OPCIÓN DE CANCELAR LOS ABONOS, SI EXISTE LA DEVOLUCIÓN TOTAL.
		//SE PUEDE PONER LA OPCIÓN DE CANCELAR LOS ABONOS, SI EXISTE LA DEVOLUCIÓN PARCIAL Y GUARDANDO
		//UN ABONO NUEVO COMO PENALIZACIÓN.
		$idlocalizador = $this->input->post("id");
		$this->load->model("localizador_model");
		$result = $this->localizador_model->getDatosxId($idlocalizador);
		foreach ($result as $r) {
			$data = array(
				'idlocalizador'=> $r->idlocalizador, 
				'cvelocalizador'=> $r->cvelocalizador, 
				'titular'=> $r->titular, 
				'ttoo'=> $r->ttoo, 
				'otroespecificacion'=> $r->otroespecificacion, 
				'tarifapublica'=> $r->tarifapublica, 
				'fechain'=> $r->fechain, 
				'fechaout'=> $r->fechaout, 
				'servicio'=> $r->servicio, 
				'planalimentos'=> $r->planalimentos, 
				'tipotarifa'=> $r->tipotarifa, 
				'numhabs'=> $r->numhabs, 
				'adultos'=> $r->adultos, 
				'menores'=> $r->menores, 
				'status'=> "C", 
				'fechacreacion'=> $r->fechacreacion, 
				'montooriginal'=> $r->montooriginal, 
				'acumulado'=> $r->acumulado, 
				'fechacreacion'=> $r->fechacreacion, 
				'saldo'=> $r->saldo, 
				'cantidadabonos'=> $r->cantidadabonos, 
				'fechaultimoabono'=> $r->fechaultimoabono, 
				'statusedocta'=> "C"
			);
		};
		$this->localizador_model->cancelaDatosxId($data);
		$response = array(
			"mensaje" => "ok"
		);
		echo json_encode($response);
	}
}