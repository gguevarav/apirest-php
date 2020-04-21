<?php 

class EquiposControlador{
	// Crear un registro de Equipo
	public function registrar($id){
		// Verificamos si hay un id
		if($id != null){
			$json = array(
						"detalle" => "Equipo POST : " . $id
					);
		}else{
			$json = array(
						"detalle" => "Equipos POST"
				 	);
		}
		// Mostramos el json
		echo json_encode($json, true);
	}

	// Mostrar los registros de Equipo
	public function mostrar($id){
		// Verificamos si hay un id
		if($id != null){
			// Instanciamos el método de la clase para obtener todos los equipos.
			$Equipos = EquiposModelo::mostrar($id);
			// Creamos un Json con la respuesta
			$json = array(
						"status" => 200,
						"cantidad_equipos" => count($Equipos),
						"detalle" => $Equipos
				 	);
		}else{
			// Instanciamos el método de la clase para obtener todos los equipos.
			$Equipos = EquiposModelo::mostrar(null);
			// Creamos un Json con la respuesta
			$json = array(
						"status" => 200,
						"cantidad_equipos" => count($Equipos),
						"detalle" => $Equipos
				 	);
		}
		// Mostramos el json
		echo json_encode($json, true);
	}
}