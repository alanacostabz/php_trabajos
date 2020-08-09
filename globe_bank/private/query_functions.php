<?php
function find_all_subjects()
{
  global $db;
  $sql = "SELECT * FROM subjects";
  $sql .= " ORDER BY position ASC";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function find_all_pages()
{
  global $db;

  $sql = "SELECT pages.id, subjects.id AS sub, pages.position, pages.visible, pages.menu_name, subjects.menu_name AS subject_name FROM pages INNER JOIN subjects ";
  $sql .= " WHERE pages.subject_id = subjects.id ";
  $sql .= "ORDER BY pages.id ASC, position ASC";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function find_subject_by_id($id)
{
  global $db;

  $sql = "SELECT * FROM subjects ";
  $sql .= "WHERE id='" . $id . "'";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $subject = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $subject;
}

function find_page_by_id($id)
{
  global $db;

  $sql = "SELECT pages.id, pages.subject_id, subjects.id AS subject_id_fk, pages.position, pages.visible, pages.menu_name, content, subjects.menu_name as subject_name FROM pages INNER JOIN subjects ";
  $sql .= "WHERE pages.id='" . $id . "' AND pages.subject_id = subjects.id";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $subject = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $subject;
}

function insert_subject($subject)
{
  global $db;

  $sql = "INSERT INTO subjects ";
  $sql .= "(menu_name, position, visible) ";
  $sql .= "VALUES (";
  $sql .= "'" . $subject['menu_name'] . "',";
  $sql .= "'" . $subject['position'] . "',";
  $sql .= "'" . $subject['visible'] . "'";
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

function insert_page($page)
{
  global $db;

  $sql = "INSERT INTO pages ";
  $sql .= "(subject_id ,menu_name, position, visible, content) ";
  $sql .= "VALUES (";
  $sql .= "'" . $page['name_subject'] . "',";
  $sql .= "'" . $page['menu_name'] . "',";
  $sql .= "'" . $page['position'] . "',";
  $sql .= "'" . $page['visible'] . "',";
  $sql .= "'" . $page['content'] . "'";
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


function update_subject($subject)
{
  global $db;


  $sql = "UPDATE subjects SET ";
  $sql .= "menu_name='" . $subject['menu_name'] . "', ";
  $sql .= "position='" . $subject['position'] . "', ";
  $sql .= "visible='" . $subject['visible'] . "' ";
  $sql .= "WHERE id=" . $subject['id'] . " ";
  $sql .= 'LIMIT 1';
  echo $sql;
  $result = mysqli_query($db, $sql);

  // for UPDATE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // INSERT failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function update_page($page)
{
  global $db;


  $sql = "UPDATE pages SET ";
  $sql .= "subject_id='" . $page['subject_id'] . "', ";
  $sql .= "menu_name='" . $page['menu_name'] . "', ";
  $sql .= "position='" . $page['position'] . "', ";
  $sql .= "visible='" . $page['visible'] . "' ";
  $sql .= "WHERE id=" . $page['id'] . " ";
  $sql .= 'LIMIT 1';
  echo $sql;
  $result = mysqli_query($db, $sql);

  // for UPDATE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // INSERT failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function delete_subject($id)
{
  global $db;
  $sql = "DELETE FROM subjects ";
  $sql .= "WHERE id='" . $id . "' ";
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

function delete_page($id)
{
  global $db;
  $sql = "DELETE FROM pages ";
  $sql .= "WHERE id='" . $id . "' ";
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

function has_unique_page_menu_name($menu_name, $table_name)
{
  global $db;
  $sql = "SELECT * FROM " . $table_name . " ";
  $sql .= "WHERE UPPER(menu_name) = UPPER('" . $menu_name . "')";
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

function validate_subject_before_delete($id)
{
  global $db;
  $sql = "SELECT * FROM pages ";
  $sql .= "WHERE subject_id = '" . $id . "'";

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
