<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				MODALS : INGRESO / REGISTRO
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<div class="modal fade" id="modalIngresoRegistro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">INGRESAR / REGISTRARSE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      	<div class="row text-center" style="margin: 2px; margin-bottom: 15px">
      		<div class="col-12" style="background-color: red; padding-top: 20px;padding-bottom: 20px">
      			<img src="assets/img/m_express_logo_white.svg" style="width: 200px;height: auto">
      		</div>
      	</div>
      	
         <form id="loginModalform" name="loginModalform">
    

          <div class="form-group">
            <input id="userModalLoginInput" class="form-control" name="userModalLoginInput" type="text"  placeholder="Usuario">
             <span class="errorText" id="userModalLoginError"></span> 
          </div>

          <!--  <div class="form-group">
            <input id="email-field" class="form-control" name="emailModalLoginInput" type="email"  placeholder="Email">
             <span class="errorText" id="nomModalRegError"></span> 
          </div> podemos validarlo con email si lse requiere que las personan tengan un email-->


          <div class="form-group">
            <input id="passModalLoginInput" class="form-control" name="passModalLoginInput" type="password" placeholder="Contraseña">
             <span class="errorText" id="passModalLoginError"></span> 
          </div>

          <div class="form-group form-check" style="padding-bottom: 0; margin-bottom: 0">
            <input type="checkbox" name="verPassModalChBxRegInput" onclick="verPassword('passModalLoginInput','')" class="form-check-input">
            <label class="form-check-label" for="verPassModalChBxRegInput">Ver contraseña</label>
            <div style="text-align: right;">
               
            <span class="errorText" id="noExistError"></span>
              <span><a href="#" id="btnRegOlvideUsuario" onclick="esconderYMostrarBloques('bloquePassEmail','bloquePreguntaSeguridad', 'bloqueNuevoUser', 'footerModalOlvideUsuario1', 'footerModalOlvideUsuario2', 'footerModalOlvideUsuario3')" data-toggle="modal" data-target="#modalOlvideUsuario" data-dismiss="modal" class="dropdown-item">Olvide mi Usuario</a></span>
              <span><a href="#" id="btnRegOlvideContrasenna" onclick="esconderYMostrarBloques('blouePassUser','bloquePreguntaSeguridadPassUser','bloqueNuevoPass','footerModalOlvideContrasenna1','footerModalOlvideContrasenna2','footerModalOlvideContrasenna3')" data-toggle="modal" data-dismiss="modal" data-target="#modalOlvideContrasenna"  class="dropdown-item">Olvide mi contraseña</a></span>
            </div>
          </div>

        </form>

            
  		</div>
  		
  
      <div class="modal-footer">
      	
      		<button style="width: 100%; color: white; background-color: red" type="button" class="btn btn-secondary" data-toggle="modal" data-dismiss="modal"  onclick="$('#modalCrearUsuario').modal({backdrop: 'static', keyboard: false})">Registrarme</button>

          <button style="width: 100%; color: white; background-color: #1A1A1A" id="loginUser" class="btn btn-primary" >ingresar</button>
      		
    	</div>
    </div>
  </div>
</div>



