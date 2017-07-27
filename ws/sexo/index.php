
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
				$params['sexo'] = $value->sexo;
				if($gameart->insertar('sexo', $params))
					$json=array('mensaje'=>'Se inserto el sexo');
				else
			   	$json=array('mensaje'=>'Error al insertar el sexo');
			}
			break;
		case 'PUT':
			#Actualizar datos
			if(isset($_GET['id'])){
				$json=file_get_contents('php://input');
				$json=json_decode($json);
				$params['id_sexo']=$_GET['id'];
				foreach ($json as $key => $value) {
					$params = array();
					$params['sexo'] = $value->sexo;
					$keys['id_sexo']=$_GET['id'];
					$sexo_data = $gameart->consultar('SELECT * FROM sexo where id_sexo=:id_sexo', $keys);
					if(count($sexo_data)>0){
						if($gameart->actualizar('sexo', $params, $keys))
							$json=array('mensaje'=>'Se a modificado el sexo');
						else
							$json=array('mensaje'=>'Hubo un error al modificar el sexo');
					}else{
							$json=array('mensaje'=>'No existe un sexo con ese identificador');
					}
				}
			}else{
				$json=array('mensaje'=>'No se ha especificado un id_sexo');
			}
			break;
		case 'DELETE':
			#Eliminar datos
			if(isset($_GET['id'])){
				$params['id_sexo']=$_GET['id'];
				$sexo_data=$gameart->consultar('SELECT * FROM usuario where id_sexo=:id_sexo', $params);
				if(count($sexo_data)>0){
					$json=array('mensaje'=>'No se puede elminar el sexo por que hay usuarios asociados a este');
				}else{
					$params['id_sexo'] = $_GET['id'];
					if($gameart->borrar('sexo', $params))
						$json=array('mensaje'=>'Se ha eliminado al sexo');
					else
						$json=array('mensaje'=>'No se ha podido eliminar al sexo');					
				}
			}else{
				$json=array('mensaje'=>'No se ha especificado un id de sexo a eliminar.');
			}
			break;
		case 'GET':
			if(isset($_GET['id'])){
				$params['id_sexo'] = $_GET['id'];
				$json = $gameart->consultar('SELECT * FROM sexo WHERE id_sexo=:id_sexo', $params);
			}else{
				$json = $gameart->consultar('SELECT * FROM sexo ORDER BY id_sexo');
			}
	  	if (sizeof($json)==0) {
	  		$json=array('mensaje'=>'El sexo no existe');
	  	}  				
			break;
	}
	http_response_code(200);
	$json=json_encode($json);
	echo $json;
?>