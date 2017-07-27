<?php
include_once('model/gameart.php');
class audiosModel extends gameArt{
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
						WHERE c.id_tipo_publicacion = 2 AND r.id_tipo_recurso = 6
						ORDER BY p.id_publicacion DESC LIMIT 8;",

			"dropdown"=> "SELECT * FROM categoria where id_tipo_publicacion = 2 ORDER BY id_categoria ASC",

			"dd_selected" => 
				"SELECT id_categoria as id, categoria as option FROM categoria WHERE id_tipo_publicacion = 2 ORDER BY id_categoria ASC",				

			"dd_access_selected"=>"SELECT id_acceso as id, acceso as option FROM acceso ORDER BY id_acceso ASC",	

			"all"=>"SELECT p.id_publicacion, r.nombre_recurso, u.nombre_usuario, u.id_usuario FROM publicacion p JOIN usuario u ON u.id_usuario=p.id_usuario JOIN categoria c ON p.id_categoria=c.id_categoria JOIN recurso r ON r.id_publicacion=p.id_publicacion WHERE c.id_tipo_publicacion = 2 AND r.id_tipo_recurso = 2",

			"post_content" => "SELECT * FROM publicacion p JOIN categoria c ON p.id_categoria=c.id_categoria JOIN recurso r ON p.id_publicacion = r.id_publicacion JOIN usuario u ON u.id_usuario = p.id_usuario JOIN tipo_recurso tr ON tr.id_tipo_recurso=r.id_tipo_recurso WHERE p.id_publicacion=:id_publicacion ORDER BY tr.id_tipo_recurso DESC",

			"last_pub" => "SELECT MAX(id_publicacion) as id_publicacion from publicacion WHERE id_usuario=:id_usuario;",

			"resources_tab"=> "SELECT * FROM recurso WHERE id_publicacion=:id_publicacion",

			"table_data" => "SELECT r.nombre_recurso, p.id_publicacion, p.titulo, p.fecha_subida, a.acceso FROM publicacion p JOIN usuario u ON u.id_usuario = p.id_usuario JOIN recurso r ON r.id_publicacion = p.id_publicacion JOIN acceso a on a.id_acceso = p.id_acceso JOIN categoria c ON c.id_categoria = p.id_categoria WHERE c.id_tipo_publicacion = 2 AND r.id_tipo_recurso = 6 AND u.id_usuario = :id_usuario;",

