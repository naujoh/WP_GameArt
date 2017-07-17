<?php 
class indexModel{
	public $galeries;
	
	public function __construct(){
		include_once('model/galeriesModel.php');
		$this->galeries = new galeriesModel();
	}
}
?>