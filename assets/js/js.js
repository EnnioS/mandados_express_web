
//Inicializa los Tooltip bootstrap 4
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});


//variables globales cuando se ejecute o agregue este documento javascript

	var dataAnswsecureQuest;

function initMap() {
  // The location of Uluru
  var uluru = {lat: 12.932947, lng: -85.918108};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 15, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}


//pop up Alert
var alertBoxOk = '<div id="box"><span><img src="assets/img/icon/ios-checkmark-circle-outline.svg" width="45px">'+
'</span><h4 id="alertBoxMensaje"></h4><button id="btnOkAlert" onclick="pop()">Ok</button></div>';
var alertOk=0;
function pop(mensaje){
	if (alertOk == 0) {
		document.getElementById("box").style.display = "block";
		document.getElementById("alertBoxMensaje").innerHTML = mensaje;
		alertOk=1;
	}else{
		document.getElementById("box").style.display = "none";
		alertOk=0;
		location.reload();
	}
}


//codigo para modales hacer mandados, logearse, registrar nuevo usuario y editar usuario


	
function verPassword(idField, idField2, idField3) {//Muestra password al hacer click en un check box
	var x = document.getElementById(idField);
	var y = document.getElementById(idField2);
	var z = document.getElementById(idField3);

  	if (idField !=""){
	  if (x.type === "password") {
	    x.type = "text";
	  } else {
	    x.type = "password";
	  }
	}

  	if (idField2 !=""){
	   if (y.type === "password") {
	    y.type = "text";
	  } else {
	    y.type = "password";
	  }
	}

	if (idField3 !=""){
	   if (z.type === "password") {
	    z.type = "text";
	  } else {
	    z.type = "password";
	  }
	}
}


function esconderYMostrarBloques(bloqueAdmin, bloqueSeguridad, bloqueNuevoPassUser, idBtnPassUser, idBtnPregunta, idBtnRecuperar){//oculta y muestra  bloques de formulario y botones html al ser verdadera unna verificacion de datos de la base de datos 
	document.getElementById(bloqueAdmin).style.display = "block";
	document.getElementById(bloqueSeguridad).style.display = "none";
	document.getElementById(bloqueNuevoPassUser).style.display = "none";
	document.getElementById(idBtnPassUser).style.display = "block";
	document.getElementById(idBtnPregunta).style.display = "none";
	document.getElementById(idBtnRecuperar).style.display = "none";
}


function verificarExisteDatosLogin(inputIdpassUser, inputIdEmail, idSpanTextError, bloquePassUserEmail, bloqueSeguridad, respSeguridadInput, idBtnPassUser, idBtnPregunta, datoModal){//verifica datos de usuario para recuperacion de contraseña y usuario en diferentes modales
	


	var formData = new FormData();

	formData.append("datoModal",datoModal);
	formData.append("passOUser",document.getElementById(inputIdpassUser).value);
	formData.append("emailUser",document.getElementById(inputIdEmail).value);

	xhr = new XMLHttpRequest();
	xhr.open("POST","?c=Perfil&a=verificarPassUserEmail");
	xhr.send(formData);
	xhr.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText != 0) {
				var res = JSON.parse(this.responseText);
				
                preguntas = {
	                "1" : "¿Cual es el nombre de tu primer mascota?",
	                "2" : "¿Cual es la marca de tu primer vehiculo a motor?",
	                "3" : "¿Cual es el tu pelicula favorita?",
	                "4" : "¿En que ciudad conocistes a tu pareja?",
	                "5" : "¿En que año terminastes la secundaria?",
	                "6" : "¿Cual es tu libro favorito?",
	                "7" : "¿En que ciudad se conocieron tus padres?",
	                "8" : "¿Cual es el nombre de tu primer amor?",
	                "9" : "¿Cuale era el nombre de tu primer jefe?",
	                "10" : "¿Que posición jugastes / juegas en tu deporte favorito?",
	                "11" : "¿Cual es el segundo apellido de tu abuelo?"
            	};
              


                dataAnswsecureQuest = new Object();

                dataAnswsecureQuest['respSegurUser'] = res[0]['respSegurUser'];
      
				document.getElementById(bloquePassUserEmail).style.display = "none";
				document.getElementById(bloqueSeguridad).style.display = "block";


				document.getElementById(idBtnPassUser).style.display = "none";
				document.getElementById(idBtnPregunta).style.display = "block";

				document.getElementById(idSpanTextError).innerHTML = "";

				document.getElementById(inputIdpassUser).value = "";
                document.getElementById(inputIdEmail).value = "";
                document.getElementById(respSeguridadInput).innerHTML = preguntas[res[0]['pregSegurUser']];
				
					
				
			}else{

				if (datoModal == "passUser") 
				{
					document.getElementById(idSpanTextError).innerHTML = "Contraseña o email no existe";
				}else{
					document.getElementById(idSpanTextError).innerHTML = "Nombre de usuario o email no existe";
				}

				

			}
		}
	}
	
}


