<?php

use phpDocumentor\Reflection\Types\Array_;

function comboSelectMaker(array $arr1, array $arr2 = null)
{

  if (!$arr2 == null) {
    $marcas = array($arr2[0]->id_marca => $arr2[0]->marca);
  } else {
    $marcas = array($arr2[0]->id_marca => $arr2[0]->marca);
  }

  foreach ($arr1 as $item) {
    $marcas[$item->id_marca] = $item->marca;
  }

  return array_unique($marcas);
}
