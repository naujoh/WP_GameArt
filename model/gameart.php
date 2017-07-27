<?php
class gameArt{
	var $connection;
	public $allow_types;

	function __construct(){
		include('model/configuracion.php');
		$this->connection=$connection; 
		$this->allow_types = array(
			'images'=>array('image/jpeg', 'image/pjpeg', 'image/png', 'image/gif'),
			'audios'=>array('audio/mpeg', 'audio/vnd.wav', 'audio/mp4', 'audio/ogg')
		);
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
		// echo $sql; die();
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
			case 'audio':
				if(in_array($file['type'], $this->allow_types['audios']))
					return true;
				else
					return false;
				break;			
		}
		return false;
	}

	public function multiUploads($files=array(), $resource_type){
		$route = "";
		$return_data = array();
		$uploaded = false;
		$msg = "Se ha insertado el contenido";
		$color = 'success';
		$i = 0;
		if($resource_type=="image"){
			$route = "view/resources/images/post_images/";
			foreach($files as $file){
				if(!empty($_FILES['galeria']['tmp_name'][$i])){
					$ext = explode('.', $_FILES['galeria']['name'][$i]);
					$type['type'] = $_FILES['galeria']['type'][$i];
					if($this->checkTypeOfFile($type,'image')){
						$source = $_FILES['galeria']['tmp_name'][$i];
						$name=$_SESSION['usuario']['nombre_usuario'].$i.'.'.$ext[count($ext)-1];
						$destination = $route.$name;
						if(move_uploaded_file($source, $destination)){
							array_push($return_data, $name);
							$uploaded = true;
						}else{
							$msg = 'Error al subir el archivo '.$_FILES['galeria']['name'][$i];
						}
					}else{
						//extension no permitida
						$msg = 'El archivo '.$_FILES['galeria']['name'][$i].' no tiene una extension permitida'; 
					}
				}
				$i++;
			} // foreach			
		}else{
			$route = "view/resources/audios/";
			foreach($files as $file){
				if(!empty($_FILES['audio']['tmp_name'][$i])){
					$type['type'] = $_FILES['audio']['type'][$i];
					if($this->checkTypeOfFile($type,'audio')){
						$source = $_FILES['audio']['tmp_name'][$i];
						$destination = $route.$_FILES['audio']['name'][$i];
						if(move_uploaded_file($source, $destination)){
							array_push($return_data, $_FILES['audio']['name'][$i]);
							$uploaded = true;
						}else{
							$msg = 'Error al subir el archivo '.$_FILES['audio']['name'][$i];
							$colo = 'danger';
						}
					}else{
						//extension no permitida
						$msg = 'El archivo '.$_FILES['audio']['name'][$i].' no tiene una extension permitida, solo se aceptan las extensiones: jpg, png y gif'; 
						$colo = 'danger';
					}
				}
				$i++;
			} // foreach					
		}
		$return_data['uploaded'] = $uploaded;
		$return_data['msg'] = $msg;
		$return_data['color'] = $color;
		//print_r($return_data); die();
		return $return_data;
	}
}	
?>
