<?php
/**
 * 
 */
class Reglogin_model
{
	private $cnn;
	function __construct()
	{
			$this->cnn = Cnndb_model::conexion();
	}

	public function registrarUsuario($data){
		try{
			$sql = 'INSERT INTO user (urlFotoUser, nomUser, apeUser, fNacUser, sexoUser, userName, emailUser, passUser, celUser, telCasaUser, dirUser, tipoUser, rolUser, fcreacionUser, idUserCreador, origenCreado, estadoUser, pregSegurUser, respSegurUser) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)' ;
			if($this->cnn->prepare($sql)
			->execute(
				array(
					$data["urlFotoUser"],
					$data["nomUser"],
					$data["apeUser"],
					date('Y-m-d',strtotime($data["fNacUser"])),
					$data["sexoUser"],
					$data["userName"],
					$data["emailUser"],
					$data["passUser"],
					$data["celUser"],
					$data["telCasaUser"],
					$data["dirUser"],
					$data["tipoUser"],
					$data["rolUser"],
					$data["fcreacionUser"],
					$data["idUserCreador"],
					$data["origenCreado"],
					$data["estadoUser"],
					$data["pregSegurUser"],
					$data["respSegurUser"]
				)
			)=== true){
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

	public function iniciar_sesion($login){
		try{
			$usuario = array();
			$sql = 'SELECT idUser, urlFotoUser, nomUser, apeUser, fNacUser, sexoUser, userName, emailUser, passUser, celUser, telCasaUser, dirUser, msgSendsUser, pregSegurUser, respSegurUser FROM user WHERE userName = :userName AND passUser = :userPass AND estadoUser = 1';

			$resultado = $this->cnn->prepare($sql);
			

			$userName = htmlentities(addslashes($login['user']));
			$userPass = htmlentities(addslashes($login['pass']));

			$resultado ->bindValue(':userName', $userName);
			$resultado ->bindValue(':userPass', $userPass);

			$resultado->execute();

			$numero_registros = $resultado->rowCount();

			if ($numero_registros>0) {

				while ($registros = $resultado->fetch(PDO::FETCH_ASSOC)) {
					$usuario['idUser'] = $registros['idUser'];
					$usuario['urlFotoUser'] = $registros['urlFotoUser'];
					$usuario['nomUser'] = $registros['nomUser'];
					$usuario['apeUser'] = $registros['apeUser'];
					$usuario['fNacUser'] = $registros['fNacUser'];
					$usuario['sexoUser'] = $registros['sexoUser'];
					$usuario['userName'] = $registros['userName'];
					$usuario['emailUser'] = $registros['emailUser'];
					$usuario['passUser'] = $registros['passUser'];
					$usuario['celUser'] = $registros['celUser'];
					$usuario['telCasaUser'] = $registros['telCasaUser'];
					$usuario['dirUser'] = $registros['dirUser'];
					$usuario['msgSendsUser'] = $registros['msgSendsUser'];
					$usuario['pregSegurUser'] = $registros['pregSegurUser'];
					$usuario['respSegurUser'] = $registros['respSegurUser']; 
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

	public function validarExisteUser($usuario){
		try{

			$sql = 'SELECT idUser FROM user WHERE userName = :userName AND estadoUser = 1';
			$resultado = $this->cnn->prepare($sql);

			$useName = htmlentities(addslashes($usuario));
			$resultado ->bindValue(':userName', $useName);

			$resultado->execute();

			$numero_registros = $resultado->rowCount();



			if ($numero_registros>0) {
				
				echo 0;
			}else{

				echo 1;
			}

		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
}

?>