<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        MODALS : REGISTRO
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<div class="modal fade" id="modalCrearUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <?php

          if(isset($_SESSION['idUser'])){
            echo '<h5 class="modal-title" id="exampleModalCenterTitle">EDITAR PERFIL</h5>';
          }else{
            '<h5 class="modal-title" id="exampleModalCenterTitle">REGISTRO DE USUARIO</h5>';
          }

        ?>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="RegModalform" name="RegModalform" method="POST" enctype="multipart/form-data">
          
       

          <?php

          if(isset($_SESSION['idUser'])){
            echo '<div class=" text-center"> 
            <img src="'.$_SESSION['urlFotoUser'].'" id="output_image" name="output_image" class="rounded-circle" alt="Usuario" style="; width: 140px;height: 140px; object-fit: cover;border-style: solid; border-color: grey; margin-bottom: 10px">
            </div>
          <div><span class="errorText" id="imagenNewUserError"></span></div>

          <div class="input-group">
            <div class="custom-file"  style="margin-bottom: 15px">
              <input type="file" accept="image/*" class="custom-file-input" id="imagenNewUser" name="imagenNewUser" onchange="preview_image(event)" lang="es">
              <label class="custom-file-label" for="imagenNewUser2">Seleccione una imagen</label>
            </div>
          </div>';

          }else{
            echo '<div class=" text-center">
            <img src="assets/img/icon/round-account_circle-gris.svg" id="output_image" name="output_image" class="rounded-circle" alt="Usuario" style="; width: 140px;height: 140px; object-fit: cover;border-style: solid; border-color: grey; margin-bottom: 10px">
            </div>
          <div><span class="errorText" id="imagenNewUserError"></span></div>

          <div class="input-group">
            <div class="custom-file"  style="margin-bottom: 15px">
              <input type="file" accept="image/*" class="custom-file-input" id="imagenNewUser" name="imagenNewUser" onchange="preview_image(event)" lang="es">
              <label class="custom-file-label" for="imagenNewUser">Seleccione una imagen</label>
            </div>
          </div>';
          }

        ?>

           
          
          

          <div class="form-group">
            <input class="form-control" id="nomModalRegInput" name="nomModalRegInput" type="text" maxlength="50" placeholder="Nombres">
             <span class="errorText" id="nomModalRegError"></span> 
          </div>

          <div class="form-group">
            <input class="form-control" id="apeModalRegInput" name="apeModalRegInput" type="text" maxlength="50" placeholder="Apellidos">
            <span class="errorText" id="apeModalRegError"></span> 
          </div>

          <label style="padding-bottom: 0; margin-bottom: 0">Fecha de nacimiento</label>

          <div style="background-color: #F0F0F0; padding: 10px; margin-bottom: 15px">

            <div class="row" style="margin: 15px 0 0 0">

              <div class="col-4">
                 <div class="form-group">
                  <select class="form-control selectIndex" data-live-search="true" id="diaNacModalRegSelect" name="diaNacModalRegSelect" autocomplete="off">
                    <option value="0">Día</option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                  </select>

                </div>
              </div>

               <div class="col-4">
                 <div class="form-group">
                  <select class="form-control selectIndex" data-live-search="true" id="mesNacModalRegSelect" name="mesNacModalRegSelect" autocomplete="off">
                    <option value="0">Mes</option>
                    <option value="01">Ene</option>
                    <option value="02">Feb</option>
                    <option value="03">Mar</option>
                    <option value="04">Abr</option>
                    <option value="05">May</option>
                    <option value="06">Jun</option>
                    <option value="07">Jul</option>
                    <option value="08">Ago</option>
                    <option value="09">Sep</option>
                    <option value="10">Oct</option>
                    <option value="11">Nov</option>
                    <option value="12">Dic</option>
                  </select>
                  
                </div>
              </div>

              
               <div class="col-4">
                 <div class="form-group">
                  <select class="form-control selectIndex" data-live-search="true" id="annoNacModalRegSelect" name="annoNacModalRegSelect" autocomplete="off">
                    <option value="0">Año</option>
                    <option value="1940">1940</option>
                    <option value="1941">1941</option>
                    <option value="1942">1942</option>
                    <option value="1943">1943</option>
                    <option value="1944">1944</option>
                    <option value="1945">1945</option>
                    <option value="1946">1946</option>
                    <option value="1947">1947</option>
                    <option value="1948">1948</option>
                    <option value="1949">1949</option>
                    <option value="1950">1950</option>
                    <option value="1951">1951</option>
                    <option value="1952">1952</option>
                    <option value="1953">1953</option>
                    <option value="1954">1954</option>
                    <option value="1955">1955</option>
                    <option value="1956">1956</option>
                    <option value="1957">1957</option>
                    <option value="1958">1958</option>
                    <option value="1959">1959</option>
                    <option value="1960">1960</option>
                    <option value="1961">1961</option>
                    <option value="1962">1962</option>
                    <option value="1963">1963</option>
                    <option value="1964">1964</option>
                    <option value="1965">1965</option>
                    <option value="1966">1966</option>
                    <option value="1967">1967</option>
                    <option value="1968">1968</option>
                    <option value="1969">1969</option>
                    <option value="1970">1970</option>
                    <option value="1971">1971</option>
                    <option value="1972">1972</option>
                    <option value="1973">1973</option>
                    <option value="1974">1974</option>
                    <option value="1975">1975</option>
                    <option value="1976">1976</option>
                    <option value="1977">1977</option>
                    <option value="1978">1978</option>
                    <option value="1979">1979</option>
                    <option value="1980">1980</option>
                    <option value="1981">1981</option>
                    <option value="1982">1982</option>
                    <option value="1983">1983</option>
                    <option value="1984">1984</option>
                    <option value="1985">1985</option>
                    <option value="1986">1986</option>
                    <option value="1987">1987</option>
                    <option value="1988">1988</option>
                    <option value="1989">1989</option>
                    <option value="1990">1990</option>
                    <option value="1991">1991</option>
                    <option value="1992">1992</option>
                    <option value="1993">1993</option>
                    <option value="1994">1994</option>
                    <option value="1995">1995</option>
                    <option value="1996">1996</option>
                    <option value="1997">1997</option>
                    <option value="1998">1998</option>
                    <option value="1999">1999</option>
                    <option value="2000">2000</option>
                    <option value="2001">2001</option>
                    <option value="2002">2002</option>
                    <option value="2003">2003</option>
                    <option value="2004">2004</option>
                    <option value="2005">2005</option>
                  </select>
                </div>
              </div>
                  <div class="col-12 errorText" >
                    <span style="font-size: 1em" class="errorText" id="fechaNacModalRegError"></span> 
                  </div> 
            </div>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="userModalRegInput" name="userModalRegInput" maxlength="15" placeholder="Nombre de usuario">
             <span class="errorText" id="userModalRegError"></span>
          </div>

          <div class="form-group">
            <input type="email" class="form-control" id="emailModalRegistroInput" name="emailModalRegistroInput" aria-describedby="emailHelp" maxlength="50" placeholder="Email" autocomplete="off">
            <span class="errorText" id="emailModalRegError"></span>
           <!-- <small id="emailModalRegistroInput" class="form-text text-muted">(Este campo es opcional)</small>-->
          </div>
         <?php

         if(isset($_SESSION['idUser'])){

         }
         else{
              echo '<label style="padding-bottom: 0; margin-bottom: 0">Contraseña</label>
              
                         <div style="background-color: #F0F0F0; padding: 15px ">
                           <div class="form-group">
                             <input type="password" name="passModalRegInput" id="passModalRegInput" class="form-control" placeholder="Contraseña" maxlength="10" autocomplete="off">
                             <span class="errorText" id="passModalRegError"></span>
                           </div>
           
                           <div class="form-group">
                             <input  type="password" name="confPassModalRegInput" id="confPassModalRegInput" class="form-control"  placeholder="Confirmar contraseña" maxlength="10" autocomplete="off">
                             <span class="errorText" id="confPassModalRegError"></span>
                           </div>
           
                           <div class="form-group form-check" style="padding-bottom: 0; margin-bottom: 0">
                             <input type="checkbox" id="verPassModalChBxRegInput" name="verPassModalChBxRegInput" onclick="verPassword(\'passModalRegInput\',\'confPassModalRegInput\')" class="form-check-input">
                             <label class="form-check-label" for="verPassModalChBxRegInput">ver contraseña</label>
                           </div>
                         </div>';
         }
         ?>

          <label style="margin-top: 10px">Preguntas de seguridad</label>

          <div style="background-color: #F0F0F0; padding: 15px; ">
            <div class="form-group">
              <Select id="secuQuestionssModalRegSelect" name="secuQuestionssModalRegSelect" class="form-control" data-live-search="true" autocomplete="off">
                <option value="0">Seleccione una pregunta de seguridad</option>
                <option value="1">¿Cual es el nombre de tu primer mascota?</option>
                <option value="2">¿Cual es la marca de tu primer vehiculo a motor?</option>
                <option value="3">¿Cual es el tu pelicula favorita?</option>
                <option value="4">¿En que ciudad conocistes a tu pareja?</option>
                <option value="5">¿En que año terminastes la secundaria?</option>
                <option value="6">¿Cual es tu libro favorito?</option>
                <option value="7">¿En que ciudad se conocieron tus padres?</option>
                <option value="8">¿Cual es el nombre de tu primer amor?</option>
                <option value="9">¿Cuale era el nombre de tu primer jefe?</option>
                <option value="10">¿Que posición jugastes / juegas en tu deporte favorito?</option>
                <option value="11" >¿Cual es el segundo apellido de tu abuelo?</option>
              </Select>
               <span class="errorText" id="questionModalRegError"></span>
            </div>
            <div class="form-group" style="margin-top: 15px;">
              <input  type="text" name="respSeguridadModalRegInput" id="respSeguridadModalRegInput" class="form-control"  placeholder="Respuesta" maxlength="20" autocomplete="off">
              <span class="errorText" id="answerModalRegError"></span>
            </div>

          </div>


          <div class="row" style="margin: 15px 0 15px 0">
            <div class="col-12">
              <span class="errorText" id="sexoModalRegError"></span>
            </div>
            
              <div class="col-5">

                 <div class="form-check">
                  <input class="form-check-input" id="sexFemModalRadioRegInput" name="sexoModalRadioRegInput" type="radio" value="0">
                  <label class="form-check-label" for="sexFemModalRadioRegInput">Femenino</label>
                </div>
              </div>
              <div class="form-check">
                <div class="col-7">
                  <input class="form-check-input" id="sexMasModalRadioRegInput" name="sexoModalRadioRegInput" type="radio"  value="1">
                  <label class="form-check-label" for="sexMasModalRadioRegInput">Masculino </label>
                </div>
            </div>
          </div>

          <div class="form-group">
            <input class="form-control" id="celModalRegInput" name="celModalRegInput" type="text" onkeypress="mascara(event,this, '####-####')" maxlength="9" placeholder="Ingrese su celular">
          </div>

          <div class="form-group">
            <input class="form-control" id="telModalRegInput" name="telModalRegInput" type="text" onkeypress="mascara(event,this, '####-####')" maxlength="9" placeholder="Teléfono de Casa">
            <span class="errorText" id="tellModalRegError"></span>
          </div>

          <div class="form-group">
            <textarea class="form-control" id="dirModalRegTextTarea" name="dirModalRegTextTarea" rows="3" maxlength="500" placeholder="Dirección Exacta"></textarea>
            <span class="errorText" id="dirModalRegError"></span>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button style="width: 100%; color: white; background-color: red" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

          <?php

          if(isset($_SESSION['idUser'])){
            echo '<button style="width: 100%; color: white; background-color: #1A1A1A" onclick = "editarPerfilUser()" class="btn btn-primary" >Hacer cambios</button>';
          }else{
            echo '<button style="width: 100%; color: white; background-color: #1A1A1A" id="eviarDatosUser" onclick = "registrarUsueario()" class="btn btn-primary" >Registrarse</button>';
          }
          ?>
      </div>
    </div>
  </div>
