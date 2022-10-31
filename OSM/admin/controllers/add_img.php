<?php
include '../teamplate/head.php';
include '../teamplate/header.php';
?>

<?php
try {
    require('../../lib/mysqli_connect.php');
    // check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $product_id = $_POST['product_id'];
    $images = $_FILES['image_name'];
   



    if (isset($_FILES['image_name'])) {
       
        $errors = array();
        $file_name = $_FILES['image_name']['name'];
        $file_size = $_FILES['image_name']['size'];
        $file_tmp = $_FILES['image_name']['tmp_name'];
        $file_type = $_FILES['image_name']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['image_name']['name'])));

        $expensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $expensions) === false) {
            $errors[] = "Chỉ hỗ trợ upload file JPEG hoặc PNG.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'Kích thước file không được lớn hơn 2MB';
        }
        $image = "../../upload/product/" . $_FILES['image_name']['name'];
        $target = "../../upload/product/" . basename($image);
        // $sql = "INSERT INTO customers (images) VALUES ('$image')";
        // mysqli_query($conn, $sql);
        if (move_uploaded_file($_FILES['image_name']['tmp_name'], $target)) {
          
            // echo '<script language="javascript">alert("Đã upload lên sv thành công!");</script>';
            // Make and prepare the query  
            $query = "INSERT INTO images (product_id,image_name) VALUES (?,?)";
           
            $stmt = $conn->prepare($query);
            $stmt->bind_param("is",$product_id, $file_name);
            // run and check the query's result
            if ($stmt->execute()) {    // one record inserted		
              
                echo '<script language="javascript">alert("Thêm sản phẩm thành công!");</script>';
                echo '<a href="../views/home_page.php">Trang Chủ</a> | <a href = "../views/Product/add_product.php">Tiếp thêm sản phẩm</a>| <a href = "../views/Product/add_img.php">Tiếp thêm ảnh cho sản phẩm</a>';
                // echo "Insert OK!";

                exit();
            } else { // if it did not run OK.
                echo '<script language="javascript">alert("Không thể thêm sản phẩm!");</script>';
                echo '<a href="../views/home_page.php">Trang Chủ</a> | <a href = "../views/Product/add_img.php">Thử  lại</a>';
                exit();
            }
        } else {
            echo '<script language="javascript">alert("Đã upload thất bại!");</script>';
        }
    }
} 
catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
?>
<?php

include '../teamplate/script.php';
?>