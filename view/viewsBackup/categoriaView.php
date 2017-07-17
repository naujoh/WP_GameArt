<?php
	class categoriaView{
		private $model;
		private $t;
		public function __construct($model, $t){
			$this->model = $model;
			$this->t = $t;
		}
		public function outputData(){
			$name_table = 'Categorias de publicaciones';
			$data = '<tr>';
			$data .= '<th>Categoria</th>';
			$data .= '<th>Tipo de publicacion</th>';
			$data .= '<th></th>';
			$data .= '<th></th>';
			$data .= '</tr>';
			foreach ($this->model->crudReadData($this->t) as $key => $value) {
				$data .= '<tr>';
				$data .= '<td>'.$value['categoria'].'</td>';
				$data .= '<td>'.$value['tipo_publicacion'].'</td>';
				$data .= '<td><a href="editar.php?id_categoria='.$value['id_categoria'].'" class="btn btn-primary" role="button">Editar</a></td>';
				$data .= '<td><a href="index.php?c=crud&t=categoria&action=delete&id_categoria='.$value['id_categoria'].'" class="btn btn-danger" role="button">Eliminar</a></td>';
				$data .= '</tr>';
			}
			include('templates/tablas_crud.php'); 	
		}
	}
?>