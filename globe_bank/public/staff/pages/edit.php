<?php

require_once('../../../private/initialize.php');

if (!isset($_GET['id'])) {
  redirect_to(url_for('/staff/pages/index.php'));
}

$id = $_GET['id'];


if (is_post_request()) {

  // Handle form values sent by new.php
  $page = [];
  $page['id'] = $_GET['id'];
  $page['menu_name'] = $_POST['menu_name'] ?? '';
  $page['subject_id'] = $_POST['name_subject'] ?? '';
  $page['position'] = $_POST['position'] ?? '';
  $page['visible'] = $_POST['visible'] ?? '';

  if (has_unique_page_menu_name($page['menu_name'], 'pages')) {
    //redirect_to(url_for('/staff/pages/new.php'));

    echo '<script type="text/javascript">
          alert("El nombre de la página ya existe");
          window.location.href="new.php";
          </script>';
  } else {
    $result = update_page($page);
    redirect_to(url_for('/staff/pages/show.php?id=' . $id));
  }
} else {
  $page = find_page_by_id($id);

  $page_set = find_all_pages();
  $subject_set = find_all_subjects();
  $page_count = mysqli_num_rows($page_set);
  // mysqli_free_result($page_set);
}

?>

<?php $page_title = 'Edit Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>

  <div class="Page edit">
    <h1>Edit Page</h1>

    <form action="<?php echo url_for('/staff/pages/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
        <dt>Menu Name</dt>
        <dd><input required type="text" name="menu_name" value="<?php echo h($page['menu_name']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Subject Name</dt>
        <dd>
          <select name="name_subject">
            <?php

            //print results
            while ($subjectName = mysqli_fetch_assoc($subject_set)) {
              echo "<option value='{$subjectName['id']}'";
              if ($subjectName['id'] == $page['subject_id_fk']) {
                echo " selected";
              }
              echo ">" . $subjectName['menu_name'] . " </option>";
            }
            ?>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position">
            <?php
            for ($i = 1; $i <= $page_count; $i++) {
              echo "<option value=\"{$i}\"";
              if ($page["position"] == $i) {
                echo " selected";
              }
              echo ">{$i}</option>";
            }
            ?>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>
          <input type="hidden" name="visible" value="0" />
          <input type="checkbox" name="visible" value="1" <?php if ($page['visible'] == 1) {
                                                            echo " checked";
                                                          } ?> />
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Edit Page" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>