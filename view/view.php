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
		include_once('model/commentsModel.php');
		$dropdown_data = $this->viewDropDown('new', $this->model->querys['dropdown'], 'id_categoria', 'categoria');
		$tutorials_data = $this->model->getAllTutorials();
		$comments = new commentsModel();
		if(count($tutorials_data)>0)
			$comments_data = $comments->getComments($tutorials_data[0]['id_publicacion']);
		include('view/templates/tutoriales.php');
	}

	public function pTutorialsEdit($pub_id){
		$params['id_publicacion'] = $pub_id;
		$tutorial_data = $this->model->consultar($this->model->querys['edit_content'], $params);
		$cat_tutorials = $this->viewDropDown('old', $this->model->querys['dd_selected'], 'id_categoria', 'categoria', $tutorial_data[0]['id_categoria'] );
		$dificulty_t = $this->viewDropDown('old', $this->model->querys['dd_dificulty_selected'], 'id_nivel_dificultad', 'nivel_dificultad', $tutorial_data[0]['id_nivel_dificultad']);
		include('view/templates/form_editar_tutoriales.php');
	}

	public function pGaleries(){
		include_once('model/commentsModel.php');		
		$dropdown_data = $this->viewDropDown('new', $this->model->querys['dropdown'], 'id_categoria', 'categoria');
		$galeries_data = $this->model->getAllGaleries();
		$comments = new commentsModel();	
		if(!empty($galeries_data))		
			$comments_data = $comments->getComments($galeries_data[0]['id_publicacion']);		
		include('view/templates/galerias.php');
	}

	public function pAudios(){
		include_once('model/commentsModel.php');				
		$dropdown_data = $this->viewDropDown('new', $this->model->querys['dropdown'], 'id_categoria', 'categoria');
		$audios_data = $this->model->getAllAudios();
		$comments = new commentsModel();
		if(!empty($audios_data))			
			$comments_data = $comments->getComments($audios_data[0]['id_publicacion']);			
		include('view/templates/audios.php');
	}

	public function pPubsEdit($pub_id, $id_type){
		$params['id_publicacion'] = $pub_id;
		$pub_data = $this->model->consultar($this->model->querys['edit_content'], $params);
		// echo '<pre>';
		// print_r($pub_data); die();
		// echo '</pre>';
		$pub_cat = $this->viewDropDown('old', $this->model->querys['dd_selected'], 'id_categoria', 'categoria', $pub_data[0]['id_categoria']);
		$pub_access = $this->viewDropDown('old', $this->model->querys['dd_access_selected'], 'id_acceso', 'acceso', $pub_data[0]['id_acceso']);
		include('view/templates/form_editar_publicaciones.php');		
	}

	public function pUploads($t_model, $g_model, $a_model){
		$cat_tutorials = $this->viewDropDown('new', $t_model->querys['dropdown'], 'id_categoria', 'categoria');
		$dificulty_t = $this->viewDropDown('new', $t_model->querys['dd_dificulty'], 'id_nivel_dificultad', 'nivel_dificultad');
		$cat_galeries = $this->viewDropDown('new', $g_model->querys['dropdown'], 'id_categoria', 'categoria');
		$cat_tpub = $this->viewDropDown('new', $g_model->querys['dd_access'], 'id_acceso', 'acceso');
		$cat_audios = $this->viewDropDown('new', $a_model->querys['dropdown'], 'id_categoria', 'categoria');
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

	public function pPublicationsPanel($tModel, $gModel, $aModel){
		$params['id_usuario'] = $_SESSION['usuario']['id_usuario'];
		$tutorials_data = '<table class="table table_pub">';
		$tutorials_data .= '<tr>';
		$tutorials_data .= '<th>Portada</th>';
		$tutorials_data .= '<th>Titulo</th>';
		$tutorials_data .= '<th>Fecha de subida</th>';
		$tutorials_data .= '<th>Dificultad</th>';
		$tutorials_data .= '<th>Acceso</th>';
		$tutorials_data .= '<th></th>';
		$tutorials_data .= '<th></th>';
		$tutorials_data .= '</tr>';
		foreach ($tModel->consultar($tModel->querys['table_data'], $params) as $key => $value) {
			$tutorials_data .= '<tr>';
			$tutorials_data .= '<td><img class="cover" src="view/resources/images/covers/'.$value['nombre_recurso'].'"></td>';
			$tutorials_data .= '<td>'.$value['titulo'].'</td>';
			$tutorials_data .= '<td>'.$value['fecha_subida'].'</td>';
			$tutorials_data .= '<td>'.$value['nivel_dificultad'].'</td>';
			$tutorials_data .= '<td>'.$value['acceso'].'</td>';
			$tutorials_data .= '<td><a href="index.php?c=tutorials&action=edit&id_publicacion='.$value['id_publicacion'].'" class="btn btn-primary" role="button">Editar</a></td>';
			$tutorials_data .= '<td><a href="index.php?c=tutorials&action=delete&id_publicacion='.$value['id_publicacion'].'" class="btn btn-danger" role="button">Eliminar</a></td>';
			$tutorials_data .= '</tr>';
		}
		$tutorials_data .= '</table>';

		$galeries_data = '<table class="table table_pub">';
		$galeries_data .= '<tr>';
		$galeries_data .= '<th>Portada</th>';
		$galeries_data .= '<th>Titulo</th>';
		$galeries_data .= '<th>Fecha de subida</th>';
		$galeries_data .= '<th>Acceso</th>';
		$galeries_data .= '<th></th>';
		$galeries_data .= '<th></th>';
		$galeries_data .= '</tr>';
		foreach ($gModel->consultar($gModel->querys['table_data'], $params) as $key => $value) {
			$galeries_data .= '<tr>';
			$galeries_data .= '<td><img class="cover" src="view/resources/images/covers/'.$value['nombre_recurso'].'"></td>';
			$galeries_data .= '<td>'.$value['titulo'].'</td>';
			$galeries_data .= '<td>'.$value['fecha_subida'].'</td>';
			$galeries_data .= '<td>'.$value['acceso'].'</td>';
			$galeries_data .= '<td><a href="index.php?c=galeries&action=edit&id_publicacion='.$value['id_publicacion'].'" class="btn btn-primary" role="button">Editar</a></td>';
			$galeries_data .= '<td><a href="index.php?c=galeries&action=delete&id_publicacion='.$value['id_publicacion'].'" class="btn btn-danger" role="button">Eliminar</a></td>';
			$galeries_data .= '</tr>';
		}
		$galeries_data .= '</table>';

		$audios_data = '<table class="table table_pub">';
		$audios_data .= '<tr>';
		$audios_data .= '<th>Portada</th>';
		$audios_data .= '<th>Titulo</th>';
		$audios_data .= '<th>Fecha de subida</th>';
		$audios_data .= '<th>Acceso</th>';
		$audios_data .= '<th></th>';
		$audios_data .= '<th></th>';
		$audios_data .= '</tr>';
		foreach ($aModel->consultar($aModel->querys['table_data'], $params) as $key => $value) {
			$audios_data .= '<tr>';
			$audios_data .= '<td><img class="cover" src="view/resources/images/covers/'.$value['nombre_recurso'].'"></td>';
			$audios_data .= '<td>'.$value['titulo'].'</td>';
			$audios_data .= '<td>'.$value['fecha_subida'].'</td>';
			$audios_data .= '<td>'.$value['acceso'].'</td>';
			$audios_data .= '<td><a href="index.php?c=audios&action=edit&id_publicacion='.$value['id_publicacion'].'" class="btn btn-primary" role="button">Editar</a></td>';
			$audios_data .= '<td><a href="index.php?c=audios&action=delete&id_publicacion='.$value['id_publicacion'].'" class="btn btn-danger" role="button">Eliminar</a></td>';
			$audios_data .= '</tr>';
		}		
		$audios_data .= '</table>';			
		include('view/templates/user_panel.php'); 		
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
		$data  = '<select class="form-control" name="'.$name.'" required>';
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

	public function pUserUpdateData(){
		$params['id_usuario'] = $_SESSION['usuario']['id_usuario'];
		$user_data = $this->model->consultar($this->model->querys['user_data'], $params);
		$data_sexo = $this->viewDropDown('old', $this->model->querys['sexo_data'] , 'id_sexo', 'sexo', $user_data[0]['id_sexo']);
		//$action, $query, $name, $field, $id_selected=null
		include('view/templates/actualizar_informacion.php');
	}

	public function pUserProfile(){
		$c_params['id_usuario'] = $_GET['id_usuario'];
		//$tutorials_data = array();
		for($i=0; $i<3; $i++){
			if($i==0)
				$this->model->contenttype = 1;
			if($i==1)
				$this->model->contenttype = 2;
			if($i==2)
				$this->model->contenttype = 3;
			$this->model->setQuerys();
			if($i==0)
				$galeries_data = $this->model->consultar($this->model->querys['content'], $c_params);
			if($i==1)
				$audios_data = $this->model->consultar($this->model->querys['content'], $c_params);
			if($i==2)
				$tutorials_data = $this->model->consultar($this->model->querys['content'], $c_params);
		}
		$u_params['id_usuario'] = $_GET['id_usuario'];
		$user_data = $this->model->consultar($this->model->querys['user_data'], $u_params);
		include('view/templates/panel_user.php');
	}

	public function pPost($id_publicacion, $pub_type){
		$params['id_publicacion'] = $id_publicacion;
		$post_data = $this->model->consultar($this->model->querys['post_content'], $params);
		$commentsModel = new commentsModel();
		$comments_data = $commentsModel->getComments($id_publicacion);
		switch($pub_type){
			case 1:
				include('view/templates/galeria.php');
				break;
			case 2:
				include('view/templates/audio.php');
				break;
			case 3:
				include('view/templates/tutorial.php');
				break;								
		}
	}
	public function pFormLogin($cause){
		$msg='';
		switch($cause){
			case 'denied':
				$msg = 'Para poder ver este contenido debes iniciar sesion primero.';
				break;
			case 'incorrect_credentials':
				$msg = 'Usuario o contrasena incorrectos intentalo de nuevo.';
				break;
		}
		include('view/templates/popupform.php');
	}

	public function pPopUp($cause, $llave=null){
		switch($cause){
			case 'confirmation':
				$msg = 'Seguro(a) que quieres eliminar tu cuenta, esto tambien eliminara todo el contenido que hayas publicado para siempre.';
				include('view/templates/confirmpopup.php');
				break;
			case 'recover':
				$msg = 'Escribe un correo electronico donde enviaremos las instrucciones para recuperar tu contrasena';
				$data_form['type'] = 'email';
				$data_form['name'] = 'email';
				$data_form['submit_value'] = 'Recuperar';
				$data_form['action'] = 'recover_password';
				$data_form['activity'] = 'recover';
				include_once('view/templates/getpasspopup.php');
				break;
			case 'write_new':
				$msg = 'Escribe la nueva contrasena';
				$data_form['type'] = 'password';
				$data_form['name'] = 'contrasena';
				$data_form['submit_value'] = 'Reestablecer';
				$data_form['action'] = 'restore';
				$data_form['activity'] = 'update_pass';
				include_once('view/templates/getpasspopup.php');	
				break;	
			case 'premium_popup':
				$msg = '<p>Si te conviertes a premium disfrutaras de los siguietes beneficios:</p>';
				$msg .= '<ul>
									<li>Publicar contenido premium</li>
									<li>Descargar contenidos premium</li>
									<li>Pronto mas veneficios</li>
								</ul>';
				include('view/templates/premiumpopup.php');
				break;
			case 'donation_popup':	
				$msg = 'Con tu donacion apoyas a los usuarios que comparten su trabajo contigo y toda la comunidad, gracias por donar!';
				include('view/templates/donationpopup.php');
				break;	
		}
	}

	public function redirect($c, $action, $name_id, $id, $activity=null){
		if($activity==null)
			header('Location: index.php?c='.$c.'&action='.$action.'&'.$name_id.'='.$id);
		else
			header('Location: index.php?c='.$c.'&action='.$action.'&'.$name_id.'='.$id.'&activity='.$activity);
	}

	public function writeNewPassword($llave){
		include_once('view/templates/writeNewPasswordPopup');
	}

	public function pAdminPanel(){
		include('view/templates/panel_administrador.php');
	}

	public function pPdf(){
		$data = $this->model->getPdf();
		$subtotal = 0;
		require_once('vendor/autoload.php');
		$output = '<page>';
		$output .='
				<style>
				table, td, th {
				    border: 1px solid black;
				    text-align: center;
				    padding:10px;
				}

				table {
				    border-collapse: collapse;
				    width: 100%;
				}

				th {
				    text-align: center;
				    background-color:#4CAF50;
				}
				</style>
				';
		$output .= '<h1>Donaciones recibidas</h1>';
		$output .= '<table>';
		$output .= '<tr>';
		$output .= '<th>Donador</th>';
		$output .= '<th>Email</th>';
		$output .= '<th>Nombre de usuario</th>';
		$output .= '<th>Fecha de donacion</th>';
		$output .= '<th>Monto</th>';
		$output .= '</tr>';
		foreach ($data['donations_data'] as $key => $value) {
			// echo '<pre>';
			// print_r($data['donadores_data'][$key][0][]); die();
			// echo '</pre>';
			$output .= '<tr>';
			$output .= '<td>'.$data['donadores_data'][$key][0]['nombre'].' '. $data['donadores_data'][$key][0]['apaterno'].' '.$data['donadores_data'][$key][0]['amaterno'].'</td>';
			$output .= '<td>'.$data['donadores_data'][$key][0]['email'].'</td>';
			$output .= '<td>'.$data['donadores_data'][$key][0]['nombre_usuario'].'</td>';
			$output .= '<td>'.$data['donations_data'][$key]['fecha_pago'].'</td>';
			$output .= '<td>$'.$data['donations_data'][$key]['monto'].'</td>';
			$subtotal += $data['donations_data'][$key]['monto'];
			$output .= '</tr>';
		}
		$output .= '<tr>';
		$output .= '<td></td><td></td><td></td><td><b>subtotal</b></td>';
		$output .= '<td><b>$'.$subtotal.'</b></td>';
		$output .= '</tr>';
		$output .= '</table>';
		$output .= '</page>';
	  try{
	      $html2pdf = new HTML2PDF('P', 'A4', 'fr');
	//      $html2pdf->setModeDebug();
	      $html2pdf->setDefaultFont('Arial');
	      $html2pdf->writeHTML($output);
	      $html2pdf->Output('donaciones.pdf');
	  }
	  catch(HTML2PDF_exception $e) {
	      echo $e;
	      exit;
	  }
		echo $output;
	}
}
?>