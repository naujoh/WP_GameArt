<?php
include_once('model/gameart.php');
class tutorialsModel extends gameArt{
	public $querys;

	public function __construct(){
		parent::__construct();
		$this->querys = array(
			"recents"=>
				"SELECT p.id_publicacion, u.id_usuario, u.nombre_usuario, u.imagen_perfil, p.titulo, r.nombre_recurso 
					FROM publicacion p 
						JOIN usuario u ON p.id_usuario=u.id_usuario 
						JOIN recurso r ON r.id_publicacion = p.id_publicacion 
						JOIN categoria c ON c.id_categoria = p.id_categoria
						WHERE c.id_tipo_publicacion = 3 AND r.id_tipo_recurso = 6
						ORDER BY p.id_publicacion DESC LIMIT 8;",

			"dropdown"=> 
				"SELECT * FROM categoria where id_tipo_publicacion = 3 ORDER BY id_categoria ASC",

			"dd_dificulty" =>
				"SELECT * FROM nivel_dificultad ORDER BY id_nivel_dificultad", 	
			
			"dd_selected" => 
				"SELECT id_categoria as id, categoria as option FROM categoria WHERE id_tipo_publicacion = 3 ORDER BY id_categoria ASC",

			"dd_dificulty_selected" =>
				"SELECT id_nivel_dificultad as id, nivel_dificultad as option FROM nivel_dificultad ORDER BY id_nivel_dificultad ASC",
				
			"all"=>
				"SELECT p.id_publicacion, p.titulo, u.nombre_usuario, t.resumen, r.nombre_recurso, u.id_usuario FROM publicacion p JOIN categoria c ON p.id_categoria=c.id_categoria JOIN usuario u ON p.id_usuario = u.id_usuario JOIN tutorial t ON p.id_publicacion = t.id_publicacion JOIN recurso r ON r.id_publicacion = p.id_publicacion WHERE c.id_tipo_publicacion=3 AND r.id_tipo_recurso=6;",

			"post_content"=>
					"SELECT * FROM publicacion p JOIN categoria c ON p.id_categoria=c.id_categoria JOIN recurso r ON p.id_publicacion = r.id_publicacion JOIN usuario u ON u.id_usuario = p.id_usuario JOIN tutorial t ON t.id_publicacion = p.id_publicacion WHERE p.id_publicacion=:id_publicacion AND r.id_tipo_recurso=3;",

			"last_pub"=>
				"SELECT MAX(id_publicacion) as id_publicacion from publicacion WHERE id_usuario=:id_usuario;",

			"table_data" =>
			 "SELECT p.id_publicacion, r.nombre_recurso, p.titulo, p.fecha_subida, nf.nivel_dificultad, a.acceso FROM publicacion p JOIN usuario u ON u.id_usuario = p.id_usuario JOIN tutorial t ON t.id_publicacion = p.id_publicacion JOIN recurso r ON r.id_publicacion = p.id_publicacion JOIN nivel_dificultad nf ON nf.id_nivel_dificultad = t.id_nivel_dificultad JOIN acceso a on a.id_acceso = p.id_acceso JOIN categoria c ON c.id_categoria = p.id_categoria WHERE c.id_tipo_publicacion = 3 AND r.id_tipo_recurso = 6 AND u.id_usuario = :id_usuario;",

			"edit_content" => 
				"SELECT * FROM publicacion p JOIN categoria c ON p.id_categoria=c.id_categoria JOIN recurso r ON p.id_publicacion = r.id_publicacion JOIN tutorial t ON t.id_publicacion = p.id_publicacion WHERE p.id_publicacion=:id_publicacion order by r.id_tipo_recurso ASC"
			);
	}

	public function getRecents(){
		$data = $this->consultar($this->querys['recents']);
		return $data;
	}

	public function getAllTutorials(){
		$data = $this->consultar($this->querys['all']);
		return $data;
	}