</div>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        MODALS : HACER MANDADOS
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<div class="modal fade" id="modalHacerMandados" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">CREAR MANDADO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        <?php
            
          if (isset($_SESSION['nomUser'])) {
            
              echo '<div class="modal-body">
              <form id="formMandados" name="formMandados" method="POST" enctype="multipart/form-data">
             <div class="form-group">
               <textarea class="form-control" id="descMandadoModalMandaTextTarea" name="descMandadoModalMandaTextTarea" rows="6" placeholder="Ingrese su pedido y dirección de envío" maxlength="500"></textarea>
               <span class="errorText" id="descMandadoModalMandaError"></span>
               </div>
               </form>
             </div>
            <div class="modal-footer">
              
              <button style="width: 100%; color: white; background-color: red" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button style="width: 100%; color: white; background-color: #1A1A1A" id="enviarMandado" onclick="enviarMandados(event, 1)" class="btn btn-primary" >Enviar!</button>
            </div>';
            
          }else{

              echo '<div class="modal-body">
              <form id="formMandados" name="formMandados" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                  <input class="form-control" id="NomModalMandaInput" name="NomModalMandaInput"  type="text" placeholder="Nombres"  maxlength="20">
                  <span class="errorText" id="NomModalMandaError"></span>
                </div>

                <div class="form-group">
                  <input class="form-control" id="ApeModalMandaInput" name="ApeModalMandaInput" type="text" placeholder="Apellidos"  maxlength="20">
                  <span class="errorText" id="ApeModalMandaError"></span>
                </div>

                <!--<div class="form-group">
                  <input type="email" class="form-control" id="emailModalMandaInput" aria-describedby="emailHelp" placeholder="Email">
                  <small id="emailHelp" class="form-text text-muted">(Este campo es opcional)</small>
                </div>-->

                <div class="row" style="margin: 15px 0 15px 0">
                  <div class="col-12">
                    <span class="errorText" id="sexoModalRadioMandaError"></span>
                  </div>
                  
                    <div class="col-5">

                       <div class="form-check">
                        <input class="form-check-input" id="sexFemModalRadioMandaInput" name="sexoModalRadioMandaInput" type="radio" value="0">
                        <label class="form-check-label" for="sexFemModalRadioMandaInput">Femenino</label>
                      </div>
                    </div>
                    <div class="form-check">
                      <div class="col-7">
                        <input class="form-check-input" id="sexMasModalRadioMandaInput" name="sexoModalRadioMandaInput" type="radio"  value="1">
                        <label class="form-check-label" for="sexMasModalRadioMandaInput">Masculino </label>
                      </div>
                  </div>
                </div>

                <div class="form-group">
                  <input class="form-control" id="celModalMandaInput" name="celModalMandaInput" type="text" onkeypress="mascara(event,this, \'####-####\')" maxlength="9" placeholder="Número de contacto">
                  <span class="errorText" id="celModalMandaError"></span>
                </div>

                <!--<div class="form-group">
                  <input class="form-control" id="telModalMandaInput" type="text" placeholder="Teléfono de Casa">
                  <small id="telModalMandaInput" class="form-text text-muted">(Este campo es opcional)</small>
                </div>-->
                
                 <div class="form-group">
                  <textarea class="form-control" id="dirModalMandaTextTarea" name="dirModalMandaTextTarea" rows="2" placeholder="Dirección Exacta de envío" maxlength="500"></textarea>
                  <span class="errorText" id="dirModalMandaError"></span>
                </div>

                 <div class="form-group">
                 <textarea class="form-control" id="descMandadoModalMandaTextTarea" name="descMandadoModalMandaTextTarea" rows="6" placeholder="Iingrese su pedido" maxlength="500"></textarea>
                 <span class="errorText" id="descMandadoModalMandaError"></span>
                 </div>
              </form>
            </div>
            <div class="modal-footer">
              
              <button style="width: 100%; color: white; background-color: red" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button style="width: 100%; color: white; background-color: #1A1A1A" id="enviarMandado" onclick="enviarMandados(event, 0)" class="btn btn-primary" >Enviar!</button>
            </div>';
           }
        ?>
      
    </div>
  </div>
