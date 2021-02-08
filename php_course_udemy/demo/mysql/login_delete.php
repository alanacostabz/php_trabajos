<?php
include "db.php";
include "functions.php";
?>


<?php
  DeleteRow();
?>


<?php include "includes/header.php"; ?>
    <div class="container">
        <div class="col-sm-6">
          <h1 class="text-center">Delete</h1>
            <form action="login_delete.php" method="post">

              <div class="form-group">
              <label for="username">Username</label>
                  <input type="text" name="username" class="form-control">
              </div>

              <div class="form-group">
                  <label for="password" name="password">Password</label>
                  <input type="password" name="password" class="form-control">
              </div>

              <div class="form-group">
                <select name="id" id="">
                  <?php
                    showAllData();
                  ?>
                </select>
              </div>

              <input class="btn btn-primary" type="submit" name="submit" value="Delete">

          </form>
        </div>
<?php include "includes/footer.php"; ?>