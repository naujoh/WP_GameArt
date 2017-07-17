<?php
	class rolView{
		private $model;
		private $t;
		public function __construct($model, $t){
			$this->model = $model;
			$this->t = $t;
		}
		public function outputData(){
			$name_table = 'Roles';
			$data = '<tr>';
			$data .= '<th>Rol</th>';
			$data .= '<th></th>';
			$data .= '<th></th>';
			$data .= '</tr>';
			foreach ($this->model->crudReadData($this->t) as $key => $value) {
				$data .= '<tr>';
				$data .= '<td>';
				$data .= $value['rol'];
				$data .= '</td>';
				$data .= '<td><a href="editar.php?id_rol='.$value['id_rol'].'" class="btn btn-primary" role="button">Editar</a></td>';
				$data .= '<td><a href="index.php?c=crud&t=rol&action=delete&id_rol='.$value['id_rol'].'" class="btn btn-danger" role="button">Eliminar</a></td>';
				$data .= '</tr>';
			}
			include('templates/tablas_crud.php'); 	
		}
	}
?>