function verificarRespuestaDeSeguridad( bloquePassUserEmail, bloqueSeguridad, bloqueNuevoPassUser, preguntaSeguridadInput, respSeguridadInput, idSpanTextError, idBtnPassUser, idBtnPregunta,idBtnRecuperar){
	
	//aqui hay que verificar la respuesta de seguridad, al ser verdadero abrir modal o mostrar bloque html cambio de contraeña o usuario al esconder el bloque de las preguntas 
	if(dataAnswsecureQuest['respSegurUser']==document.getElementById(respSeguridadInput).value){
		//ocultar y mostrar bloques de formulario y botones
			document.getElementById(bloquePassUserEmail).style.display = "none";
			document.getElementById(bloqueSeguridad).style.display = "none";
			document.getElementById(bloqueNuevoPassUser).style.display = "block";
			document.getElementById(idBtnPassUser).style.display = "none";
			document.getElementById(idBtnPregunta).style.display = "none";
			document.getElementById(idBtnRecuperar).style.display = "block";

			document.getElementById(preguntaSeguridadInput).innerHTML = "";
			document.getElementById(respSeguridadInput).value = "";
			document.getElementById(idSpanTextError).innerHTML = "";

	}else{
		document.getElementById(idSpanTextError).innerHTML = "La respuesta es incorrecta<br>(Debe tomar en cuenta los caractere en mayusculas y acentos)";
	}
	
}

function recuperarPassUsuario(bloquePassUserEmail, bloqueSeguridad, bloqueNuevoPassUser, idInputNewPassUser, idInputConfirmNewPassUser, idSpanTextError, idBtnPassUser, idBtnPregunta, idBtnRecuperar,modalActual, campoARecuperar){

	var formData = new FormData();
	var newPassUser = document.getElementById(idInputNewPassUser).value;
	var confNewPassUser = document.getElementById(idInputConfirmNewPassUser).value;
	

	if (newPassUser == "" || newPassUser.charAt(0)==" " || newPassUser.length  < 5) {
		document.getElementById(idSpanTextError).innerHTML='El campo Usuario se encuentra vacio, contiene menos de 5 caracteres o contiene espcio en blanco al inicio';
	}
	else
	{
		if (confNewPassUser == newPassUser) {

			formData.append("campo",campoARecuperar);
			formData.append("dato",newPassUser);
			document.getElementById(idSpanTextError).innerHTML='';


			if (campoARecuperar == "userName") {
				formData.append("usuario",newPassUser);

				xhr = new XMLHttpRequest();
				xhr.open("POST","?c=Reglogin&a=validarExisteUser");
				xhr.send(formData);
				xhr.onreadystatechange = function(){
					if (this.readyState == 4 && this.status == 200) {
						if (this.responseText != 0) {// 0 significa que usuario existe en login_model, y 1 que no existe
				
							extrarecuperarPassUsuario(formData,bloquePassUserEmail, bloqueSeguridad, bloqueNuevoPassUser, idInputNewPassUser, idInputConfirmNewPassUser, idSpanTextError, idBtnPassUser, idBtnPregunta, idBtnRecuperar,modalActual, campoARecuperar);
						
						}else{
							document.getElementById(idSpanTextError).innerHTML = "Usuario ya existe, elija otro diferente";
						}
					}
				}
			}else{
				extrarecuperarPassUsuario(formData, bloquePassUserEmail, bloqueSeguridad, bloqueNuevoPassUser, idInputNewPassUser, idInputConfirmNewPassUser, idSpanTextError, idBtnPassUser, idBtnPregunta, idBtnRecuperar,modalActual, campoARecuperar);
			}




			
			
		}else{
			document.getElementById(idSpanTextError).innerHTML='Los campos no coinsiden';
		}

	}

}

