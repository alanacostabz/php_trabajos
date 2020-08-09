<?php


function getLastMovies()
{
  global $db;
  $sql = "SELECT * FROM PELICULAS ORDER BY FECHA_ESTRENO DESC LIMIT 9";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function getFunctions()
{
  global $db;
  $sql = "SELECT * FROM PELICULAS INNER JOIN FUNCIONES WHERE PELICULAS.ID = FUNCIONES.PELICULA AND DATEDIFF(NOW(), FECHA_FUNCION) <= 0 ORDER BY FECHA_FUNCION DESC";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function getFunctionsByMovie($id)
{
  global $db;
  $sql = "SELECT * FROM PELICULAS INNER JOIN FUNCIONES WHERE peliculas.ID = $id AND PELICULAS.ID = FUNCIONES.PELICULA AND DATEDIFF(NOW(), FECHA_FUNCION) <= 0";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function getMovieByID($id)
{
  global $db;
  $sql = "SELECT * FROM PELICULAS WHERE ID = " . $id;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function searchFunctionByID($id)
{
  global $db;
  $sql = "SELECT * FROM FUNCIONES WHERE ID = " . $id;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}


function getProductoraNameByID($id)
{
  global $db;
  $sql = "SELECT CATALOGO_PRODUCTORA.NOMBRE AS NOMBRE FROM PELICULAS INNER JOIN CATALOGO_PRODUCTORA WHERE PELICULAS.PRODUCTORA = CATALOGO_PRODUCTORA.ID AND PELICULAS.ID = $id";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}
function getGeneroNameByID($id)
{
  global $db;
  $sql = "SELECT CATALOGO_GENERO.NOMBRE AS NOMBRE FROM PELICULAS INNER JOIN CATALOGO_GENERO WHERE PELICULAS.GENERO = CATALOGO_GENERO.ID AND PELICULAS.ID = $id";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function login($email, $password)
{
  global $db;

  $sql = "SELECT * FROM USUARIOS WHERE EMAIL='" . $email . "' AND CONTRA='" . $password . "'";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);


  return $result;
}

function getAllMovies()
{
  global $db;
  $sql = "SELECT PELICULAS.ID AS ID, PELICULAS.NOMBRE AS NOMBRE, FECHA_ESTRENO, CATALOGO_PRODUCTORA.NOMBRE AS PRODUCTORA, CLASIFICACION FROM PELICULAS INNER JOIN CATALOGO_PRODUCTORA WHERE PELICULAS.PRODUCTORA = CATALOGO_PRODUCTORA.ID ORDER BY PELICULAS.ID DESC";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function getAllFunctions()
{
  global $db;
  $sql = "SELECT PELICULAS.ID AS ID_P, SUBTITULOS, FUNCIONES.ID AS ID_F, PELICULAS.NOMBRE AS NOMBRE, FECHA_FUNCION, HORA_INICIO, SALA FROM PELICULAS INNER JOIN FUNCIONES WHERE PELICULAS.ID = FUNCIONES.PELICULA ORDER BY FECHA_FUNCION DESC";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function searchMovieByName($nombre)
{
  global $db;
  $sql = "SELECT PELICULAS.ID AS ID, PELICULAS.NOMBRE AS NOMBRE, FECHA_ESTRENO, CATALOGO_PRODUCTORA.NOMBRE AS PRODUCTORA, CLASIFICACION FROM PELICULAS INNER JOIN CATALOGO_PRODUCTORA WHERE PELICULAS.NOMBRE LIKE UPPER('%" . $nombre . "%') AND PELICULAS.PRODUCTORA = CATALOGO_PRODUCTORA.ID ORDER BY PELICULAS.ID DESC";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function searchFunctionByMovieName($nombre)
{
  global $db;
  $sql = "SELECT FUNCIONES.ID AS ID, PELICULAS.NOMBRE, FECHA_FUNCION, HORA_INICIO, SALA, SUBTITULOS FROM FUNCIONES INNER JOIN PELICULAS WHERE funciones.PELICULA = peliculas.ID AND UPPER(peliculas.NOMBRE) LIKE UPPER('%" . $nombre . "%') ORDER BY FECHA_FUNCION DESC";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function searchMovieByID($id)
{
  global $db;
  $sql = "SELECT PELICULAS.ID AS ID, IMAGEN, TRAILER, GENERO, SIPNOSIS, DIRECTOR, REPARTO, DURACION, IDIOMA, CLASIFICACION, PELICULAS.NOMBRE AS NOMBRE, FECHA_ESTRENO, CATALOGO_PRODUCTORA.NOMBRE AS PRODUCTORA, CLASIFICACION FROM PELICULAS INNER JOIN CATALOGO_PRODUCTORA WHERE PELICULAS.ID = $id  AND PELICULAS.PRODUCTORA = CATALOGO_PRODUCTORA.ID ORDER BY PELICULAS.ID DESC";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function getAllProductoras()
{
  global $db;
  $sql = "SELECT * FROM CATALOGO_PRODUCTORA ORDER BY NOMBRE";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}
function getAllGeneros()
{
  global $db;
  $sql = "SELECT * FROM CATALOGO_GENERO ORDER BY NOMBRE";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function getAllProductora()
{
  global $db;
  $sql = "SELECT * FROM CATALOGO_PRODUCTORA ORDER BY NOMBRE";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function searchProductoraID($productora)
{
  global $db;
  $sql = "SELECT * FROM CATALOGO_PRODUCTORA WHERE NOMBRE = '" . $productora . "' LIMIT 1";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function searchGeneroID($genero)
{
  global $db;
  $sql = "SELECT * FROM CATALOGO_GENERO WHERE NOMBRE = '" . $genero . "' LIMIT 1";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function  searchProductoraByID($id)
{
  global $db;
  $sql = "SELECT * FROM CATALOGO_PRODUCTORA WHERE ID = '" . $id . "'";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function searchGeneroByID($id)
{
  global $db;
  $sql = "SELECT * FROM CATALOGO_GENERO WHERE ID = '" . $id . "'";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function deleteGenero($id)
{
  global $db;
  $sql = "DELETE FROM CATALOGO_GENERO ";
  $sql .= "WHERE ID='" . $id . "' ";
  $sql .= "LIMIT 1";

  $result = mysqli_query($db, $sql);

  // for update statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // update failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function deleteProductora($id)
{
  global $db;
  $sql = "DELETE FROM CATALOGO_PRODUCTORA ";
  $sql .= "WHERE ID='" . $id . "' ";
  $sql .= "LIMIT 1";

  $result = mysqli_query($db, $sql);

  // for update statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // update failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function updateProductora($id, $productora)
{
  global $db;

  $sql = "UPDATE CATALOGO_PRODUCTORA SET ";
  $sql .= "NOMBRE = '" . $productora . "'";
  $sql .= " WHERE ID = " . $id;



  $result = mysqli_query($db, $sql);
  if ($result) {
    return true;
  } else {
    // INSERT failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function updateGenero($id, $genero)
{
  global $db;

  $sql = "UPDATE CATALOGO_GENERO SET ";
  $sql .= "NOMBRE = '" . $genero . "'";
  $sql .= " WHERE ID = " . $id;



  $result = mysqli_query($db, $sql);
  if ($result) {
    return true;
  } else {
    // INSERT failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function newGenero($nombre)
{
  global $db;

  $sql = "INSERT INTO CATALOGO_GENERO (NOMBRE) VALUES ";
  $sql .= "(UPPER('" . $nombre . "')";
  $sql .= ")";


  $result = mysqli_query($db, $sql);
  if ($result) {
    return true;
  } else {
    // INSERT failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function newPoductora($productora)
{
  global $db;

  $sql = "INSERT INTO CATALOGO_PRODUCTORA (NOMBRE) VALUES ";
  $sql .= "(UPPER('" . $productora . "')";
  $sql .= ")";


  $result = mysqli_query($db, $sql);
  if ($result) {
    return true;
  } else {
    // INSERT failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}



function searchGenero($nombre)
{
  global $db;
  $sql = "SELECT * FROM CATALOGO_GENERO WHERE UPPER(NOMBRE) LIKE UPPER('%" . $nombre . "%')";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function searchProductora($nombre)
{
  global $db;
  $sql = "SELECT * FROM CATALOGO_PRODUCTORA WHERE UPPER(NOMBRE) LIKE UPPER('%" . $nombre . "%')";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function editMovie($movie)
{
  global $db;

  $sql = "UPDATE PELICULAS SET ";
  $sql .= "NOMBRE = '" . $movie['NOMBRE'] . "',";
  $sql .= " DURACION = '" . $movie['DURACION'] . "',";
  $sql .= " SIPNOSIS = '" . $movie['SIPNOSIS'] . "',";
  $sql .= " FECHA_ESTRENO = '" . $movie['FECHA_ESTRENO'] . "',";
  $sql .= " DIRECTOR = '" . $movie['DIRECCION'] . "',";
  $sql .= " REPARTO = '" . $movie['REPARTO'] . "',";
  $sql .= " IDIOMA = '" . $movie['IDIOMA'] . "',";
  $sql .= " IMAGEN = '" . $movie['IMAGEN'] . "',";
  $sql .= " TRAILER = '" . $movie['TRAILER'] . "',";
  $sql .= " CLASIFICACION = '" . $movie['CLASIFICACION'] . "',";
  $sql .= " PRODUCTORA = '" . $movie['PRODUCTORA'] . "',";
  $sql .= " GENERO = '" . $movie['GENERO'] . "' WHERE ID = " . $movie['ID'];



  $result = mysqli_query($db, $sql);
  if ($result) {
    return true;
  } else {
    // INSERT failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}



function updateFunction($id_funcion, $id_pelicula, $sala, $fechaFuncion, $horaFuncion, $subtitulos)
{
  global $db;

  $sql = "UPDATE FUNCIONES SET ";
  $sql .= "FECHA_FUNCION = '" . $fechaFuncion . "',";
  $sql .= " HORA_INICIO = '" . $horaFuncion . "',";
  $sql .= " SUBTITULOS = '" . $subtitulos . "',";
  $sql .= " PELICULA = '" . $id_pelicula . "',";
  $sql .= " SALA = '" . $sala . "'";
  $sql .= " WHERE ID = " . $id_funcion;



  $result = mysqli_query($db, $sql);
  if ($result) {
    return true;
  } else {
    // INSERT failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function newMovie($movie)
{
  global $db;

  $sql = "INSERT INTO PELICULAS (NOMBRE, DURACION, SIPNOSIS, FECHA_ESTRENO, DIRECTOR, REPARTO, IDIOMA, IMAGEN, TRAILER, CLASIFICACION, PRODUCTORA, GENERO) VALUES ";
  $sql .= "('" . $movie['NOMBRE'] . "',";
  $sql .= "'" . $movie['DURACION'] . "',";
  $sql .= "'" . $movie['SIPNOSIS'] . "',";
  $sql .= "'" . $movie['FECHA_ESTRENO'] . "',";
  $sql .= "'" . $movie['DIRECCION'] . "',";
  $sql .= "'" . $movie['REPARTO'] . "',";
  $sql .= "'" . $movie['IDIOMA'] . "',";
  $sql .= "'" . $movie['IMAGEN'] . "',";
  $sql .= "'" . $movie['TRAILER'] . "',";
  $sql .= "'" . $movie['CLASIFICACION'] . "',";
  $sql .= "'" . $movie['PRODUCTORA'] . "',";
  $sql .= "'" . $movie['GENERO'] . "'";
  $sql .= ")";


  $result = mysqli_query($db, $sql);
  if ($result) {
    return true;
  } else {
    // INSERT failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}


function newFunction($id, $sala, $fechaFuncion, $horaFuncion, $subtitulos)
{
  global $db;

  $sql = "INSERT INTO FUNCIONES (FECHA_FUNCION, HORA_INICIO, SUBTITULOS, PELICULA, SALA) VALUES ";
  $sql .= "('" . $fechaFuncion . "',";
  $sql .= "'" . $horaFuncion . "',";
  $sql .= "'" . $subtitulos . "',";
  $sql .= "'" . $id . "',";
  $sql .= "'" . $sala . "'";
  $sql .= ")";
  $result = mysqli_query($db, $sql);
  if ($result) {
    return true;
  } else {
    // INSERT failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function has_unique_movie_title_name($nombre)
{
  global $db;
  $sql = "SELECT * FROM PELICULAS ";
  $sql .= "WHERE UPPER(NOMBRE) = UPPER('" . $nombre . "')";
  $result = mysqli_query($db, $sql);

  // for update statements, $result is true/false
  if ($result) {
    if (mysqli_num_rows($result) > 0) {
      return true;
    } else {
      return false;
    }
  } else {
    // update failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function has_unique_genero_name($nombre)
{
  global $db;
  $sql = "SELECT * FROM CATALOGO_GENERO ";
  $sql .= "WHERE UPPER(NOMBRE) = UPPER('" . $nombre . "')";
  $result = mysqli_query($db, $sql);

  // for update statements, $result is true/false
  if ($result) {
    if (mysqli_num_rows($result) > 0) {
      return true;
    } else {
      return false;
    }
  } else {
    // update failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function has_unique_productora_name($productora)
{
  global $db;
  $sql = "SELECT * FROM CATALOGO_PRODUCTORA ";
  $sql .= "WHERE UPPER(NOMBRE) = UPPER('" . $productora . "')";
  $result = mysqli_query($db, $sql);

  // for update statements, $result is true/false
  if ($result) {
    if (mysqli_num_rows($result) > 0) {
      return true;
    } else {
      return false;
    }
  } else {
    // update failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function has_unique_function($id, $sala, $fechaFuncion, $horaFuncion)
{
  global $db;

  $sql = "SELECT * FROM FUNCIONES ";
  $sql .= "WHERE FECHA_FUNCION = '" . $fechaFuncion . "' 
  AND HORA_INICIO = '" . $horaFuncion . "' 
  AND SALA ='" . $sala . "' 
  AND PELICULA = '" . $id . "'";
  $result = mysqli_query($db, $sql);

  // for update statements, $result is true/false
  if ($result) {
    if (mysqli_num_rows($result) > 0) {
      return true;
    } else {
      return false;
    }
  } else {
    // update failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function deleteMovie($id)
{
  global $db;
  $sql = "DELETE FROM PELICULAS ";
  $sql .= "WHERE ID='" . $id . "' ";
  $sql .= "LIMIT 1";

  $result = mysqli_query($db, $sql);

  // for update statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // update failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function deleteFunction($id)
{
  global $db;
  $sql = "DELETE FROM FUNCIONES ";
  $sql .= "WHERE PELICULA='" . $id . "' ";
  $sql .= "LIMIT 1";

  $result = mysqli_query($db, $sql);

  // for update statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // update failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function deleteFunctionByID($id)
{
  global $db;
  $sql = "DELETE FROM FUNCIONES ";
  $sql .= "WHERE ID='" . $id . "' ";
  $sql .= "LIMIT 1";

  $result = mysqli_query($db, $sql);

  // for update statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // update failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}
