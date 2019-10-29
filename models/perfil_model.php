<?php 

/**
 * 
 */
class Perfil_model
{
	private $cnn;
	function __construct()
	{
			$this->cnn = Cnndb_model::conexion();
	}


	public function cambiarPass($data){

		try{
			
			$query = 'UPDATE user SET passUser = :passUser  WHERE idUser = :idUser';

			$resultado = $this->cnn->prepare($query);


			$idUser = addslashes($data['idUser']);
			$passUser = addslashes($data['passUser']);
			$resultado ->bindValue(':idUser',$idUser);
			$resultado ->bindValue(':passUser',$passUser);

			$resultado->execute(); 

			$countRowAffected = $resultado->rowCount();

			if ($countRowAffected > 0) {
				$this->reloadSesion($data,2);
				echo 1;
			}else{
				echo 0;
			}



		}catch(Exception $e)
		{
			
			die($e->getMessage());
		}

	}


	public function verificarPassUserEmail($data){
		try{
			$respuesta = array();
			$variable = $data['datoModal'];
			$passOUser = addslashes($data['passOUser']);
			$emailUser = addslashes($data['emailUser']);
			
			$query = 'SELECT idUser, pregSegurUser, respSegurUser FROM user WHERE '.$variable.' = :passOUser AND emailUser = :emailUser';

			$resultado = $this->cnn->prepare($query);

			$resultado ->bindValue(':passOUser',$passOUser);
			$resultado ->bindValue(':emailUser',$emailUser);
			
			$resultado->execute();

			$numero_registros = $resultado->rowCount();

			if ($numero_registros>0) {
				$i=0;

				while ($registros = $resultado->fetch(PDO::FETCH_ASSOC)) {
					$respuesta[$i]['idUser'] = $registros['idUser'];
					$respuesta[$i]['pregSegurUser'] = $registros['pregSegurUser'];
					$respuesta[$i]['respSegurUser'] = $registros['respSegurUser'];
					$i++;
				}

				
					echo json_encode($respuesta);
				}else{
					echo 0;
				}

			}

			catch(Exception $e)
		{
			
			die($e->getMessage());
		}
	}



	public function recuperarPassUsuario($data){
	    	
	    	
	    	

	    	try{
			

			$query = 'UPDATE user SET '.$data["campo"].' = :dato  WHERE idUser = :idUser';


			

			

			$resultado = $this->cnn->prepare($query);
		
			$idUser = addslashes($data['idUser']);
			$dato = addslashes($data['dato']);
			$resultado ->bindValue(':idUser', $idUser);
			$resultado ->bindValue(':dato', $dato);

			$resultado->execute(); 

			$countRowAffected = $resultado->rowCount();

			if ($countRowAffected > 0) {

				/*	"idUser" => $idUser,
					"urlFotoUser" => $urlFotoUser,
					"nomUser" => $nomUser ,
					"apeUser" => $apeUser,
					"fNacUser" => $fNacUser,
					"sexoUser" => $sexoUser,
					"userName" => $userName,
					"emailUser" => $emailUser,
					"celUser" => $celUser,
					"telCasaUser" => $telCasaUser,
					"dirUser" => $dirUser,
					"pregSegurUser" => $pregSegurUser,
					"respSegurUser" => $respSegurUser
				);
				$this->reloadSesion($datasesion,1);*/
				echo 1;
			}else{
				echo 0;
			}
				
			
		} 
			catch(Exception $e)
		{
			
			die($e->getMessage());
		}
	    	
	    
	}

	    public function cambiarPreguntaYRespuestaSeguridad($data){
	    	
	    	/*$data['pregSegurUser']
	    	$data['respSegurUser']*/
	    		
	    }


	

	public function editarPerfilUser($data){
	
		try{
			

			$query = 'UPDATE user SET urlFotoUser = :urlFotoUser , nomUser = :nomUser , apeUser = :apeUser , fNacUser = :fNacUser , sexoUser = :sexoUser , userName = :userName , emailUser = :emailUser, celUser = :celUser , telCasaUser = :telCasaUser , dirUser = :dirUser , fUltModificacion = NOW(), idUserMod = :idUserMod, pregSegurUser = :pregSegurUser , respSegurUser = :respSegurUser  WHERE idUser = :idUser';


			if ($data['urlFotoUser']!=$_SESSION['urlFotoUser']) {
				unlink($_SESSION['urlFotoUser']);//elimina la imagen anterior del perfil
			}
			

			

			$resultado = $this->cnn->prepare($query);
		
			
			$idUser = addslashes($_SESSION['idUser']);
			$urlFotoUser = addslashes($data["urlFotoUser"]);
			$nomUser = addslashes( $data["nomUser"]);
			$apeUser = addslashes($data["apeUser"]);
			$fNacUser = addslashes(date('Y-m-d',strtotime($data["fNacUser"])));
			$sexoUser = addslashes($data["sexoUser"]);
			$userName = addslashes($data["userName"]);
			$emailUser = addslashes($data["emailUser"]);
			$celUser = addslashes($data["celUser"]);
			$telCasaUser = addslashes($data["telCasaUser"]);
			$dirUser = addslashes($data["dirUser"]);
			$pregSegurUser = addslashes($data["pregSegurUser"]);
			$respSegurUser = addslashes($data["respSegurUser"]);


			$resultado ->bindValue(':idUser', $idUser);
			$resultado ->bindValue(':urlFotoUser', $urlFotoUser);
			$resultado ->bindValue(':nomUser', $nomUser);
			$resultado ->bindValue(':apeUser', $apeUser);
			$resultado ->bindValue(':fNacUser', $fNacUser);
			$resultado ->bindValue(':sexoUser', $sexoUser);
			$resultado ->bindValue(':userName', $userName);
			$resultado ->bindValue(':emailUser', $emailUser);
			$resultado ->bindValue(':celUser', $celUser);
			$resultado ->bindValue(':telCasaUser', $telCasaUser);
			$resultado ->bindValue(':dirUser', $dirUser);
			$resultado ->bindValue(':idUserMod', 0);
			$resultado ->bindValue(':pregSegurUser', $pregSegurUser);
			$resultado ->bindValue(':respSegurUser', $respSegurUser);

			$resultado->execute(); 

			$countRowAffected = $resultado->rowCount();

			if ($countRowAffected > 0) {

				$datasesion=array(
					"idUser" => $idUser,
					"urlFotoUser" => $urlFotoUser,
					"nomUser" => $nomUser ,
					"apeUser" => $apeUser,
					"fNacUser" => $fNacUser,
					"sexoUser" => $sexoUser,
					"userName" => $userName,
					"emailUser" => $emailUser,
					"celUser" => $celUser,
					"telCasaUser" => $telCasaUser,
					"dirUser" => $dirUser,
					"pregSegurUser" => $pregSegurUser,
					"respSegurUser" => $respSegurUser
				);
				$this->reloadSesion($datasesion,1);
				echo 1;
			}else{
				echo 0;
			}
				
			
		} 
			catch(Exception $e)
		{
			
			die($e->getMessage());
		}
			
	}

