<?php 

require_once 'models/mandados_model.php';

class Mandados_controller
{
	
	function __construct()
	{
		$this->mandados_model = new Mandados_model();
	}


	public function RegistrarMandados(){
		session_start();

		$mensaje = array();
		if (isset($_SESSION['nomUser'])) {
			
			if(isset($_POST['descMandadoModalMandaTextTarea'])){

				if($this->mandados_model->selecCantMsgXUser($_SESSION['idUser'])!=""){

					$cantMsg = intval($this->mandados_model->selecCantMsgXUser($_SESSION['idUser'])+1);

					$mensaje = array(
					"idUser" => $_SESSION['idUser'],
					"mensajeManda" => $_POST['descMandadoModalMandaTextTarea'],
					"fCreacionManda" => date("Y-m-d H:i:s"),
					"origernCreado" => 0, //web
					"estadoManda" =>0,//Activo (en espera de lectura)
					"msgSendsUser" => $cantMsg
				);

					
					


					$this->mandados_model->RegistrarMandadosDeUsuario($mensaje);

				}else{
					
				}

				
			}



		}else{

			if(isset($_POST['NomModalMandaInput'])){
		
				$mensaje = array(
					
					"nomTempManda" => $_POST['NomModalMandaInput'],
					"apeTempManda" => $_POST['ApeModalMandaInput'],
					"sexTempManda" => $_POST['sexoModalRadioMandaInput'],
					"numContTempManda" => $_POST['celModalMandaInput'],
					"dirTempManda" => $_POST['dirModalMandaTextTarea'],
					"mensajeManda" => $_POST['descMandadoModalMandaTextTarea'],
					"fcreacionTempManda" => date("Y-m-d H:i:s"),
					"estadoTempManda" => 0//Activo (en espera de lectura)
				);

				$this->mandados_model->RegistrarMandadosTemporal($mensaje);
			}
			
		}
		
		


		
		

		//header("location:index.php");
		
	}


}

?>