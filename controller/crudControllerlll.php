<?php 
	require('model/crudModel.php');
	class crudController{
		public $model;
		public $view;

		public function __construct(){
			$this->model = new crudModel();
		}
		public function invoke(){
			$t = $_GET['t'];
			include('view/view.php');
			$this->view = new view($this->model,$t); 
			switch($_GET['action']){
				case 'delete':
					$params ['id_'.$t] = $_GET['id_'.$t];
					$params [$t] = 'algo';
					$this->model->borrar($t, $params);
					$this->view->outputCrudData($t);
					break;
				default:
					$this->view->outputCrudData($t);
					break;					
			}
		}
	}	
?>