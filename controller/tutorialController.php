<?php
include('model/tutorialModel.php');
include('view/view.php');
class tutorialController{
	private $model;
	private $view;

	public function __construct(){
		$this->model = new tutorialModel();
		$this->view = new view($this->model);
	}

	public function invoke(){
		$this->view->pTutorials();
	}
}
?>