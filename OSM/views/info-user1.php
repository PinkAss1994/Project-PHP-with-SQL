<?php 
session_start();
    require_once("../autoload/autoload.php");
    if (!isset($_SESSION['id'])) {
        redirect_to('views/dang-nhap1.php');
    }
    $db = new My_Model();
    $user = $db->fetchwhere('db_user','id = "'.$_SESSION['id'].'"');
?>
<!DOCTYPE html>
<html lang="vn">
<?php  require_once __DIR__."/teamplate/head1.php"; ?>
<style>
    td{
        padding-bottom: 18px;
    }
</style>

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
                            <li class="active"><a href="info-user1.php">Thông tin khách hàng</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Breadcrumbs -->
    <div class="container">
        <div class="row">
            <div class="col-sm-7 inform-user">
            <h3 class="infom">Thông Tin Người Dùng</h3>

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
                <table style="width: 100%" class="info-user">
                    <tbody>
                        <tr class="infom-tr" >
                            <td>Họ và tên : </td>
                            <td> <?php echo $user[0]['name'] ?> </td>
                        </tr>
                        <tr class="infom-tr" >
                            <td>Email : </td>
                            <td> <?php echo $user[0]['email'] ?> </td>
                        </tr>
                        <tr class="infom-tr" >
                            <td>Số điện thoại : </td>
                            <td> <?php echo "0".$user[0]['phone'] ?> </td>
                        </tr>

                        <tr class="infom-tr" >
                            <td>Địa chỉ : </td>
                            <td> <?php echo $user[0]['address'] ?> </td>
                        </tr>

                    </tbody>
                </table>



            </div>
            <div class="col-sm-5">
            <h3 class="infom">Danh Sách Thông Tin</h3>
            <div class="main-posts">
                <div class="">
                    <ul>
                        <li class="list-info-user" ><a class="list-info" href="danh-sach-don-hang1.php">Danh sách đơn hàng </a></li>
                        <li class="list-info-user" ><a class="list-info"  href="doi-mat-khau1.php">Đổi mật khẩu </a></li>
                        <li class="list-info-user" ><a class="list-info"  href="chinh-sua-thong-tin-user.php">Chỉnh sửa thông tin</a></li>
                    </ul>
                </div>
            </div>

            </div>
        </div>
    </div>
<?php  require_once __DIR__."/teamplate/footer1.php"; ?>
</body>

</html>