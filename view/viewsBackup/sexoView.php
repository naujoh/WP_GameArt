<?php
	class sexoView{
		private $model;
		private $t;
		public function __construct($model, $t){
			$this->model = $model;
			$this->t = $t;
		}
		public function outputData(){
			$name_table = 'Sexos';
			$data = '<tr>';
			$data .= '<th>Sexo</th>';
			$data .= '<th></th>';
			$data .= '<th></th>';
			$data .= '</tr>';
			foreach ($this->model->crudReadData($this->t) as $key => $value) {
				$data .= '<tr>';
				$data .= '<td>';
				$data .= $value['sexo'];
				$data .= '</td>';
				$data .= '<td><a href="editar.php?id_sexo='.$value['id_sexo'].'" class="btn btn-primary" role="button">Editar</a></td>';
				$data .= '<td><a href="index.php?c=crud&t=sexo&action=delete&id_sexo='.$value['id_sexo'].'" class="btn btn-danger" role="button">Eliminar</a></td>';
				$data .= '</tr>';
			}
			include('templates/tablas_crud.php'); 	
		}
	}
?>