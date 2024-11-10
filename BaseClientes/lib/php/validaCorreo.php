<?php

require_once __DIR__ . "/BAD_REQUEST.php";
require_once __DIR__ . "/ProblemDetails.php";

function validaCorreo(false|string $correoElectronico)
{

 if ($correoElectronico === false)
  throw new ProblemDetails(
   status: BAD_REQUEST,
   title: "Falta el correo electronico.",
   type: "/error/faltacorreo.html",
   detail: "La solicitud no tiene el valor de correo electronico."
  );

 $trimCorreo = trim($correoElectronico);

 if ($trimCorreo === "")
  throw new ProblemDetails(
   status: BAD_REQUEST,
   title: "Correo electronico en blanco.",
   type: "/error/correoenblanco.html",
   detail: "Pon texto en el campo correo electronico.",
  );

 return $trimCorreo;
}
