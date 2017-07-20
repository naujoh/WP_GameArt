<?php
class gameArt{
	var $connection;
	public $allow_types;

	function __construct(){
		include('model/configuracion.php');
		$this->connection=$connection; 
		$this->allow_types = array('images'=>array('image/jpeg', 'image/pjpeg', 'image/png', 'image/gif'));
	}

	/**
	 * Metodo generico para realizar consultas
 	 */
	function consultar($sql, $param=null){
		$stm= $this->connection->prepare($sql);
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
			$stm=$this->connection->prepare($sql);
			foreach ($params as $key => $value) {
				$stm->bindValue(':'.$key, $value);
			}
			return $stm->execute();		
		} 
		catch (Exception $e){
			echo 'Oh no!: '. $e->getMessage(). '\n';
		}
	}

	/**
	* Metodo generico para actualizar en la BD
	*/
	function actualizar($table, $params, $keys){
		// print_r($keys);
		// print_r($params); die();
		$data = array_keys($params);
		$a_keys = array_keys($keys);
		array_walk($data, function(&$item){$item=$item.'=?';});
		array_walk($a_keys, function(&$item){$item=$item.'=?';});
		$sql = 'UPDATE '.$table.' SET '.implode(",", $data).' WHERE '.implode(" and ", $a_keys);
		// echo $sql; die();
		try{
			$stm=$this->connection->prepare($sql);
			$i=1;
			foreach ($params as $key => $value) {
				$stm->bindValue($i, $value);
				$i++;
			}
			foreach ($keys as $key => $value) {
				$stm->bindValue($i, $value);
				$i++;
			}
			return $stm->execute();		
			// echo $stm->execute(); die();
		} 
		catch (Exception $e){
			echo 'La exception: '. $e->getMessage(). '\n';
		}
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
			$stm = $this->connection->prepare($sql);
			foreach ($params as $key => $value) {
				$stm->bindParam(':'.$key, $value);
			}
			return $stm->execute();
		}catch(Exception $e){
			echo 'Oh no!: '.$e->getMessage();
		}
	}

	public function checkTypeOfFile($file, $type){
		// print_r($this->allow_types['images']); die();
		switch ($type) {
			case 'image':
				if(in_array($file['type'], $this->allow_types['images']))
					return true;
				else
					return false;
				break;
		}
		return false;
	}

	// public function dropDownList($query, $name, $id_selected=null ){
	// 	$data = $this->consultar($sql);
	// 	$select = '<select name="'.$name.'">';
	// 	$select .= '<option value=""></option>';
	// 	foreach ($data as $key => $value) {
	// 		$selected = "";
	// 		if($id_selected==$data[$key]['id'])
	// 			$selected = ' selected';
	// 		$select .= '<option value="'.$data[$key]['id'].'"'.$selected.'>'.$data[$key]['opcion'].'</option>';
	// 	}
	// 	$select .= '</select>';
	// 	return $select;		
	// }
}	
?>