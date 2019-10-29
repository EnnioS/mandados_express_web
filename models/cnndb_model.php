<?php

	/**
	 * 
	 */
	class Cnndb_model
	{
		public static function conexion(){
			try{


				$cnn = new PDO('mysql:host=localhost;dbname=mat_m_exp; charset=utf8','root','a7m1425.');
				$cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $cnn;
			}catch(Exception $e){
				die("Error: ".$e->getMessage());

			}
		}
		
	}

?>	