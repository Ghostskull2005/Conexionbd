<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/validaApellido.php";
require_once __DIR__ . "/../lib/php/validaCorreo.php";
require_once __DIR__ . "/../lib/php/insert.php";
require_once __DIR__ . "/../lib/php/devuelveCreated.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_CLIENTE.php";

ejecutaServicio(function () {

    $nombre = recuperaTexto("nombre");
    $apellido = recuperaTexto("apellido");
    $correoElectronico = recuperaTexto("correoElectronico");

    $nombre = validaNombre($nombre);
    $apellido = validaApellido($apellido);
    $correoElectronico = validaCorreo($correoElectronico);

    $pdo = Bd::pdo();
    insert(
        pdo: $pdo, 
        into: CLIENTE, 
        values: [
            CLI_NOMBRE => $nombre,
            CLI_APELLIDO => $apellido,
            CLI_CORREO_ELECTRONICO => $correoElectronico
        ]
    );
    $id = $pdo->lastInsertId();

    $encodeId = urlencode($id);
    devuelveCreated("/srv/cliente.php?id=$encodeId", [
        "id" => ["value" => $id],
        "nombre" => ["value" => $nombre],
        "apellido" => ["value" => $apellido],
        "correoElectronico" => ["value" => $correoElectronico],
    ]);
});