function extrarecuperarPassUsuario(formData, bloquePassUserEmail, bloqueSeguridad, bloqueNuevoPassUser, idInputNewPassUser, idInputConfirmNewPassUser, idSpanTextError, idBtnPassUser, idBtnPregunta, idBtnRecuperar,modalActual, campoARecuperar){



	if (document.getElementById(idInputConfirmNewPassUser).value.trim() == document.getElementById(idInputNewPassUser).value.trim()) {

				var xhr = new XMLHttpRequest();
				xhr.open('POST', '?c=Perfil&a=recuperarPassUsuario');
				xhr.send(formData);
				xhr.onreadystatechange = function(){
					if (this.readyState == 4 && this.status == 200) {
						

						if (xhr.responseText == 1) {


							alertMensaje ="La información ha sido recuperada!";
		                // Grab an element
		               		var el = document.getElementById(modalActual),
		                    // Make a new div
		                    elChild = document.createElement('div');

		                // Give the new div some content
		               		elChild.innerHTML = alertBoxOk;

		                // Jug it into the parent element
			                el.appendChild(elChild);
			                pop(alertMensaje);

			               /* document.getElementById(bloquePassUserEmail).style.display = "block";
							document.getElementById(bloqueSeguridad).style.display = "none";
							document.getElementById(bloqueNuevoPassUser).style.display = "none";
							document.getElementById(idBtnPassUser).style.display = "block";
							document.getElementById(idBtnPregunta).style.display = "none";
							document.getElementById(idBtnRecuperar).style.display = "none";*/
						}

					}
				}
			}


}

function cambiarPreguntaYRespuestaSeguridad(){

	var formData = new FormData();
	var pregunta = document.getElementById('cambiarPregSeguridadSelect').value;
	var respuesta = document.getElementById('respCambiarPregSeguridadInput').value;

	var preguntaTextError = document.getElementById('cambiarPregSeguridadError');
	var respTextError = document.getElementById('respCambiarPregSeguridadError');


	formData.append("pregSegurUser",pregunta);
	formData.append("respSegurUser",respuesta.trim());

	if (pregunta == "0") {
		preguntaTextError.innerHTML='Seleccione una pregunta de seguridad';
	}else{
		preguntaTextError.innerHTML='';

		if (respuesta == "" || respuesta.charAt(0)==" ") {
		respTextError.innerHTML='Agregue su respuesta';

		}else{
			respTextError.innerHTML='';

			var xhr = new XMLHttpRequest();
			xhr.open("POST", "?c=Perfil&a=cambiarPreguntaYRespuestaSeguridad");
			xhr.send(formData);
			xhr.onreadystatechange = function(){

				if (xhr.readyState == 4 && xhr.status == 200) {
					//let datos = JSON.parse(xhr.responseText);
					

						 alertMensaje ="La contraseña ha sido cambiada!";
	                // Grab an element
	                var el = document.getElementById('modalPregSeguridad'),//agregar Nombre del modal en el que estan
	                    // Make a new div
	                    elChild = document.createElement('div');

	                // Give the new div some content
	                elChild.innerHTML = alertBoxOk;

	                // Jug it into the parent element
	                el.appendChild(elChild);
	                pop(alertMensaje);
					
					
				}

			}


		}
	}


}


