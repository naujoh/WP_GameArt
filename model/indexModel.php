<?php 
class indexModel{
	public $galeries;
	public $audios;
	public $tutorials;

	private $querys;
	
	public function __construct(){
		include_once('model/galeriesModel.php');
		include_once('model/audiosModel.php');
		include_once('model/tutorialsModel.php');
		$this->galeries = new galeriesModel();
		$this->audios = new audiosModel();
		$this->tutorials = new tutorialsModel();
	}
}
?>