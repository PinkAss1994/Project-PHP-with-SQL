<?php 
session_start();
    require_once("../autoload/autoload.php");
    if (!isset($_SESSION['id'])) {
        redirect_to('views/dang-nhap1.php');
    }
?>
<!DOCTYPE html>
<html lang="vn">
<?php  require_once __DIR__."/teamplate/head1.php"; ?>

<style>
.single-widget .get-button .content .button {
    background-color: black;
    padding: 16px 32px;
}

.single-widget .get-button .content button:hover {
    background-color: #F7941D;
    color: white;
}
</style>

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
                            <li class="active"><a href="thanh-toan1.php">Thanh Toán</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Breadcrumbs -->
    <!-- Start Checkout -->
    <section class="shop checkout section">
        <div class="container">


            <!-- <p>Địa Chỉ Giao Hàng</p> -->
            <!-- Form -->
            <form class="form" method="POST" action="../Controller/giao-dich.php">
                <?php if(isset($_SESSION['cart'])): ?>

                <div class="message error" style="color: red; font-size: 16px;">
                    <?php echo (isset($_SESSION['error_info']))?$_SESSION['error_info']:""; ?>
                </div>

                <div class="message error" style="color: red; font-size: 16px;">
                    <?php echo (isset($_SESSION['error']))?$_SESSION['error']:""; ?></div>
                <?php 
            if(isset($_SESSION['error_info'])){
            unset($_SESSION['error_info']); } 

            if(isset($_SESSION['error']))
            {
             unset($_SESSION['error']);
            }
        ?>
                <div class="row">



                    <div class="col-lg-8 col-12">
                        <div class="checkout-form">
                            <h2>Địa Chỉ Giao Hàng</h2>

                            <br>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Họ Và Tên<span>*</span></label>
                                        <input type="text" name="name" id="name" placeholder="" required="required"
                                            value=" <?php echo isset($_SESSION['name'])? $_SESSION['name'] : '' ?>">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Email<span>*</span></label>
                                        <input type="email" name="email" id="email" placeholder="" required="required"
                                            value="<?php echo isset($_SESSION['email'])? $_SESSION['email'] : '' ?> ">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Số Điện Thoại<span>*</span></label>
                                        <input type="phone" name="phone" id="phone" placeholder="" required="required"
                                            value="<?php echo isset($_SESSION['phone'])? $_SESSION['phone'] : '' ?> ">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Địa Chỉ Nhận Hàng<span>*</span></label>
                                        <input type="text" name="address" id="address" placeholder=""
                                            required="required"
                                            value="<?php echo isset($_SESSION['address'])? $_SESSION['address'] : '' ?> ">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Ghi Chú<span></span></label>
                                        <textarea id="message" name="message" class="form-control" cols=""
                                            rows="3"></textarea>
                                    </div>
                                </div>

                                <!-- <div class="col-12">
                                    <div class="form-group create-account">

                                        <label><a href="dang-nhap1.php"></a> Đăng Nhập</label>
                                    </div>
                                </div> -->

                            </div>
                            <h2>Đơn Vị Vận Chuyển</h2>
                            <br>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="shipping" name="shipping"
                                        value="GHTK" checked>
                                    <label class="form-check-label">Giao Hàng Tiết Kiệm <span
                                            style="color:red; font-size: 12px;"> (30.000<sup>vnđ</sup>)</span> </label>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="shipping" name="shipping"
                                        value="J&T">
                                    <label class="form-check-label">J&T Express <span
                                            style="color:red; font-size: 12px;"> (30.000<sup>vnđ</sup>)</span></label>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="shipping" name="shipping"
                                        value="ninja">
                                    <label class="form-check-label">Ninja Van <span style="color:red; font-size: 12px;">
                                            (30.000<sup>vnđ</sup>)</span></label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 col-12">
                        <div class="order-details">
                            <!-- Order Widget -->
                            <div class="single-widget">
                                <h2>Thanh Toán</h2>
                                <div class="content">
                                    <?php if(isset($_SESSION['cart'])): ?>


                                    <ul>
                                        <li>Tổng Tiền:<span> <?php 
                                                                                    $sum = 0;
                                                                                    if(isset($_SESSION['cart']))
                                                                                    {
                                                                                        foreach($_SESSION['cart'] as $val)
                                                                                        {
                                                                                            $sum = $sum + $val['amount'];
                                                                                        }
                                                                                        echo number_format($sum);
                                                                                    }
                                                                                    
                                                                                ?> <sup>vnđ</sup></span></li>
                                        <li>Giao hàng:<span>30.000 <sup>vnđ</sup></span></li>
                                        <li class="last">Tổng Thanh Toán:<span> <?php 
                                                                                    $sum = 0;
                                                                                    if(isset($_SESSION['cart']))
                                                                                    {
                                                                                        foreach($_SESSION['cart'] as $val)
                                                                                        {
                                                                                            $sum = $sum + $val['amount'] + 30000;
                                                                                        }
                                                                                        echo number_format($sum); 
                                                                                    }

                                                                                    
                                                                                ?>
                                                <sup>vnđ</sup></span></li>
                                    </ul>
                                    <?php endif; ?>
                                </div>
                                <?php else:?>
                                <div class="message error">Hiện tại giỏ hàng của bạn chưa có sản phẩm nào, bạn có thể
                                    quay về <a href="index.php">chọn sản phẩm</a> trước khi đặt hàng.</div>

                            </div>
                            <?php endif;  ?>
                            <!--/ End Order Widget -->
                            <!-- Order Widget -->
                            <div class="single-widget">
                                <h2>Hình Thức Thanh Toán</h2>
                                <div class="content">
                                    <div class="checkbox">
                                        <label class="checkbox-inline"><input id="payment" name="payment" value="COD"
                                                type="checkbox">COD - Nhận hàng trả tiền</label>
                                        <label class="checkbox-inline"><input id="payment" name="payment"
                                                value="chuyển khoản" type="checkbox">Chuyển Khoản Ngân Hàng</label>

                                    </div>
                                </div>
                            </div>
                            <!--/ End Order Widget -->
                            <!-- Payment Method Widget -->
                            <div class="single-widget payement">
                                <div class="content">
                                    <img src="../upload/payment-method.png" alt="#">
                                </div>
                            </div>
                            <!--/ End Payment Method Widget -->
                            <!-- Button Widget -->
                            <div class="single-widget get-button">
                                <div class="content">


                                    <button type="submit" class="button" name="dathang">Đặt
                                        hàng</button>
                                    <!-- <a href="#" class="btn">Thanh Toán</a> -->

                                </div>
                            </div>
                            <!--/ End Button Widget -->
                        </div>
                    </div>
                </div>
            </form>
            <!--/ End Form -->
        </div>
    </section>
    <!--/ End Checkout -->
    <!-- footer -->
    
    <?php  require_once __DIR__."/teamplate/footer1.php"; ?>
    <!-- End footer -->
</body>

</html>