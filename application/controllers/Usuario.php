<?php 

class Usuario extends CI_Controller {
	function  __construct(){
		parent::__construct();
		$this->load->model('Model_Usuario');
	}

	public function index(){
		$data['contenido'] = "usuario/index";
		$data['selPerfil'] = $this->Model_Usuario->selPerfil(); 
		$data['selPago'] = $this->Model_Usuario->selPago();
		$data['selFav'] = $this->Model_Usuario->selFav();
		$this->load->view("plantilla", $data);
	}

	public function usuario_registro(){
		$datos = $this->input->post();		
		if(isset($datos)){
			
			$usuario = $datos['txtusuario'];
			$clave = $datos['txtclave'];
			$edad = $datos['txtedad'];
			$this->Model_Usuario->insertUsuario($usuario,$clave,$edad);
		    redirect ('');
		}
	}

	public function usuario_edit($id = NULL){
		if($id != NULL){
			$data['contenido'] = 'usuario/usuario_edit';
			$data['datosUsuario'] = $this->Model_Usuario->editUsuario($id);
			$this->load->view('plantilla', $data);
		}else{
			redirect('');
		}
	}

	public function usuario_update(){
		$datos = $this->input->post();
		if(isset($datos)){
			$codigousuario = $datos['txtcodigousuario'];
			$usuario = $datos['txtusuario'];
			$clave = $datos['txtclave'];
			$edad = $datos['txtedad'];
			$this->Model_Usuario->updateUsuario($codigousuario,$usuario,$clave,$edad);
		    redirect ('');
		}
	}

	public function usuario_delete($id = NULL){
		if($id != NULL){
			$this->Model_Usuario->deleteUsuario($id);
		}

	}	

	public function fav_registro(){
		$datos = $this->input->post();
		if(isset($datos)){
			$codigousuario = $datos['fav_usuario'];
			$codigousuariofavorito = $datos['fav_usuarioFav'];
			$this->Model_Usuario->insertFav($codigousuario,$codigousuariofavorito);
		    redirect ('');
		}

	}

	public function fav_delete($codigousuario,$codigousuariofavorito){
		if($codigousuario != NULL and $codigousuariofavorito != NULL){
			$this->Model_Usuario->deleteFav($codigousuario,$codigousuariofavorito);
		}

	}

	public function pago_registro(){
		$datos = $this->input->post();
		if(isset($datos)){
			$codigousuario = $datos['pago_usuario'];
			$importe = $datos['pago_monto'];
			$fecha = $datos['pago_fecha'];
			$this->Model_Usuario->insertPago($codigousuario,$importe,$fecha);
		    redirect ('');
		}
	}

	public function pago_edit($id = NULL){
		if($id != NULL){
			$data['contenido'] = 'usuario/pago_edit';
			$data['selPerfil'] = $this->Model_Usuario->selPerfil();
			$data['datosPago'] = $this->Model_Usuario->editPago($id);
			$this->load->view('plantilla', $data);
		}else{
			redirect('');
		}
	}

	public function pago_update(){
		$datos = $this->input->post();
		if(isset($datos)){
			$codigousuario = $datos['pago_usuario'];
			$codigopago = $datos['pago_codigo'];
			$importe = $datos['pago_monto'];
			$fecha = $datos['pago_fecha'];
			$this->Model_Usuario->updatePago($codigousuario,$codigopago,$importe,$fecha);
		    redirect ('');
		}
	}

	public function pago_delete($id = NULL){
		if($id != NULL){
			$this->Model_Usuario->deletePago($id);
		}

	}

}


 ?>