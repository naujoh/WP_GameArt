<?php
class tutorialView{
	private $model;

	public function __construct($model){
		$this->model = $model;
	}

	public function printTutorials(){
		include('view/templates/tutoriales.php');
	}
}
?>