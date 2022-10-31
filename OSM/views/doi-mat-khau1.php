<?php 
session_start();
    require_once("../autoload/autoload.php");

    if (!isset($_SESSION['id'])) {
        redirect_to('views/dang-nhap1.php');
    }
    $db = new My_Model();

     if($_SERVER['REQUEST_METHOD'] == 'POST')
        {

            // bat dau tien hanh su ly form
            $errors = array();
            $data = array();
            

            if(empty($_POST['password']))
            {
                $errors[] = "password";
            }
            if(empty($_POST['rpassword']))
            {
                $errors[] = "rpassword";
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

            if (empty($_POST['password'])) {
                $errors[] = "password_present";
            } else {
                $password_present = md5($_POST['password_present']);
            }

            // neu cac truong deu ton tai thi ta tien hanh Insert vào csdl
            if(empty($errors))
            {
               
                $datas = $db->fetchwhere('db_user','password = "'.$password_present.'"');
                
                if(!empty($datas))
                {

                    if($db->update('db_user', $data,array("id" => $_SESSION['id']))){
                        $_SESSION['success'] = " Đổi mật khẩu thành công";
                        
                    }
                }else
                {

                    $_SESSION['error'] = "Mật khẩu hiện tại không chính xác";
                }
            }
        }

   
    
?>
<!DOCTYPE html>
<html lang="vn">
<?php  require_once __DIR__."/teamplate/head1.php"; ?>

<body class="js">

    <?php  require_once __DIR__."/teamplate/header-sub.php"; ?>

    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="index.php">Trang Chủ<i class="ti-arrow-right"></i></a></li>
                            <li class="active">Đổi Mật Khẩu</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Breadcrumbs -->

    <div class="container">
        <h3 class="infom text-center">Thay Đổi Mật Khẩu</h3>
        <div class="row">
            <div class="col-lg-12">

                <form class="" action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                    <?php 
                                        if(isset($_SESSION['success']))
                                        {
                                            echo "<h1 class ='success'> ".$_SESSION['success']."</h1>";
                                            unset($_SESSION['success']);

                                        }


                                        if(isset($_SESSION['error']))
                                        {
                                            echo "<h1 class='error'> ".$_SESSION['error']."</h1>";
                                            unset($_SESSION['error']);
                                            
                                        }
                                     ?>
                    <div class="entry-content">
                        <div class="d-flex justify-content-center pass">

                            
                            <div class="inputs">
                                <input type="password" name="password_present" size="30" placeholder="Mật Khẩu Cũ">
                                <?php
                                                        if(isset($errors) && in_array('password_present',$errors))
                                                        {
                                                            echo"<br><span class='warning mgl-255' >Vui lòng nhập vào mật khẩu hiện tại.</span>";
                                                        }
                                                    ?>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center pass">
                            
                            <div class="inputs">
                                <input type="password" name="password" size="30" placeholder="Mật Khẩu Mới">
                                <?php
                                                    if(isset($errors) && in_array('password',$errors))
                                                    {
                                                        echo"<br><span class='warning mgl-255' > Mật khẩu không trùng khớp .</span>";
                                                    }
                                                ?>
                            </div>
                        </div>

                        




                        <div class="d-flex justify-content-center pass">
                            
                            <div class="inputs">
                                <input type="password" name="rpassword" size="30" placeholder="Nhập Lại Mật Khẩu">
                                <?php
                                                    if(isset($errors) && in_array('password',$errors))
                                                    {
                                                        echo"<br><span class='warning mgl-255' > Mật khẩu không trùng khớp .</span>";
                                                    }
                                                ?>
                            </div>
                        </div>
                        <div class="text-center but">



                            <button type="submit" class="button button5">Thay Đổi</button>
                            <!-- <input class="button" type="submit" value="Thay Đổi"> -->


                        </div>



                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php  require_once __DIR__."/teamplate/footer1.php"; ?>
</body>

</html>