<?php
	class tipo_recursoView{
		private $model;
		private $t;
		public function __construct($model, $t){
			$this->model = $model;
			$this->t = $t;
		}
		public function outputData(){
			$name_table = 'Tipos de recursos';
			$data = '<tr>';
			$data .= '<th>Tipo de recurso</th>';
			$data .= '<th></th>';
			$data .= '<th></th>';
			$data .= '</tr>';
			foreach ($this->model->crudReadData($this->t) as $key => $value) {
				$data .= '<tr>';
				$data .= '<td>';
				$data .= $value['tipo_recurso'];
				$data .= '</td>';
				$data .= '<td><a href="editar.php?id_tipo_recurso='.$value['id_tipo_recurso'].'" class="btn btn-primary" role="button">Editar</a></td>';
				$data .= '<td><a href="index.php?c=crud&t=tipo_recurso&action=delete&id_tipo_recurso='.$value['id_tipo_recurso'].'" class="btn btn-danger" role="button">Eliminar</a></td>';
				$data .= '</tr>';
			}
			include('templates/tablas_crud.php'); 	
		}
	}
?>