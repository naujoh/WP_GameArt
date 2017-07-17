<?php
// print_r($_GET); die('MUERO');
if(isset($_GET['c'])){
  if(file_exists('controller/'.strtolower($_GET['c']).'Controller.php')){
    include('controller/'.strtolower($_GET['c']).'Controller.php');
    $controller = $_GET['c'].'Controller';
  	$c = new $controller();
    $c->invoke();
  }else{
    include('controller/errorController.php');
  }
}else{
  include('controller/indexController.php');
	$c = new indexController();
	$c->invoke();
}
?>