</div>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        MODALS : CAMBIAR PREGUNTA DE SEGURIDAD
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<div class="modal fade" id="modalPregSeguridad" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">CAMBIAR PREGUNTA DE SEGURIDAD</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="formPregSeguridad" name="formPregSeguridad" method="POST">
           <div class="form-group">
              <Select id="cambiarPregSeguridadSelect" name="cambiarPregSeguridadSelect" class="form-control" data-live-search="true" autocomplete="off">
                <option value="0">Seleccione una pregunta de seguridad</option>
                <option value="1">¿Cual es el nombre de tu primer mascota?</option>
                <option value="2">¿Cual es la marca de tu primer vehiculo a motor?</option>
                <option value="3">¿Cual es el tu pelicula favorita?</option>
                <option value="4">¿En que ciudad conocistes a tu pareja?</option>
                <option value="5">¿En que año terminastes la secundaria?</option>
                <option value="6">¿Cual es tu libro favorito?</option>
                <option value="7">¿En que ciudad se conocieron tus padres?</option>
                <option value="8">¿Cual es el nombre de tu primer amor?</option>
                <option value="9">¿Cuale era el nombre de tu primer jefe?</option>
                <option value="10">¿Que posición jugastes / juegas en tu deporte favorito?</option>
                <option value="11" >¿Cual es el segundo apellido de tu abuelo?</option>
              </Select>
               <span class="errorText" id="cambiarPregSeguridadError"></span>
            </div>
          <div class="form-group" style="margin-top: 15px;">
            <input  type="text" name="respCambiarPregSeguridadInput" id="respCambiarPregSeguridadInput" class="form-control"  placeholder="Respuesta" maxlength="20" autocomplete="off">
            <span class="errorText" id="respCambiarPregSeguridadError"></span>
          </div>
        </form>
      </div>
      
      <div class="modal-footer">
        <button style="width: 100%; color: white; background-color: red" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button style="width: 100%; color: white; background-color: #1A1A1A" id="btnOlvideUsuario" onclick="cambiarPreguntaYRespuestaSeguridad();" class="btn btn-primary" >Recuperar!</button>

      </div>
    </div>
  </div>
