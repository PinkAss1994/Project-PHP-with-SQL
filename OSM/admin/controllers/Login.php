
<?php
try {
    require('../../lib/mysqli_connect.php');
    // check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT email , password FROM admin  WHERE email = '".$email ."'" ;
    $result = $conn->query($query);
  
    $count = $result->num_rows;
    
    $row = $result->fetch_array(MYSQLI_NUM);

    if ($count == 1) 
    {
        
        if ($password == $row[1]) 
        {
            session_start();
            $_SESSION['admin'] = $email;
            header('Location: ../views/home_page.php');
            exit();
        }
        else
        { // if it did not run OK.
            echo '<a href="../views/index.php">Sai mật khuẩn vui lòng thử lại</a>';
            
        }
       
    }
    else
    {
            echo "Chưa có email";
        }

} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
// close statement and connection
$stmt->close();
$conn->close();
?>
