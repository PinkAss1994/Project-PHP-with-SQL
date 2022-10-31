<?php 
session_start();
    require_once("../autoload/autoload.php");
?>
<!DOCTYPE html>
<html lang="vn">


    <?php  require_once __DIR__."/teamplate/head1.php"; ?>


<body class="js">
    <!-- Preloader -->
    <!-- <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div> -->
    <!-- End Preloader -->
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
                            <li class="active"><a href="gio-hang1.php">Giỏ Hàng</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Breadcrumbs -->

    <!-- Shopping Cart -->
    <div class="shopping-cart section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Shopping Summery -->
                    <table class="table shopping-summery">
                        <thead>
                            <tr class="main-hading">
                                <th>SẢN PHẨM</th>
                                <th>TÊN</th>
                                <th class="text-center">ĐƠN GIÁ</th>
                                <th class="text-center">SỐ LƯỢNG</th>
                                <th class="text-center">TỔNG</th>
                                <th class="text-center"><i class="fa fa-refresh"></i></th>
                                <th class="text-center"><i class="ti-trash remove-icon"></i></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($_SESSION['cart'])): ?>

                            <?php foreach($_SESSION['cart'] as $key =>$value): ?>

                            <tr>
                                <td class="image" data-title="ẢNH"><img
                                        src="../upload/product/<?php echo $value['image']?> " alt="#"></td>
                                <td class="product-des" data-title="SẢN PHẨM">
                                    <p class="product-name"> <a
                                            href="chi-tiet-san-pham.php?id=<?php echo $value['product_id']?>"
                                            title="<?php echo $value['name']?>"><?php echo $value['name']?></a></p>
                                    <p class="product-des"><?php echo $value['content']?></p>
                                </td>
                                <td class="price" data-title="GIÁ">
                                    <span><?php echo number_format($value['price']) ?><sup>vnđ</sup> </span>
                                </td>
                                <td class="qty" data-title="SỐ LƯỢNG">
                                    <!-- Input Order -->
                                    <div class="input-group">
                                        <div class="button minus" style="margin-top: -18px;">
                                            <button type="button" class="btn btn-primary btn-number"
                                                data-type="minus" data-field="quant[3]">
                                                <i class="ti-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" name="quant[3]" class="input-number" data-min="1"
                                            data-max="100" id='quantity_<?php echo $value['product_id'] ?>'
                                            value="<?php echo $value['quantity'] ?>" min="1">
                                        <div class="button plus" style="margin-top: -18px;">
                                            <button type="button" class="btn btn-primary btn-number" data-type="plus"
                                                data-field="quant[3]">
                                                <i class="ti-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!--/ End Input Order -->
                                </td>
                                <td class="total-amount" data-title="TỔNG"><span>
                                        <?php echo number_format($value['amount']) ?><sup>vnđ</sup></span></td>
                                <td class="action" data-title="CẬP NHẬT" > <a href="gio-hang1.php" class="button update-cart" type="submit"
                                        data-cart=<?php echo $key ?> value="Update" style=""><i
                                            class="fa fa-refresh"></i></a></td>
                                <td class="action" data-title="XÓA"><a
                                        href="../Controller/them-gio-hang.php?action=delete-cart&id=<?php echo $key ?>"> <i
                                            class="ti-trash remove-icon"></i></a></td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <!--/ End Shopping Summery -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Total Amount -->
                    <div class="total-amount ">
                        <div class="row">
                            <div class="col-lg-8 col-md-5 col-12">
                                <!-- <div class="left">
                                    <div class="coupon">
                                        <form action="#" target="_blank">
                                            <input name="Coupon" placeholder="Enter Your Coupon">
                                            <button class="btn">Nhập</button>
                                        </form>
                                    </div>
                                    <div class="checkbox">
                                        <label class="checkbox-inline" for="2"><input name="news" id="2"
                                                type="checkbox"> Shipping (+10$)</label>
                                    </div>
                                </div> -->
                            </div>
                            <div class="col-lg-4 col-md-7 col-12">
                                <div class="right">
                                    <ul>
                                        <li>Tổng Số Sản Phẩm:<span>

                                                <?php
                                                            if(isset($_SESSION['cart']))
                                                            {
                                                                $qty = 0;
                                                                foreach ($_SESSION['cart'] as $key => $value) {
                                                                    # code...
                                                                    
                                                                    $qty = $qty + $value['quantity'];
                                                                }

                                                                echo $qty;
                                                            }
                                   
                                                        ?>
                                            </span></li>

                                        <li class="last"> THÀNH TIỀN:<span>
                                                <?php 
                                                        $sum = 0;
                                                        if(isset($_SESSION['cart']))
                                                        {
                                                            foreach($_SESSION['cart'] as $val)
                                                            {
                                                                $sum = $sum + $val['amount'];
                                                            }
                                                            echo number_format($sum);
                                                        }
                                                        
                                                    ?>
                                                <sup>vnđ</sup>
                                            </span></li>
                                    </ul>
                                    <div class="button5">
                                        <a href="thanh-toan1.php" class="btn" style="background: none;">Thanh Toán</a>
                                        
                                    </div>
                                    <br>
                                    <div class="button5">
                                    <a href="index.php" class="btn" style="background: none;">Tiếp Tục Mua Sắn</a>
                                    </div>
                                </div>
                                <br>
                                <br>
                            </div>
                        </div>
                    </div>
                    <!--/ End Total Amount -->
                </div>
            </div>
        </div>
    </div>

    <!-- END Shopping Cart -->

    <!-- footer -->
    <?php  require_once __DIR__."/teamplate/footer1.php"; ?>
    <!-- End footer -->
</body>

<script type="text/javascript">
$(function() {
    // alert("OK");
    $update_cart = $(".update-cart");
    $update_cart.click(function() {
        key = $(this).attr('data-cart');
        action = 'update_cart';
        qty = $('#quantity_' + key).val();
        $.ajax({
            url: 'http://localhost:8888/OSM/Controller/them-gio-hang.php',
            type: 'get',
            async: true,
            dataType: 'text',
            data: {
                'key': key,
                'action': action,
                'quantity': qty
            },
            success: function(data) {
                console.log(data);

            }
        });

    });
});
</script>

</html>