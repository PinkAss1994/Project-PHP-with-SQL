<?php
try {
    // check for a valid user ID , through GET or POST
    if ((isset($_GET['id'])) && (is_numeric($_GET['id']))) {
        $id = htmlspecialchars($_GET['id'] , ENT_QUOTES);
    }
    else{
        // no valid ID , kill the script , return to login page
        header("location: ../list_customer.php");
        exit(); 
    }
    require('../../../lib/mysqli_connect.php');
    // use prepaer sratement to remove security problems
    $stmt = $conn->stmt_init();
    $query = "UPDATE  db_user SET active = 0 WHERE id=?";
    $stmt->prepare($query);
    // bind $id to SQL Statement
    $stmt->bind_param("i", $id);
    // execute query
    $stmt->execute();
    
    if ($stmt->affected_rows == 1) { // it ran ok
        echo '<h3 class = "text-center"> Người dùng đã được ẩn.</h3>';
        echo '<td><a href="../Customer/list_customer.php?id=' . $id . '">Quay lại </a></td> ';
    }
    else {
        echo '<p class = "text-center"> Không thể ẩn người dùng</p>';
        echo '<td><a href="../Customer/list_customer.php?id=' . $id . '">Quay lại </a></td> ';
    }
    $stmt->close();
    $conn->close();
    // header("location: admin-page.php");
} catch (Exception $e) {
    print "An Exception occurred. Message: " . $e->getMessage();
}

?>