	private function reloadSesion($data,$typeUpdate){

		if ($typeUpdate ==1) {//actualizando perfil sin password
			
			$data['msgSendsUser'] = $_SESSION['msgSendsUser'];
			$data['passUser'] = $_SESSION['passUser'];
			$data['timeout'] = $_SESSION['timeout'];
			session_destroy();

			session_start();
			$_SESSION['idUser'] = $data['idUser'];
			$_SESSION['urlFotoUser'] = $data['urlFotoUser'];
			$_SESSION['nomUser'] = $data['nomUser'];
			$_SESSION['apeUser'] = $data['apeUser'];
			$_SESSION['fNacUser'] = date("d-m-Y",strtotime($data['fNacUser']));
			$_SESSION['sexoUser'] = ($data['sexoUser']==1) ? "Masculino": "Femenino";
			$_SESSION['userName'] = $data['userName'];
			$_SESSION['emailUser'] = $data['emailUser'];
			$_SESSION['passUser'] = $data['passUser'];
			$_SESSION['celUser'] = $data['celUser'];
			$_SESSION['telCasaUser'] = $data['telCasaUser'];
			$_SESSION['dirUser'] = $data['dirUser'];
			$_SESSION['msgSendsUser'] = $data['msgSendsUser'];
			$_SESSION['pregSegurUser'] = $data['pregSegurUser'];
			$_SESSION['respSegurUser'] = $data['respSegurUser'];  
			$_SESSION['timeout'] = $data['timeout'];


		}else if ($typeUpdate ==2) {//Actualizando solo el pasword
			session_start();
			$data['idUser'] = $_SESSION['idUser']; 
			$data['urlFotoUser'] = $_SESSION['urlFotoUser']; 
			$data['nomUser'] = $_SESSION['nomUser']; 
			$data['apeUser'] = $_SESSION['apeUser']; 
			$data['fNacUser'] = $_SESSION['fNacUser'];
			$data['sexoUser'] = $_SESSION['sexoUser'];
			$data['userName'] = $_SESSION['userName'];
			$data['emailUser'] = $_SESSION['emailUser'];
			$data['celUser'] = $_SESSION['celUser'];
			$data['telCasaUser'] = $_SESSION['telCasaUser'];
			$data['dirUser'] = $_SESSION['dirUser'];
			$data['msgSendsUser'] = $_SESSION['msgSendsUser'];
			$data['pregSegurUser'] = $_SESSION['pregSegurUser'];
			$data['respSegurUser'] = $_SESSION['respSegurUser'];
			$data['timeout'] = $_SESSION['timeout'];

			session_destroy();

			session_start();
			$_SESSION['idUser'] = $data['idUser'];
			$_SESSION['urlFotoUser'] = $data['urlFotoUser'];
			$_SESSION['nomUser'] = $data['nomUser'];
			$_SESSION['apeUser'] = $data['apeUser'];
			$_SESSION['fNacUser'] = $data['fNacUser'];
			$_SESSION['sexoUser'] = $data['sexoUser'];
			$_SESSION['userName'] = $data['userName'];
			$_SESSION['emailUser'] = $data['emailUser'];
			$_SESSION['passUser'] = $data['passUser'];
			$_SESSION['celUser'] = $data['celUser'];
			$_SESSION['telCasaUser'] = $data['telCasaUser'];
			$_SESSION['dirUser'] = $data['dirUser'];
			$_SESSION['msgSendsUser'] = $data['msgSendsUser'];
			$_SESSION['pregSegurUser'] = $data['pregSegurUser'];
			$_SESSION['respSegurUser'] = $data['respSegurUser'];  
			$_SESSION['timeout'] = $data['timeout'];
			
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

	
}

?>