			"edit_content" => "SELECT * FROM publicacion p JOIN categoria c ON p.id_categoria=c.id_categoria JOIN recurso r ON p.id_publicacion = r.id_publicacion  WHERE p.id_publicacion=:id_publicacion order by r.id_tipo_recurso ASC"							
			);	
		}
		public function getRecents(){
			$data = $this->consultar($this->querys['recents']);
			return $data;
		}

		public function getAllAudios(){
			$data = $this->consultar($this->querys['all']);
			return $data;
		}
		public function insertAudio(){
			$msg = "";
			$cont=0;
			$audio = $_FILES['audio']['name'];
			$uploaded_files = $this->multiUploads($audio, 'audio');
			if($uploaded_files['uploaded']){
				$params['titulo'] = $_POST['titulo'];
				$params['etiquetas']  =$_POST['etiquetas'];
				$params['descripcion'] = $_POST['descripcion'];
				$params['fecha_subida'] = date('Y-m-d');
				$params['id_usuario'] = $_SESSION['usuario']['id_usuario'];
				if($_SESSION['usuario']['id_rol']==5)
					$params['id_acceso'] = $_POST['id_acceso'];
				else
					$params['id_acceso'] = 1;
				$params['id_categoria'] = $_POST['id_categoria'];
				$this->insertar('publicacion', $params); 			
				$params= array();
				$params['id_usuario'] = $_SESSION['usuario']['id_usuario'];
				$data_pub = $this->consultar($this->querys['last_pub'], $params);
				$params = array();
				$params['id_tipo_recurso'] = 6; //Portada
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
							$params['nombre_recurso'] = 'audio_default.png';
							$this->insertar('recurso', $params);								
							$msg = 'Error al subir la imagen de portada se establecio una imagen por defecto, puede actualizarla editando la publicacion.';
						}
					}else{
						//El tipo de archivo no esta permitido
						$params['nombre_recurso'] = 'audio_default.png';
						$this->insertar('recurso', $params);							
						$msg = 'El archivo agregado como portada no tiene una extension permitida, solo se aceptan las extensiones: jpg, png y gif, se establecera la portada por defecto podra cambiarla en cualquier momento por una imagen valida';		
					}		
				}else{
					//Se pone una imagen de portada por defecto
					$params['nombre_recurso'] = 'audio_default.png';
					$this->insertar('recurso', $params);				
				}
				$params = array();
				$params['id_publicacion'] = $data_pub[0]['id_publicacion'];
				$params['id_tipo_recurso'] = 2;
				foreach ($uploaded_files as $key => $value){
					if($cont < count($uploaded_files)-3){
						$params['nombre_recurso'] = $uploaded_files[$cont];
						$this->insertar('recurso', $params);
					}
					$cont++;
				}
				$res_params['id_publicacion'] = $params['id_publicacion']; 
				$resource_data = $this->consultar($this->querys['resources_tab'], $res_params);
				foreach ($resource_data as $key => $value) {
					if($resource_data[$key]['id_tipo_recurso'] == 2){
					//Actualizar nombre de los recursos en la BD
						$new_name['nombre_recurso'] = $res_params['id_publicacion'].'_'.$resource_data[$key]['nombre_recurso'];
						$keys['nombre_recurso'] = $resource_data[$key]['nombre_recurso'];
						$keys['id_recurso'] = $resource_data[$key]['id_recurso'];
						$this->actualizar('recurso', $new_name, $keys);
					//Actualizar nombre de los archivos fisicos
						$old_name = $keys['nombre_recurso'];
						$new_name = $new_name['nombre_recurso'];
						rename('view/resources/audios/'.$old_name, 'view/resources/audios/'.$new_name);
						$new_name = array();
						$keys = array();
					}
				}				
			}else{
				$msg = $uploaded_files['msg'];
				$params['msg'] = $msg;
				$params['uploaded'] = $uploaded_files['uploaded'];
			}
			return $params;
		}

		public function updateAudio(){
			$msg = "Se actualizo la publicacion";
			$color ="success";
			$params['titulo'] = $_POST['titulo'];
			$params['etiquetas']  =$_POST['etiquetas'];
			$params['descripcion'] = $_POST['descripcion'];
			if($_SESSION['usuario']['id_rol']==5)
				$params['id_acceso'] = $_POST['id_acceso'];
			else
				$params['id_acceso'] = 1;
			$params['id_categoria'] = $_POST['id_categoria'];
			$keys['id_publicacion'] = $_POST['id_publicacion'];
			$this->actualizar('publicacion', $params, $keys); 			
			$params= array();
			//Portada
			$keys['id_tipo_recurso'] = 6; 
			if(!empty($_FILES['portada']['name'])){
				$ext = explode('.', $_FILES['portada']['name']);
				$source = $_FILES['portada']['tmp_name'];
				$destination = 'view/resources/images/covers/'.$keys['id_publicacion'].'_cover.'.$ext[count($ext)-1];
				if($this->checkTypeOfFile($_FILES['portada'],'image')){
					if(move_uploaded_file($source, $destination)){
						$params['nombre_recurso'] = $keys['id_publicacion'].'_cover.'.$ext[count($ext)-1];
						$this->actualizar('recurso', $params, $keys);
					}else{
						$msg = 'Error al subir la imagen de portada y no se actualizo.';
						$color = 'danger';
					}
				}else{
					//El tipo de archivo no esta permitido
					$msg = 'El archivo agregado como portada no tiene una extension permitida, solo se aceptan las extensiones: jpg, png y gif, no se actualiza la imagen de portada';		
					$color = 'danger';
				}		
			}
			$return_data['msg'] = $msg;
			$return_data['color'] = $color;
			return $return_data;						
		}

		public function deleteAudios(){
			$msg = 'Se ha eliminado la galeria';
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