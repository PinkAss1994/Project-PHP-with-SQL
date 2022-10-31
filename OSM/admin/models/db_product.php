<?php
// session_start();
// $email = $_SESSION["users"];
// if ( ($email == "") || ($email == null) ) {
//     // header ("Location :login_form.php");
//     echo"vui long đăng nhập";
//     echo "<br>";
//     echo '<a href="login_form.php"> Login</a>';
//     exit();
    
// }
// ?>
 <?php
//  session_start();
//  $email = $_SESSION["users"];
//  if(($email == "") || ($email == null))
//  {
//   echo '<a href="login_form.php"> Login</a>';
//    exit();
//  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Addproduct</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS File -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" 
  integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>
<body>

<div class="container">
  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {                                //#1
    require('product.php');
  } // end of the main Submit conditional
  ?>
  <h2 class="h2 text-center">
  Addproduct</h2>
    <form action="../controllers/list_of_products.php" method="post" onsubmit="return checked();" name="product" id="product" enctype="multipart/form-data">
      <div class="form-group row">
        <label for="product_name" class="col-sm-4 col-form-label">Product Name</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="product_name" name="product_name" 
          placeholder="product_name" maxlength="30" required value="" >
        </div>
      </div>

      <div class="form-group row">
        <label for="product_sale" class="col-sm-4 col-form-label"> product sale</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="product_sale" name="product_sale" 
          placeholder=" product_sale" maxlength="60" required value="">
        </div>
      </div>

      <div class="form-group row">
        <label for="product_price" class="col-sm-4 col-form-label">Product Price</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="product_price" name="product_price" 
          placeholder="product_price" maxlength="60" required value="">
        </div>
      </div>

      <div class="form-group row">
        <label for="product_content" class="col-sm-4 col-form-label">product_content</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="product_content" name="product_content" 
          placeholder=" product_content" maxlength="60" required value="">
        </div>
      </div>   <div class="form-group row">
        <label for="product_quantity" class="col-sm-4 col-form-label"> product_quantity</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="product_quantity" name="product_quantity" 
          placeholder=" product_quantity" maxlength="60" required value="">
        </div>
      </div>   <div class="form-group row">
        <label for="product_hot" class="col-sm-4 col-form-label"> product_hot</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="product_hot" name="product_hot" 
          placeholder=" product_hot" maxlength="60" required value="">
        </div>
      </div>   <div class="form-group row">
        <label for="product_kg" class="col-sm-4 col-form-label"> product_kg</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="product_kg" name="product_kg" 
          placeholder=" product_kg" maxlength="60" required value="">
        </div>
      </div>   <div class="form-group row">
        <label for="product_buyed" class="col-sm-4 col-form-label"> product_buyed</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="product_buyed" name="product_buyed" 
          placeholder=" product_buyed" maxlength="60" required value="">
        </div>
      </div>   <div class="form-group row">
        <label for="product_created_at" class="col-sm-4 col-form-label"> product_created_at</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="product_created_at" name="product_created_at" 
          placeholder=" product_created_at" maxlength="60" required value="">
        </div>
      </div>   <div class="form-group row">
        <label for="product_status" class="col-sm-4 col-form-label"> product_status</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="product_status" name="product_status" 
          placeholder=" product_status" maxlength="60" required value="">
        </div>
      </div>

      <div class="form-group row">
        <label for="product_avatar" class="col-sm-4 col-form-label">product_avatar</label>
        <div class="col-sm-8">
          <input type="file" name="product_avatar" id="product_avatar">
        </div>
      </div>
      <div class="form-group row">
        <label for="product_images" class="col-sm-4 col-form-label">product_images</label>
        <div class="col-sm-8">
          <input type="file" name="product_images" id="product_images">
        </div>
      </div>
    
 
      <div class="form-group row">
        <div class="col-sm-12">
          <input id="submit" class="btn btn-primary" type="submit" name="submit" value="Addproduct">
        </div>
        </div>
      </div>
      </form>
    </div>
  </div>
</body>
</html>