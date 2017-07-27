<?php
include_once('model/gameart.php');
class downloadModel extends gameArt{
	public $querys;

	public function __construct(){
		parent::__construct();
		$this->querys = array(
			"get_data"=>"SELECT tp.id_tipo_publicacion FROM publicacion p JOIN categoria c ON c.id_categoria=p.id_categoria JOIN tipo_publicacion tp ON tp.id_tipo_publicacion = c.id_tipo_publicacion WHERE id_publicacion=:id_publicacion",
			"resources"=>"SELECT r.nombre_recurso FROM publicacion p JOIN recurso r ON p.id_publicacion=r.id_publicacion JOIN categoria c ON c.id_categoria = p.id_categoria WHERE p.id_publicacion=:id_publicacion AND r.id_tipo_recurso=:id_tipo_recurso AND c.id_tipo_publicacion=:id_tipo_publicacion"
			);
	}

	public function galleryZip(){
		$zip = new ZipArchive();
		$filename = 'gallery.zip';
		$params['id_publicacion'] = $_GET['id_publicacion'];
		$params['id_tipo_recurso'] = 4;
		$params['id_tipo_publicacion'] = 1;
		$nombre_recursos = $this->consultar($this->querys['resources'], $params);
	 	$dir = 'view/resources/images/post_images/';
 		$zip->addEmptyDir($dir);
		if($zip->open($filename,ZIPARCHIVE::CREATE)===true){
			foreach ($nombre_recursos as $key => $value) {
				$zip->addFile($dir.$nombre_recursos[$key]['nombre_recurso']);
			}
			$zip->close();
		header("Content-type: application/octet-stream");
	 	header('Content-disposition: attachment; filename="'.$filename.'"');
	  // leemos el archivo creado
	  readfile($filename);
		 // Por último eliminamos el archivo temporal creado
	  unlink($filename);//Destruyearchivo temporal			

		}
		else {
      echo 'Error creando '.$filename; die();
		}
	}

	public function audioZip(){
		$zip = new ZipArchive();
		$filename = 'gallery.zip';
		$params['id_publicacion'] = $_GET['id_publicacion'];
		$params['id_tipo_recurso'] = 2;
		$params['id_tipo_publicacion'] = 2;
		$nombre_recursos = $this->consultar($this->querys['resources'], $params);
	 	$dir = 'view/resources/audios/';
 		$zip->addEmptyDir($dir);
		if($zip->open($filename,ZIPARCHIVE::CREATE)===true){
			foreach ($nombre_recursos as $key => $value) {
				$zip->addFile($dir.$nombre_recursos[$key]['nombre_recurso']);
			}
			$zip->close();
		header("Content-type: application/octet-stream");
	 	header('Content-disposition: attachment; filename="'.$filename.'"');
	  // leemos el archivo creado
	  readfile($filename);
		 // Por último eliminamos el archivo temporal creado
	  unlink($filename);//Destruyearchivo temporal			

		}
		else {
      echo 'Error creando '.$filename; die();
		}
	}	
}

?>