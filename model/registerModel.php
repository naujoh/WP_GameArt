<?php
include_once('gameart.php');
class registerModel extends gameArt{
	public $querys;

	public function __construct(){
		parent::__construct();
		$this->querys = array("sexo_data"=>"SELECT * FROM sexo ORDER BY id_sexo ASC",
													"get_rol"=>"SELECT id_rol FROM rol WHERE rol=:rol");
	}
	public function register(){
		$msg="";
	 	$color="";
		$registered = false;
		$params['nombre'] = $_POST['nombre'];
		$params['apaterno'] = $_POST['apaterno'];
		$params['amaterno'] = $_POST['amaterno'];
		$params['id_sexo'] = $_POST['id_sexo'];
		$params['nombre_usuario'] = $_POST['nombre_usuario'];
		$params['email'] = $_POST['email'];
		$params['contrasena'] = md5($_POST['contrasena']);
		$params['biografia'] = $_POST['biografia']; 		
		$rol_params['rol']='Usuario normal';
		$id_rol = $this->consultar($this->querys['get_rol'], $rol_params);
		$params['id_rol'] = $id_rol[0]['id_rol'];
		if(!empty(($_FILES['perfil_image']['name']))){
			$i_name = explode('@', $_POST['email']);
			$ext = explode('.', $_FILES['perfil_image']['name']);
			$source = $_FILES['perfil_image']['tmp_name']; 
			$destination = 'view/resources/images/user_images/'.$i_name[0].'_image.'.$ext[count($ext)-1];
			if($this->checkTypeOfFile($_FILES['perfil_image'],'image')){
				if(move_uploaded_file($source, $destination)){
					$params['imagen_perfil'] = $i_name[0].'_image.'.$ext[count($ext)-1];	
					if($this->insertar('usuario', $params)){
						$msg = 'Registro exitoso!';
						$color = 'success';
						$registered = true;
					}else{ 
						$msg = 'Ya existe una cuenta asociada con el correo electronico que ingreso';
						$color = 'danger';
					}
				}else{
					$msg = 'SERVER_ERROR: Error al mover la imagen de perfil al servidor';
					$color = 'danger';
				}
			}else{
				$msg = 'El elemento que intentas subir como imagen de perfil no esta permitido';
				$color = 'danger';
			}	
		}else{
			$msg = 'No se ingreso una imagen de usuario, se establecio una por defecto.';
			$color = 'warning';
			$params['imagen_perfil'] = 'user_default.png';
			if($this->insertar('usuario', $params)){
			 $registered = true;
			}else{
				$msg = 'Ya existe una cuenta asociada con el correo electronico que ingreso';
				$color = 'danger';	
			}			
		}
		$return_data['registered'] = $registered;
		$return_data['msg'] = $msg;
		$return_data['color'] = $color;
		return $return_data;
	}
}
?>