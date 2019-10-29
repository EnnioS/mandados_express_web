<?php
require_once 'models/reglogin_model.php';
	
class Reglogin_controller
{
	private $reg_login_model;
	
	function __construct()
	{
		$this->reg_login_model = new Reglogin_model();
		
	}


	public function guaradar_imagen_user(){//SUbe fotografia de usuario al servidor enm la carpeta de imagenes para usuarios

		$fileValues = array();
		$fechaactual  = date("dHi");  //Fecha Actual       
  		$no_aleatorio  = rand(10, 99);//numero aleatorio
    	$tipo_imagen = $_FILES["imagenNewUser"]["type"]; //Tipo del archivo
    	$size_imagen = $_FILES["imagenNewUser"]["size"]; // tamaño del archivo
    	$carpeta_destino = 'assets/img/img_users/'; // ruta de la carpeta
    	
    	$formatoImg= str_split($tipo_imagen);
    	$formatoImg = implode(array_slice($formatoImg,6));
    	$nombre_imagen = $fechaactual.$no_aleatorio."_user.".$formatoImg; //Nombre del archivo
    	

    	$fileValues= array(
    	 	"enviar" => 1,
    	 	"nombreImg" => $nombre_imagen,
    	 	"tipoImg" =>  $tipo_imagen,
    	 	"tamañoImg" => $size_imagen,
    	 	"urlImg" => $carpeta_destino
    	 );

        if(isset($_FILES['imagenNewUser']['name']))
        {
        	
        	 $size_imagen;// tamaño en bites
        	 $sizeImageMb = ((float)$size_imagen/1024)/1024;//pasar a mega bite
        	 // if (!file_exists($rutaImagen)){} // verifica si existe el archivo en la ruta

        	if($sizeImageMb <=1){

        	 	if($tipo_imagen == "image/jpg" || $tipo_imagen == "image/png" || $tipo_imagen == "image/gif" || $tipo_imagen == "image/jpeg"){

	        	

	        	 move_uploaded_file($_FILES['imagenNewUser']['tmp_name'], $carpeta_destino.$nombre_imagen);//sube el archivo al servidor

	        	  
	        	}else{
	        		if ($tipo_imagen == "") {
	        			$fileValues['nombreImg'] ='';
	        			$fileValues['urlImg'] = 'assets/img/icon/round-account_circle-gris.svg';
	        			$fileValues["enviar"] = 1;
	        		}else{

	        			$fileValues["enviar"] = 0;
		        		echo "Solo se permiten imagenes en formato jpg, jpeg, png y gif";
		        		// no se permite guarar usuario por el tipo de formato no permitido

	        		}
	        		
	        	}


        	}
        	else
        	{
        	 	$fileValues["enviar"] = 0;
        	 	echo "el tamaño del archivo es demasiado grande, Tamaño ".(float)$size_imagen/1000000;
        	 	// no se permite guarar usuario por que el tamaño de la imagen excede el tamaño en bits
        	}  
        }

        return $fileValues; //se permite guardar usuario sin imagen
    }


	public function RegistroUsuario(){
		
		$fileValues = array();
		$dataRegistro = array();
		$fileValues = $this->guaradar_imagen_user();
		

		if($fileValues["enviar"] == 1){



			if(isset($_POST['nomModalRegInput'])){
				
		
				$dataRegistro = array(
					"urlFotoUser" => $fileValues['urlImg'].$fileValues['nombreImg'],
					"nomUser" => $_POST['nomModalRegInput'],
					"apeUser" => $_POST['apeModalRegInput'],
					"fNacUser" => $_POST['diaNacModalRegSelect']."-".$_POST['mesNacModalRegSelect']."-".$_POST['annoNacModalRegSelect'],
					"sexoUser" => $_POST['sexoModalRadioRegInput'],
					"userName" => $_POST['userModalRegInput'],
					"emailUser" => $_POST['emailModalRegistroInput'],
					"passUser" => $_POST['passModalRegInput'],
					"celUser" => $_POST['celModalRegInput'],
					"telCasaUser" => $_POST['telModalRegInput'],
					"dirUser" => $_POST['dirModalRegTextTarea'],
					"tipoUser" =>  0,
					"rolUser" =>0,//Usuario final Registrado
					"fcreacionUser" => date("Y-m-d H:i:s"),
					"idUserCreador" => 0,//El Mismo dede web o app
					"origenCreado" => 0,//desde web
					"estadoUser" => 1,//Activo
					"pregSegurUser" => $_POST['secuQuestionssModalRegSelect'], //pregunta de seguridad
					"respSegurUser" => $_POST['respSeguridadModalRegInput'] // respuesta de seguridad
				);

				$this->reg_login_model->registrarUsuario($dataRegistro);

			}
		}
		

		//header("location:index.php");
		
	}


	public function iniciar_sesion(){

	

		if(isset($_POST['userModalLoginInput']) && isset($_POST['userModalLoginInput'])){



			$login = array(
				'user' =>	$_POST['userModalLoginInput'],
				'pass' => $_POST['passModalLoginInput']
			);

			

			$dataUser['user'] = $this->reg_login_model->iniciar_sesion($login);


			if ($dataUser['user'] != 0) {

				session_start();
				$_SESSION['idUser'] = $dataUser['user']['idUser'];
				$_SESSION['urlFotoUser'] = $dataUser['user']['urlFotoUser'];
				$_SESSION['nomUser'] = $dataUser['user']['nomUser'];
				$_SESSION['apeUser'] = $dataUser['user']['apeUser'];
				$_SESSION['fNacUser'] = date("d-m-Y",strtotime($dataUser['user']['fNacUser']));
				$_SESSION['sexoUser'] = ($dataUser['user']['sexoUser']==1) ? "Masculino": "Femenino";
				$_SESSION['userName'] = $dataUser['user']['userName'];
				$_SESSION['emailUser'] = $dataUser['user']['emailUser'];
				$_SESSION['passUser'] = $dataUser['user']['passUser'];
				$_SESSION['celUser'] = $dataUser['user']['celUser'];
				$_SESSION['telCasaUser'] = $dataUser['user']['telCasaUser'];
				$_SESSION['dirUser'] = $dataUser['user']['dirUser'];
				$_SESSION['msgSendsUser'] = $dataUser['user']['msgSendsUser'];
				$_SESSION['pregSegurUser'] = $dataUser['user']['pregSegurUser'];
				$_SESSION['respSegurUser'] = $dataUser['user']['respSegurUser'];  
				$_SESSION['timeout'] = time();

				header("location:index.php");


			}else{
				echo false;
			}

			
			
		}

		
	}


	public function  validarExisteUser(){
		$user = $_POST['usuario'];

		$this->reg_login_model->validarExisteUser($user);
	}

	public function cerrar_sesion(){	
		session_start();
		session_destroy();
		header("location:index.php");
	}



}
	/*public function set_userdata($data, $value = NULL)
	{
		if (is_array($data))
		{
			foreach ($data as $key => &$value)
			{
				$_SESSION[$key] = $value;
			}

			return;
		}

		$_SESSION[$data] = $value;
	}

	public function unset_userdata($key)
	{
		if (is_array($key))
		{
			foreach ($key as $k)
			{
				unset($_SESSION[$k]);
			}

			return;
		}

		unset($_SESSION[$key]);
	}*/


	
?>


