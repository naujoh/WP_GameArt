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
				$params['rol'] = $value->rol;
				if($gameart->insertar('rol', $params))
					$json=array('mensaje'=>'Se inserto el rol');
				else
			   	$json=array('mensaje'=>'Error al insertar el rol');
			}
			break;
		case 'PUT':
			#Actualizar datos
			if(isset($_GET['id'])){
				$json=file_get_contents('php://input');
				$json=json_decode($json);
				$params['id_rol']=$_GET['id'];
				foreach ($json as $key => $value) {
					$params = array();
					$params['rol'] = $value->rol;
					$keys['id_rol']=$_GET['id'];
					$rol_data = $gameart->consultar('SELECT * FROM rol where id_rol=:id_rol', $keys);
					if(count($rol_data)>0){
						if($gameart->actualizar('rol', $params, $keys))
							$json=array('mensaje'=>'Se a modificado el rol');
						else
							$json=array('mensaje'=>'Hubo un error al modificar el rol');
					}else{
							$json=array('mensaje'=>'No existe un rol con ese identificador');
					}
				}
			}else{
				$json=array('mensaje'=>'No se ha especificado un id_rol');
			}
			break;
		case 'DELETE':
			#Eliminar datos
			if(isset($_GET['id'])){
				$params['id_rol']=$_GET['id'];
				$user_data=$gameart->consultar('SELECT * FROM usuario where id_rol=:id_rol', $params);
				if(count($user_data)>0){
					$json=array('mensaje'=>'No se puede elminar el rol por que hay usuarios asociados a este');
				}else{
					$params['id_rol'] = $_GET['id'];
					if($gameart->borrar('rol', $params))
						$json=array('mensaje'=>'Se ha eliminado al rol');
					else
						$json=array('mensaje'=>'No se ha podido eliminar al rol');					
				}
			}else{
				$json=array('mensaje'=>'No se ha especificado un id de rol a eliminar.');
			}
			break;
		case 'GET':
			if(isset($_GET['id'])){
				$params['id_rol'] = $_GET['id'];
				$json = $gameart->consultar('SELECT * FROM rol WHERE id_rol=:id_rol', $params);
			}else{
				$json = $gameart->consultar('SELECT * FROM rol ORDER BY id_rol');
			}
	  	if (sizeof($json)==0) {
	  		$json=array('mensaje'=>'El rol no existe');
	  	}  				
			break;
	}
	http_response_code(200);
	$json=json_encode($json);
	echo $json;
?>