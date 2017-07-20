<?php
include_once('gameart.php');

class userModel extends gameArt{
	public $querys;
	public $contenttype;
	function __construct(){
		parent::__construct();
		$this->setQuerys();
	}

	public function setQuerys(){
		$this->querys = array(
			"login"=>"SELECT * FROM usuario WHERE email=:email AND contrasena=:contrasena",
			"user_data"=>"SELECT * FROM usuario WHERE id_usuario=:id_usuario",
			"content"=>array("
				SELECT u.id_usuario, p.id_publicacion, r.nombre_recurso FROM usuario u 
					JOIN publicacion p ON u.id_usuario=p.id_usuario 
					JOIN categoria c ON c.id_categoria = p.id_categoria 
					JOIN recurso r ON p.id_publicacion = r.id_publicacion 
					JOIN tipo_publicacion tp ON tp.id_tipo_publicacion = c.id_tipo_publicacion
					WHERE u.id_usuario =:id_usuario AND r.id_tipo_recurso = :id_tipo_recurso 
					AND tipo_publicacion = '".$this->contenttype."'", 
					"SELECT id_tipo_recurso FROM tipo_recurso WHERE tipo_recurso = 'Imagen portada'")
   	);		
	}

	function login($email, $password){
		$login = false;
		$password = md5($password);
		$params['email'] = $email;
		$params['contrasena'] = $password;
		$data = $this->consultar($this->querys['login'], $params);
		if(sizeof($data)>0){
			session_start();
			$_SESSION['id_usuario'] = $data[0]['id_usuario'];
			$_SESSION['nombre'] = $data[0]['nombre'].' '.$data[0]['apaterno'].' '.$data[0]['amaterno'];
      $_SESSION['nombre_usuario']= $datos[0]['nombre_usuario'];
			$_SESSION['email'] = $data[0]['email'];
      $_SESSION['biografia'] = $datos[0]['biografia'];			
      $_SESSION['imagen_perfil'] = $datos[0]['imagen_perfil'];
      $_SESSION['id_rol'] = $datos[0]['id_rol'];
      $login = true;
		}
		return $login;
	}

	function logout(){
		if(session_destroy())
			$_SESSION = array();
		return true;
	}
}
?>