<?php

class Rutas{

	public function BuscarRuta(){
		// Obtenemos las rutas en un array
		$RutasRecibidas = array_filter(explode("/", $_SERVER['REQUEST_URI']));

		// Definimos las rutas
		$RutasDefinidas = array("usuarios",
					   			"equipos");

		// Array que contendrá la ruta en que estamos trabajando, se inicializa null por que se buscará en la uri para después hacer el debido desvío.
		$InformacionURI = array("RutaUtilizar" => "",
								"ID" => "");

		// Comparamos la información del array que contiene las rutas definidas con el array que trae la respuesta del servidor
		for($ContadorRutasRecibidas = 0; $ContadorRutasRecibidas < count($RutasRecibidas); $ContadorRutasRecibidas++){
			for($ContadorRutasDefinidas = 0; $ContadorRutasDefinidas < count($RutasDefinidas); $ContadorRutasDefinidas++){
				if($RutasDefinidas[$ContadorRutasDefinidas] == strtolower($RutasRecibidas[$ContadorRutasRecibidas])){
					echo "Estoy aca";
					// Guardamos la ruta con la que estamos ingresando desde le URI
					$InformacionURI["RutaUtilizar"] = $RutasDefinidas[$ContadorRutasDefinidas];
					// Como ya tenemos la ruta, vamos a buscar si le sigue un ID a la ruta.
					$Temporal = $ContadorRutasRecibidas;
					$Temporal += 1;
					if ($Temporal != count($RutasRecibidas)){
						if(is_numeric($RutasRecibidas[$Temporal])){
							// Guardamos el id con el que necesitamos trabajar
							$InformacionURI["ID"] = $RutasRecibidas[$Temporal];
						}
					}
				}
			}
		}

		echo $InformacionURI["RutaUtilizar"];
		return;
		
		// Luego con condiciones lo redirigimos
		// Luego con condiciones lo redirigimos
		if($InformacionURI["RutaUtilizar"] == ""){
			$json = array(
						"detalle" => "No encontrado"
					 );
		}
			elseif ($InformacionURI["RutaUtilizar"] == "usuarios") {
				$json = array(
							"detalle" => "Usuarios"
						 );
			}
				elseif ($InformacionURI["RutaUtilizar"] == "equipos") {
					$json = array(
								"detalle" => "Equipos"
							 );
				} 
		
		// Mostramos el json
		echo json_encode($json, true);
	}
}