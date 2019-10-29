<?php
	/**
	 * 
	 */

	require_once 'models/perfil_model.php';
	class Perfil_controller
	{
		private $model;
		
		function __construct()
		{
			$this->model = new Perfil_model();
		}

		public function Perfil(){
			include_once 'views/header/header_search.php';
			include_once 'views/pages/perfil.php';
			include_once 'views/footer/index_footer.php';
			include_once 'views/jsviews/js_perfil.php';
		}





		public function guaradar_imagen_user(/*$nomImg*/){//SUbe fotografia de usuario al servidor enm la carpeta de imagenes para usuarios

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
		        	 $fileValues["enviar"] = 1;
		        	  
		        	}else{
		        		

		        			$fileValues["enviar"] = 0;
			        		echo "El nombre se encuentra vacio o el formato de imagen no es permitido";
			        		// no se permite guarar usuario por el tipo de formato no permitido

		        		
		        		
		        	}


	        	}
	        	else
	        	{
	        	 	$fileValues["enviar"] = 0;
	        	 	echo "el tamaño del archivo es demasiado grande, Tamaño ".(float)$size_imagen/1000000;
	        	 	// no se permite guarar usuario por que el tamaño de la imagen excede el tamaño en bits
	        	}  
	        }

	        return $fileValues; 
	    }



		public function editarPerfilUser(){
			$fileValues = array();
		$dataRegistro = array();
		$fileValues = $this->guaradar_imagen_user();
		session_start();

			if(isset($_POST['nomModalRegInput'])){
				$data = array(
						"urlFotoUser" => $fileValues['urlImg'].$fileValues['nombreImg'],
						"idUser" => $_SESSION['idUser'],
						"nomUser" => $_POST['nomModalRegInput'],
						"apeUser" => $_POST['apeModalRegInput'],
						"userName" => $_POST['userModalRegInput'],
						"emailUser" => $_POST['emailModalRegistroInput'],
						"fNacUser" => $_POST['diaNacModalRegSelect']."-".$_POST['mesNacModalRegSelect']."-".$_POST['annoNacModalRegSelect'],
						"sexoUser" => $_POST['sexoModalRadioRegInput'],
						"celUser" => $_POST['celModalRegInput'],
						"telCasaUser" => $_POST['telModalRegInput'],
						"dirUser" => $_POST['dirModalRegTextTarea'],
						"pregSegurUser" => $_POST['secuQuestionssModalRegSelect'], //pregunta de seguridad
						"respSegurUser" => $_POST['respSeguridadModalRegInput'] // respuesta de seguridad
					);

				if($fileValues["enviar"] == 0){
					
				
					 $data['urlFotoUser'] = $_SESSION['urlFotoUser'];
						
				}

					$this->model->editarPerfilUser($data);
			}
	
			
		}


		public function cambiarPass(){
			
			if(isset($_POST['idUser'])){
				$data = array(
					"idUser" => $_POST['idUser'],
					"passUser" => $_POST['passUser']
				);

				$this->model->cambiarPass($data);

			}

		}



		 public function verificarPassUserEmail(){
	    	if(isset($_POST['datoModal'])){
	    		if ($_POST['datoModal'] == "passUser") {
	    			$data = array(
	    			"datoModal" => $_POST['datoModal'],
					"passOUser" => $_POST['passOUser'],
					"emailUser" => $_POST['emailUser']
					);
	    		}else{
					$data = array(
						"datoModal" => $_POST['datoModal'],
						"passOUser" => $_POST['passOUser'],
						"emailUser" => $_POST['emailUser']
					);
				}

				$this->model->verificarPassUserEmail($data);

			}
	    }


	    public function recuperarPassUsuario(){
	    	if(isset($_POST['dato'])){
	    		$data = array(
	    			"idUser" => 1,
	    			"campo" => $_POST['campo'],
	    			"dato" => $_POST['dato']
	    		);
	    		$this->model->recuperarPassUsuario($data);
	    	}
	    }

	    public function cambiarPreguntaYRespuestaSeguridad(){
	    	if(isset($_POST['pregSegurUser'])){
	    		$data = array(
	    			"pregSegurUser" => $_POST['pregSegurUser'],
	    			"respSegurUser" => $_POST['respSegurUser']
	    		);
	    		$this->model->cambiarPreguntaYRespuestaSeguridad($data);
	    	}
	    }


		
	}
?>