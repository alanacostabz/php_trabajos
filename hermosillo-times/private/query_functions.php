<?php

function findRecentNews()
{
  global $db;
  $sql = "SELECT * FROM NEWS";
  $sql .= " WHERE CATEGORY= 'INTERNACIONAL' ORDER BY PUBLICATION_DATE DESC LIMIT 1";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function findNacionalRecentNews()
{
  global $db;
  $sql = "SELECT * FROM NEWS";
  $sql .= " WHERE CATEGORY='NACIONAL' ORDER BY PUBLICATION_DATE DESC LIMIT 1";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function findEspectaculosRecentNews()
{
  global $db;
  $sql = "SELECT * FROM NEWS";
  $sql .= " WHERE CATEGORY='ESPECTACULOS' ORDER BY PUBLICATION_DATE DESC LIMIT 1";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function findEstatalRecentNews()
{
  global $db;
  $sql = "SELECT * FROM NEWS";
  $sql .= " WHERE CATEGORY='ESTATAL' ORDER BY PUBLICATION_DATE DESC LIMIT 1";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}


function findDeportesRecentNews()
{
  global $db;
  $sql = "SELECT * FROM NEWS";
  $sql .= " WHERE CATEGORY='DEPORTES' ORDER BY PUBLICATION_DATE DESC LIMIT 1";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function findEntretenimientoRecentNews()
{
  global $db;
  $sql = "SELECT * FROM NEWS";
  $sql .= " WHERE CATEGORY='ENTRETENIMIENTO' ORDER BY PUBLICATION_DATE DESC LIMIT 1";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function findTecnologiaRecentNews()
{
  global $db;
  $sql = "SELECT * FROM NEWS";
  $sql .= " WHERE CATEGORY='TECNOLOGIA' ORDER BY PUBLICATION_DATE DESC LIMIT 1";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}


function findVideoJuegosRecentNews()
{
  global $db;
  $sql = "SELECT * FROM NEWS";
  $sql .= " WHERE CATEGORY='VIDEOJUEGOS' ORDER BY PUBLICATION_DATE DESC LIMIT 1";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}


function findSpecificSectionNews($sectionName)
{
  global $db;
  $sql = "SELECT * FROM NEWS";
  $sql .= " WHERE CATEGORY='" . $sectionName . "' ORDER BY PUBLICATION_DATE DESC";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function findAllNews()
{
  global $db;
  $sql = "SELECT * FROM NEWS";
  $sql .= " ORDER BY PUBLICATION_DATE DESC";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function deleteNews($id)
{
  global $db;
  $sql = "DELETE FROM NEWS ";
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

function findNewsByID($id)
{
  global $db;
  $sql = "SELECT * FROM NEWS";
  $sql .= " WHERE ID=" . $id;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function has_unique_news_title_name($title)
{
  global $db;
  $sql = "SELECT * FROM NEWS ";
  $sql .= "WHERE UPPER(TITLE) = UPPER('" . $title . "')";
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

function insert_news($news)
{
  global $db;

  $sql = "INSERT INTO NEWS ";
  $sql .= "(TITLE, HEAD_BODY, BODY, IMAGE, AUTHOR, CATEGORY, PUBLICATION_DATE) ";
  $sql .= "VALUES (";
  $sql .= "'" . $news['TITLE'] . "',";
  $sql .= "'" . $news['HEAD_BODY'] . "',";
  $sql .= "'" . $news['BODY'] . "',";
  $sql .= "'" . $news['IMAGE'] . "',";
  $sql .= "'" . $news['AUTHOR'] . "',";
  $sql .= "'" . $news['CATEGORY'] . "',";
  $sql .= "'" . date("Y-m-d H:i:s") . "'";
  $sql .= ")";

  $result = mysqli_query($db, $sql);
  // For INSERT statements, $result  is true/false
  if ($result) {

    return true;
  } else {
    // INSERT failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function update_news($news)
{
  global $db;

  $sql = "UPDATE NEWS SET ";
  $sql .= "TITLE = '" . $news['TITLE'] . "',";
  $sql .= " HEAD_BODY = '" . $news['HEAD_BODY'] . "',";
  $sql .= " BODY = '" . $news['BODY'] . "',";
  $sql .= " IMAGE = '" . $news['IMAGE'] . "',";
  $sql .= " AUTHOR = '" . $news['AUTHOR'] . "',";
  $sql .= " CATEGORY = '" . $news['CATEGORY'] . "' WHERE ID = " . $news['ID'];

  $result = mysqli_query($db, $sql);
  // For INSERT statements, $result  is true/false
  if ($result) {

    return true;
  } else {
    // INSERT failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}
