<?php

require_once __DIR__ . "/BAD_REQUEST.php";
require_once __DIR__ . "/ProblemDetails.php";

function validaApellido(false|string $apellido)
{

 if ($apellido === false)
  throw new ProblemDetails(
   status: BAD_REQUEST,
   title: "Falta el apellido.",
   type: "/error/faltaapellido.html",
   detail: "La solicitud no tiene el valor de apellido."
  );

 $trimApellido = trim($apellido);

 if ($trimApellido === "")
  throw new ProblemDetails(
   status: BAD_REQUEST,
   title: "Apellido en blanco.",
   type: "/error/apellidoenblanco.html",
   detail: "Pon texto en el campo apellido.",
  );

 return $trimApellido;
}
