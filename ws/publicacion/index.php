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
				$params['titulo'] = $value->titulo;
				$params['etiquetas'] = $value->etiquetas;
				$params['descripcion'] = $value->descripcion;
				$params['fecha_subida'] = date('Y-m-d');
				$params['id_usuario'] = $value->id_usuario;
				$params['id_acceso'] = $value->id_acceso;
				$params['id_categoria'] = $value->id_categoria;
				// print_r($params); die();
				if($gameart->insertar('publicacion', $params)){
					$params = array();
					$params['id_usuario'] = $value->id_usuario;
					$last_pub = $gameart->consultar('SELECT MAX(id_publicacion) as id_publicacion from publicacion WHERE id_usuario=:id_usuario', $params);
					$params = array();
					$params['id_publicacion'] = $last_pub[0]['id_publicacion'];
					foreach ($value->recursos as $key2 => $value2) {
						$params['nombre_recurso'] = $value2->nombre_recurso;
						$params['id_tipo_recurso'] = $value2->id_tipo_recurso;
						// print_r($params); die();
						if($gameart->insertar('recurso', $params)){
							$json=array('mensaje'=>'Se inserto la publicacion y sus recursos.');
						}else{
							$json=array('mensaje'=>'No se pudieron insertar los recursos de la publicacion.');
						}
					}
				}else{
					$json=array('mensaje'=>'No se pudo insertar la publicacion.');
				}
			}
			break;
		case 'PUT':
			#Actualizar datos
			$user = true;
			$pub = true;
			if(isset($_GET['id'])){
				$json=file_get_contents('php://input');
				$json=json_decode($json);
				$params['id_publicacion']=$_GET['id'];
				$pub_data=$gameart->consultar('SELECT * FROM publicacion WHERE id_publicacion=:id_publicacion', $params);
				if(count($pub_data)>0){
					foreach ($json as $key => $value){
							$params['titulo'] = $value->titulo;
							$params['etiquetas'] = $value->etiquetas;
							$params['descripcion'] = $value->descripcion;
							$params['fecha_subida'] = date('Y-m-d');
							$params['id_usuario'] = $value->id_usuario;
							$params['id_acceso'] = $value->id_acceso;
							$params['id_categoria'] = $value->id_categoria;
							$keys['id_publicacion']=$_GET['id'];
							if($gameart->actualizar('publicacion', $params, $keys))
								$json=array('mensaje'=>'Se a modificado la publicacion');
							else
								$json=array('mensaje'=>'Hubo un error al modificar la publicacion');
					}
				}else{
					$json=array('mensaje'=>'No existe una publicacion con ese identificador.');
				}
			}else{
				$json=array('mensaje'=>'No se ha especificado un id_publicacion');
			}
			break;
		case 'DELETE':
			#Eliminar datos
			if(isset($_GET['id'])){
				$params['id_publicacion']=$_GET['id'];
				$pub_data = $gameart->consultar('SELECT * FROM publicacion WHERE id_publicacion=:id_publicacion', $params);
				if(count($pub_data)>0){
					if($gameart->borrar('publicacion', $params))
						$json=array('mensaje'=>'Se ha eliminado la publicacion');
					else
						$json=array('mensaje'=>'No se ha podido eliminar la publicacion');
				}else{
					$json=array('mensaje'=>'No existe una publicacion con ese identificador.');
				}
			}else{
				$json=array('mensaje'=>'No se ha especificado un id de publicacion a eliminar.');
			}
			break;
		case 'GET':
			if(isset($_GET['id'])){
				$params['id_publicacion'] = $_GET['id'];
				$json = $gameart->consultar('
					SELECT p.id_publicacion, p.titulo, p.etiquetas, p.descripcion, p.fecha_subida, u.id_usuario, u.nombre_usuario, u.email, a.acceso, c.categoria, r.nombre_recurso, tr.tipo_recurso, tp.tipo_publicacion FROM publicacion p JOIN categoria c ON p.id_categoria=c.id_categoria JOIN usuario u ON p.id_usuario = u.id_usuario JOIN recurso r ON r.id_publicacion = p.id_publicacion JOIN tipo_recurso tr ON tr.id_tipo_recurso=r.id_tipo_recurso JOIN tipo_publicacion tp ON tp.id_tipo_publicacion= c.id_tipo_publicacion JOIN acceso a ON a.id_acceso = p.id_acceso WHERE p.id_publicacion=:id_publicacion', $params);
			}else{
				$json = $gameart->consultar('
					SELECT p.id_publicacion, p.titulo, p.etiquetas, p.descripcion, p.fecha_subida, u.id_usuario, u.nombre_usuario, u.email, a.acceso, c.categoria, r.nombre_recurso, tr.tipo_recurso, tp.tipo_publicacion FROM publicacion p JOIN categoria c ON p.id_categoria=c.id_categoria JOIN usuario u ON p.id_usuario = u.id_usuario JOIN recurso r ON r.id_publicacion = p.id_publicacion JOIN tipo_recurso tr ON tr.id_tipo_recurso=r.id_tipo_recurso JOIN tipo_publicacion tp ON tp.id_tipo_publicacion= c.id_tipo_publicacion JOIN acceso a ON a.id_acceso = p.id_acceso');
			}
	  	if (sizeof($json)==0) {
	  		$json=array('mensaje'=>'No hay una publicacion con ese identificador');
	  	}  				
			break;
	}
	http_response_code(200);
	$json=json_encode($json);
	echo $json;
/*
POST EXAMPLE
[
    {
        "titulo": "Prueba",
        "etiquetas": "etiqueta",
        "descripcion": "Descripcion",
        "id_usuario": "1",
        "id_acceso": "1",
        "id_categoria": "1",
	    "recursos": { 
						"r1":{
								"id_tipo_recurso":"4", 
								"nombre_recurso":"ga_juho0.png"
							 }, 
						"r2":{
								"id_tipo_recurso":"4", 
								"nombre_recurso":"ga_juho1.png"
							 }, 
						"r3":{
								"id_tipo_recurso":"4", 
								"nombre_recurso":"ga_juho2.png"
							 }
					}

    }
]
*/
?>