function cambiarPass(passActualUser, idUser){
	
	var passNuevo = document.getElementById('formNuevoPassInput').value.trim();
	
	var formData = new FormData();

	formData.append("idUser", idUser);
	formData.append("passUser", passNuevo);

	
	if (validarCamposCambiarPass(passActualUser)) {
		var request = new XMLHttpRequest();
		request.open("POST", "?c=Perfil&a=cambiarPass");
		request.send(formData);
		request.onreadystatechange = function(){
			if (request.readyState == 4 && request.status == 200) {
				//let datos = JSON.parse(request.responseText);
				if (request.responseText == 1) {

					 alertMensaje ="La contraseña ha sido cambiada!";
                // Grab an element
                var el = document.getElementById('modalCambiarContrasenna'),
                    // Make a new div
                    elChild = document.createElement('div');

                // Give the new div some content
                elChild.innerHTML = alertBoxOk;

                // Jug it into the parent element
                el.appendChild(elChild);
                pop(alertMensaje);
				}
				
			}
		}
	}


}



	
function preview_image(event) //pre visualiza imagen en un contenedor al seleccionar el archicvo y limita el tipo de extencion de archivo 
{
	var archivoInput = document.getElementById('imagenNewUser');
	var archivoRuta = archivoInput.value;
	var extPermitidas = /(.jpg|.jpeg|.png|.gif)$/i;


	var sizeByte = archivoInput.files[0].size;
	
	var siezeMega = parseFloat((sizeByte / 1024)/1024);
	if(siezeMega > 1){
	document.getElementById('imagenNewUserError').innerHTML='el archivo seleccionado excede el limite de peso de 1MB';
	return false;
	}else{

		document.getElementById('imagenNewUserError').innerHTML=''; 

		if(!extPermitidas.exec(archivoRuta))
		{
			document.getElementById('imagenNewUserError').innerHTML='El formato de la imagen debe ser jpg, jpeg, o png';
				
				
			archivoInput.value='';
			return false;
		}
		else
		{
			
			if(archivoInput.files && archivoInput.files[0])
			{
				var reader = new FileReader();
				reader.onload = function()
				{
					var output = document.getElementById('output_image');
					output.src = reader.result;
				}

				reader.readAsDataURL(event.target.files[0]);
			
			}
		}
	}
	
}


//document.querySelector('#eviarDatosUser').addEventListener('click',function(e){
	function registrarUsueario(){

	var usuario = document.getElementById("userModalRegInput").value.trim();

	if(validarCamposRegistroUser(0)){

		const xhr = new XMLHttpRequest();
		xhr.open('POST','?c=Reglogin&a=validarExisteUser',true); //methos, URL, async
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");// cabecera para que funciones el metodo POST
		xhr.send('usuario='+usuario+'');
		xhr.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				//let datos = JSON.parse(this.responseText);
				if (this.responseText == 0) {

					document.getElementById('userModalRegError').innerHTML = "Usuario ya existe, intente con otro";
					
					
				}else{
					
					document.getElementById('userModalRegError').innerHTML = "";
					RegistroUsuario();
					
				}
				
			}
		}

	}

}

