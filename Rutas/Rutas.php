<?php

class Rutas{

	public function BuscarRuta(){
		// Obtenemos las rutas en un array
		$RutasRecibidas = explode("/", $_SERVER['REQUEST_URI']);

		// Definimos las rutas
		$RutasDefinidas = array("usuarios",
					   			"equipos");

		// Array que contendrá la ruta en que estamos trabajando, se inicializa null por que se buscará en la uri para después hacer el debido desvío.
		$InformacionURI = array("RutaUtilizar" => null,
								"ID" => null);

		// Comparamos la información del array que contiene las rutas definidas con el array que trae la respuesta del servidor
		for($ContadorRutasRecibidas = 0; $ContadorRutasRecibidas < count($RutasRecibidas); $ContadorRutasRecibidas++){
			for($ContadorRutasDefinidas = 0; $ContadorRutasDefinidas < count($RutasDefinidas); $ContadorRutasDefinidas++){
				if($RutasDefinidas[$ContadorRutasDefinidas] == strtolower($RutasRecibidas[$ContadorRutasRecibidas])){
					// Guardamos la ruta con la que estamos ingresando desde le URI
					$InformacionURI["RutaUtilizar"] = $RutasDefinidas[$ContadorRutasDefinidas];
					// Como ya tenemos la ruta, vamos a buscar si le sigue un ID a la ruta.
					// Creamos una variable temporal para poder obtener la posición actual y usar la siguiente
					$Temporal = $ContadorRutasRecibidas;
					$Temporal += 1;
					if ($Temporal != count($RutasRecibidas)){
						if(is_numeric($RutasRecibidas[$Temporal])){
							// Guardamos el id con el que necesitamos trabajar
							$InformacionURI["ID"] = $RutasRecibidas[$Temporal];
						}else{
							$InformacionURI["RutaUtilizar"] = null;
							$InformacionURI["ID"] = null;
						}
					}
					
				}
			}
		}

		
		// Luego con condiciones lo redirigimos
		// Luego con condiciones lo redirigimos
		if($InformacionURI["RutaUtilizar"] == ""){
			$json = array(
						"detalle" => "No encontrado"
					 );
			// Mostramos el json
			echo json_encode($json, true);
		}
			elseif ($InformacionURI["RutaUtilizar"] == "usuarios") {
				// Si estamos recibiendo un verbo en la url vamos a verificar a cual lo redirigimos
				if(isset($_SERVER["REQUEST_METHOD"])){
					// Con un Switch bucaremos el verbo
					switch ($_SERVER["REQUEST_METHOD"]) {
						case "GET":
							$Mostrar = new UsuariosControlador();
							$Mostrar->mostrar($InformacionURI["ID"]);
							break;

						case "POST":

							// Recibiendo datos
							$datos = array("NombreUsuario" => $_POST['NombreUsuario'],
										   "ApellidoUsuario" => $_POST['ApellidoUsuario'],
										   "CorreoUsuario" => $_POST['CorreoUsuario'],
										   "ContraseniaUsuario" => $_POST['ContraseniaUsuario']
										);

							$registro = new UsuariosControlador();
							$registro->registrar($datos);
							break;
					}
				}
			}
				elseif ($InformacionURI["RutaUtilizar"] == "equipos") {
					// Si estamos recibiendo un verbo en la url vamos a verificar a cual lo redirigimos
					if(isset($_SERVER["REQUEST_METHOD"])){
						// Con un Switch bucaremos el verbo
						switch ($_SERVER["REQUEST_METHOD"]) {
							case "GET":
							$Mostrar = new EquiposControlador();
							$Mostrar->mostrar($InformacionURI["ID"]);
							break;

						case "POST":
							$registro = new EquiposControlador();
							$registro->registrar($InformacionURI["ID"]);
							break;
						}
					}
				}
	}
}