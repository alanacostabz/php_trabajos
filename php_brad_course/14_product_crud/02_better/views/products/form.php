<?php if (!empty($errors)): ?>
      <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
          <div>
            <?php echo $error; ?>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <form action="" method="POST" enctype="multipart/form-data">

      <?php if($product['image']): ?>
        <img src="/<?php echo $product['image']; ?>" alt="product" class="update-image">
      <?php endif; ?>

      <div class="form-group">
        <label>Product Image</label>
        <br>
        <input type="file" name="image">
      </div>

      <div class="form-group">
        <label>Product Title</label>
        <input type="text" name="title" class="form-control" placeholder="Enter title" value="<?php echo $title ?>">
      </div>
      
      <div class="form-group">
        <label>Product Description</label>
        <textarea name="description" class="form-control" placeholder="Enter description" value="<?php echo $description ?>" ><?php echo $description ?></textarea>
      </div>

      <div class="form-group">
        <label>Product Price</label>
        <input type="number" name="price" step=".01" min="0" class="form-control" placeholder="Enter price" value="<?php echo $price ?>">
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>