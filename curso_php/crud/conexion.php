<?php

try {
  $base = new PDO('mysql:host=localhost:3305; dbname=pruebas', 'root', '');
  $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $base->exec("SET CHARACTER SET UTF8");
} catch (Exception $e) {
  die($e->getMessage());
  echo $e->getLine();
}
