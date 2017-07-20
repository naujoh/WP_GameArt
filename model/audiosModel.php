<?php
include_once('model/gameart.php');
class audiosModel extends gameArt{
	public $querys;
	public function __construct(){
		parent::__construct();	
		$this->querys = array(
			"recents"=>
				"SELECT p.id_publicacion, u.id_usuario, u.nombre_usuario, u.imagen_perfil, p.titulo, r.nombre_recurso 
					FROM publicacion p 
						JOIN usuario u ON p.id_usuario=u.id_usuario 
						JOIN recurso r ON r.id_publicacion = p.id_publicacion 
						JOIN categoria c ON c.id_categoria = p.id_categoria
						WHERE c.id_tipo_publicacion = 2
						ORDER BY p.fecha_subida DESC LIMIT 6;",
			"dropdown"=> "SELECT * FROM categoria where id_tipo_publicacion = 2 ORDER BY id_categoria ASC",
			"all"=>"SELECT p.id_publicacion, r.nombre_recurso FROM publicacion p JOIN categoria c ON p.id_categoria=c.id_categoria JOIN recurso r ON r.id_publicacion=p.id_publicacion WHERE c.id_tipo_publicacion = 2"				
			);	
		}
		public function getRecents(){
			$data = $this->consultar($this->querys['recents']);
			return $data;
		}

		public function getAllAudios(){
			$data = $this->consultar($this->querys['all']);
			return $data;
		}
}
?>