function validarCamposCambiarPass(passAtualUser){
	
	var passAtual = document.getElementById('formActualPassInput').value.trim();
	var passNuevo = document.getElementById('formNuevoPassInput').value.trim();
	var confPass = document.getElementById('formConfirmNuevoPassInput').value.trim();


	if (passAtual != passAtualUser) {
		document.getElementById('formActualPassError').innerHTML="contraeña no coinside con la contraeña actual";
		seguirProcerso1=false;
	}else{
		document.getElementById('formActualPassError').innerHTML="";
		seguirProcerso1=true;
		
	}
	if (passNuevo == ""  || passNuevo.charAt(0)==" " || passNuevo.length <5) {
		document.getElementById('formNuevoPassError').innerHTML='El campo contraseña se encuentra vacio, contiene menos de 5 caracteres o contiene espcio en blanco al inicio';
		seguirProcerso2=false;
		
	}else{
		document.getElementById('formNuevoPassError').innerHTML='';
		seguirProcerso2=true;
	}

	if (confPass == "") {
		document.getElementById('formConfirmNuevoPassError').innerHTML='El campo confirmar contraseña se encuentra vacio';
		seguirProcerso3=false;
		
	}else{
		document.getElementById('formConfirmNuevoPassError').innerHTML='';
		seguirProcerso3= matchPass(passNuevo,confPass,"formConfirmNuevoPassError");
	}
	
	var resultado;
	if (seguirProcerso1 == true && seguirProcerso2 == true && seguirProcerso3 == true) {
		resultado = true;
	}else{
		resultado = false;
	}
	return resultado;

}




