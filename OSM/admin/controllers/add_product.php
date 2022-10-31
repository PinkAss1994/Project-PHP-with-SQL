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
 // get form inputs
$name = $_POST['name'];
// echo $product_name;
$price = $_POST['price'];
$category_id = $_POST['category_id'];
$sale = $_POST['sale'];
$content = $_POST['content'];
$quantity = $_POST['quantity'];
$hot = $_POST['hot'];
$display = $_POST['display'];
$ram = $_POST['	ram'];
$rom = $_POST['rom'];
$cpu = $_POST['cpu'];
$camera_front = $_POST['camera_front'];
$rear_camera = $_POST['rear_camera'];
$operating_system = $_POST['operating_system'];
$graphics_chip = $_POST['graphics_chip'];




$avatar = $_FILES['avatar'];




    if (isset($_FILES['avatar'])) {
       
        $errors = array();
        $file_name = $_FILES['avatar']['name'];
        $file_size = $_FILES['avatar']['size'];
        $file_tmp = $_FILES['avatar']['tmp_name'];
        $file_type = $_FILES['avatar']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['avatar']['name'])));

        $expensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $expensions) === false) {
            $errors[] = "Chỉ hỗ trợ upload file JPEG hoặc PNG.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'Kích thước file không được lớn hơn 2MB';
        }
        $image = "../../upload/product/" . $_FILES['avatar']['name'];
        $target = "../../upload/product/" . basename($image);
        // $sql = "INSERT INTO customers (avatar) VALUES ('$image')";
        // mysqli_query($conn, $sql);
        if (move_uploaded_file($_FILES['avatar']['tmp_name'], $target)) {
          
            // echo '<script language="javascript">alert("Đã upload lên sv thành công!");</script>';
            // Make and prepare the query  
            $query = "INSERT INTO product (name, category_id, price, sale, content, quantity, hot,  avatar,operating_system,rom,rear_camera,ram,graphics_chip,display,camera_front,cpu) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
           
            $stmt = $conn->prepare($query);
            $stmt->bind_param("siiisissssssssss",  $name, $category_id, $price,  $sale,  $content, $quantity, $hot,  $file_name, $operating_system, $rom, $rear_camera,$ram, $graphics_chip, $display, $camera_front,$cpu );
            // run and check the query's result
            if ($stmt->execute()) {    // one record inserted			
                echo '<script language="javascript">alert("Thêm sản phẩm thành công!");</script>';
                // echo '<a href="../views/home_page.php">Trang Chủ</a> | <a href = "../views/Product/add_product.php">Tiếp Tục</a>';
                echo ' <a href = "../views/Product/add_product.php">Tiếp Tục</a>| <a href = "../views/Product/add_img.php">Thêm ảnh phụ</a>';
                // echo "Insert OK!";

                exit();
            } else { // if it did not run OK.
                echo '<script language="javascript">alert("Không thể thêm sản phẩm!");</script>';
                echo '<a href="../views/home_page.php">Trang Chủ</a> | <a href = "../views/Product/add_product.php">Thử  lại</a>';
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
