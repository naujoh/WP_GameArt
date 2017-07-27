<?php 
include('view/view.php');
class controller {
	private $model;
	private $view;

	public function invoke(){
		if(isset($_REQUEST['c'])){
			switch($_REQUEST['c']){
				case 'index':
					$this->indexController();
					break;
				case 'tutorials':
					$this->tutorialsController();
					break;
				case 'galeries':
					$this->galeriesController();
					break;
				case 'audios':
					$this->audiosController();
					break;			
				case 'uploads':
					$this->uploadsController();
					break;	
				case 'register':
					$this->registerController();
					break;
				case 'crud':
					$this->crudController();		
					break;	
				case 'user':
					$this->userController($_REQUEST['action']);
					break;
				case 'comments':
					$this->commentsController($_REQUEST['action']);
					break;
				case 'ws':
					switch($_GET['action']){
						case 'usuario':
							include('ws/usuario/index.php');
							break;
						case 'rol':
							include('ws/rol/index.php');
							break;
						case 'sexo':
							include('ws/sexo/index.php');
							break;
						case 'categoria':
							include('ws/categoria/index.php');
							break;
						case 'tipo_publicacion':
							include('ws/tipo_publicacion/index.php');
							break;
						case 'tipo_recurso':
							include('ws/tipo_recurso/index.php');
							break;
						case 'comentario':
							include('ws/comentario/index.php');
							break;
						case 'publicacion':
							include('ws/publicacion/index.php');
							break;
					}
					break;
				case 'download':
						$this->downloadController();
					break;
				default:
					$this->errorController();
					break;
			}
		}else{
			$this->indexController();
		}
	}

	public function indexController(){
		include_once('model/indexModel.php');
		$this->model = new indexModel();
		$this->view = new view($this->model);
		$this->view->pIndex();
	}

	public function tutorialsController(){
		include_once('model/tutorialsModel.php');
		include_once('model/commentsModel.php');
		$this->model = new tutorialsModel();
		$this->view = new view($this->model);
		if(array_key_exists('action', $_REQUEST)){
			switch($_REQUEST['action']){
				case 'upload':
				$info = $this->model->insertTutorial();
				if($info['insertered'])
					$this->view->redirect('tutorials', 'post', 'id_publicacion', $info['id_publicacion']);
					break;
				case 'post':
					$this->view->pPost($_GET['id_publicacion'], 3);
					break;
				case 'edit':
					$this->view->pTutorialsEdit($_GET['id_publicacion']);
				case 'update':
					$return_data= $this->model->updateTutorial();
					$_SESSION['alert']['return_data'] = $return_data;
					$this->view->redirect('user', 'publications', 'id_publicacion', $return_data['id_publicacion'], 'panel');
					break;
				case 'delete':
					$_SESSION['alert']['return_data'] = $this->model->deleteTutorial();
					$this->view->redirect('user', 'publications', 'id_publicacion', $return_data['id_publicacion'], 'panel');
					break;
			}
		}else{
			$this->view->pTutorials();
		}
	}

	public function galeriesController(){
		include_once('model/galeriesModel.php');
		include_once('model/commentsModel.php');
		$this->model = new galeriesModel();
		$this->view = new view($this->model);
		if(array_key_exists('action', $_REQUEST)){
				switch($_REQUEST['action']){
				case 'upload':
					$info = $this->model->insertGalery();
					if(array_key_exists('id_publicacion', $info))
						$this->view->redirect('galeries', 'post', 'id_publicacion', $info['id_publicacion']);
					break;
				case 'post':
					$this->view->pPost($_GET['id_publicacion'], 1);
			  	break;
		  	case 'edit':
		  		$this->view->pPubsEdit($_GET['id_publicacion'], 'galeries');
		  		break;
	  		case 'update':
	  			$return_data=$this->model->updateGallery();
	  			$_SESSION['alert']['return_data'] = $return_data;
	  			$this->view->redirect('user', 'publications', 'id_publicacion', $return_data['id_publicacion'], 'panel');
	  			break;
  			case 'delete':
					$_SESSION['alert']['return_data'] = $this->model->deleteGallery();
					$this->view->redirect('user', 'publications', 'id_publicacion', $return_data['id_publicacion'], 'panel');
  				break;
			}
		}else{
			$this->view->pGaleries();
		}
	}