//validar campos de nuevo registro
function validarCamposRegistroUser(origen){
	var nombre = document.getElementById('nomModalRegInput').value.trim();
	var apellido = document.getElementById("apeModalRegInput").value.trim();
	var dia = document.getElementById("diaNacModalRegSelect").value.trim();
	var mes = document.getElementById("mesNacModalRegSelect").value;
	var anno = document.getElementById("annoNacModalRegSelect").value;
	var usuario = document.getElementById("userModalRegInput").value.trim();
	var email = document.getElementById("emailModalRegistroInput").value.trim();
	var pregunSeguridad = document.getElementById("secuQuestionssModalRegSelect").value;
	var respSeguridad = document.getElementById("respSeguridadModalRegInput").value.trim();
	var telefono = document.getElementById("telModalRegInput").value.trim();
	var celular = document.getElementById("celModalRegInput").value.trim();
	var direccion = document.getElementById("dirModalRegTextTarea").value.trim();
	var sexoF = document.getElementById("sexFemModalRadioRegInput").value;
	var sexoM = document.getElementById("sexMasModalRadioRegInput").value;

	var seguirProcerso=false;

	if (nombre=="" || nombre.charAt(0)==" " || nombre.length  < 3) {
		document.getElementById('nomModalRegError').innerHTML='El campo nombre se encuentra, contiene menos de 3 caracteres o contiene espcio en blanco al inicio';
		seguirProcerso1=false;
	}else{
		document.getElementById('nomModalRegError').innerHTML='';
		seguirProcerso1=true;
	}

	if (apellido=="" || apellido.charAt(0)==" " || apellido.length  < 3) {
		document.getElementById('apeModalRegError').innerHTML='El campo apellido se encuentra vacio, contiene menos de 3 caracteres o contiene espcio en blanco al inicio';
		seguirProcerso2=false;
		
	}else{
		document.getElementById('apeModalRegError').innerHTML='';
		seguirProcerso2=true;
	}

	if (dia=="0" || mes=="0" || anno=="0") {
		
		document.getElementById('fechaNacModalRegError').innerHTML='Fecha de nacimiento se encuentra vacio';
		seguirProcerso3=false;
		
	}else{
		document.getElementById('fechaNacModalRegError').innerHTML='';
		seguirProcerso3=true;
	}

	if (usuario == "" || usuario.charAt(0)==" " || usuario.length  < 5) {
		document.getElementById('userModalRegError').innerHTML='El campo Usuario se encuentra vacio, contiene menos de 5 caracteres o contiene espcio en blanco al inicio';
		seguirProcerso4=false;
		
	}else{
		
		document.getElementById('userModalRegError').innerHTML='';
		seguirProcerso4=true;

	}

	if (email.length >0 && emailValidate(email)==false || email.charAt(0)==" " || email =="") {
		document.getElementById('emailModalRegError').innerHTML='El campo Email se encuentra vacio, no cumple con el formato email@host.com  o contiene espcio en blanco al inicio';
		seguirProcerso5=false;
		
	}else{
		document.getElementById('emailModalRegError').innerHTML='';
		seguirProcerso5=true;
	}



	if (origen!=0) {

		seguirProcerso6 = true;
		seguirProcerso7 = true;
	}else{
		var pass = document.getElementById("passModalRegInput").value.trim();
		var confPass = document.getElementById("confPassModalRegInput").value;

		if (pass == ""  || pass.charAt(0)==" " || pass.length <5) {
		document.getElementById('passModalRegError').innerHTML='El campo contraseña se encuentra vacio, contiene menos de 5 caracteres o contiene espcio en blanco al inicio';
		seguirProcerso6=false;
		
		}else{
			document.getElementById('passModalRegError').innerHTML='';
			seguirProcerso6=true;
		}

		if (confPass == "") {
			document.getElementById('confPassModalRegError').innerHTML='El campo confirmar contraseña se encuentra vacio';
			seguirProcerso7=false;
			
		}else{
			document.getElementById('confPassModalRegError').innerHTML='';
			seguirProcerso7= matchPass(pass,confPass,"confPassModalRegError");
		}

	}

	

	 if (pregunSeguridad == "0") {
		document.getElementById('questionModalRegError').innerHTML='Seleccione una pregunta de seguridad';
		seguirProcerso8=false;
		
	}else{
		document.getElementById('questionModalRegError').innerHTML='';
		seguirProcerso8= true;
	}
	if (respSeguridad == "" || respSeguridad.charAt(0)==" ") {
		document.getElementById('answerModalRegError').innerHTML='Debe de ingresar la respuesta de seguridad o contiene espcio en blanco al inicio';
		seguirProcerso9=false;
		
	}else{
		document.getElementById('answerModalRegError').innerHTML='';
		seguirProcerso9=true;
	}
	

	if (telefono == "" && celular == "" || telefono.length <9 && celular.length <9) {
		document.getElementById('tellModalRegError').innerHTML='Ingrese un número movil o de convencional de 8 digitos';
		seguirProcerso10=false;
		
	}else{
		document.getElementById('tellModalRegError').innerHTML='';
		seguirProcerso10=true;
	}

	if (direccion == "" || direccion.charAt(0)==" ") {
		document.getElementById('dirModalRegError').innerHTML='El campo dirección se encuentra vacio o contiene espcio en blanco al inicio';
		seguirProcerso11=false;
		
	}else{
		document.getElementById('dirModalRegError').innerHTML='';
		seguirProcerso11=true;
	}

	if(sexFemModalRadioRegInput.checked == false && sexMasModalRadioRegInput.checked == false){
		document.getElementById('sexoModalRegError').innerHTML='Seleccione el sexo';
		seguirProcerso12=false;
	}else{
		document.getElementById('sexoModalRegError').innerHTML='';
		seguirProcerso12=true;
	}
	var resultado;
	if (seguirProcerso1 == true && seguirProcerso2 == true && seguirProcerso3 == true && seguirProcerso4 == true && seguirProcerso5 == true && seguirProcerso6 == true && seguirProcerso7 == true && seguirProcerso8 == true && seguirProcerso9 == true && seguirProcerso10 == true && seguirProcerso11 == true && seguirProcerso12 == true) {
		resultado = true;
	}else{
		resultado = false;
	}
	return resultado;
}


//verificar si contraseña es igual a la casdilla de verificacion de contraseña
function matchPass(pass,confPass, nomInput){
	
	if (pass != confPass) {
	document.getElementById(nomInput).innerHTML='La contraseña no coinside';
	return false;
		
	}else{
		document.getElementById(nomInput).innerHTML='';
	return true;
	}
}
//validar email
function emailValidate(email){
    var check = "" + email;
    if((check.search('@')>=0)&&(check.search(/\./)>=0))
        if(check.search('@')<check.split('@')[1].search(/\./)+check.search('@')) return true;
        else return false;
    else return false;
}


