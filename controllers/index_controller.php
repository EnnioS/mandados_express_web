<?php
	/**
	 * 
	 */
			
require_once 'models/proveedor_model.php';
	class Index_controller
	{
		private $producto_model;
		public $nomProveedor = array();
		
		function __construct()
		{	
			$this->proveedor_model = new Proveedor_model();
			
		}

		public function Index(){
			include_once 'views/header/index_header.php';
			include_once 'views/pages/index.php';
			include_once 'views/footer/index_footer.php';
			include_once 'views/jsviews/js_index.php';
		}


		public function getNomProveedores(){
			return $this->proveedor_model->getNomProveedores();
		}




	}
?>