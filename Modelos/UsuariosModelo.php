<?php

require_once "Coneccion.php";

class UsuariosModelo{
	// Mostrar todos los cursos
	public function mostrar($id){
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
	// Probando obtener el nombre del archivo.
	static public function ObtenerNombreModelo(){
		$Archivo = pathinfo(__FILE__);
		$Modelo = $Archivo['filename'];
	}
}