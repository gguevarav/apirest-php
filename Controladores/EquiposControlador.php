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
			$json = array(
						"detalle" => "Equipo GET : " . $id
					);
		}else{
			$json = array(
						"detalle" => "Equipos GET"
				 	);
		}
		// Mostramos el json
		echo json_encode($json, true);
	}
}