</div>


<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        MODALS : CAMBIAR CONTRASEÑA
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<div class="modal fade" id="modalCambiarContrasenna" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">CAMBIAR CONTRASEÑA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="formCambiarPass" name="formCambiarPass" method="POST">
          <div class="form-group">
            <input type="password" name="formActualPassInput" id="formActualPassInput" class="form-control" placeholder="Contraseña actual" maxlength="10" minlength="5" autocomplete="off" required="true">
            <span class="errorText" id="formActualPassError"></span>
         </div>  

         <div class="form-group">
            <input type="password" name="formNuevoPassInput" id="formNuevoPassInput" class="form-control" placeholder="Nueva contraseña" maxlength="10" minlength="5" autocomplete="off" required="true">
            <span class="errorText" id="formNuevoPassError"></span>
         </div>
          <div class="form-group">
            <input type="password" name="formConfirmNuevoPassInput" id="formConfirmNuevoPassInput" class="form-control" placeholder="Confirmar contraseña" maxlength="10" minlength="5" autocomplete="off" required="true">
            <span class="errorText" id="formConfirmNuevoPassError"></span>
         </div>
           <div class="form-group form-check" style="padding-bottom: 0; margin-bottom: 0">
              <input type="checkbox" id="verNuevoPassModalChBxRegInput" name="verNuevoPassModalChBxRegInput" onclick="verPassword('formActualPassInput','formNuevoPassInput','formConfirmNuevoPassInput')" class="form-check-input">
              <label class="form-check-label" for="verNuevoPassModalChBxRegInput">ver contraseña</label>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button style="width: 100%; color: white; background-color: red" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button style="width: 100%; color: white; background-color: #1A1A1A" id="cambiarContrasenna" onclick="cambiarPass(<?php echo $_SESSION['passUser']?>,<?php echo $_SESSION['idUser']?>)" class="btn btn-primary" >Cambiar!</button>
      </div>
    </div>
  </div>
