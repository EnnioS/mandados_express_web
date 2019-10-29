<?php
/**
 * 
 */
class  Proveedor_model
{
	private $cnn;
	
	function __construct()
	{
		$this->cnn = Cnndb_model::conexion();
	}


	public function getNomProveedores(){
		try{
			$usuario = array();
			$sql = 'SELECT idProv, nomProv FROM proveedor WHERE estadoProv = 1';

			$resultado = $this->cnn->prepare($sql);
			

			$resultado->execute();

			$numero_registros = $resultado->rowCount();

			if ($numero_registros>0) {
				$i=0;

				while ($registros = $resultado->fetch(PDO::FETCH_ASSOC)) {
					$usuario[$i]['idProv'] = $registros['idProv'];
					$usuario[$i]['nomProv'] = $registros['nomProv'];
					$i++;
				}

				
				return $usuario;

			}

		
			return 0;

		} 
			catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
}

?>
