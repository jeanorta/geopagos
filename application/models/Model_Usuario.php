<?php 

class Model_Usuario extends CI_Model{
	
	function __construct()	{
		parent::__construct();
		$this->load->database();
	}
	public function selPerfil(){
		$query = $this->db->query("select * from usuarios");
		return $query->result();
	}
	public function selFav(){
		$query = $this->db->query("select f.codigousuario, u.usuario as usuario, f.codigousuariofavorito FROM favoritos as f, usuarios as u where f.codigousuario=u.codigousuario");
		return $query->result();
	}
	public function selPago(){
		$query = $this->db->query("SELECT up.codigousuario as codigousuario, u.usuario as usuario, p.codigopago as codigopago, p.importe as importe, p.fecha as fecha FROM pagos as p, usuariospagos as up, usuarios as u where p.codigopago=up.codigopago and u.codigousuario=up.codigousuario order by u.usuario");
		return $query->result();
	}
	public function insertUsuario($usuario,$clave,$edad){
		$query = $this->db->query("SELECT MAX(codigousuario) AS id FROM usuarios");		
		foreach ($query->result() as $row)
		{
			$codigousuario = $row->id;
			if(empty($codigousuario)){$codigousuario=0;}
		}
		$codigousuario++;
		$arrayDatos = array(
			'codigousuario' => $codigousuario,
			'usuario' => $usuario,
			'clave' => md5($clave),
			'edad' => $edad
			);
		$this->db->insert('usuarios',$arrayDatos); 
	}
	
	public function editUsuario($id){
		$consulta = $this->db->query("SELECT * FROM usuarios WHERE $id=codigousuario");
		return $consulta->result();
	}

	public function updateUsuario($codigousuario,$usuario,$clave,$edad){
		$arrayDatos = array(
			'codigousuario' => $codigousuario,
			'usuario' => $usuario,
			'clave' => md5($clave),
			'edad' => $edad
			);
		$this->db->where('codigousuario',$codigousuario);
		$this->db->update('usuarios',$arrayDatos);
		redirect('');
	}

	public function deleteUsuario($id){
		$this->db->where('codigousuario',$id);
		$this->db->delete('usuarios');
		redirect('');
	}

	public function insertFav($codigousuario,$codigousuariofavorito){
		$favorito = array(
			'codigousuario' => $codigousuario,
			'codigousuariofavorito' => $codigousuariofavorito			
			);
		$query = $this->db->query("SELECT * FROM favoritos where codigousuario=$codigousuario and codigousuariofavorito=$codigousuariofavorito");
		if($query->result()){ echo '<script type="text/javascript">alert("Ya existe el favorito");</script>';}else{
			$this->db->insert('favoritos',$favorito);
		}		 
	}

	public function deleteFav($codigousuario,$codigousuariofavorito){
		$this->db->where('codigousuario',$codigousuario);
		$this->db->where('codigousuariofavorito',$codigousuariofavorito);
		$this->db->delete('favoritos');
		redirect('');
	}

	public function insertPago($codigousuario,$importe,$fecha){
		$query = $this->db->query("SELECT MAX(codigopago) AS id FROM pagos");		
		foreach ($query->result() as $row)
		{
			$codigopago = $row->id;
			if(empty($codigopago)){$codigopago=0;}
		}
		$codigopago++;
		$pago1 = array(
			'codigopago' => $codigopago,
			'codigousuario' => $codigousuario
			);
		$pago2 = array(
			'codigopago' => $codigopago,
			'importe' => $importe,
			'fecha' => $fecha
			);
		$this->db->insert('usuariospagos',$pago1); 
		$this->db->insert('pagos',$pago2); 
	}

	public function editPago($id){
		$consulta = $this->db->query("SELECT up.codigousuario as codigousuario, u.usuario as usuario, p.codigopago as codigopago, p.importe as importe, p.fecha as fecha FROM pagos as p, usuariospagos as up, usuarios as u where p.codigopago=up.codigopago and u.codigousuario=up.codigousuario and $id=p.codigopago order by u.usuario");
		return $consulta->result();
	}

	public function updatePago($codigousuario,$codigopago,$importe,$fecha){
		$pago1 = array(
			'codigopago' => $codigopago,
			'codigousuario' => $codigousuario
			);
		$pago2 = array(
			'codigopago' => $codigopago,
			'importe' => $importe,
			'fecha' => $fecha
			);
		$this->db->where('codigopago',$codigopago);
		$this->db->update('usuariospagos',$pago1);
		$this->db->where('codigopago',$codigopago);
		$this->db->update('pagos',$pago2);
		redirect('');
	}

	public function deletePago($id){
		$this->db->where('codigopago',$id);
		$this->db->delete('pagos');
		$this->db->where('codigopago',$id);
		$this->db->delete('usuariospagos');
		redirect('');
	}
}
 ?>