<?php
	include_once('model/gameart.php');
	class commentsModel extends gameArt{
		public function __construct(){
			parent::__construct();
		}

		public function insertNewComment($comment, $pub_id, $user_id){
			$params['comentario'] = $comment;
			$params['id_publicacion'] = $pub_id;
			$params['id_usuario'] = $user_id;
			$params['fecha_comentario'] = date('Y-m-d');
			$this->insertar('comentario', $params);
		}

		public function getComments($pub_id){
			$params['id_publicacion'] = $pub_id;
			$comments = $this->consultar('SELECT c.comentario, c.fecha_comentario, c.id_usuario, u.imagen_perfil, u.nombre_usuario FROM comentario c JOIN usuario u ON u.id_usuario=c.id_usuario WHERE id_publicacion=:id_publicacion ORDER BY c.id_comentario DESC', $params);
			return $comments;
		}
	}
?>