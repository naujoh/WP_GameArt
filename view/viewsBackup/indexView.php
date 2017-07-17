<?php
	class indexView{
		private $model;

		public function __construct($model){
			$this->model = $model;
		}

		public function printIndex(){
			// Traer del modelo los datos del template
			include('view/templates/index.php');
		}
	}
?>