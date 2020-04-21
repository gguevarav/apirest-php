<?php

class Coneccion{

	static public function ConectarBaseDatos(){
		// Parámetros de conección
		define("Host", "localhost");
		define("BaseDeDatos", "apirest");
		define("Usuario", "root");
		define("Contrasenia", "123456");

		$EnlaceDeConeccion  = new PDO('mysql:host='.Host.';dbname='.BaseDeDatos,
						   Usuario,
						   Contrasenia);

		$EnlaceDeConeccion->exec("set names utf8");

		return $EnlaceDeConeccion;
	}
}