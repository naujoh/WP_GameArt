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
					$this->userController($_GET['action']);
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
		$this->model = new tutorialsModel();
		$this->view = new view($this->model);
		$this->view->pTutorials();
	}

	public function galeriesController(){
		include_once('model/galeriesModel.php');
		$this->model = new galeriesModel();
		$this->view = new view($this->model);
		$this->view->pGaleries();
	}

	public function audiosController(){
		include_once('model/audiosModel.php');
		$this->model = new audiosModel();
		$this->view = new view($this->model);
		$this->view->pAudios();
	}

	public function uploadsController(){
		include_once('model/uploadsModel.php');
		$this->model = new uploadsModel();
		$this->view = new view($this->model);
		$this->view->pUploads();
	}		

	public function registerController(){
		include_once('model/registerModel.php');
		$this->model = new registerModel();
		$this->view = new view($this->model);
		if(array_key_exists('new_register', $_POST)){
			if($this->model->register())
				$this->userController('login');
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
					$this->view->getUserInfo($_SESSION['id_usuario']);
				else
					$this->indexController();
				break;
			case 'show_info':
					$this->view->pUserPanel();
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
				// print_r($_POST); die();
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

	// public function categoriaController{
	// 	include_once('model/categoriaModel.php');
	// 	$this->model = new categoriaModel();
	// 	$this->view = new view($this->model);
	// 	switch($_REQUEST['action']){
	// 		case 'create'
	// 	}
	// 	$this->view->pUploads();
	// }

	public function errorController(){
		echo 'La direccion especificada no existe :-(';
	}
}
?>