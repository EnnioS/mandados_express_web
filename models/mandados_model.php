<?php 

/**
 * 
 */
class Mandados_model
{
	private $cnn;
	
	function __construct()
	{
		$this->cnn = Cnndb_model::conexion();
	}

	public function RegistrarMandadosDeUsuario($data){


		try{
			$sql = 'INSERT INTO mandados (idUser, mensajeManda, fCreacionManda, origernCreado, estadoManda) VALUES(?, ?, ?, ?, ?)' ;
			if($this->cnn->prepare($sql)
			->execute(
				array(
					$data["idUser"],
					$data["mensajeManda"],
					$data["fCreacionManda"],
					$data["origernCreado"],
					$data["estadoManda"]
				)
			)===true){
				 $this->contMsgRegUser($data["idUser"], $data['msgSendsUser']);
				echo true;
			}else{
				echo false;
			}
			
		} 
			catch(Exception $e)
		{
			die($e->getMessage());
		}

	}

	public function selecCantMsgXUser($idUser){
		try{
			$cantMsg=0;

			$sql = 'SELECT msgSendsUser FROM user WHERE idUser = :idUser AND estadoUser = 1';

			$resultado = $this->cnn->prepare($sql);
			

			$user = htmlentities(addslashes($idUser));

			$resultado ->bindValue(':idUser', $user);

			$resultado->execute();

			$numero_registros = $resultado->rowCount();

			if ($numero_registros>0) {

				while ($registros = $resultado->fetch(PDO::FETCH_ASSOC)) {
					$cantMsg = $registros['msgSendsUser'];
				}

				
				return $cantMsg;

			}

		
			return "";

		} 
			catch(Exception $e)
		{
			die($e->getMessage());
		}
	}





	private function contMsgRegUser($idUser, $msgSendsUser){

		$sql = 'UPDATE user SET  msgSendsUser= :msgSendsUser WHERE idUser = :idUser' ;

		$resultado = $this->cnn->prepare($sql);
			

		$user = htmlentities(addslashes($idUser));
		$cantidad = htmlentities(addslashes($msgSendsUser));

		$resultado ->bindValue(':idUser', $user);
		$resultado ->bindValue(':msgSendsUser', $cantidad);
		$resultado->execute();


	}

	public function RegistrarMandadosTemporal($data){


		try{
			$sql = 'INSERT INTO temp_manda (nomTempManda, apeTempManda, sexTempManda, numContTempManda, dirTempManda, mensajeManda, fcreacionTempManda, estadoTempManda) VALUES(?, ?, ?, ?, ?, ?, ?, ?)' ;
			if($this->cnn->prepare($sql)
			->execute(
				array(
					$data["nomTempManda"],
					$data["apeTempManda"],
					$data["sexTempManda"],
					$data["numContTempManda"],
					$data["dirTempManda"],
					$data["mensajeManda"],
					$data["fcreacionTempManda"],
					$data["estadoTempManda"]
				)
			)===true){
				 
				echo true;
			}else{
				echo false;
			}
			
		} 
			catch(Exception $e)
		{
			die($e->getMessage());
		}

	}
}

?>