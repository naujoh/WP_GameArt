<?php
class view{
	private $model;
	private $t;

	public function __construct($model, $table=null){
		$this->model=$model;
		$this->t=$table;
	}

	public function pIndex(){
		$ga_data = $this->model->galeries->consultar($this->model->galeries->querys['recents']);
		// echo '<pre>';
		// print_r($data); die();
		// echo '</pre>';
		include('view/templates/index.php');			
	}

	public function pTutorials(){
		include('view/templates/tutoriales.php');
	}

	public function pGaleries(){
		include('view/templates/galerias.php');
	}

	public function pAudios(){
		include('view/templates/audios.php');
	}

	public function pUploads(){
		include('view/templates/subidas.php');
	}		

	public function pRegisterForm(){
		include('view/templates/registro.php');
	}

	public function outputCrudData($t){
		switch($t){
			case 'acceso':
				$this->pAccesoData();
				break;
			case 'categoria':
				$this->pCategoriaData();
				break;
			case 'nivel_dificultad':
				$this->pNivelDificultadData();
				break;
			case 'rol':
				$this->pRolData();
				break;
			case 'sexo':
				$this->pSexoData();
				break;
			case 'tipo_pago':
				$this->pTipoPagoData();
				break;
			case 'tipo_recurso':
				$this->pTipoRecurso();
				break;
			case 'tipo_publicacion':
				$this->pTipoPublicacion();
				break;				
		}
	}

	public function pAccesoData(){
		$name_table = 'Tipos de acceso a publicaciones';
		$data = '<tr>';
		$data .= '<th>Tipo de acceso</th>';
		$data .= '<th></th>';
		$data .= '<th></th>';
		$data .= '</tr>';
		foreach ($this->model->consultar($this->model->querys[$this->t][0]) as $key => $value) {
			$data .= '<tr>';
			$data .= '<td>'.$value['acceso'].'</td>';
			$data .= '<td><a href="editar.php?id_acceso='.$value['id_acceso'].'" class="btn btn-primary" role="button">Editar</a></td>';
			$data .= '<td><a href="index.php?c=crud&t=acceso&action=delete&id_acceso='.$value['id_acceso'].'" class="btn btn-danger" role="button">Eliminar</a></td>';
			$data .= '</tr>';
		}
		include('templates/tablas_crud.php');		
	}

	public function pCategoriaData(){
		$name_table = 'Categorias de publicaciones';
		$data = '<tr>';
		$data .= '<th>Categoria</th>';
		$data .= '<th>Tipo de publicacion</th>';
		$data .= '<th></th>';
		$data .= '<th></th>';
		$data .= '</tr>';
		foreach ($this->model->consultar($this->model->querys[$this->t][0]) as $key => $value) {
			$data .= '<tr>';
			$data .= '<td>'.$value['categoria'].'</td>';
			$data .= '<td>'.$value['tipo_publicacion'].'</td>';
			$data .= '<td><a href="editar.php?id_categoria='.$value['id_categoria'].'" class="btn btn-primary" role="button">Editar</a></td>';
			$data .= '<td><a href="index.php?c=crud&t=categoria&action=delete&id_categoria='.$value['id_categoria'].'" class="btn btn-danger" role="button">Eliminar</a></td>';
			$data .= '</tr>';
		}
		include('templates/tablas_crud.php'); 		
	}

	public function pNivelDificultadData(){
		$name_table = 'Dificultad de tutoriales';
		$data = '<tr>';
		$data .= '<th>Dificultad</th>';
		$data .= '<th></th>';
		$data .= '<th></th>';
		$data .= '</tr>';
		foreach ($this->model->consultar($this->model->querys[$this->t][0]) as $key => $value) {
			$data .= '<tr>';
			$data .= '<td>'.$value['nivel_dificultad'].'</td>';
			$data .= '<td><a href="editar.php?id_nivel_dificultad='.$value['id_nivel_dificultad'].'" class="btn btn-primary" role="button">Editar</a></td>';
			$data .= '<td><a href="index.php?c=crud&t=nivel_dificultad&action=delete&id_nivel_dificultad='.$value['id_nivel_dificultad'].'" class="btn btn-danger" role="button">Eliminar</a></td>';
			$data .= '</tr>';
		}
		include('templates/tablas_crud.php'); 			
	}

	public function pRolData(){
		$name_table = 'Roles';
		$data = '<tr>';
		$data .= '<th>Rol</th>';
		$data .= '<th></th>';
		$data .= '<th></th>';
		$data .= '</tr>';
		foreach ($this->model->consultar($this->model->querys[$this->t][0]) as $key => $value) {
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

	public function pSexoData(){
		$name_table = 'Sexos';
		$data = '<tr>';
		$data .= '<th>Sexo</th>';
		$data .= '<th></th>';
		$data .= '<th></th>';
		$data .= '</tr>';
		foreach ($this->model->consultar($this->model->querys[$this->t][0]) as $key => $value) {
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

	public function pTipoPagoData(){
		$name_table = 'Tipos de pago';
		$data = '<tr>';
		$data .= '<th>Tipo de pago</th>';
		$data .= '<th></th>';
		$data .= '<th></th>';
		$data .= '</tr>';
		foreach ($this->model->consultar($this->model->querys[$this->t][0]) as $key => $value) {
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

	public function pTipoRecurso(){
		$name_table = 'Tipos de recursos';
		$data = '<tr>';
		$data .= '<th>Tipo de recurso</th>';
		$data .= '<th></th>';
		$data .= '<th></th>';
		$data .= '</tr>';
		foreach ($this->model->consultar($this->model->querys[$this->t][0]) as $key => $value) {
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

	public function pTipoPublicacion(){
		$name_table = 'Tipos de publicaciones';
		$data = '<tr>';
		$data .= '<th>Tipo de publicacion</th>';
		$data .= '<th></th>';
		$data .= '<th></th>';
		$data .= '</tr>';
		foreach ($this->model->consultar($this->model->querys[$this->t][0]) as $key => $value) {
			$data .= '<tr>';
			$data .= '<td>';
			$data .= $value['tipo_publicacion'];
			$data .= '</td>';
			$data .= '<td><a href="editar.php?id_tipo_publicacion='.$value['id_tipo_publicacion'].'" class="btn btn-primary" role="button">Editar</a></td>';
			$data .= '<td><a href="index.php?c=crud&t=tipo_publicacion&action=delete&id_tipo_publicacion='.$value['id_tipo_publicacion'].'" class="btn btn-danger" role="button">Eliminar</a></td>';
			$data .= '</tr>';
		}
		include('templates/tablas_crud.php'); 		
	}	

	public function pNewEditForm(){
		if($this->t == 'categoria'){
			$data = '<select class="form-control" name="id_tipo_publicacion">';
			$data .= '<option value="">Selecciona</option>';
			foreach ($this->model->consultar('SELECT * from tipo_publicacion order by id_tipo_publicacion asc') as $fila) {
				$data .= '<option value='.$fila['id_tipo_publicacion'].'>'.$fila['tipo_publicacion'].'</option>';
			}
			$data .= '</select>';			
			include('templates/nueva_categoria.php');
		}else{
			include('templates/nuevo.php');
		}
	}
}
?>