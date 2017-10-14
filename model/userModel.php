<?php
include_once('gameart.php');

class userModel extends gameArt{
	public $querys;
	public $contenttype;
	function __construct(){
		parent::__construct();
		$this->setQuerys();
	}

	public function setQuerys(){
		$this->querys = array(
			"login"=>"SELECT * FROM usuario WHERE email=:email AND contrasena=:contrasena",
			"user_data"=>"SELECT * FROM usuario WHERE id_usuario=:id_usuario",
			"ud_mail" => "SELECT * FROM usuario WHERE email=:email",
			"ud_llave" => "SELECT * FROM usuario WHERE llave=:llave",
			"content"=>
				"SELECT u.id_usuario, p.id_publicacion, r.nombre_recurso FROM usuario u 
					JOIN publicacion p ON u.id_usuario=p.id_usuario 
					JOIN categoria c ON c.id_categoria = p.id_categoria 
					JOIN recurso r ON p.id_publicacion = r.id_publicacion 
					JOIN tipo_publicacion tp ON tp.id_tipo_publicacion = c.id_tipo_publicacion
					WHERE u.id_usuario =:id_usuario AND r.id_tipo_recurso = 6 
					AND tp.id_tipo_publicacion=".$this->contenttype.";",
			"sexo_data"=>"SELECT id_sexo as id, sexo as option FROM sexo ORDER BY id_sexo ASC",
			"get_pubs" => "SELECT * FROM publicacion WHERE id_usuario = :id_usuario",
			"donations" => "SELECT * FROM pago WHERE id_receptor=:id_receptor"
   	);		
	}

	public function login($email, $password){
		$login = false;
		$tmp = array();
		$password = md5($password);
		$params['email'] = $email;
		$params['contrasena'] = $password;
		$data = $this->consultar($this->querys['login'], $params);
		if(sizeof($data)>0){

			if(isset($_SESSION['alert']['return_data']))
				$tmp = $_SESSION['alert']['return_data'];
			session_destroy();
			session_start();
			if(isset($_SESSION['alert']['return_data']))
				$_SESSION['alert']['return_data'] = $tmp;
			$_SESSION['usuario']['id_usuario'] = $data[0]['id_usuario'];
			$_SESSION['usuario']['nombre'] = $data[0]['nombre'].' '.$data[0]['apaterno'].' '.$data[0]['amaterno'];
      $_SESSION['usuario']['nombre_usuario']= $data[0]['nombre_usuario'];
			$_SESSION['usuario']['email'] = $data[0]['email'];
      $_SESSION['usuario']['biografia'] = $data[0]['biografia'];			
      $_SESSION['usuario']['imagen_perfil'] = $data[0]['imagen_perfil'];
      $_SESSION['usuario']['id_rol'] = $data[0]['id_rol'];
      $login = true;
		}
		return $login;
	}

	public function logout(){
		if(session_destroy())
			$_SESSION = array();
		return true;
	}

