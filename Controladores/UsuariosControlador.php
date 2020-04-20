<?php 

class UsuariosControlador{
	// Crear un registro de Usuario
	public function registrar($id){
		// Verificamos si hay un id
		if($id != null){
			$json = array(
						"detalle" => "Usuario POST : " . $id
					);
		}else{
			$json = array(
						"detalle" => "Usuarios POST"
				 	);
		}
		// Mostramos el json
		echo json_encode($json, true);
	}

	// Mostrar los registros de usuario
	public function mostrar($id){
		// Verificamos si hay un id
		if($id != null){
			$json = array(
						"detalle" => "Usuario GET : " . $id
					);
		}else{
			$json = array(
						"detalle" => "Usuarios GET"
				 	);
		}
		// Mostramos el json
		echo json_encode($json, true);
	}
}