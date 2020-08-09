<?php

require_once('model/productos_modelo.php');

$producto = new ProductosModel();
$matrizProductos = $producto->getProductos();


require_once('view/productos_view.php');
