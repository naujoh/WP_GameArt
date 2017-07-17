<?php
include('model/gameart.php');
class crudModel extends gameArt{

	public $querys;
	public $msg;
	public $color;
	public $rows_afected;

	public function __construct(){
		parent::__construct();
		$this->querys = array(
			"rol"=>array("SELECT * FROM rol", "SELECT * FROM usuario WHERE id_rol=:id_rol"), 

			"sexo"=>array("SELECT * FROM sexo", "SELECT * FROM usuario WHERE id_sexo=:id_sexo"),

			"tipo_pago"=>array("SELECT * FROM tipo_pago", "SELECT * FROM pago WHERE id_tipo_pago=:id_tipo_pago"), 

			"categoria"=>array("SELECT * FROM categoria c JOIN tipo_publicacion tp on c.id_tipo_publicacion=tp.id_tipo_publicacion", "SELECT * FROM publicacion p JOIN tipo_publicacion tp ON p.id_tipo_publicacion=tp.id_tipo_publicacion JOIN categoria c ON tp.id_tipo_publicacion=c.id_tipo_publicacion WHERE id_categoria=:id_categoria"), 

			"tipo_publicacion"=>array("SELECT * FROM tipo_publicacion", "SELECT * FROM categoria WHERE id_tipo_publicacion=:id_tipo_publicacion"),

			"acceso"=>array("SELECT * FROM acceso", "SELECT * FROM publicacion WHERE id_acceso=:id_acceso"),

			"nivel_dificultad"=>array("SELECT * FROM nivel_dificultad", "SELECT * FROM tutorial WHERE id_nivel_dificultad=:id_nivel_dificultad"),

			"tipo_recurso"=>array("SELECT * FROM tipo_recurso", "SELECT * FROM recurso WHERE id_tipo_recurso=:id_tipo_recurso")
		);		
	}

	// public function crudReadData($t){
	// 	$data = $this->gameart->consultar($this->querys[$t]);
	// 	return $data;
	// }

	public function crudDeleteData($t, $params){
		$dependencies = $this->consultar($this->querys[$t][1], $params);
		$this->msg = 'El elemento no se puede eliminar por que hay '.count($dependencies).' elementos asociados';
		$this->color = 'danger';
		if(count($dependencies)==0){
			$rows_afected = $this->borrar($t, $params);
			$this->msg = 'Se han eliminado '.$rows_afected.' elementos exitosamente';
			$this->color = 'success';
		}
	}

	public function crudInsertData($t, $params){
		$this->insertar($t, $params);
		$this->msg = 'Se inserto el elemento a '. $t;
		$this->color = 'success';
	}

	public function createCategoria($params){
	}
	// public function crudUpdateData($t, $params){
		
	// }
}
?>