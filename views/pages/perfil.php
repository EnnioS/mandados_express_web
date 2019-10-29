

	 <?php


        
      	if (isset($_SESSION['nomUser'])) {
            
               

			echo ' 
			<div style="background-color: #dddddd;">
			<div class="container" style="padding: 25px">
					<div class="row">
						<div class="col text-center" style="background-color: #1A1A1A">
							<span style="color: white">PERFIL DE USUARIO</span>
						</div>
					</div>

					<div id="userCamposVerPerfil" class="row " style="background-color: white;">
			          
				     	<div class="col-lg-12 col-md-12 text-center" style = "padding-top: 15px; padding-bottom: 15px; background-color: #EDEDED;" >
				        	<img src="'.$_SESSION['urlFotoUser'].'" id="userimgVerPerfil" name="userimgVerPerfil" class="rounded-circle" alt="Usuario" style=" width: 180px;height: 180px; object-fit: cover;border-style: solid; border-color: grey; background-color:grey">
				      	</div>
				      	<div class="col-12 divider">
			          	</div>
				      	<div class="col-lg-12 col-md-12"  style="margin-bottom: 15px; margin-top: 15px">
				      		<div class="row">

				      			<div class="col-12">
						      		<div class="row">
						      			<div class="col-6 text-right">
							          		<label>Usuario</label>
							          	</div>
							          	<div class="col-6 text-left">
							          		<span>'.$_SESSION['userName'].'</span>
							          	</div>
					          		</div>
					      		</div>

						      	<div class="col-12">
						      		<div class="row">
						      			<div class="col-6 text-right">
							          		<label>Nombre</label>
							          	</div>
							          	<div class="col-6 text-left">
							          		<span>'.$_SESSION['nomUser']." ".$_SESSION['apeUser'].'</span>
							          	</div>
					          		</div>
					      		</div>

					      		<div class="col-12">
						      		<div class="row">
						      			<div class="col-6 text-right">
							          		<label>edad</label>
							          	</div>
							          	<div class="col-6 text-left">
							          		<span id ="spanFNacPerfilUser"></span>
							          	</div>
					          		</div>
					      		</div>

					      		<div class="col-12">
						      		<div class="row">
						      			<div class="col-6 text-right">
							          		<label>sexo</label>
							          	</div>
							          	<div class="col-6 text-left">
							          		<span>'.$_SESSION['sexoUser'].'</span>
							          	</div>
					          		</div>
					      		</div>

					      		<div class="col-12">
						      		<div class="row">
						      			<div class="col-6 text-right">
							          		<label>Email</label>
							          	</div>
							          	<div class="col-6 text-left">
							          		<span>'.$_SESSION['emailUser'].'</span>
							          	</div>
					          		</div>
					      		</div>

					      		<!--<div class="col-12">
						      		<div class="row">
						      			<div class="col-6 text-right">
							          		<label>Contraseña</label>
							          	</div>
							          	<div class="col-6 text-left">
							          		//<span>'.$_SESSION['passUser'].'</span>
							          	</div>
					          		</div>
					      		</div>-->


					      		<div class="col-12">
						      		<div class="row">
						      			<div class="col-6 text-right">
							          		<label>Móvil</label>
							          	</div>
							          	<div class="col-6 text-left">
							          		<span>'.$_SESSION['celUser'].'</span>
							          	</div>
					          		</div>
					      		</div>

					      		<div class="col-12">
						      		<div class="row">
						      			<div class="col-6 text-right">
							          		<label>tel. Convencional</label>
							          	</div>
							          	<div class="col-6 text-left">
							          		<span>'.$_SESSION['telCasaUser'].'</span>
							          	</div>
					          		</div>
					      		</div>

					      		<div class="col-12">
						      		<div class="row">
						      			<div class="col-6 text-right">
							          		<label>Dirección</label>
							          	</div>
							          	<div class="col-6 text-left">
							          		<span>'.$_SESSION['dirUser'].'</span>
							          	</div>
					          		</div>
					      		</div>
					      	</div>
					    </div>

					    <div class="col-12 divider">
			          	</div>
					    
					    <div id="divButton" class="col-12" style = "background-color: #EDEDED; padding-bottom: 15px; padding-top: 15px">
			          		<button style="width: 100%; color: white; background-color: #1A1A1A" id="editarUsuario" class="btn btn-secondary" onclick="abrirModalEditarUser()">Editar</button>
			          	</div>

			        </div>

			      </div>
				</div>
			</div>';
		}else{

		  	echo '<div style="background-color: #dddddd; height: 100%">
				<div class="container" style="padding: 25px; text-align: center; vertical-align: middle;">
					<span style=" font-size: 2ms; font-weight: bold;">Debe registrarse para ver el contenido de esta página</span>
				</div>
			</div>';
		
		}
  	?>
      
       
      
