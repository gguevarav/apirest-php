<?php

require_once "Controladores/RutasControlador.php";
require_once "Controladores/UsuariosControlador.php";
require_once "Controladores/EquiposControlador.php";

// Requerir los modelos para que funcione el uso de la base de datos
require_once "Modelos/EquiposModelo.php";
require_once "Modelos/CursosModelo.php";

$Rutas = new ControladorRutas();

$Rutas->index();