<?php

class ConveniosCommand extends CConsoleCommand{
	
	
	public function actionConvenios(){
		
		// Buscar convenios en el SII
		
		// Insertar los convenios en base de datos
		
		
		// Crear el perfil 
		
		$objPerfil = new Perfil();
		$objPerfil->nombrePerfil = ""; // Se colocara el nombre del convenio
		$objPerfil->mensajeBienvenida = "<p>
										 Te damos la bienvenida a la tienda en línea de La rebaja droguerías y minimarkets. Desde 
										 este momento puedes realizar tus compras en línea desde la comodida de tu hogar o el lugar 
										 donde te encuentres y recuerda: <br>
										 
										 Tenemos descuentos permanentes. <br>
										 Puedes programar la hora de entrega. <br>
										 Multiples formas de pago (Efectivo, Datafono, Credirebaja).<br>
										 Compra fácil y sin complicaciones.<br>
										 </p>";
		
		if(!$objPerfil->save()){
			throw new Exception ("Error al guardar el perfil");
		}
		
		// Buscar los funcionarios de cada convenio
		
		foreach($listConvenio as $convenio){
			
			// Determinar si el perfil es distinto al que se va a registrar y guardar en base de datos el histórico anterior
			
			$objPerfilAntiguo = new PerfilAntiguo();
			$objPerfilAntiguo->identificacionUsuario = $convenio->id;
			$objPerfilAntiguo->identificacionUsuario = $convenio->id;
			
			
			// Actualizar en m_Usuario y t_PerfilesEspeciales el nuevo perfil
		}
	}
}