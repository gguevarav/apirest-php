<?php

require_once "Coneccion.php";

class UsuariosModelo{
	// Mostrar todos los cursos
	static public function mostrar($id){
		// Parametros para uso de tablas de la base de datos
		$Tabla = "usuario";
		$idTabla = "idUsuario";

		// Si recibimos un id significa que solo queremos obtener un único registro.
		if($id != null){
			$Consulta = "SELECT * FROM " . $Tabla . " WHERE " . $idTabla . " = $id";
		}else{
			$Consulta = "SELECT * FROM " . $Tabla;
		}
		// Preparamos la Consulta
		$stmt = Coneccion::ConectarBaseDatos()->prepare($Consulta);
		// Ejecutamos el Statement
		$stmt->execute();
		// Retornamos la información en un array
		return $stmt->fetchAll(PDO::FETCH_CLASS);
	}

	// Función para verificar que no exista el correo
	static public function VarificarCorreoExistente($Correo){
		// Parametros para uso de tablas de la base de datos
		$Tabla = "usuario";
		$TablaCorreo = "CorreoUsuario";

		// Preparamos la consulta
		$Consulta = "SELECT * FROM " . $Tabla . " WHERE " . $TablaCorreo . " ='$Correo'";

		// Preparamos la Consulta
		$stmt = Coneccion::ConectarBaseDatos()->prepare($Consulta);
		// Ejecutamos el Statement
		$stmt->execute();
		// Verificamos que el array no esté vacío
		if(empty($stmt->fetchAll(PDO::FETCH_CLASS))){
			return false;
		}else{
			return true;
		}
	}

	// Probando obtener el nombre del archivo.
	static public function ObtenerNombreModelo(){
		$Archivo = pathinfo(__FILE__);
		$Modelo = $Archivo['filename'];
	}
}