<?php
	include('model/gameart.php');
	class galeriesModel extends gameArt{
		public $querys;

		public function __construct(){
			parent::__construct();	
			$this->querys = array("recents"=>"SELECT p.id_publicacion, u.id_usuario, u.nombre_usuario, u.imagen_perfil, p.titulo, r.nombre_recurso FROM publicacion p JOIN usuario u ON p.id_usuario=u.id_usuario JOIN recurso r ON r.id_publicacion = p.id_publicacion 
													ORDER BY p.fecha_subida DESC LIMIT 6;");
		}

		public function getRecents(){
			$data = $this->consultar();
		}
	}
?>