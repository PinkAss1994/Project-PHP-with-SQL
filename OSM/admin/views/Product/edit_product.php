<?php
include '../teamplate1/head.php';
?>
<?php
include '../teamplate1/header.php';
require('../../../lib/mysqli_connect.php');
// $category = mysqli_query($conn,"SELECT * FROM category");
?>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $id_update = $_POST['id_update'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $sale = $_POST['sale'];
    $category_id = $_POST['category_id'];
    $quantity = $_POST['quantity'];
    $display = $_POST['display'];
    $ram = $_POST['ram'];
    $rom = $_POST['rom'];
    $cpu = $_POST['cpu'];
    $camera_front = $_POST['camera_front'];
    $rear_camera = $_POST['rear_camera'];
    $operating_system = $_POST['operating_system'];
    $graphics_chip = $_POST['graphics_chip'];

    $avatar = $_FILES['avatar']['name'];
    $avatar_tmp = $_FILES['avatar']['tmp_name'];
    // $path = '../../../upload/product';
    $image = "../../../upload/product/" . $_FILES['avatar']['name'];
    $target = "../../../upload/product/" . basename($image);
    $status = $_POST['status'];
    
    
   
    if ($avatar == '') {
        $query = 'UPDATE product SET name=?, price=?, sale=?, category_id=?, quantity=?, status=?, operating_system=?, rom=?, rear_camera=?, ram=?, graphics_chip=?, display=?, camera_front=?, cpu=? WHERE id=?';
        $stmt = $conn->stmt_init();
        $stmt->prepare($query);
        // bind valus to SQL Statement
        $stmt->bind_param('siiiiissssssssi', $name, $price, $sale, $category_id, $quantity, $status,$operating_system, $rom, $rear_camera,$ram, $graphics_chip, $display, $camera_front,$cpu, $id_update);
        // execute query
        $stmt->execute();
        if ($stmt->affected_rows == 1) { // update ok
            header('Location: list_of_products.php');
        } else {
            echo $stmt->error;
        }
    } else {
        move_uploaded_file($avatar_tmp, $target);
        $query = 'UPDATE product SET name=?, price=?, sale=?, category_id=?, quantity=?, status=?, avatar=?,operating_system=?, rom=?, rear_camera=?, ram=?, graphics_chip=?, display=?, camera_front=?, cpu=? WHERE id=?';
        $stmt = $conn->stmt_init();
        $stmt->prepare($query);
        // bind valus to SQL Statement
        $stmt->bind_param('siiiiisssssssssi', $name, $price, $sale, $category_id, $quantity, $status, $avatar,$operating_system, $rom, $rear_camera,$ram, $graphics_chip, $display, $camera_front,$cpu, $id_update);
        // execute query
        $stmt->execute();
        if ($stmt->affected_rows == 1) { // update ok
            header('Location: list_of_products.php');
        } else {
            header('Location: list_of_products.php');
        }
    }
   
    // mysqli_query($conn, $sql_update_image);
    // header('Location: list_of_products.php');
}
?>

<div class="page-container">
  <div class="main-content">
    <div class="section__content section__content--p30">
      <div class="container-fluid">
        <div class="right_col" role="main">
          <h4>C???p nh???t s???n ph???m</h4>

          <?php
                    if (isset($_GET['id']))
                        $id_capnhat = $_GET['id'];
                    $sql_capnhat = mysqli_query($conn, "SELECT * FROM product WHERE id='$id_capnhat'");
                    $row_capnhat = mysqli_fetch_array($sql_capnhat);
                    ?>

          <div class="col-md-12 card ">


            <form class="form" action="" method="POST" enctype="multipart/form-data">
              <!-- <label>S???a th??ng tin s???n ph???m</label> -->
              <!-- <h2 class="text-center">C???p nh???t s???n ph???m</h2> -->
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $row_capnhat['name'] ?>"
                  required="">
                <input type="hidden" class="form-control" name="id_update" value="<?php echo $row_capnhat['id'] ?>">
              </div>


              <div class="form-group">
                <label>G??a s???n ph???m</label>
                <input type="text" class="form-control" name="price" placeholder="Nh???p gi?? s???n ph???m"
                  value="<?php echo $row_capnhat['price'] ?>" required="">
              </div>
              <div class="form-group">
                <label>G??a khuy???n m??i</label>
                <input type="text" class="form-control" name="sale" placeholder=""
                  value="<?php echo $row_capnhat['sale'] ?>" required="">
              </div>

              <div class="form-group">
                <label>Th??? lo???i</label>
                <input type="text" class="form-control" name="category_id" placeholder=""
                  value="<?php echo $row_capnhat['category_id'] ?>" required="">
              </div>

              <div class="form-group">
                <label>S??? l?????ng</label>
                <input type="text" class="form-control" name="quantity" placeholder=""
                  value="<?php echo $row_capnhat['quantity'] ?>" required="">
              </div>

    
              <div class="form-group">
                <label>K??ch th?????c</label>
                <input type="text" class="form-control" name="display" placeholder=""
                  value="<?php echo $row_capnhat['display'] ?>" required="">
              </div>
              <div class="form-group">
                <label>Ram</label>
                <input type="text" class="form-control" name="ram" placeholder=""
                  value="<?php echo $row_capnhat['ram'] ?>" required="">
              </div>
              <div class="form-group">
                <label>Rom</label>
                <input type="text" class="form-control" name="rom" placeholder=" "
                  value="<?php echo $row_capnhat['rom'] ?>" required="">
              </div>
              <div class="form-group">
                <label>CPU</label>
                <input type="text" class="form-control" name="cpu" placeholder=" "
                  value="<?php echo $row_capnhat['cpu'] ?>" required="">
              </div>

              <div class="form-group">
                <label>Camera tr?????c</label>
                <input type="text" class="form-control" name="camera_front" placeholder=""
                  value="<?php echo $row_capnhat['camera_front'] ?>" required="">
              </div>

              <div class="form-group">
                <label>Camera sau</label>
                <input type="id" class="form-control" name="rear_camera" placeholder=""
                  value="<?php echo $row_capnhat['rear_camera'] ?>" required="">
              </div>

              <div class="form-group">
                <label>Ch??p ????? h???a</label>
                <input type="text" class="form-control" name="graphics_chip" placeholder=""
                  value="<?php echo $row_capnhat['graphics_chip'] ?>" required="">
              </div>

              <div class="form-group">
                <label>H??? ??i???u h??nh</label>
                <input type="id" class="form-control" name="operating_system" placeholder=""
                  value="<?php echo $row_capnhat['operating_system'] ?>" required="">
              </div>

              <div class="form-group">
                <label>Tr???ng th??i</label>
                <input type="id" class="form-control" name="status" placeholder=""
                  value="<?php echo $row_capnhat['status'] ?>" required="">
              </div>
              <div class="form-group">
                <label class="control-label mb-1">???nh ?????i di???n: </label>
                <input class="form-control" type="file" name="avatar">
              </div>

           
              <a class="btn btn-primary"href="../Product/add_img.php">S???a ???nh ph???</a>
              <input type="submit" name="updateNews" value="C???P NH???T" class="btn btn-primary">
              <a class="btn btn-default"href="../Product/list_of_products.php">H???Y</a>
              
              <!-- <input type="submit" name="huy" value="H???Y" class="btn btn-default"> -->

            </form>
          </div>



        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
</div>
<?php

include '../teamplate1/script.php';
?>