<?php 
session_start();
    require_once("../autoload/autoload.php");
    if (isset($_SESSION['id'])) {
        redirect_to('views/index.php');
    }
    $db = new My_Model();
     if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            // bat dau tien hanh su ly form
            $errors = array();
            $data = array();
            // kiem tra xem nguoi dung da nhap vao ten hay chua
            if(!empty($_POST['name']))
            {
                $data['name'] = $_POST['name'];
            }
            else
            {
                $errors[]= "name";
            }
            // kiem tra xem nguoi dung co nhap dung password
            if(isset($_POST['password']) && preg_match('/^[\w\'.-]{2,20}$/i',trim($_POST['password'])))
            {
                // neu mat khau trung khop thi lu vao csdl
                if($_POST['password'] == $_POST['rpassword'])
                {
                    $data['password'] = md5($_POST['rpassword']);
                }
                else
                {
                    // mat khau khong trung khop thi thong bao ra ngoai
                    $errors[] = "password";
                }
            }
            
            if(empty($_POST['password']))
            {
                $errors[] = "password";
            }
            if(empty($_POST['rpassword']))
            {
                $errors[] = "rpassword";
            }
            // kiem tra email co ton tai va dung dinh dang 
            if(isset($_POST['email'])&& filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
            {
                $data['email'] = $_POST['email'];
            }
            else
            {
                $errors[] = "email";
            }
            
            //kiem tra xem nguoi dung co nhap vao que
            if(!empty($_POST['address']))
            {
                $data['address'] = $_POST['address'];
                
            }
            else
            {
                $errors[] = "address";
                
            }
            // kiem tra nguoi dung co nhap vao so dien thoai 
            if(!empty($_POST['phone']))
            {
                $data['phone'] = trim($_POST['phone']);
            }
            else
            {
                $errors[]= "phone";
            }
            
            // $data['role_id'] = 3;
            
           
            
            // neu cac truong deu ton tai thi ta tien hanh Insert vào csdl
            if(empty($errors))
            {
               
                $datas = $db->fetchwhere('db_user','email = "'.$data['email'].'"');
                
                if(empty($datas))
                {
                    if($db->insert('db_user',$data)){
                        // echo"<a class="btn btn-success" onclick="toastr.success('Hi! I am success message.');">Success message</a>";
                        header("Location: dang-nhap1.php");
                    }
                }else
                {

                    $_SESSION['error'] = "Tài khoản email đã tồn tại";
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
                            <li class="active"><a href="dang-ky1.php">Đăng Ký</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Breadcrumbs -->

    <div class="container">
        <h2 class="text-center"> Đăng Ký Thành Viên</h2>
        <form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data" class="text-center">
                            <?php 
                                        if(isset($_SESSION['success']))
                                        {
                                            echo "<h1 class ='success'> ".$_SESSION['success']."</h1>";
                                            unset($_SESSION['success']);

                                        }


                                        if(isset($_SESSION['error']))
                                        {
                                            echo "<span class='error' style='color: red;'> ".$_SESSION['error']."</span>";
                                            unset($_SESSION['error']);
                                            
                                        }
                                     ?>
                            <div class="entry-content">
                                <div class="login-form">


                                    <!-- <label for="name"> Họ và Tên</label> -->


                                    <input type="text" name="name" size="40" placeholder="Họ Và Tên">
                                    <?php
                                                        if(isset($errors) && in_array('name',$errors))
                                                        {
                                                            echo"<br><span class='warning mgl-255' style='color:red;'> Mời bạn nhập vào họ và tên .</span>";
                                                        }
                                                    ?>

                                </div>
                                <div class="login-form">


                                    <!-- <label for="email"> Email</label> -->


                                    <input type="text" name="email" size="40" placeholder="Địa Chỉ Email">
                                    <?php
                                                    if(isset($errors) && in_array('email',$errors))
                                                    {
                                                        echo"<br><span class='warning mgl-255' style='color:red;'> Mời bạn nhập vào email .</span>";
                                                    }
                                                ?>

                                </div>

                                <div class="login-form">


                                    <!-- <label for="password"> Mật Khẩu</label> -->


                                    <input type="password" name="password" size="40" placeholder="Mật Khẩu">
                                    <?php
                                                    if(isset($errors) && in_array('password',$errors))
                                                    {
                                                        echo"<br><span class='warning mgl-255' style='color:red;'> Mật khẩu không trùng khớp .</span>";
                                                    }
                                                ?>

                                </div>
                                <div class="login-form">


                                    <!-- <label for="password"> Nhập Lại Mật Khẩu</label> -->


                                    <input type="password" name="rpassword" size="40" placeholder="Nhập Lại Mật Khẩu">
                                    <?php
                                                    if(isset($errors) && in_array('password',$errors))
                                                    {
                                                        echo"<br><span class='warning mgl-255' style='color:red;'> Mật khẩu không trùng khớp .</span>";
                                                    }
                                                ?>

                                </div>

                                <div class="login-form">


                                    <!-- <label for="phone"> Số Điện Thoại</label> -->


                                    <input type="text" name="phone" size="40" placeholder="Số Điện Thoại">

                                    <?php
                                                    if(isset($errors) && in_array('phone',$errors))
                                                    {
                                                        echo"<br><span class='warning mgl-255' style='color:red;'> Nhập vào số điện thoại không được để trống .</span>";
                                                    }
                                                ?>
                                </div>
                                <div class="login-form">


                                    <!-- <label for="address"> Địa Chỉ</label> -->


                                    <input type="text" name="address" size="40" placeholder="Địa Chỉ">

                                    <?php
                                                    if(isset($errors) && in_array('address',$errors))
                                                    {
                                                        echo"<br><span class='warning mgl-255' style='color:red;'> Nhập vào địa chỉ không được để trống .</span>";
                                                    }
                                                ?>
                                </div>





                                <div id="lower">
                                    <!-- <input class="btn btn-primary" type="submit" value="Đăng Ký"> -->

                                    <button type="submit" class="button button5">Đăng Nhập</button>
                                    <!-- <p class="submit cart-summary" id="sub">
                                            <input class="button" type="submit" value="Đăng Ký">
                                        </p> -->
                                    <!-- > -->
                                </div>



                            </div>
                        </form>
    </div>
    <!-- footer -->
    <?php  require_once __DIR__."/teamplate/footer1.php"; ?>
    <!-- End footer -->
</body>
</html>