	public function updateData(){
		$return = array();
		$msg="";
		$color="success";
		$updated = false;
		if(!empty($_POST['contrasena']))
			$params['contrasena'] = md5($_POST['contrasena']);
		$params['nombre'] = $_POST['nombre'];
		$params['apaterno'] = $_POST['apaterno'];
		$params['amaterno'] = $_POST['amaterno'];
		$params['id_sexo'] = $_POST['id_sexo'];
		$params['nombre_usuario'] = $_POST['nombre_usuario'];
		$params['email'] = $_POST['email'];
		$params['biografia'] = $_POST['biografia'];
		$keys['id_usuario'] = $_POST['id_usuario'];
		if($this->actualizar('usuario', $params, $keys)){
			$msg = 'Se actualizo la informacion';
			$updated = true;
		}
		else{
			$msg = 'No se puedo actualizar la informacion del usuario';
			$color="danger";
		}
		if(!empty($_FILES['imagen_perfil']['name'])){
			$i_name = explode('@', $_POST['email']);
			$ext = explode('.', $_FILES['imagen_perfil']['name']);
			$source = $_FILES['imagen_perfil']['tmp_name']; 
			$destination = 'view/resources/images/user_images/'.$i_name[0].'_image.'.$ext[count($ext)-1];
			if($this->checkTypeOfFile($_FILES['imagen_perfil'],'image')){
				if(move_uploaded_file($source, $destination)){
					$img_perfil['imagen_perfil'] = $i_name[0].'_image.'.$ext[count($ext)-1];	
					$param['id_usuario'] = $_POST['id_usuario'];
					if($this->actualizar('usuario', $img_perfil, $param)){
						$_SESSION['usuario']['imagen_perfil'] = $img_perfil['imagen_perfil'];
						$updated = true;
					}else{
						$msg = 'No se pudo actualizar la imagen de perfil';
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
		}		
		$return_data['msg'] = $msg;
		$return_data['color'] = $color;
		$return_data['updated'] = $updated;
		return $return_data;
	}

	public function removeUser($id_usuario){
		$params['id_usuario'] = $id_usuario;
		$msg="Se ha elmininado el usuario y todo el contenido relacionado";
		$color="success";
		$removed = true;
		if(!$this->borrar('usuario', $params)){
			$msg="Error al eliminar al usuario";
			$color="danger";
			$removed = false;
		}
		$return_data['msg'] = $msg;
		$return_data['color'] = $color;
		$return_data['removed'] = $removed;
		session_destroy();
		$_SESSION = array();
		return $return_data;
	}

	public function sendRecoverMail(){
		$params['email'] = $_POST['email'];
		$user_data = $this->consultar($this->querys['ud_mail'], $params);
		if(count($user_data)>0){
			$token = md5(rand(1,10000).sha1($params['email'])).md5(md5($user_data[0]['contrasena'])).md5(rand(1,1000000).soundex(crypt('pjd5132','camello')).crypt('leon','nino'));
			$param['llave'] = $token;
			$llaves['email']=$_POST['email'];
			$this->actualizar('usuario', $param, $llaves);
			$msg = 'Se ha enviado un correo con las instucciones para recuperar la contrasena';
			$color = 'success';			
			//Procedimiento para enviar el correo electronico
			date_default_timezone_set('Etc/UTC');
			require 'lib/phpmailer/PHPMailerAutoload.php';
			$mail = new PHPMailer;
			$mail->isSMTP();
			$mail->SMTPDebug = 0;
			$mail->Debugoutput = 'html';
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = 587;
			$mail->SMTPSecure = 'tls';
			$mail->SMTPAuth = true;
			$mail->Username = "";
			$mail->Password = "";
			$mail->setFrom('14030658@itcelaya.edu.mx', 'Juan Hernandez');
			$mail->addAddress($user_data[0]['email'], $user_data[0]['email']);
			$mail->Subject = 'GameArt | Recuperar contrasena';
			$mail->msgHTML('Estimado usuario a continuacion le enviamos una liga que debera precionar para recuperar su cuenta.<br><a href="http://localhost/GameArt/index.php?c=user&action=restore&activity=write&llave='.$token.'">Recuperar cuenta</a>');
			$mail->AltBody = 'This is a plain-text message body';
			if (!$mail->send()) {
			    $msg = "Mailer Error: " . $mail->ErrorInfo;
			} else {
			    $msg = "Message sent! ". $msg;
			}
		}
		$return_data['msg']=$msg;
		$return_data['color']=$color;
		return $return_data;
	}

	public function restore(){
		$msg = 'Se ha reestablecido la contrasena';
		$color = 'success';
		$params['llave']=$_POST['llave'];
		$user_data = $this->consultar($this->querys['ud_llave'], $params);
		if(count($user_data)>0 && strlen($params['llave'])>0){
			$llaves['llave'] = $_POST['llave'];
			$param['contrasena'] = md5($_POST['contrasena']);
			$param['llave'] = 'null';
			if(!$this->actualizar('usuario', $param, $llaves)){
				$msg = 'No se pudo reestablecer la contrasena vuelva a intentarlo :( .';
				$color = 'danger';			
			}
		}
		$return_data['msg'] = $msg;
		$return_data['color'] = $color;
		return $return_data;
	}

	public function premiumUpgrade(){
		$keys['id_usuario']=$_SESSION['usuario']['id_usuario'];
		$params['id_rol']=5;
		$this->actualizar('usuario', $params, $keys);	
		$return_data['msg'] = 'Te convertiste en usuario premium, FELICIDADES!';
		$return_data['color'] = 'success';
		return $return_data; 
	}

	public function donate(){
		$msg = 'Se realizo la donacion';
		$color = 'success';
		$params['id_usuario'] = $_SESSION['usuario']['id_usuario'];
		$params['id_receptor'] = $_REQUEST['id_receptor'];
		$params['monto'] = $_POST['monto'];
		$params['fecha_pago'] = date('Y-m-d');
		$params['id_tipo_pago'] = 5;
		if(!$this->insertar('pago', $params)){
			$msg = 'Error al realizar la donacion';
			$color = 'danger';
		}
		$return_data['msg'] = $msg;
		$return_data['color'] = $color;
		return $return_data;
	}

	public function getPdf(){
		$params['id_receptor'] = $_SESSION['usuario']['id_usuario'];
		$donations_data = $this->consultar($this->querys['donations'], $params);
		$donadores = array();
		foreach ($donations_data as $key => $value) {
			array_push($donadores, $donations_data[$key]['id_usuario']);
		}
		$donadores_data = array();
		$params = array();
		foreach ($donadores as $key => $value) {
			$params['id_usuario'] = $donadores[$key];
			$data = $this->consultar($this->querys['user_data'], $params);
			$params = array();
			array_push($donadores_data, $data);
		}
		// echo '<pre>';
		// print_r($donadores_data); die();
		// echo '</pre>';
		$datos['donadores_data'] = $donadores_data;
		$datos['donations_data'] = $donations_data;
		return $datos;
	}
}
?>
