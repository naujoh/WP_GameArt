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
				$params['categoria'] = $value->categoria;
				$params['id_tipo_publicacion'] = $value->id_tipo_publicacion;
				if($gameart->insertar('categoria', $params))
					$json=array('mensaje'=>'Se inserto la categoria');
				else
			   	$json=array('mensaje'=>'Error al insertar la categoria');
			}
			break;
		case 'PUT':
			#Actualizar datos
			if(isset($_GET['id'])){
				$json=file_get_contents('php://input');
				$json=json_decode($json);
				$params['id_categoria']=$_GET['id'];
				foreach ($json as $key => $value) {
					$params = array();
					$params['categoria'] = $value->categoria;
					$keys['id_categoria']=$_GET['id'];
					$cat_data = $gameart->consultar('SELECT * FROM categoria where id_categoria=:id_categoria', $keys);
					if(count($cat_data)>0){
						if($gameart->actualizar('categoria', $params, $keys))
							$json=array('mensaje'=>'Se a modificado la categoria');
						else
							$json=array('mensaje'=>'Hubo un error al modificar la categoria');
					}else{
							$json=array('mensaje'=>'No existe una categoria con ese identificador');
					}
				}
			}else{
				$json=array('mensaje'=>'No se ha especificado un id_categoria');
			}
			break;
		case 'DELETE':
			#Eliminar datos
			if(isset($_GET['id'])){
				$params['id_categoria']=$_GET['id'];
				$cat_data=$gameart->consultar('SELECT * FROM publicacion where id_categoria=:id_categoria', $params);
				if(count($cat_data)>0){
					$json=array('mensaje'=>'No se puede elminar la categoria por que hay publicaciones asociadas a esta.');
				}else{
					$params['id_categoria'] = $_GET['id'];
					if($gameart->borrar('categoria', $params))
						$json=array('mensaje'=>'Se ha eliminado la categoria');
					else
						$json=array('mensaje'=>'No se ha podido eliminar la categoria');					
				}
			}else{
				$json=array('mensaje'=>'No se ha especificado un id de categoria a eliminar.');
			}
			break;
		case 'GET':
			if(isset($_GET['id'])){
				$params['id_categoria'] = $_GET['id'];
				$json = $gameart->consultar('SELECT * FROM categoria WHERE id_categoria=:id_categoria', $params);
			}else{
				$json = $gameart->consultar('SELECT * FROM categoria ORDER BY id_categoria');
			}
	  	if (sizeof($json)==0) {
	  		$json=array('mensaje'=>'La categoria no existe');
	  	}  			
			break;
	}
	http_response_code(200);
	$json=json_encode($json);
	echo $json;
?>