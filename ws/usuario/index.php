<?php
	include_once('model/gameart.php');
	$gameart = new gameArt();
	header('Content-Type: Application/json');
	$method = $_SERVER['REQUEST_METHOD'];
	$json = array("mensaje" => "no se implemento ninguna accion");

	switch($method){
		case 'POST':
			#Insertar datos
			$json=file_get_contents('php://input');
			$json=json_decode($json);
			foreach ($json as $key => $value) {
				$params = array();
				$params['nombre'] = $value->nombre;
				$params['apaterno'] = $value->apaterno;
				$params['amaterno'] = $value->amaterno;
				$params['nombre_usuario'] = $value->nombre_usuario;
				$params['id_sexo'] = $value->id_sexo;
				$params['email'] = $value->email;
				$params['contrasena'] = md5($value->contrasena);
				$params['biografia'] = $value->biografia;
				$params['imagen_perfil'] = $value->imagen_perfil;
				$params['id_rol'] = $value->id_rol;
				if($gameart->insertar('usuario', $params))
					$json=array('mensaje'=>'El usuario se inserto');
				else
			   	$json=array('mensaje'=>'Error al insertar al usuario');
			}
			break;
		case 'PUT':
			#Actualizar datos
			if(isset($_GET['id'])){
				$json=file_get_contents('php://input');
				$json=json_decode($json);
				$params['id_usuario']=$_GET['id'];
				$user_data=$gameart->consultar('SELECT * FROM usuario WHERE id_usuario:id_usuario', $params);
				if(count($user_data)>0){
					foreach ($json as $key => $value) {
						$params = array();
						$params['nombre'] = $value->nombre;
						$params['apaterno'] = $value->apaterno;
						$params['amaterno'] = $value->amaterno;
						$params['nombre_usuario'] = $value->nombre_usuario;
						$params['id_sexo'] = $value->id_sexo;
						$params['email'] = $value->email;
						$params['contrasena'] = md5($value->contrasena);
						$params['biografia'] = $value->biografia;
						$params['imagen_perfil'] = $value->imagen_perfil;
						$params['id_rol'] = $value->id_rol;
						$keys['id_usuario']=$_GET['id'];
						if($gameart->actualizar('usuario', $params, $keys))
							$json=array('mensaje'=>'Se a modificado el usuario');
						else
							$json=array('mensaje'=>'Hubo un error al modificar al usuario');
					}
				}else{
					$json=array('mensaje'=>'No existe un usuario con ese rol especificado.');
				}
			}else{
				$json=array('mensaje'=>'No se ha especificado un id_usuario');
			}
			break;
		case 'DELETE':
			#Eliminar datos
			if(isset($_GET['id'])){
				$params['id_usuario']=$_GET['id'];
				$pay_data=$gameart->consultar('SELECT * FROM pago where id_usuario=:id_usuario or id_receptor=:id_usuario', $params);
				if(count($pay_data)>0){
					$params['id_usuario'] = null;
					$keys['id_usuario'] = $_GET['id'];
					$gameart->actualizar('pago', $params, $keys);
					$params = array();
				}
				$params['id_usuario'] = $_GET['id'];
				if($gameart->borrar('usuario', $params))
					$json=array('mensaje'=>'Se ha eliminado al usuario');
				else
					$json=array('mensaje'=>'No se ha podido eliminar al usuario');
			}else{
				$json=array('mensaje'=>'No se ha especificado un id de usuario a eliminar.');
			}
			break;
		case 'GET':
			if(isset($_GET['id'])){
				$params['id_usuario'] = $_GET['id'];
				$json = $gameart->consultar('SELECT * FROM usuario WHERE id_usuario=:id_usuario', $params);
			}else{
				$json = $gameart->consultar('SELECT * FROM usuario ORDER BY id_usuario');
			}
	  	if (sizeof($json)==0) {
	  		$json=array('mensaje'=>'El usuario no existe');
	  	}  				
			break;
	}
	http_response_code(200);
	$json=json_encode($json);
	echo $json;
?>