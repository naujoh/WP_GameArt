<?php 
	require('model/indexModel.php');
	class indexController{
		private $model;
		private $view;

		public function __construct(){
			$this->model = new indexModel();
		}
		public function invoke(){
			include('view/view.php');
			$this->view = new view($this->model);
			$this->view->pIndex();
		}
	}	
?>