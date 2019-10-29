<?php

class  Productos_model
{
	private $cnn;
	
	function __construct()
	{
		$this->cnn = Cnndb_model::conexion();
	}

}

?>