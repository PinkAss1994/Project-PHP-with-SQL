<?php
include '../teamplate1/head.php';
?>
<?php
include '../teamplate1/header.php';
require('../../../lib/mysqli_connect.php');
?>


<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
  
    $id_update = $_GET['id'];
    $name = $_POST['name'];
    $created_at = $_POST['created_at'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $payment = $_POST['payment'];
    $shipping = $_POST['shipping'];
    // $status = $_POST['status'];
    // $status = $_POST['status'];
    // $status = $_POST['status'];
    $status = $_POST['status'];
        $query = 'UPDATE transaction SET  status=? WHERE id=?';
        $stmt = $conn->stmt_init();
        $stmt->prepare($query);
        // bind valus to SQL Statement
        $stmt->bind_param('ii',  $status, $id_update);
        // execute query
        $stmt->execute();
        if ($stmt->affected_rows == 1) { // update ok
            header('Location: list_order.php');
        } else {
            echo $stmt->error;
        }

}
?>

<div class="page-container">
  <div class="main-content">
    <div class="section__content section__content--p30">
      <div class="container-fluid">
        <div class="right_col" role="main">
          <h4>Cập nhật trạng thái</h4>

          <?php
                    if (isset($_GET['id']))
                        $id_capnhat = $_GET['id'];
                    $sql_capnhat = mysqli_query($conn, "SELECT * FROM transaction WHERE id='$id_capnhat'");
                    $row_capnhat = mysqli_fetch_array($sql_capnhat);
                    ?>

          <div class="col-md-12 card ">
            <form class="form" action="" method="POST" enctype="multipart/form-data">


              <div class="form-group">
                <label>Tên khách hàng</label>
                <input type="id" class="form-control" name="name" placeholder=""
                  value="<?php echo $row_capnhat['name'] ?>" required="">
              </div>
              <div class="form-group">
                <label>Số điện thoại</label>
                <input type="id" class="form-control" name="phone" placeholder=""
                  value="<?php echo $row_capnhat['phone'] ?>" required="">
              </div>
              <div class="form-group">
                <label>Địa chỉ</label>
                <input type="id" class="form-control" name="address" placeholder=""
                  value="<?php echo $row_capnhat['address'] ?>" required="">
              </div>
              <div class="form-group">
                <label>Thanh toán</label>
                <input type="id" class="form-control" name="payment" placeholder=""
                  value="<?php echo $row_capnhat['payment'] ?>" required="">
              </div>  
              <div class="form-group">
                <label>Giao hàng</label>
                <input type="id" class="form-control" name="shipping" placeholder=""
                  value="<?php echo $row_capnhat['shipping'] ?>" required="">
              </div>  

               <div class="form-group">
                <label>Trạng thái</label>
                <input type="id" class="form-control" name="status" placeholder="Nhập trạng thái"
                  value="<?php echo $row_capnhat['status'] ?>" required="">
              </div>  

              <input type="submit" name="updateNews" value="CẬP NHẬT" class="btn btn-default">
              <a class="btn btn-default"href="../Order/list_order.php">HỦY</a>
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