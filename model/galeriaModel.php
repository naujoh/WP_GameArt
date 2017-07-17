<?php
	include('model/gameart.php');
	class galeriaModel extends gameArt{
		private $querys;
		public function __construct(){
			parent::_construct();	
			$this->querys = array("recents"=>"SELECT p.id_publicacion, u.id_usuario, p.titulo, r.nombre_recurso FROM publicacion p JOIN usuario u ON p.id_usuario=u.id_usuario JOIN recurso r ON r.id_publicacion = p.id_publicacion 
													ORDER BY p.fecha_subida;");
		}

		public function getRecents(){
			$data = $this->consultar('');



		}
	}
?>