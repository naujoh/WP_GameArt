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
				$params['tipo_publicacion'] = $value->tipo_publicacion;
				if($gameart->insertar('tipo_publicacion', $params))
					$json=array('mensaje'=>'Se inserto el tipo de publicacion');
				else
			   	$json=array('mensaje'=>'Error al insertar el tipo de publicacion');
			}
			break;
		case 'PUT':
			#Actualizar datos
			if(isset($_GET['id'])){
				$json=file_get_contents('php://input');
				$json=json_decode($json);
				$params['id_tipo_publicacion']=$_GET['id'];
				foreach ($json as $key => $value) {
					$params = array();
					$params['tipo_publicacion'] = $value->tipo_publicacion;
					$keys['id_tipo_publicacion']=$_GET['id'];
					$cat_data = $gameart->consultar('SELECT * FROM tipo_publicacion where id_tipo_publicacion=:id_tipo_publicacion', $keys);
					if(count($cat_data)>0){
						if($gameart->actualizar('tipo_publicacion', $params, $keys))
							$json=array('mensaje'=>'Se a modificado el tipo de publicacion');
						else
							$json=array('mensaje'=>'Hubo un error al modificar el tipo de publicacion');
					}else{
							$json=array('mensaje'=>'No existe un tipo de publicacion con ese identificador');
					}
				}
			}else{
				$json=array('mensaje'=>'No se ha especificado un id_tipo_publicacion');
			}
			break;
		case 'DELETE':
			#Eliminar datos
			if(isset($_GET['id'])){
				$params['id_tipo_publicacion']=$_GET['id'];
				$cat_data=$gameart->consultar('SELECT * FROM categoria where id_tipo_publicacion=:id_tipo_publicacion', $params);
				if(count($cat_data)>0){
					$json=array('mensaje'=>'No se puede elminar el tipo publicacion por que hay categorias asociadas a esta.');
				}else{
					$params['id_tipo_publicacion'] = $_GET['id'];
					if($gameart->borrar('tipo_publicacion', $params))
						$json=array('mensaje'=>'Se ha eliminado el tipo_publicacion');
					else
						$json=array('mensaje'=>'No se ha podido eliminar el tipo de publicacion');					
				}
			}else{
				$json=array('mensaje'=>'No se ha especificado un id tipo publicacion a eliminar.');
			}
			break;
		case 'GET':
			if(isset($_GET['id'])){
				$params['id_tipo_publicacion'] = $_GET['id'];
				$json = $gameart->consultar('SELECT * FROM tipo_publicacion WHERE id_tipo_publicacion=:id_tipo_publicacion', $params);
			}else{
				$json = $gameart->consultar('SELECT * FROM tipo_publicacion ORDER BY id_tipo_publicacion');
			}
	  	if (sizeof($json)==0) {
	  		$json=array('mensaje'=>'El tipo de publicacion con ese ID no existe');
	  	}  			
			break;
	}
	http_response_code(200);
	$json=json_encode($json);
	echo $json;
?>