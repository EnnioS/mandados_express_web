<?php
	/**
	 * 
	 */

	//require_once 'models/registro_model.php';
	class Contactos_controller
	{
		//private $model;
		
		function __construct()
		{
			//$this->model = new Registro_model();
		}

		public function Contactos(){
			include_once 'views/header/header_search.php';
			include_once 'views/pages/contactos.php';
			include_once 'views/footer/index_footer.php';
			include_once 'views/jsviews/js_index.php';
		}

		
	}
?>