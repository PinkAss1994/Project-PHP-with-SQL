<?php 
session_start();
    require_once("../autoload/autoload.php");

    $db = new My_Model();
     if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            // bat dau tien hanh su ly form
            $errors = array();
            $data = array();

            // kiem tra xem nguoi dung co nhap dung password
            if(isset($_POST['password']) && preg_match('/^[\w\'.-]{2,20}$/i',trim($_POST['password'])))
            {
                $password = md5($_POST['password']);
                // neu mat khau trung khop thi lu vao csdl
  
            }else
            {
                // mat khau khong trung khop thi thong bao ra ngoai
                    $errors[] = "password";
            }
            
            if(empty($_POST['password']))
            {
                $errors[] = "password";
            }
            
            // kiem tra email co ton tai va dung dinh dang 
            if(isset($_POST['email'])&& filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
            {
                $email = $_POST['email'];
            }
            else
            {
                $errors[] = "email";
            }
            
            
            
            
            // neu cac truong deu ton tai thi ta tien hanh Insert vào csdl
            if(empty($errors))
            {
               
                $datas = $db->fetchwhere('db_user','email = "'.$email.'" AND password = "'.$password.'"' );
                
                if(!empty($datas))
                {
                    foreach($datas as $value)
                    {
                        // $_SESSION['success']      = " Chúc mừng bạn đã đăng nhập thành công";
                        header("Location: index.php");
                        $_SESSION['id'] = $value['id'];
                        $_SESSION['name'] = $value['name'];
                        $_SESSION['email'] = $value['email'];
                        // $_SESSION['role_id'] = $value['role_id'];
                        $_SESSION['phone']   = $value['phone'];
                        $_SESSION['address'] = $value['address'];
                    }
                } else {
                    $_SESSION['error'] = "Tài khoản hoặc mật khẩu không đúng!";
                }
                
                
                
            

                
           
            }
        }

   
    
?>
<!DOCTYPE html>
<html lang="vn">

<?php  require_once __DIR__."/teamplate/head1.php"; ?>
<body class="js">
    <!-- header -->
    <?php  require_once __DIR__."/teamplate/header-sub.php"; ?>
    <!-- END header -->
        <!-- Breadcrumbs -->
        <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="index.php">Trang Chủ<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="dang-nhap1.php">Đăng Nhập</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Breadcrumbs -->

    <div class="container">
        <h2 class="text-center" style="padding-bottom: 30px;padding-top: 15px;">Đăng Nhập</h2>
        <form action="" method="POST" class="text-center">
                            <?php 
                                        if(isset($_SESSION['success']))
                                        {
                                            echo "<h1 class ='success'> ".$_SESSION['success']."</h1>";
                                            unset($_SESSION['success']);

                                        }


                                        if(isset($_SESSION['error']))
                                        {
                                            echo "<span class='error' style='color:red;'> ".$_SESSION['error']."</span>";
                                            unset($_SESSION['error']);
                                            
                                        }
                                     ?>
                            <div class="login-form">
                                <label for="username">Email</label>
                                <input type="text" id="username" name="email">
                                <?php
                                                    if(isset($errors) && in_array('email',$errors))
                                                    {
                                                        echo"<br><span class='warning mgl-255'style='color:red;' > Mời bạn nhập vào email .</span>";
                                                    }
                                                ?>
                            </div>
                            <div class="login-form" style="margin-left:-25px; padding-top: 10px;">
                                <label for="password">Mật Khẩu</label>
                                <input type="password" id="password" name="password">
                                <?php
                                                    if(isset($errors) && in_array('password',$errors))
                                                    {
                                                        echo"<br><span class='warning mgl-255' style='color:red;'> Mật khẩu không trùng khớp .</span>";
                                                    }
                                                ?>
                            </div>

                            <div id="lower" style="padding-top:20px;">

                                <!-- <input class="btn btn-primary" type="submit" value="Đăng Nhập"> -->
                                <button type="submit" class="button button5">Đăng Nhập</button>
                            </div>
                            <br>
                            <div class="under-login">
                                <a href="dang-ky1.php">Chưa có tài khoản? Đăng ký</a>
                            </div>

                            <!--/ lower-->
                        </form>
    </div>
     <!-- footer -->
     <?php  require_once __DIR__."/teamplate/footer1.php"; ?>
    <!-- End footer -->
</body>
</html>