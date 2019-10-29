<?php
	$inactive = 3600;// tiempo de sesion activa en segundos en la paguina actual
	if(isset($_SESSION['timeout']) ) {
		$session_life = time() - $_SESSION['timeout'];
		if($session_life > $inactive)
	        { session_destroy(); header("Location: index.php"); }
	}
?>
<div id="indexContext">
	<div class="container" style="height: 100%;">
		<div class="row h-100 justify-content-center">

			<div class="my-auto " id="indexSearchRest" >
				<select class="selectIndex selectpicker"  data-width="100%"  data-live-search="true">
					<option value="0">De donde desea comer hoy?.....</option>
			    	<?php 
			    		$index = new Index_controller();
			    		$nomProveedor=$index->getNomProveedores();

			    		foreach ($nomProveedor as $key) {
			    			print_r( ('<option value="'.$key["idProv"].'">'.$key["nomProv"].'</option>'));
			    		}
			    		
			    	?>
				</select>
			</div>
			<div class="my-auto" style="margin-left: 15px">
				<a type="button" href="?c=productos&a=Productos" class="btn btn-primary btnSearchProd" style="background-color: red"><i><img src="assets/img/icon/search.svg" style="width: 25px;margin-left: 15px;margin-right: 15px;"></i></a>
			</div>
		</div>
	</div>

		<div style="background-color: blue; height: 10px"></div>
</div>
 