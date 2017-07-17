<?php
	class tipo_pagoView{
		private $model;
		private $t;
		public function __construct($model, $t){
			$this->model = $model;
			$this->t = $t;
		}
		public function outputData(){
			$name_table = 'Tipos de pago';
			$data = '<tr>';
			$data .= '<th>Tipo de pago</th>';
			$data .= '<th></th>';
			$data .= '<th></th>';
			$data .= '</tr>';
			foreach ($this->model->crudReadData($this->t) as $key => $value) {
				$data .= '<tr>';
				$data .= '<td>';
				$data .= $value['tipo_pago'];
				$data .= '</td>';
				$data .= '<td><a href="editar.php?id_tipo_pago='.$value['id_tipo_pago'].'" class="btn btn-primary" role="button">Editar</a></td>';
				$data .= '<td><a href="index.php?c=crud&t=tipo_pago&action=delete&id_tipo_pago='.$value['id_tipo_pago'].'" class="btn btn-danger" role="button">Eliminar</a></td>';
				$data .= '</tr>';
			}
			include('templates/tablas_crud.php'); 	
		}
	}
?>