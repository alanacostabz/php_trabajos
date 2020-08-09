<?php

require_once('../../../private/initialize.php');

if (!isset($_GET['id'])) {
  redirect_to(url_for('/staff/pages/index.php'));
}

$id = $_GET['id'];

$page = find_page_by_id($id);

if (is_post_request()) {

  $result = delete_page($id);
  redirect_to(url_for('/staff/pages/index.php'));
}


$page_title = 'Delete Page';

include(SHARED_PATH . '/staff_header.php');
?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>

  <div class="page delete">

    <h1>Delete page</h1>

    <p>Are you sure you want to delete this page?</p>

    <?php echo h($page['menu_name']); ?>

    <form action="<?php echo url_for('/staff/pages/delete.php?id=' . h(u($id))); ?>" method="post">
      <div id=" operations">
        <input type="submit" value="Delete page" />
      </div>
    </form>

  </div>

</div>


<?php include(SHARED_PATH . '/staff_footer.php'); ?>