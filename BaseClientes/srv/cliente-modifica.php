<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaIdEntero.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/validaApellido.php";
require_once __DIR__ . "/../lib/php/validaCorreo.php";
require_once __DIR__ . "/../lib/php/update.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_CLIENTE.php";

ejecutaServicio(function () {

 $id = recuperaIdEntero("id");
 $nombre = recuperaTexto("nombre");
 $apellido = recuperaTexto("apellido");
 $correoElectronico = recuperaTexto("correoElectronico");

 $nombre = validaNombre($nombre);
 $apellido = validaApellido($apellido);
 $correoElectronico = validaCorreo($correoElectronico);

 update(
    pdo: Bd::pdo(),
    table: CLIENTE,
    set: [
        CLI_NOMBRE => $nombre,
        CLI_APELLIDO => $apellido,
        CLI_CORREO_ELECTRONICO => $correoElectronico
    ],
    where: [CLI_ID => $id]
);

devuelveJson([
    "id" => ["value" => $id],
    "nombre" => ["value" => $nombre],
    "apellido" => ["value" => $apellido],
    "correoElectronico" => ["value" => $correoElectronico],
]);
});
