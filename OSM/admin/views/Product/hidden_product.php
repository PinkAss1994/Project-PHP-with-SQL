<?php
try {
    // check for a valid user ID , through GET or POST
    if ((isset($_GET['id'])) && (is_numeric($_GET['id']))) {
        $id = htmlspecialchars($_GET['id'] , ENT_QUOTES);
    }
    else{
        // no valid ID , kill the script , return to login page
        header("location: ../list_of_products.php");
        exit(); 
    }
    require('../../../lib/mysqli_connect.php');
    // use prepaer sratement to remove security problems
    $stmt = $conn->stmt_init();
    $query = "UPDATE  product SET status = 0 WHERE id=?";
    $stmt->prepare($query);
    // bind $id to SQL Statement
    $stmt->bind_param("i", $id);
    // execute query
    $stmt->execute();
    if ($stmt->affected_rows == 1) { // it ran ok
        echo '<h3 class = "text-center">Đã được ẩn.</h3>';
        echo '<td><a href="../Product/list_of_products.php?id=' . $id . '">Quay lại </a></td> ';
    }
    else {
        echo '<p class = "text-center">Sản phẩm này đã ẩn từ trước rồi</p>';
        echo '<td><a href="../Product/list_of_products.php?id=' . $id . '">Quay lại </a></td> ';
    }
    $stmt->close();
    $conn->close();
    // header("location: admin-page.php");
} catch (Exception $e) {
    print "An Exception occurred. Message: " . $e->getMessage();
}
?>
