<?php require_once('../../../private/initialize.php'); ?>

<?php
// $id = isset($_GET['id']) ? $_GET['id'] : '1';
$id = $_GET['id'] ?? '1'; // PHP > 7.0
$page = find_page_by_id($id);
?>

<?php $page_title = 'Show Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>

  <div class="page show">

    <!--page ID: <?php //echo h($id); 
                  ?>-->

    <h2>Page: <?php echo h($page['menu_name']); ?></h2>

    <div class="attributes">

      <dl>
        <dt>Menu Name</dt>
        <dd><?php echo h($page['menu_name']); ?></dd>
      </dl>
      <dl>
        <dt>Subject Name</dt>
        <dd><?php echo $page['subject_name']; ?></dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd><?php echo h($page['position']); ?></dd>
      </dl>
      <dl>
        <dt>visible</dt>
        <dd><?php echo $page['visible'] == '1' ? 'true' : 'false'; ?></dd>
      </dl>
      <dl>
        <dt>Content</dt>
        <dd><?php echo h($page['content']); ?></dd>
      </dl>


    </div>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>