	public function insertTutorial(){
		$msg = "";
		$insertered = true;
		$params['titulo'] = $_POST['titulo'];
		$params['etiquetas'] = $_POST['etiquetas'];
		$params['descripcion'] = $_POST['descripcion'];
		$params['fecha_subida'] = date('Y-m-d');
		$params['id_categoria'] = $_POST['id_categoria'];
		$params['id_usuario'] = $_SESSION['usuario']['id_usuario'];
		$params['id_acceso'] = 1;
		//print_r($params); die();
		if($this->insertar('publicacion', $params)){ // Insertar la info de la publicacion
			$params = array();
			$params['id_usuario'] = $_SESSION['usuario']['id_usuario'];
			$data_pub = $this->consultar($this->querys['last_pub'], $params); //Obtener el ultimo id de publicacion insertado
			//print_r($data_pub); die();
			$params = array();
			$params['resumen'] = $_POST['resumen'];
			$params['id_nivel_dificultad'] = $_POST['id_nivel_dificultad'];
			$params['id_publicacion'] = $data_pub[0]['id_publicacion'];
			if($this->insertar('tutorial', $params)){ //insertar la info del tutorial 
				$params = array();
				$enlace = $_POST['enlace'];
				$enlace = str_replace("watch?v=", "embed/", $enlace);
				$params['nombre_recurso'] = $enlace;
				$params['id_tipo_recurso'] = 3; //Enlace
				$params['id_publicacion'] = $data_pub[0]['id_publicacion'];
				$this->insertar('recurso', $params); //Insertar el enlace del tutorial
				$params = array();
				$params['id_tipo_recurso'] = 6; //portada
				$params['id_publicacion'] = $data_pub[0]['id_publicacion'];
				if(isset($_FILES['portada']['name'])){
					$ext = explode('.', $_FILES['portada']['name']);
					$source = $_FILES['portada']['tmp_name'];
					$destination = 'view/resources/images/covers/'.$params['id_publicacion'].'_cover.'.$ext[count($ext)-1];
					if($this->checkTypeOfFile($_FILES['portada'],'image')){
						if(move_uploaded_file($source, $destination)){
							$params['nombre_recurso'] = $params['id_publicacion'].'_cover.'.$ext[count($ext)-1];
							$this->insertar('recurso', $params);
						}else{
							$params['nombre_recurso'] = 'tutorial_default.png';
							$this->insertar('recurso', $params);
							$msg = 'Error al subir la imagen de portada se establecio una imagen por defecto, puede actualizarla editando la publicacion.';
						}
					}else{
						$params['nombre_recurso'] = 'tutorial_default.png';
						$this->insertar('recurso', $params);						
						$msg = 'El archivo agregado como portada no tiene una extension permitida, solo se aceptan las extensiones: jpg, png y gif, se establecera la portada por defecto podra cambiarla en cualquier momento por una imagen valida';
					}
				}else{
					$params['nombre_recurso'] = 'tutorial_default.png';
					$this->insertar('recurso', $params);
				}
				// echo $params['id_publicacion']; die();
				$params['id_publicacion'] = $data_pub[0]['id_publicacion'];
			}else{
				$insertered = false;
				$msg = 'Ocurrio un eror al crear el post tutorial :(';
			}
		}else{
			$msg = 'Ocurrio un error al crear la publicacion :(';
			$insertered = false;
		}
		$params['insertered'] = $insertered;
		$params['msg'] = $msg;
		return $params;
	}		

	public function updateTutorial(){
		$msg = "Publicacion actualizada";
		$color ="success";
		$updated = true;
		$params['titulo'] = $_POST['titulo'];
		$params['etiquetas'] = $_POST['etiquetas'];
		$params['descripcion'] = $_POST['descripcion'];
		$params['id_categoria'] = $_POST['id_categoria'];
		$keys['id_publicacion'] = $_POST['id_publicacion'];
		//Actualizar la info de la publicacion
		if($this->actualizar('publicacion', $params, $keys)){ 
			$params = array();
			$params['resumen'] = $_POST['resumen'];
			$params['id_nivel_dificultad'] = $_POST['id_nivel_dificultad'];
			//Actualizar la info del tutorial
			if($this->actualizar('tutorial', $params, $keys)){  
				//Enlace
				$params = array();
				$enlace = $_POST['enlace'];
				$enlace = str_replace("watch?v=", "embed/", $enlace);
				$params['nombre_recurso'] = $enlace;
				$keys['id_tipo_recurso'] = 3; 
				$this->actualizar('recurso', $params, $keys); 
				$params = array();
				$keys = array();
				//Portada
				if(!empty($_FILES['portada']['name'])){
					$keys['id_publicacion'] = $_POST['id_publicacion'];
					$keys['id_tipo_recurso'] = 6; 
					$ext = explode('.', $_FILES['portada']['name']);
					$source = $_FILES['portada']['tmp_name'];
					$destination = 'view/resources/images/covers/'.$keys['id_publicacion'].'_cover.'.$ext[count($ext)-1];
					if($this->checkTypeOfFile($_FILES['portada'],'image')){
						if(move_uploaded_file($source, $destination)){
							$params['nombre_recurso'] = $keys['id_publicacion'].'_cover.'.$ext[count($ext)-1];
							$this->actualizar('recurso', $params, $keys);
						}else{
							$msg = 'Error al actualizar la imagen de portada';
						}
					}else{
						$msg = 'El archivo agregado como portada no tiene una extension permitida, solo se aceptan las extensiones: jpg, png y gif, no se actualizó la imagen de portada';
					}
				}
			}else{
				$updated = false;
				$msg = 'Ocurrio un eror al actualizar el tutorial tutorial :(';
				$color = "danger";
			}
		}else{
			$msg = 'Ocurrio un error al actualizar la publiacion :(';
			$color = "danger";
			$updated = false;
		}
		$params['updated'] = $updated;
		$params['msg'] = $msg;
		$params['color'] = $color;
		$params['id_publicacion'] = $keys['id_publicacion'];
		return $params;	
	}	

	public function deleteTutorial(){
		$msg = 'Se ha eliminado el tutorial';
		$color = 'success';
		$params['id_publicacion'] = $_GET['id_publicacion'];
		if(!$this->borrar('publicacion', $params)){
			$msg = 'Error al eliminar la publicacion';
			$color = 'danger';
		}
		$return_data['msg'] = $msg;
		$return_data['color'] = $color;
		return $return_data;
	}
}
?>