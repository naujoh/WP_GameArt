<?php
	class accesoView{
		private $model;
		private $t;
		public function __construct($model, $t){
			$this->model = $model;
			$this->t = $t;
		}
		public function outputData(){
			$name_table = 'Tipos de acceso a publicaciones';
			$data = '<tr>';
			$data .= '<th>Tipo de acceso</th>';
			$data .= '<th></th>';
			$data .= '<th></th>';
			$data .= '</tr>';
			foreach ($this->model->crudReadData($this->t) as $key => $value) {
				$data .= '<tr>';
				$data .= '<td>'.$value['acceso'].'</td>';
				$data .= '<td><a href="editar.php?id_acceso='.$value['id_acceso'].'" class="btn btn-primary" role="button">Editar</a></td>';
				$data .= '<td><a href="index.php?c=crud&t=acceso&action=delete&id_acceso='.$value['id_acceso'].'" class="btn btn-danger" role="button">Eliminar</a></td>';
				$data .= '</tr>';
			}
			include('templates/tablas_crud.php'); 	
		}
	}
?>