//ajax (XMLHttpRequest())

function RegistroUsuario(){


	var data = new FormData( document.getElementById("RegModalform"));

	const xhr = new XMLHttpRequest();
	xhr.open('POST','?c=Reglogin&a=RegistroUsuario',true); //methos, URL, async
	
	xhr.send(data);
	xhr.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			//let datos = JSON.parse(this.responseText);
			if (this.responseText == 0) {

				document.getElementById('userModalRegError').innerHTML = "Error al registrar usuario";

			}else{
				alertMensaje ="El usuario ha sido creado!";
				// Grab an element
				var el = document.getElementById('modalCrearUsuario'),
				    // Make a new div
				    elChild = document.createElement('div');

				// Give the new div some content
				elChild.innerHTML = alertBoxOk;

				// Jug it into the parent element
				el.appendChild(elChild);


				pop(alertMensaje);
				document.getElementById('userModalRegError').innerHTML = "";
				
				
			}
			
		}
	}
}




document.querySelector('#loginUser').addEventListener('click',function(e){

	var user = document.getElementById('userModalLoginInput').value;
	var pass = document.getElementById('passModalLoginInput').value;


	if (user =="") {
		document.getElementById('userModalLoginError').innerHTML='El campo Usuario se encuentra vacio';
	}else{
		document.getElementById('userModalLoginError').innerHTML='';
	}

	if (pass =="") {
		document.getElementById('passModalLoginError').innerHTML='El campo contraseña se encuentra vacio';
	}else{
		document.getElementById('passModalLoginError').innerHTML='';
	}

	if (user !=0 && pass !=0) {


		const xhr = new XMLHttpRequest();
		xhr.open('POST','?c=Reglogin&a=iniciar_sesion',true); //methos, URL, async
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");// cabecera para que funciones el metodo POST
		xhr.send('userModalLoginInput='+user+'&passModalLoginInput='+pass+'');
		xhr.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				//let datos = JSON.parse(this.responseText);
				if (this.responseText == 0) {
					document.getElementById('noExistError').innerHTML = "Usuario o contraseña invalido";
					//e.preventDefault();
				}else{
					document.getElementById('noExistError').innerHTML = "";
					location.reload();
					
				}
			}
		}
	}


});
function enviarMandados(e,value){

	if (validarCamposMandados(value)) {
		var data = new FormData( document.getElementById("formMandados"));

		const xhr = new XMLHttpRequest();
		xhr.open('POST',"?c=mandados&a=RegistrarMandados",true); //methos, URL, async
		
		xhr.send(data);
		xhr.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				//let datos = JSON.parse(this.responseText);
				if (this.responseText == 0) {

					
					
				}else{
					alertMensaje = "El mandado ha sido enviado!";
					// Grab an element
					var el = document.getElementById('modalHacerMandados'),
					    // Make a new div
					    elChild = document.createElement('div');

					// Give the new div some content
					elChild.innerHTML = alertBoxOk;

					// Jug it into the parent element
					el.appendChild(elChild);


					pop(alertMensaje);
					document.getElementById('NomModalMandaError').innerHTML = "";
					
					
				}
				
			}
		}
	}
	


};

