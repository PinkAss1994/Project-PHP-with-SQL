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
            
           
            
            // neu cac truong deu ton tai thi ta tien hanh Insert v??o csdl
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

                    $_SESSION['error'] = "T??i kho???n email ???? t???n t???i";
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
                            <li><a href="index.php">Trang Ch???<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="dang-ky1.php">????ng K??</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Breadcrumbs -->

    <div class="container">
        <h2 class="text-center"> ????ng K?? Th??nh Vi??n</h2>
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


                                    <!-- <label for="name"> H??? v?? T??n</label> -->


                                    <input type="text" name="name" size="40" placeholder="H??? V?? T??n">
                                    <?php
                                                        if(isset($errors) && in_array('name',$errors))
                                                        {
                                                            echo"<br><span class='warning mgl-255' style='color:red;'> M???i b???n nh???p v??o h??? v?? t??n .</span>";
                                                        }
                                                    ?>

                                </div>
                                <div class="login-form">


                                    <!-- <label for="email"> Email</label> -->


                                    <input type="text" name="email" size="40" placeholder="?????a Ch??? Email">
                                    <?php
                                                    if(isset($errors) && in_array('email',$errors))
                                                    {
                                                        echo"<br><span class='warning mgl-255' style='color:red;'> M???i b???n nh???p v??o email .</span>";
                                                    }
                                                ?>

                                </div>

                                <div class="login-form">


                                    <!-- <label for="password"> M???t Kh???u</label> -->


                                    <input type="password" name="password" size="40" placeholder="M???t Kh???u">
                                    <?php
                                                    if(isset($errors) && in_array('password',$errors))
                                                    {
                                                        echo"<br><span class='warning mgl-255' style='color:red;'> M???t kh???u kh??ng tr??ng kh???p .</span>";
                                                    }
                                                ?>

                                </div>
                                <div class="login-form">


                                    <!-- <label for="password"> Nh???p L???i M???t Kh???u</label> -->


                                    <input type="password" name="rpassword" size="40" placeholder="Nh???p L???i M???t Kh???u">
                                    <?php
                                                    if(isset($errors) && in_array('password',$errors))
                                                    {
                                                        echo"<br><span class='warning mgl-255' style='color:red;'> M???t kh???u kh??ng tr??ng kh???p .</span>";
                                                    }
                                                ?>

                                </div>

                                <div class="login-form">


                                    <!-- <label for="phone"> S??? ??i???n Tho???i</label> -->


                                    <input type="text" name="phone" size="40" placeholder="S??? ??i???n Tho???i">

                                    <?php
                                                    if(isset($errors) && in_array('phone',$errors))
                                                    {
                                                        echo"<br><span class='warning mgl-255' style='color:red;'> Nh???p v??o s??? ??i???n tho???i kh??ng ???????c ????? tr???ng .</span>";
                                                    }
                                                ?>
                                </div>
                                <div class="login-form">


                                    <!-- <label for="address"> ?????a Ch???</label> -->


                                    <input type="text" name="address" size="40" placeholder="?????a Ch???">

                                    <?php
                                                    if(isset($errors) && in_array('address',$errors))
                                                    {
                                                        echo"<br><span class='warning mgl-255' style='color:red;'> Nh???p v??o ?????a ch??? kh??ng ???????c ????? tr???ng .</span>";
                                                    }
                                                ?>
                                </div>





                                <div id="lower">
                                    <!-- <input class="btn btn-primary" type="submit" value="????ng K??"> -->

                                    <button type="submit" class="button button5">????ng Nh???p</button>
                                    <!-- <p class="submit cart-summary" id="sub">
                                            <input class="button" type="submit" value="????ng K??">
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