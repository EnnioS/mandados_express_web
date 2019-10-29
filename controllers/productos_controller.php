<?php
	require_once 'models/productos_model.php';

class Productos_controller
{
	
	function __construct()
	{
		$this->productoss_model = new Productos_model();
	}


	public function Productos(){
			include_once 'views/header/header_search.php';
			include_once 'views/pages/productos.php';
			include_once 'views/footer/index_footer.php';
			include_once 'views/jsviews/js_productos.php';
		}

}
?>