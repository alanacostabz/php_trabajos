<?php
if ($_POST["nombre"] == "" || $_POST['apellido'] || $_POST['email'] || $_POST['comentarios']) {
  echo 'Revisa los campos';
  die();
}

$textoMail = $_POST['comentarios'];
$destinatario = $_POST['email'];
$asunto = $_POST['asunto'];

$headers = 'MIME-Version: 1.0,\r\n';

$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

$headers .= "From: Prueba Alan <bryanbaez2504@gmail.com>\r\n";

$exito = mail($destinatario, $asunto, $textoMail, $headers);

if ($exito) {
  echo 'Mensaje enviado con éxito';
} else {
  'Ha habido un error';
}
