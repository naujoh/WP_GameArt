<?php
class gameArt{
	var $conexion;

	function __construct(){
		include('model/configuracion.php');
		$this->conexion=$conexion; 
	}

	/**
	 * Metodo generico para realizar consultas
 	 */
	function consultar($sql, $param=null){
		$stm= $this->conexion->prepare($sql);
		if(!is_null($param)){
			foreach ($param as $key => $value) {
				$stm->bindValue(':'.$key, $value);
			}
		}
		$stm->execute();
		$data = $stm->fetchAll();
		return $data;
	}

/**
	* Metodo generico para insertar en la BD
	*/
	function insertar($table, $params){
		$data = array_keys($params);
		array_walk($data, function(&$item){$item=' :'.$item;});
		$sql = 'INSERT INTO '.$table.'('.implode(" ",explode(":",implode(",",$data))).') values ('.implode(",", $data).')';
		try{
			$stm=$this->conexion->prepare($sql);
			foreach ($params as $key => $value) {
				// echo $key .'>>'. $value; 
				$stm->bindValue(':'.$key, $value);
			}
			// echo $sql; die();
			return $stm->execute();		
		} 
		catch (Exception $e){
			echo 'Oh no!: '. $e->getMessage(). '\n';
		}
	}

	/**
	* Metodo generico para actualizar en la BD
	*/
	function actualizar(){

	}

	/**
	* Metodo generico para borrar en la BD
	*/
	function borrar($table, $params){
		$sql = 'DELETE from '.$table.' where ';
		$where ="";
		$c = 1;
		foreach ($params as $key => $value) { 
			if(count($params)==$c){
					$where .= $key.'= :'.$key;
			}else{
				$where .= $key.'= :'.$key.' AND ';
			}
			$c++;
		}
		$sql = $sql . $where;
		try{
			$stm = $this->conexion->prepare($sql);
			foreach ($params as $key => $value) {
				$stm->bindParam(':'.$key, $value);
			}
			return $stm->execute();
		}catch(Exception $e){
			echo 'Oh no!: '.$e->getMessage();
		}
	}
}	
?>