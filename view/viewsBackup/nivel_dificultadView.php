<?php
	class nivel_dificultadView{
		private $model;
		private $t;
		public function __construct($model, $t){
			$this->model = $model;
			$this->t = $t;
		}
		public function outputData(){
			$name_table = 'Dificultad de tutoriales';
			$data = '<tr>';
			$data .= '<th>Dificultad</th>';
			$data .= '<th></th>';
			$data .= '<th></th>';
			$data .= '</tr>';
			foreach ($this->model->crudReadData($this->t) as $key => $value) {
				$data .= '<tr>';
				$data .= '<td>'.$value['nivel_dificultad'].'</td>';
				$data .= '<td><a href="editar.php?id_nivel_dificultad='.$value['id_nivel_dificultad'].'" class="btn btn-primary" role="button">Editar</a></td>';
				$data .= '<td><a href="index.php?c=crud&t=nivel_dificultad&action=delete&id_nivel_dificultad='.$value['id_nivel_dificultad'].'" class="btn btn-danger" role="button">Eliminar</a></td>';
				$data .= '</tr>';
			}
			include('templates/tablas_crud.php'); 	
		}
	}
?>