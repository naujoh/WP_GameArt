<?php
	include_once('model/gameart.php');
	$gameart = new gameArt();
	header('Content-Type: Application/json');
	$method = $_SERVER['REQUEST_METHOD'];
	$json = array("mensaje" => "no se implemento ninguna accion");

	switch($method){
		case 'POST':
			#Insertar datos
			$pubs = true;
			$user = true;
			$json=file_get_contents('php://input');
			$json=json_decode($json);
			foreach ($json as $key => $value) {
				$params['id_publicacion'] = $value->id_publicacion;
				$pub_data = $gameart->consultar('SELECT * FROM publicacion WHERE id_publicacion=:id_publicacion', $params);
				if(count($pub_data)==0)
					$pubs=false;
				$params = array();
				$params['id_usuario'] = $value->id_usuario;
				$usr_data = $gameart->consultar('SELECT * FROM usuario WHERE id_usuario=:id_usuario', $params);
				if(count($usr_data)==0)
					$user = false;
				$params = array();
				if($user==false || pubs==false){
					$json=array('mensaje'=>'No existe un usuario o publicacion con los identificadores ingresados.');
				}else{
					$params['id_publicacion'] = $value->id_publicacion;
					$params['id_usuario'] = $value->id_usuario;
					$params['comentario'] = $value->comentario;
					$params['fecha_comentario'] = date('Y-m-d');
					if($gameart->insertar('comentario', $params))
						$json=array('mensaje'=>'El comentario se inserto');
					else
				   	$json=array('mensaje'=>'Error al insertar el comentario');					
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
				$params['id_comentario']=$_GET['id'];
				$comment_data=$gameart->consultar('SELECT * FROM comentario WHERE id_comentario=:id_comentario', $params);
				if(count($comment_data)>0){
					foreach ($json as $key => $value){
						$params = array();
						$params['id_usuario'] = $value->id_usuario;
						$user_data = $gameart->consultar('SELECT * FROM usuario WHERE id_usuario=:id_usuario', $params);
						if(count($user_data)==0)
							$user = false;
						$params = array();
						$params['id_publicacion'] = $value->id_publicacion;
						$pub_data = $gameart->consultar('SELECT * FROM publicacion WHERE id_publicacion=:id_publicacion', $params);
						if(count($pub_data)==0)
							$pub = false;
						if($user==false || $pub==false){
							$json=array('mensaje'=>'No se puede actualizar, no existe el usuario o la publicacion.');
						}else{
							$params['id_usuario'] = $value->id_usuario;
							$params['comentario'] = $value->comentario;
							$keys['id_comentario']=$_GET['id'];
							if($gameart->actualizar('comentario', $params, $keys))
								$json=array('mensaje'=>'Se a modificado el comentario');
							else
								$json=array('mensaje'=>'Hubo un error al modificar el comentario');
						}
					}
				}else{
					$json=array('mensaje'=>'No existe un comentario con ese identificador.');
				}
			}else{
				$json=array('mensaje'=>'No se ha especificado un id_comentario');
			}
			break;
		case 'DELETE':
			#Eliminar datos
			if(isset($_GET['id'])){
				$params['id_comentario']=$_GET['id'];
				if($gameart->borrar('comentario', $params))
					$json=array('mensaje'=>'Se ha eliminado el comentario');
				else
					$json=array('mensaje'=>'No se ha podido eliminar el comentario');
			}else{
				$json=array('mensaje'=>'No se ha especificado un id de comentario a eliminar.');
			}
			break;
		case 'GET':
			if(isset($_GET['id'])){
				$params['id_comentario'] = $_GET['id'];
				$json = $gameart->consultar('SELECT * FROM comentario WHERE id_comentario=:id_comentario', $params);
			}else{
				$json = $gameart->consultar('SELECT * FROM comentario ORDER BY id_comentario');
			}
	  	if (sizeof($json)==0) {
	  		$json=array('mensaje'=>'No hay comentarios o comentario con ese identificador');
	  	}  				
			break;
	}
	http_response_code(200);
	$json=json_encode($json);
	echo $json;
?>