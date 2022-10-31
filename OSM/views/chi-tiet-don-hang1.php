<?php
session_start();
  require_once("../autoload/autoload.php");
  
    
    class Transaction extends My_Model
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function getDataUser($id)
        {
            $where = 'id = '.$id;
            return $data = parent::fetchwhere('transaction',$where);
        }

        public function getDataOrder($id)
        {
            $where = 'transaction_id = '.$id;
            return $data = parent::fetchwhere('ordere',$where);
        }
    }
    $id = intval($_GET['id']);
    $dataTransaction = new Transaction();

    $dataUser = $dataTransaction->getDataUser($id);
    $dataOrdere = $dataTransaction->getDataOrder($id);
    
    if (empty($dataUser) || empty($dataOrdere)) {
        $_SESSION['error'] = "Đơn hàng không tồn tại .";
        rdr_url("index.php"); 
    }
    // pre($dataOrdere);
?>
<!DOCTYPE html>
<html lang="vn">

<?php  require_once __DIR__."/teamplate/head1.php"; ?>
<style>
.border-none td {
    font-size: 14px;
    font-weight: 600;
    border-top: none !important;
    border-left: none !important;
}

.icon-home {
    color: #d85827;
    font-size: 20px;
}

.icon-print {
    color: #d85827 !important;

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
                            <li class="active"><a href="#">Chi Tiết Đơn Hàng</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Breadcrumbs -->
    <div class="container">
        <h1 style="text-transform: uppercase; text-align: center;">Đơn hàng </h1>
        <br>
        
        <div class="row">
        <!-- <div class=" col-lg-12  col-12 home">
                <a href="index.php" title="Về Trang Chủ">
                <i class="fas fa-arrow-alt-left"> home</i>
                </a>
            </div> -->

            <div class="col-lg-12 col-12">
                <table class="table border-none ">

                    <tr>
                        <td width=20%>Mã đơn hàng :</td>
                        <td><?php echo $dataUser[0]['id'] ?> </td>
                    </tr>
                    <tr>
                        <td width=20%>Tên người nhận :</td>
                        <td><?php echo $dataUser[0]['name'] ?> </td>
                    </tr>
                    <tr>
                        <td>Hình thức thanh toán:</td>
                        <td><?php echo $dataUser[0]['payment'] ?> </td>
                    </tr>
                    <tr>
                        <td>Đơn vị giao hàng</td>
                        <td><?php echo $dataUser[0]['shipping'] ?> </td>
                    </tr>

                    <tr>
                        <td>Địa chỉ nhận hàng :</td>
                        <td><?php echo $dataUser[0]['address'] ?> </td>
                    </tr>
                    <tr>
                        <td>Số điện thoại :</td>
                        <td><?php echo $dataUser[0]['phone'] ?> </td>
                    </tr>
                    <tr>
                        <td>Tổng tiền :</td>
                        <td><?php echo number_format($dataUser[0]['amount']) ?> <sup>vnđ</sup></td>
                    </tr>
                    <tr>
                        <td>Ngày lập :</td>
                        <td><?php echo $dataUser[0]['created_at'] ?> </td>
                    </tr>

                </table>
            </div>
            <div class="col-lg-12 col-12">
                <table class="table">

                    <thead>
                        <tr>

                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($dataOrdere as $key => $value): ?>
                        <tr>

                            <td><?php echo $value['name'] ?> </td>
                            <td><?php echo number_format($value['price']) ?> <sup>vnđ</sup></td>
                            <td><?php echo $value['quantity'] ?> </td>
                            <td><?php echo number_format($value['amount']) ?> <sup>vnđ</sup></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <br>
                <br>



            </div>


            <!-- <div class="container_swap">
                    <div class="home">
                        <a href="index.php" title="Về Trang Chủ">
                            <span class="glyphicon glyphicon-home"></span>
                        </a>
                    </div>
                    <div class="prints">
                        <i id="print" class="glyphicon glyphicon-print" title="In đơn hàng"
                            style="font-size: 20px; color:#A0522D;" onclick=" window.print()"></i>
                    </div>

                </div> -->
            


        </div>
    </div>



    <script type="text/javascript">
    (function($) {
        $(document).ready(function() {
            var main = $('#form');

            // Tabs
            main.contentTabs();

            $('.prints') click(function() {
                $('#print').hide();
            });
        });
    })(jQuery);
    </script>
    <?php  require_once __DIR__."/teamplate/footer1.php"; ?>
</body>

</html>