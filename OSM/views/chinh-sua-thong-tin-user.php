<?php 
session_start();
    require_once("../autoload/autoload.php");
    if (!isset($_SESSION['id'])) {
        redirect_to('views/dang-nhap1.php');
    }
    $db = new My_Model();
    $user = $db->fetchwhere('db_user','id = "'.$_SESSION['id'].'"');

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
            
            // neu cac truong deu ton tai thi ta tien hanh Insert vào csdl
            if(empty($errors))
            {
                if($db->update('db_user', $data, array("id" => $_SESSION['id']))){
                    $_SESSION['success'] = "Chỉnh sửa thông tin thành công.";
                    redirect_to('views/info-user1.php');
                }
            }
        }
?>
<!DOCTYPE html>
<html lang="vi" xml:lang="vi">
<?php  require_once __DIR__."/teamplate/head1.php"; ?>
<style>
    h3{
        margin-top: 40px;
        padding-bottom: 40px;
        text-transform: uppercase;
    }
    .row.form-input{
        padding-bottom: 30px;
    }
</style>
<body class="js">



    <!--  div header -->
    <?php  require_once __DIR__."/teamplate/header-sub.php"; ?>
    <!-- End div header -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="index.php">Trang Chủ<i class="ti-arrow-right"></i></a></li>
                            <li class="active">Thay đổi thông tin</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
    <h3 class="text-center">Chỉnh sửa thông tin thành viên</h3>
        <div class="row">
            


            <form class="text-center" action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                <?php 
                                        if(isset($_SESSION['success']))
                                        {
                                            echo "<h4 class ='success' style='color:green;'> ".$_SESSION['success']."</h4>";
                                            unset($_SESSION['success']);

                                        }


                                        if(isset($_SESSION['error']))
                                        {
                                            echo "<h4 class='error' style='color:red;'> ".$_SESSION['error']."</h4>";
                                            unset($_SESSION['error']);
                                            
                                        }
                                     ?>



                <div class="row form-input">
                    <div class="col-md-3">

                        <label for="name" class="m-0">
                            Họ và tên :
                        </label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" value="<?php echo $user[0]['name'] ?>" name="name" id="name" size="40"
                            class="form-control">
                        <?php
                                                        if(isset($errors) && in_array('name',$errors))
                                                        {
                                                            echo"<br><span class='warning mgl-255' > Mời bạn nhập vào họ và tên .</span>";
                                                        }
                                                    ?>
                    </div>

                </div>
                <div class="row form-input">
                    <div class="col-md-3">

                        <label for="email" class="m-0">
                            Email:
                        </label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="email" id="email"
                            value="<?php echo $user[0]['email'] ?>" size="40" disabled>
                        <?php
                                                    if(isset($errors) && in_array('email',$errors))
                                                    {
                                                        echo"<br><span class='warning mgl-255' > Mời bạn nhập vào email .</span>";
                                                    }
                                                ?>
                    </div>

                </div>
                <div class="row form-input">
                    <div class="col-md-3">
                        <label for="phone" class="m-0">
                            Số Điện Thoại:
                        </label>
                    </div>
                    <div class="col-md-9">
                        <input type="phone" class="form-control" name="phone" id="phone"
                            value="<?php echo "0". $user[0]['phone'] ?>" size="40">
                        <?php
                                                    if(isset($errors) && in_array('phone',$errors))
                                                    {
                                                        echo"<br><span class='warning mgl-255' > Nhập vào số điện thoại không được để trống .</span>";
                                                    }
                                                ?>
                    </div>

                </div>
                <div class="row form-input">
                    <div class="col-md-3">

                        <label for="address" class="m-0">
                            Địa Chỉ:
                        </label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" value="<?php echo $user[0]['address'] ?> "
                            name="address" id="address" size="40">

                        <?php
                        if(isset($errors) && in_array('address',$errors))
                        {
                            echo"<br><span class='warning mgl-255' > Nhập vào địa chỉ không được để trống .</span>";
                        }
                    ?>
                    </div>

                </div>





                <div class="register">
                    <div class="labels">
                    </div>
                    <div class="inputs">
                        <p class="submit cart-summary" id="sub">
                        <button type="submit" class="button button5">Cập Nhật</button>
                            <!-- <input class="button" type="submit" value="Cập nhật"> -->
                        </p>
                    </div>
                </div>




            </form>

        </div>

    </div>

    <!-- div sidebar -->

    <!--  end  div sidebar -->


    <!--  div footer  -->
    <?php  require_once __DIR__."/teamplate/footer1.php"; ?>
    <!--  End div footer  -->

</body>

</html>