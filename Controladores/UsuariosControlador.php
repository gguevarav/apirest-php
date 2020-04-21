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

	// Mostrar los registros de Equipo
	public function mostrar($id){
		// Verificamos si hay un id
		if($id != null){
			// Instanciamos el método de la clase para obtener todos los Usuarios.
			$Usuarios = UsuariosModelo::mostrar($id);
			// Creamos un Json con la respuesta
			$json = array(
						"status" => 200,
						"cantidad_usuarios" => count($Usuarios),
						"detalle" => $Usuarios
				 	);
		}else{
			// Instanciamos el método de la clase para obtener todos los Usuarios.
			$Usuarios = UsuariosModelo::mostrar(null);
			// Creamos un Json con la respuesta
			$json = array(
						"status" => 200,
						"cantidad_usuarios" => count($Usuarios),
						"detalle" => $Usuarios
				 	);
		}
		// Mostramos el json
		echo json_encode($json, true);
	}
}