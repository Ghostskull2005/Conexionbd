<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/select.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_CLIENTE.php";

ejecutaServicio(function () {

 $lista = select(pdo: Bd::pdo(),  from: CLIENTE,  orderBy: CLI_NOMBRE);

 $render = "";
 foreach ($lista as $modelo) {
  $encodeId = urlencode($modelo[CLI_ID]);
  $id = htmlentities($encodeId);
  $nombre = htmlentities($modelo[CLI_NOMBRE]);
  $apellido = htmlentities($modelo[CLI_APELLIDO]);
  $correoElectronico = htmlentities($modelo[CLI_CORREO_ELECTRONICO]);
  $render .= "
  <div class='card mb-3'>
      <div class='card-body'>
          <dl>
              <dt>Nombre:</dt>
              <dd><a href='modifica.html?id=$encodeId'>$nombre $apellido</a></dd>
              <dt>Correo Electrónico:</dt>
              <dd><a href='modifica.html?id=$encodeId'>$correoElectronico</a></dd>
          </dl>
      </div>
  </div>";

 }

 devuelveJson(["lista" => ["innerHTML" => $render]]);
});
