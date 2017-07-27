    <?php include('view/templates/general_tpl/contenidos_top.php'); ?>
	<div class="container">
		<div class="row">
        <?php
            /*echo '<pre>';
            print_r($galeries_data); die();
            echo '</pre>';*/
            foreach ($galeries_data as $key => $value) {
                echo '
    		 	<div class="col-md-3 col-xs-6 col-sm-3 thumb">
            		<a class="thumbnail" href="index.php?c=galeries&action=post&id_publicacion='.$galeries_data[$key]['id_publicacion'].'">
        				<div class="frame">
        					<div class="frame-in">
    		        		    <img class="img-responsive" src="view/resources/images/covers/'.$galeries_data[$key]['nombre_recurso'].'" alt="Imagen">
        					</div>
        				</div>
          	        </a>
    	        </div>
                ';
            }
        ?>
		</div>
	</div>
<?php
 include('view/templates/general_tpl/contenidos_bottom.php');   
 include('view/templates/general_tpl/footer.php'); 
 ?>
</body>
</html>

