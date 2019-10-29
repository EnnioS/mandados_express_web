<script type="text/javascript">

	
//obtener edad segun fecha de nacimiento
	window.onload= function Edad() {
    var bdUser =  "<?php echo $_SESSION['fNacUser'];?>";
    var bdUserSplited = new Array();
    bdUserSplited = bdUser.split("-");
    var fecha = bdUserSplited[2]+"-"+bdUserSplited[1]+"-"+bdUserSplited[0];
    var fechaNace = new Date(fecha);//lee fecha en formato yyyy-mm-dd
    var fechaActual = new Date()
    var mes = fechaActual.getMonth();
    var dia = fechaActual.getDate();
    var año = fechaActual.getFullYear();
    fechaActual.setDate(dia);
    fechaActual.setMonth(mes);
    fechaActual.setFullYear(año);
   

    edad = Math.floor(((fechaActual - fechaNace) / (1000 * 60 * 60 * 24) / 365));
    document.getElementById("spanFNacPerfilUser").innerHTML = edad;
    
}
function abrirModalEditarUser(){//Llena los campos de Editar perfil con datos del usuario logeado
    

    $('#modalCrearUsuario').modal({backdrop: 'static', keyboard: false});//llamar modal de bootstrap 4 con jquery
    var sexoUser = "<?php echo $_SESSION['sexoUser'];?>";

    var bdUser =  "<?php echo $_SESSION['fNacUser'];?>";
    var bdUserSplited = new Array();
    bdUserSplited = bdUser.split("-");
    var dia = bdUserSplited[0];
    var mes = bdUserSplited[1];
    var anno = bdUserSplited[2];
   var dir = "<?php echo preg_replace('/[\r\n]+/',  '',  $_SESSION['dirUser']);?>";


    document.getElementById('nomModalRegInput').value ="<?php echo $_SESSION['nomUser'];?>";
    document.getElementById("apeModalRegInput").value ="<?php echo $_SESSION['apeUser'];?>";
    document.getElementById("userModalRegInput").value ="<?php echo $_SESSION['userName'];?>";
    document.getElementById("emailModalRegistroInput").value ="<?php echo $_SESSION['emailUser'];?>";


    document.getElementById("diaNacModalRegSelect").value = dia;
    document.getElementById("mesNacModalRegSelect").value = mes;
    document.getElementById("annoNacModalRegSelect").value = anno;

     if (sexoUser=="Femenino") {
        document.getElementById("sexFemModalRadioRegInput").checked =true;
        document.getElementById("sexMasModalRadioRegInput").checked =false;
    }else{
        document.getElementById("sexFemModalRadioRegInput").checked =false;
        document.getElementById("sexMasModalRadioRegInput").checked =true;

    }
    document.getElementById("celModalRegInput").value ="<?php echo $_SESSION['celUser'];?>";
    document.getElementById("telModalRegInput").value ="<?php echo $_SESSION['telCasaUser'];?>";
    document.getElementById("dirModalRegTextTarea").value =dir;
    document.getElementById("secuQuestionssModalRegSelect").value ="<?php echo $_SESSION['pregSegurUser'];?>";
    document.getElementById("respSeguridadModalRegInput").value ="<?php echo $_SESSION['respSegurUser'];?>";
}







function editarPerfilUser(){

    if (validarCamposRegistroUser(1)) {
        var data = new FormData( document.getElementById("RegModalform"));

        const xhr = new XMLHttpRequest();
        xhr.open('POST','?c=Perfil&a=editarPerfilUser',true); //methos, URL, async
        
        xhr.send(data);
        xhr.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200) {
                //let datos = JSON.parse(this.responseText);
                if (this.responseText == 0) {

                }else{
                    alertMensaje ="El usuario ha sido Editado!";
                    // Grab an element
                    var el = document.getElementById('modalCrearUsuario'),
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

    
   
    /*
    var idUser = idUser;
     var archivoRutaUser = "";
    var archivoInput = document.getElementById('imagenNewUser2').value;
    var nomUser = document.getElementById('nomModalRegInput').value.trim();
    var apeUser = document.getElementById("apeModalRegInput").value.trim();
    var userName = document.getElementById("userModalRegInput").value.trim();
    var emailUser = document.getElementById("emailModalRegistroInput").value.trim();
    var dia = document.getElementById("diaNacModalRegSelect").value.trim();
    var mes = document.getElementById("mesNacModalRegSelect").value;
    var anno = document.getElementById("annoNacModalRegSelect").value;
    var sexoF = document.getElementById("sexFemModalRadioRegInput").value;
    var sexoM = document.getElementById("sexMasModalRadioRegInput").value;
    var celUser = document.getElementById("celModalRegInput").value.trim();
    var telCasaUser = document.getElementById("telModalRegInput").value.trim();
    var dirUser = document.getElementById("dirModalRegTextTarea").value.trim();
    var pregSegurUser = document.getElementById("secuQuestionssModalRegSelect").value;
    var respSegurUser = document.getElementById("respSeguridadModalRegInput").value.trim();

    if (archivoInput=="") {
        
        archivoRutaUser = "<?php echo $_SESSION['urlFotoUser'];?>";
    }else{
        archivoRutaUser = archivoInput;
    }
    
         
   
    var sexo = (sexoF.checked == true) ? 1 : 0;
    var fNacUser = dia+"-"+mes+"-"+anno;

    var data = new Array();




    data = {
        "urlFotoUser" : archivoRutaUser,
        "idUser" : idUser,
        "nomUser" : nomUser,
        "apeUser" : apeUser,
        "userName" : userName,
        "emailUser" : emailUser,
        "fNacUser" : fNacUser,
        "sexoUser" : sexo,
        "celUser" : celUser,
        "telCasaUser" : telCasaUser,
        "dirUser" : dirUser,
        "pregSegurUser" : pregSegurUser,
        "respSegurUser" : respSegurUser
    }


    
    if(validarCamposRegistroUser(1)){

        const xhr = new XMLHttpRequest();
       /* if (window.XMLHttpRequest)
        {
          //  IE7+, Firefox, Chrome, Opera, Safari
          xhr = new XMLHttpRequest();
        }
        else if (window.ActiveXObject)
        {
          // IE6, IE5
          xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }
        else
        {
          alert("Tu explorador no soporta envios de datos por XMLHttpRequest!, Actualicelo o intente usar otro explorador");
        }*/
       
       /* if(xhr!=null){

            xhr.open('POST','?c=Perfil&a=editarPerfilUser',true); //methos, URL, async

           

            var json_upload = "data=" + JSON.stringify(data);
            console.log(json_upload);
            
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");// cabecera para que funciones el metodo POST
            
            xhr.send(json_upload);

           
            xhr.onreadystatechange = function(){
                if (this.readyState == XMLHttpRequest.DONE && this.status == 200) {
                   
                    if (this.responseText == 0) {

                         alert("response 0");
                        
                        
                    }else{
                        
                         alert("response 1");
                    }
                    
                }
            }
        }
    }*/
}

	
	
</script>