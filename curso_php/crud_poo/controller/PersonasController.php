<?php

require_once('model/PersonasModel.php');

$personas = new PersonasModel();
$matrizPersonas = $personas->getPersonas();


require_once('view/PersonasView.php');