function validarCamposMandados(value){
	if (value==0) {
		var nombre = document.getElementById('NomModalMandaInput').value;
		var apellido = document.getElementById('ApeModalMandaInput').value;
		var sexoF = document.getElementById('sexFemModalRadioMandaInput').value;
		var sexoM = document.getElementById('sexMasModalRadioMandaInput').value;
		var celular = document.getElementById('celModalMandaInput').value;
		var direccion = document.getElementById('dirModalMandaTextTarea').value;
		var mandado = document.getElementById('descMandadoModalMandaTextTarea').value;

		var seguirProcerso1;
		var seguirProcerso2;
		var seguirProcerso3;
		var seguirProcerso4;
		var seguirProcerso5;
		var seguirProcerso6;

		if (nombre =="" || nombre.charAt(0)==" ") {
			document.getElementById('NomModalMandaError').innerHTML='El campo nombres se encuentra vacio o contiene espcio en blanco al inicio';
			seguirProcerso1 = false;
		}else{
			document.getElementById('NomModalMandaError').innerHTML='';
			seguirProcerso1 = true;
		}

		if (apellido =="" || apellido.charAt(0)==" ") {
			document.getElementById('ApeModalMandaError').innerHTML='El campo apellidos se encuentra vacio o contiene espcio en blanco al inicio';
			seguirProcerso2 = false;
		}else{
			document.getElementById('ApeModalMandaError').innerHTML='';
			seguirProcerso2 = true;
		}

		if (celular == "" || celular.length <9) {
			document.getElementById('celModalMandaError').innerHTML='El campo celular se encuentra vacio, contiene menos de 8 caracteres';	
			seguirProcerso3 = false;	
		}else{
			document.getElementById('celModalMandaError').innerHTML='';
			seguirProcerso3 = true;
		}

		if (direccion =="" || direccion.charAt(0)==" ") {
			document.getElementById('dirModalMandaError').innerHTML='El campo dirección se encuentra vacio o contiene espcio en blanco al inicio';
			seguirProcerso4 = false;
		}else{
			document.getElementById('dirModalMandaError').innerHTML='';
			seguirProcerso4 = true;
		}

		if (mandado =="" || mandado.charAt(0)==" ") {
			document.getElementById('descMandadoModalMandaError').innerHTML='El campo del mensaje se encuentra vacio o contiene espcio en blanco al inicio';
			seguirProcerso5 = false;
		}else{
			document.getElementById('descMandadoModalMandaError').innerHTML='';
			seguirProcerso5 = true;
		}

		if(sexFemModalRadioMandaInput.checked == false && sexMasModalRadioMandaInput.checked == false){
			document.getElementById('sexoModalRadioMandaError').innerHTML='Seleccione el sexo';
			seguirProcerso6=false;
		}else{
			document.getElementById('sexoModalRadioMandaError').innerHTML='';
			seguirProcerso6=true;
		}

		var resultado;
		if (seguirProcerso1 == true && seguirProcerso2 == true && seguirProcerso3 == true && seguirProcerso4 == true && seguirProcerso5 == true && seguirProcerso6 == true) {
			resultado = true;
		}else{
			resultado = false;
		}
	}else{

		var mandado = document.getElementById('descMandadoModalMandaTextTarea').value;
		var seguirProcerso5;

		if (mandado =="") {
			document.getElementById('descMandadoModalMandaError').innerHTML='El campo del mensaje se encuentra vacio';
			seguirProcerso5 = false;
		}else{
			document.getElementById('descMandadoModalMandaError').innerHTML='';
			seguirProcerso5 = true;
		}

		var resultado;
		if (seguirProcerso5 == true) {
			resultado = true;
		}else{
			resultado = false;
		}
	}
	return resultado;
}






function mascara(e,t, mask){
	var key = window.event ? e.which : e.keyCode;
	var i = t.value.length;
	var saida = mask.substring(1,0);
	var texto = mask.substring(i);
		 if (key >= 48 && key <= 57) {
		  	 
			if (texto.substring(0,1) != saida){
				t.value += texto.substring(0,1);
			}
		}else{
			e.returnValue= false;

		}

 }

 function diaFecha(e,t){
	var key = window.event ? e.which : e.keyCode;
	var dia = t.value;
		 if (key >= 48 && key <= 57) {
		  	 
			if (dia!="00"){
				e.returnValue= false;
			}
		}else{
			e.returnValue= false;
			//t.value = t.value.substring(0,t.value.length-1);

		}

 }




