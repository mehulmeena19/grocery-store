<?php
include '../assets/dbconnect.php';
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>
    <title>Admin-Area</title>
  </head>
  <body style="background-color:lightgrey;">
    <div class="container">
    <h1 style="text-align: center;">ADMIN PANEL</h1><br>
    <h3 style="text-align: center;">Insert Products Here</h3><br><br>
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
              <div class="form-group">
                <label class="col-md-3.control-label">Product Name</label>
                <input type="text" name="product_title" class="form-control" required="">
              </div>
              <div class="form-group">
                <label class="col-md-3.control-label">Product Brand</label>
                <select name="product_brand" class="form-control">
                  <option>Select a product brand</option>
                  <?php
                    $get_p_brand="select * from brand";
                    $run_p_brand=mysqli_query($connection,$get_p_brand);
                    while($row=mysqli_fetch_array($run_p_brand))
                    {
                      $id=$row['b_id'];
                      $p_brand=$row['b_name'];
                      echo "<option value='$id'> $p_brand </option>";
                    }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label class="col-md-3.control-label">Product Category</label>
                <select name="product_category" class="form-control">
                  <option>Select a product category</option>
                  <?php
                    $get_p_cat="select * from category";
                    $run_p_cat=mysqli_query($connection,$get_p_cat);
                    while($row=mysqli_fetch_array($run_p_cat))
                    {
                      $id=$row['c_id'];
                      $p_cat=$row['c_name'];
                      echo "<option value='$id'> $p_cat </option>";
                    }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label class="col-md-3.control-label">Product Image</label>
                <input type="file" name="product_img" class="form-control" required="">
              </div>
              <div class="form-group">
                <label class="col-md-3.control-label">Product price</label>
                <input type="text" name="product_price" class="form-control" required="">
              </div>
              <div class="form-group">
                <label class="col-md-3.control-label">Product Description</label>
                <textarea name="product_desc" class="form-control" rows="6" cols="9"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" name="submit" value="Insert Product">
              </div>
            </form>
            <a href="admin_index.php" style="text-align: center;">Click here to go to Admin Dashboard</a>
          </div>
          
        </div>
      </div>
    </div>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<?php
  if(isset($_POST['submit'])){
    $product_title=$_POST['product_title'];
    $product_brand=$_POST['product_brand'];
    $product_cat=$_POST['product_category'];
    $product_price=$_POST['product_price'];
    $product_desc=$_POST['product_desc'];
    $product_img=$_FILES['product_img']['name'];
    $temp_name=$_FILES['product_img']['tmp_name'];
    move_uploaded_file($temp_name,"images/$product_img");

    $insert_product="insert into product(b_id,c_id,date,product_title,product_img,product_price,product_description) values('$product_brand','$product_cat',NOW(),'$product_title','$product_img','$product_price','$product_desc')";
    $run_product=mysqli_query($connection,$insert_product);

    if($run_product)
      echo "<script>alert('inserted successfully')</script>";
}
?>