	public function audiosController(){
		include_once('model/audiosModel.php');
		include_once('model/commentsModel.php');		
		$this->model = new audiosModel();
		$this->view = new view($this->model);
		if(array_key_exists('action', $_REQUEST)){
			switch($_REQUEST['action']){
				case 'upload':
				$info = $this->model->insertAudio();
				if(array_key_exists('id_publicacion', $info))
					$this->view->redirect('audios', 'post', 'id_publicacion', $info['id_publicacion']);
					break;
				case 'post':
					$this->view->pPost($_GET['id_publicacion'], 2);
					break;
		  	case 'edit':
		  		$this->view->pPubsEdit($_GET['id_publicacion'], 'audios');
		  		break;
	  		case 'update':
	  			$return_data=$this->model->updateAudio();
	  			$_SESSION['alert']['return_data'] = $return_data;
	  			$this->view->redirect('user', 'publications', 'id_publicacion', $return_data['id_publicacion'], 'panel');
	  			break;
  			case 'delete':
					$_SESSION['alert']['return_data'] = $this->model->deleteAudios();
					$this->view->redirect('user', 'publications', 'id_publicacion', $return_data['id_publicacion'], 'panel');
  				break;					
			}
		}else{
			$this->view->pAudios();
		}
	}

	public function uploadsController(){
		include_once('model/uploadsModel.php');
		include_once('model/tutorialsModel.php');
		include_once('model/galeriesModel.php');
		include_once('model/audiosModel.php');
		$this->model = new uploadsModel();
		$this->view = new view($this->model);
		if(isset($_SESSION['usuario']))
			$this->view->pUploads(new tutorialsModel(), new galeriesModel(), new audiosModel());
		else
			$this->view->pFormLogin('denied');
	}		

	public function registerController(){
		include_once('model/registerModel.php');
		$this->model = new registerModel();
		$this->view = new view($this->model);
		if(array_key_exists('new_register', $_POST)){
			$return_data = $this->model->register();
			if($return_data['registered']){
				$_SESSION['alert']['return_data'] = $return_data;
				$this->userController('login');
			}else{
				$_SESSION['alert']['return_data'] = $return_data;				
				$this->view->pRegisterForm();
			}
		}else{
			$this->view->pRegisterForm();
		}
	}	

	public function userController($action){
		include_once('model/userModel.php');
		$this->model = new userModel();
		$this->view = new view($this->model);
		switch ($action) {
			case 'login':
				if($this->model->login($_POST['email'], $_POST['contrasena']))
					$this->view->getUserInfo($_SESSION['usuario']['id_usuario']);
				else
					$this->view->pFormLogin('incorrect_credentials');
				break;
			case 'logout':
				$this->model->logout();
				$this->indexController();
				break;
			case 'show_info':
					$this->view->pUserProfile();
				break;
			case 'update_form':
					$this->view->pUserUpdateData();
				break;	
			case 'remove':
				if($_POST['election']=='si'){
					$this->view->redirect('user', 'delete_data', 'id_usuario', $_SESSION['usuario']['id_usuario']);
				}else{
					$this->view->redirect('user', 'update_form', 'id_usuario', $_SESSION['usuario']['id_usuario']);
				}
				break;
			case 'update_data':
				switch ($_POST['enviar']) {
					case 'update':
						$return_data = $this->model->updateData();
						$_SESSION['alert']['return_data'] = $return_data;
						$this->view->redirect('user', 'show_info', 'id_usuario', $_POST['id_usuario']);
						break;
					case 'delete':
							$this->view->pPopUp('confirmation');
						break;
					case 'premium':
						break;
				}
				break;			
		  case 'delete_data':
				$return_data = $this->model->removeUser($_SESSION['usuario']['id_usuario']);
				$_SESSION['alert']['return_data'] = $return_data;
				$this->indexController();
		  	break;		
			case 'recover_password':
				if($_REQUEST['activity']=='recover_form')
					$this->view->pPopUp('recover');
				else{
					$return_data = $this->model->sendRecoverMail();
					$_SESSION['alert']['return_data'] = $return_data;
					$this->indexController();
				}
				break;	
			case 'restore':
				if($_REQUEST['activity']=='write'){
					$this->view->pPopUp('write_new', $_GET['llave']);
				}else{
					$_SESSION['alert']['return_data'] = $this->model->restore();
					$this->indexController();
				}
				break;
			case 'publications':
				switch($_REQUEST['activity']){
					case 'panel':
						include_once('model/tutorialsModel.php');
						include_once('model/galeriesModel.php');
						include_once('model/audiosModel.php');
						$t_model = new tutorialsModel();
						$g_model = new galeriesModel();
						$a_model = new audiosModel();
						$this->view->pPublicationsPanel($t_model, $g_model, $a_model);
					break;
				}
				break;
			case 'premium_form':
				$this->view->pPopUp('premium_popup');
				break;	
			case 'premium-convert':
				$_SESSION['alert']['return_data'] = $this->model->premiumUpgrade();
				$_SESSION['usuario']['id_rol']=5;
				$this->view->redirect('user', 'show_info', 'id_usuario', $_SESSION['usuario']['id_usuario']);
				break;
			case 'donation':
				switch ($_REQUEST['activity']) {
					case 'form':
						$this->view->pPopUp('donation_popup');
						break;
					case 'donate':
						$_SESSION['alert']['return_data']=$this->model->donate();
						$this->view->redirect('user', 'show_info', 'id_usuario', $_SESSION['usuario']['id_usuario']);
						break;
				}
				break;
			case 'pdf':
				// $this->model->getPdf();
				$this->view->pPdf(); 
				break;
			case 'control_panel':
					$this->view->pAdminPanel();
				break;
		}
	}	

