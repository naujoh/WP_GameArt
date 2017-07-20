<?php
class view{
	private $model;
	private $t;

	public function __construct($model, $table=null){
		$this->model=$model;
		$this->t=$table;
	}

	public function pIndex(){
		$ga_data = $this->model->galeries->getRecents();
		$au_data = $this->model->audios->consultar($this->model->audios->querys['recents']);
		$tu_data = $this->model->tutorials->consultar($this->model->tutorials->querys['recents']);
		include('view/templates/index.php');			
	}

	public function pTutorials(){
		$dropdown_data = $this->viewDropDown('new', $this->model->querys['dropdown'], 'id_categoria', 'categoria');
		$tutorials_data = $this->model->getAllTutorials();
		include('view/templates/tutoriales.php');
	}

	public function pGaleries(){
		$dropdown_data = $this->viewDropDown('new', $this->model->querys['dropdown'], 'id_categoria', 'categoria');
		$galeries_data = $this->model->getAllGaleries();
		include('view/templates/galerias.php');
	}

	public function pAudios(){
		$dropdown_data = $this->viewDropDown('new', $this->model->querys['dropdown'], 'id_categoria', 'categoria');
		$audios_data = $this->model->getAllAudios();
		include('view/templates/audios.php');
	}

	public function pUploads(){
		include('view/templates/subidas.php');
	}		

	public function pRegisterForm(){
		$sexo_data=$this->viewDropDown('new', $this->model->querys['sexo_data'],'id_sexo', 'sexo');
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
			$data .= '<td><a href="index.php?c=crud&t=acceso&action=edit&id_acceso='.$value['id_acceso'].'" class="btn btn-primary" role="button">Editar</a></td>';
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
			$data .= '<td><a href="index.php?c=crud&t=categoria&action=edit&id_categoria='.$value['id_categoria'].'" class="btn btn-primary" role="button">Editar</a></td>';
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
			$data .= '<td><a href="index.php?c=crud&t=nivel_dificultad&action=edit&id_nivel_dificultad='.$value['id_nivel_dificultad'].'" class="btn btn-primary" role="button">Editar</a></td>';
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
			$data .= '<td><a href="index.php?c=crud&t=rol&action=edit&id_rol='.$value['id_rol'].'" class="btn btn-primary" role="button">Editar</a></td>';
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
			$data .= '<td><a href="index.php?c=crud&t=sexo&action=edit&id_sexo='.$value['id_sexo'].'" class="btn btn-primary" role="button">Editar</a></td>';
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
			$data .= '<td><a href="index.php?c=crud&t=tipo_pago&action=edit&id_tipo_pago='.$value['id_tipo_pago'].'" class="btn btn-primary" role="button">Editar</a></td>';
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
			$data .= '<td><a href="index.php?c=crud&t=tipo_recurso&action=edit&id_tipo_recurso='.$value['id_tipo_recurso'].'" class="btn btn-primary" role="button">Editar</a></td>';
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
			$data .= '<td><a href="index.php?c=crud&t=tipo_publicacion&action=edit&id_tipo_publicacion='.$value['id_tipo_publicacion'].'" class="btn btn-primary" role="button">Editar</a></td>';
			$data .= '<td><a href="index.php?c=crud&t=tipo_publicacion&action=delete&id_tipo_publicacion='.$value['id_tipo_publicacion'].'" class="btn btn-danger" role="button">Eliminar</a></td>';
			$data .= '</tr>';
		}
		include('templates/tablas_crud.php'); 		
	}	

	public function pNewEditForm($data_edit){
		if($data_edit == null){
			if($this->t == 'categoria'){
				$data=$this->viewDropDown('new', $this->model->querys['cat_tipo_pub'][0],
																  'id_tipo_publicacion', 
																  'tipo_publicacion');	
				include('templates/nueva_categoria.php');
			}else
				include('templates/nuevo.php');
		}else{
			if($this->t == 'categoria'){
				$data=$this->viewDropDown('edit', $this->model->querys['cat_tipo_pub'][1], 
																		 'id_tipo_publicacion', 
																		 'tipo_publicacion',
																		 $data_edit[0]['id_tipo_publicacion']);
				include('templates/editar_categoria.php');
			}
			else{
				include('templates/editar.php');
			}
		}
	}

	public function viewDropDown($action, $query, $name, $field, $id_selected=null){
		$data  = '<select class="form-control" name="'.$name.'">';
		if($action == 'new'){
			$data .= '<option disabled selected value>Selecciona</option>';
			foreach($this->model->consultar($query) as $row){
				$data .= '<option value='.$row[$name].'>'.$row[$field].'</option>';
			}
		}else{
			$data .= '<option value=""></option>';
			foreach($this->model->consultar($query) as $row){
				$selected = "";
				if($id_selected == $row['id'])
					$selected = ' selected';
				$data .= '<option value="'.$row['id'].'"'.$selected.'>'.$row['option'].'</option>';
			}
		}
		$data .= '</select>';
		return $data;
	}

	public function getUserInfo($id_usuario){
		header("Location: index.php?c=user&action=show_info&id_usuario=".$id_usuario);
	}	

	public function pUserPanel(){
		$c_params['id_usuario'] = $_GET['id_usuario'];
		$tutorials_data = array();
		for($i=0; $i<count($this->model->querys['content']); $i++){
			if($i==0)
				$this->model->contenttype = 'Galeria de imagenes';
			if($i==1)
				$this->model->contenttype = 'Coleccion de audio';
			if($i==2)
				$this->model->contenttype = 'Tutorial';
			$this->model->setQuerys();
			$tr_data = $this->model->consultar($this->model->querys['content'][1]);
			$c_params['id_tipo_recurso'] = $tr_data[0]['id_tipo_recurso'];	
			if($i==0)
				$galeries_data = $this->model->consultar($this->model->querys['content'][0], $c_params);
			if($i==1)
				$audios_data = $this->model->consultar($this->model->querys['content'][0], $c_params);
			if($i==2)
				$tutorials_data = $this->model->consultar($this->model->querys['content'][0], $c_params);
		}
		$u_params['id_usuario'] = $_GET['id_usuario'];
		$user_data = $this->model->consultar($this->model->querys['user_data'], $u_params);
		include('view/templates/panel_user.php');
	}
}
?>