</div>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        MODALS : OLVIDE USUARIO
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<div class="modal fade" id="modalOlvideUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">RECUPERAR USUARIO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="formOlvidoUsuario" name="formCambiarPass" method="POST" autocomplete="off">
          <div id="bloquePassEmail" style="display: block">
            <div class="form-group">
              <input type="password" class="form-control" id="passModalOlvidarUserInput" name="passModalOlvidarUserInput" maxlength="15" placeholder="Contraseña" autocomplete="false">
              
              <div class="form-group form-check" style="padding-bottom: 0; margin-bottom: 0">
                <input type="checkbox" id="verPassOlvideUserChBx" name="verNuevoPassModalChBxRegInput" onclick="verPassword('passModalOlvidarUserInput','','')" class="form-check-input">
                <label class="form-check-label" for="verPassOlvideUserChBx">ver contraseña</label>
              </div>
            </div>

            <div class="form-group">
              <input type="Email" class="form-control" id="emailModalOlvidarUserInput" name="emailModalOlvidarUserInput" aria-describedby="emailHelp" maxlength="50" placeholder="Email" autocomplete="false">
            </div>
            <span class="errorText" id="passEmaillOlvidarUserError"></span>
          </div>
          <div id= "bloquePreguntaSeguridad" class="bloquePreguntaSeguridad" style="display: none">

            <label style="margin-top: 10px">Preguntas de seguridad</label>

            <div style="background-color: #F0F0F0; padding: 15px; ">
              <div class="form-group" style="margin-bottom: 15px;">
                <span id="spanOlvidarUserPregSeguridadText"></span>
              </div>
              <div class="form-group" style="margin-top: 15px;">
                <input  type="text" name="olvidarUserRespSeguridadInput" id="olvidarUserRespSeguridadInput" class="form-control"  placeholder="Respuesta" maxlength="20" autocomplete="off">
                <span class="errorText" id="olvidarUserRespSeguridadError"></span>
              </div>
            </div>
          </div>
          <div id= "bloqueNuevoUser" class= "bloqueNuevoUser" style="display: none">
          
            <div class="form-group" style="margin-top: 15px;">
              <input  type="text" name="olvidarUserNewUserInput" id="olvidarUserNewUserInput" class="form-control"  placeholder="Nuevo nombre de usuario" maxlength="20" autocomplete="off">
            </div>
            <div class="form-group" style="margin-top: 15px;">
              <input  type="text" name="olvidarUserConfNewUserInput" id="olvidarUserConfNewUserInput" class="form-control"  placeholder="Confirmar nombre de usuario" maxlength="20" autocomplete="off">
              <span class="errorText" id="olvidarUserConfNewUserError"></span>
            </div>
            
          </div>
        </form>
      </div>

      <div id="footerModalOlvideUsuario1" class="modal-footer">

         <div class="row">
          <div class="col-6">
            <button style="width: 100%; color: white; background-color: red" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
          <div class="col-6">
            <button style="width: 100%; color: white; background-color: #1A1A1A" id="btnOlvideUsuario" onclick="verificarExisteDatosLogin('passModalOlvidarUserInput' ,'emailModalOlvidarUserInput','passEmaillOlvidarUserError', 'bloquePassEmail','bloquePreguntaSeguridad', 'spanOlvidarUserPregSeguridadText','footerModalOlvideUsuario1', 'footerModalOlvideUsuario2', 'passUser');" class="btn btn-primary" >Siguiente > </button>
          </div>
        </div>

      </div>

      <div id="footerModalOlvideUsuario2" class="modal-footer" style="display: none">
        <div class="row">
          <div class="col-6">
            <button style="width: 100%; color: white; background-color: red" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
          <div class="col-6">
            <button style="width: 100%; color: white; background-color: #1A1A1A" id="btnOlvideUsuario" onclick="verificarRespuestaDeSeguridad('bloquePassEmail','bloquePreguntaSeguridad','bloqueNuevoUser','spanOlvidarUserPregSeguridadText','olvidarUserRespSeguridadInput','olvidarUserRespSeguridadError', 'footerModalOlvideUsuario1', 'footerModalOlvideUsuario2', 'footerModalOlvideUsuario3');" class="btn btn-primary" >Siguiente > </button>
          </div>
        </div>

      </div>

      <div id="footerModalOlvideUsuario3" class="modal-footer" style="display: none">
        <div class="row">
          <div class="col-6">
            <button style="width: 100%; color: white; background-color: red" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
          <div class="col-6">
            <button style="width: 100%; color: white; background-color: #1A1A1A" id="btnNuevoUser" onclick="recuperarPassUsuario('bloquePassEmail','bloquePreguntaSeguridad','bloqueNuevoUser','olvidarUserNewUserInput','olvidarUserConfNewUserInput','olvidarUserConfNewUserError','footerModalOlvideUsuario1', 'footerModalOlvideUsuario2', 'footerModalOlvideUsuario3','modalOlvideUsuario','userName')" class="btn btn-primary" >Recuperar!</button>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        MODALS : OLVIDE CONTRASEÑA
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->