	public function downloadController(){
		include('model/downloadModel.php');
		$this->model = new downloadModel();
		$this->view = new view($this->model);
		$params['id_publicacion'] = $_GET['id_publicacion'];
		$tipo_pub = $this->model->consultar($this->model->querys['get_data'], $params);
		if($tipo_pub[0]['id_tipo_publicacion']==1){
			$this->model->galleryZip();
		}else{
			$this->model->audioZip();
		}
	}

	public function commentsController($action){
		include_once('model/commentsModel.php');
		$this->model = new commentsModel();
		$this->view = new view($this->model);
		switch ($action) {
			case 'new_comment':
				$this->model->insertNewComment($_POST['comentario'], $_POST['id_publicacion'], $_SESSION['usuario']['id_usuario']);
				switch ($_POST['id_tipo_publicacion']) {
					case 1:
						$this->view->redirect('galeries', 'post', 'id_publicacion', $_POST['id_publicacion']);
						break;
					case 2:
						$this->view->redirect('audios', 'post', 'id_publicacion', $_POST['id_publicacion']);
						break;
					case 3:
						$this->view->redirect('tutorials', 'post', 'id_publicacion', $_POST['id_publicacion']);
						break;
				}
				break;
		}
	}

	public function crudController(){
		include_once('model/crudModel.php');
		$t = $_REQUEST['t'];
		$this->model = new crudModel();
		$this->view = new view($this->model, $t);
		switch($_REQUEST['action']){
			case 'delete':
				$params ['id_'.$t] = $_GET['id_'.$t];
				$this->model->crudDeleteData($t, $params);
				$this->view->outputCrudData($t);
				break;
			case 'create':
				if($t == 'categoria'){
					$params['id_tipo_publicacion'] = $_POST['id_tipo_publicacion'];
					$params['categoria'] = $_POST['categoria'];
				}else{
					$params[$t] = $_POST['elemento'];
				}
				$this->model->crudInsertData($t, $params);
				$this->view->outputCrudData($t);
				break;
			case 'update':
				if($t == 'categoria')
					$params['id_tipo_publicacion'] = $_POST['id_tipo_publicacion'];				
				$params[$t] = $_POST['elemento'];
				$id_name = $_POST['id_name'];
				$id = $_POST['id'];
				$keys[$id_name] = $id;
				$this->model->crudUpdateData($t, $params, $keys);
				$this->view->outputCrudData($t);
				break;
			case 'edit':
			case 'new':
				if($_REQUEST['action']=='edit'){
					if(isset($_REQUEST['id_'.$t])){
						$params['id_'.$t] = $_REQUEST['id_'.$t];
						$data_edit = $this->model->dataEdit($_REQUEST['action'],$t,'id_'.$t,$params);
						$this->view->pNewEditForm($data_edit);
					}else{ $this->view->outputCrudData($t); }
				}else{
					$this->view->pNewEditForm(null);
				}
				break;	
			default:
				$this->view->outputCrudData($t);
				break;	
		}			
	}
	public function errorController(){
		echo 'La direccion especificada no existe :-(';
	}
}
?>