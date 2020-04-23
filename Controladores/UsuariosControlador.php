<?php 

class UsuariosControlador{
	// Crear un registro de Usuario
	public function registrar($datos){
		// Pare registrar debemos validar los datos que estamos recibiendo
		// Validamos el Nombre del usuario
		if(isset($datos["NombreUsuario"]) && !preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚ ]+$/', $datos["NombreUsuario"])){
			$json = array(
						"status" => 404,
						"detalle" => "Error en el campo, solo se permiten letras."
					);
		}
		// Validamos el Apellido del usuario
		if(isset($datos["ApellidoUsuario"]) && !preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚ ]+$/', $datos["ApellidoUsuario"])){
			$json = array(
						"status" => 404,
						"detalle" => "Error en el campo, solo se permiten letras."
					);
		}
		// Validamos el Correo del usuario
		if(isset($datos["CorreoUsuario"]) && !preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $datos["CorreoUsuario"])){
			$json = array(
						"status" => 404,
						"detalle" => "Error correo no válido."
					);
		}else if(UsuariosModelo::VarificarCorreoExistente($datos["CorreoUsuario"])){
			$json = array(
						"status" => 404,
						"detalle" => "Error, el correo ya está registrado."
					);
		}
		else{
			$json = array(
						"status" => 202,
						"detalle" => "Correo Válido."
					);
		}
		// Validamos que el email no esté repetido
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