<div class="modal fade" id="modalOlvideContrasenna" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">RECUPERAR CONTRASEÑA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="formOlvidoPass" name="formOlvidoPass" method="POST">
          <div id="blouePassUser" style="display: block;">
            <div class="form-group">
              <input type="text" class="form-control" id="passOlvidoPassInput" name="passOlvidoPassInput" maxlength="15" placeholder="Nombre de usuario">
            </div>

            <div class="form-group">
              <input type="email" class="form-control" id="emailOlvidoPassInput" name="emailOlvidoPassInput" aria-describedby="emailHelp" maxlength="50" placeholder="Email" autocomplete="off">
              <span class="errorText" id="useremailOlvidoPassError"></span>
             <!-- <small id="emailModalRegistroInput" class="form-text text-muted">(Este campo es opcional)</small>-->
            </div>
          </div>
          <div id="bloquePreguntaSeguridadPassUser" class="bloquePreguntaSeguridadPassUser" style="display: none">

            <label style="margin-top: 10px">Preguntas de seguridad</label>

            <div style="background-color: #F0F0F0; padding: 15px; ">
              <div class="form-group" style="margin-bottom: 15px;">
                <span id="spanOlvidarPassPregSeguridadText"></span>
              </div>
              <div class="form-group" style="margin-top: 15px;">
                <input  type="text" name="olvidarPassRespSeguridadInput" id="olvidarPassRespSeguridadInput" class="form-control"  placeholder="Respuesta" maxlength="20" autocomplete="off">
                <span class="errorText" id="olvidarPassRespSeguridadError"></span>
              </div>
            </div>
          </div>
          <div id= "bloqueNuevoPass" style="display: none">
          
            <div class="form-group" style="margin-top: 15px;">
              <input  type="text" name="olvidarPassNewPassInput" id="olvidarPassNewPassInput" class="form-control"  placeholder="Nueva contraseña" maxlength="20" autocomplete="off">
            </div>
            <div class="form-group" style="margin-top: 15px;">
              <input  type="text" name="olvidarPassConfNewPassInput" id="olvidarPassConfNewPassInput" class="form-control"  placeholder="Verificar Contraseña" maxlength="20" autocomplete="off">
              <span class="errorText" id="olvidarUserConfNewUserError"></span>
              <div class="form-group form-check" style="padding-bottom: 0; margin-bottom: 0">
                <input type="checkbox" id="verPassOlvidePassChBx" name="verPassOlvidePassChBx" onclick="verPassword('olvidarPassNewPassInput','olvidarPassConfNewPassInput','')" class="form-check-input">
                <label class="form-check-label" for="verPassOlvideUserChBx">ver contraseña</label>
              </div>
            </div>
            
          </div>
        </form>
      </div>



      <div id="footerModalOlvideContrasenna1" class="modal-footer">

         <div class="row">
          <div class="col-6">
            <button style="width: 100%; color: white; background-color: red" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
          <div class="col-6">
            <button style="width: 100%; color: white; background-color: #1A1A1A" id="btnOlvideContrasenna"onclick="verificarExisteDatosLogin('passOlvidoPassInput' ,'emailOlvidoPassInput','useremailOlvidoPassError', 'blouePassUser','bloquePreguntaSeguridadPassUser', 'spanOlvidarPassPregSeguridadText', 'footerModalOlvideContrasenna1','footerModalOlvideContrasenna2','userName');" class="btn btn-primary" >Siguiente > </button>
          </div>
        </div>

      </div>


      <div id="footerModalOlvideContrasenna2" class="modal-footer" style="display: none">
        <div class="row">
          <div class="col-6">
            <button style="width: 100%; color: white; background-color: red" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
          <div class="col-6">
            <button style="width: 100%; color: white; background-color: #1A1A1A" id="btnOlvideContrasenna"onclick="verificarRespuestaDeSeguridad('blouePassUser','bloquePreguntaSeguridadPassUser','bloqueNuevoPass','spanOlvidarPassPregSeguridadText','olvidarPassRespSeguridadInput','olvidarPassRespSeguridadError','footerModalOlvideContrasenna1','footerModalOlvideContrasenna2','footerModalOlvideContrasenna3')" class="btn btn-primary" >Siguiente 2 ></button>
          </div>
        </div>
      </div>
       <div id="footerModalOlvideContrasenna3" class="modal-footer" style="display: none">
        <div class="row">
          <div class="col-6">
            <button style="width: 100%; color: white; background-color: red" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
          <div class="col-6">
            <button style="width: 100%; color: white; background-color: #1A1A1A" id="btnOlvideContrasenna" onclick="recuperarPassUsuario('blouePassUser','bloquePreguntaSeguridadPassUser','bloqueNuevoUser','bloqueNuevoPass','olvidarPassNewPassInput','olvidarPassConfNewPassInput','olvidarUserConfNewUserError','modalOlvideContrasenna','passUser')" class="btn btn-primary" >Recuperar!</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
          TERMINA MODALS
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->


	<footer class="footer">
		<div class="container" style=" padding-bottom: 8px;">

			<div class="row">
				<div class="col-md-6 col-sm-12 text-center">
					<dir class="row">
						<div class="col-6">
							<a href="?c=Nosotros&a=Nosotros" class="text-decoration-none"><img src="assets/img/icon/silueta-de-multiples-usuarios.svg" style="width: 30px"><br><span style="color: white">Sobre Nosotros</span></a>
						</div>
						<div class="col-6">
							<a href="?c=Contactos&a=Contactos" class="text-decoration-none"><img src="assets/img/icon/receptor-del-telefono.svg" style="width: 30px"><br><span style="color: white">Contactanos</span></a>
						</div>
					</dir>	
				</div>
				<div class="col-md-6 col-sm-12 text-center">
					<dir class="row">
						<div class="col-6">
							<img  src="assets/img/icon/logotipo-de-whatsapp.svg" style="width: 30px"><br>8913-5856 / 5850-9317
						</div>
						<div class="col-6">
							<a href="https://www.facebook.com/pages/category/Cargo---Freight-Company/Mandados-Express-841573632691960/"  class="text-decoration-none" target="blank"><img  src="assets/img/icon/facebook-app-logo.svg" style="width: 30px; color: white"><br><span style="color: white">Mandados Express</span></a>
						</div>
					</dir>	
				</div>
			</div>


			<div class="row" style="font-size: 0.8em;margin-top: 8px">
				<div class="col-12 text-center">
					Mandados Express Matagalpa -Nicaragua.
				</div>
				<div class="col-12 text-center">
					Copyright© - desarrollado por <a href="http://enniosaenz.com" style="text-decoration: none; color: white"> Ennio J. Sáenz M.</a>&nbsp enniosaenz@gmail.com
				</div>
				
			</div>
			
		</div>
	</footer>
</body>


</html>
<script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="assets/js/popper.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-select.js"></script>
<script type="text/javascript" src="assets/js/js.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzBzkJea_vv3S683H-Rwikh42vOl7NsXQ&callback=initMap"
  type="text/javascript"></script>





