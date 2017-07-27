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
				$params['tipo_recurso'] = $value->tipo_recurso;
				if($gameart->insertar('tipo_recurso', $params))
					$json=array('mensaje'=>'Se inserto el tipo de recurso');
				else
			   	$json=array('mensaje'=>'Error al insertar el tipo de recurso');
			}
			break;
		case 'PUT':
			#Actualizar datos
			if(isset($_GET['id'])){
				$json=file_get_contents('php://input');
				$json=json_decode($json);
				$params['id_tipo_recurso']=$_GET['id'];
				foreach ($json as $key => $value) {
					$params = array();
					$params['tipo_recurso'] = $value->tipo_recurso;
					$keys['id_tipo_recurso']=$_GET['id'];
					$cat_data = $gameart->consultar('SELECT * FROM tipo_recurso where id_tipo_recurso=:id_tipo_recurso', $keys);
					if(count($cat_data)>0){
						if($gameart->actualizar('tipo_recurso', $params, $keys))
							$json=array('mensaje'=>'Se a modificado el tipo de recurso');
						else
							$json=array('mensaje'=>'Hubo un error al modificar el tipo de recurso');
					}else{
							$json=array('mensaje'=>'No existe un tipo de recurso con ese identificador');
					}
				}
			}else{
				$json=array('mensaje'=>'No se ha especificado un id_tipo_recurso');
			}
			break;
		case 'DELETE':
			#Eliminar datos
			if(isset($_GET['id'])){
				$params['id_tipo_recurso']=$_GET['id'];
				$cat_data=$gameart->consultar('SELECT * FROM recurso where id_tipo_recurso=:id_tipo_recurso', $params);
				if(count($cat_data)>0){
					$json=array('mensaje'=>'No se puede eliminar el tipo recurso por que hay recursos asociados a este.');
				}else{
					$params['id_tipo_recurso'] = $_GET['id'];
					$re_data = $gameart->consultar('SELECT * FROM tipo_recurso WHERE id_tipo_recurso=:id_tipo_recurso', $params);
					if(count($re_data)>0){
						if($gameart->borrar('tipo_recurso', $params))
							$json=array('mensaje'=>'Se ha eliminado el tipo_recurso');
						else
							$json=array('mensaje'=>'No se ha podido eliminar el tipo de recurso');
					}else{
						$json=array('mensaje'=>'No existe un tipo de recurso con este id');
					}					
				}
			}else{
				$json=array('mensaje'=>'No se ha especificado un id tipo recurso a eliminar.');
			}
			break;
		case 'GET':
			if(isset($_GET['id'])){
				$params['id_tipo_recurso'] = $_GET['id'];
				$json = $gameart->consultar('SELECT * FROM tipo_recurso WHERE id_tipo_recurso=:id_tipo_recurso', $params);
			}else{
				$json = $gameart->consultar('SELECT * FROM tipo_recurso ORDER BY id_tipo_recurso');
			}
	  	if (sizeof($json)==0) {
	  		$json=array('mensaje'=>'El tipo de recurso con ese ID no existe');
	  	}  			
			break;
	}
	http_response_code(200);
	$json=json_encode($json);
	echo $json;
?>