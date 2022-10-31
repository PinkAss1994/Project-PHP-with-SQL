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
<html>

<head>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="custom.css"> -->
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    body {
        background-color: #EFF8FF;
    }

    h1,
    p {
        margin: 0px;
    }

    .main-section {
        background-color: #FFF;
        border: 1px solid white;
    }

    .header {
        background-color: white;
        padding: 30px 15px 20px 15px;

    }

    .content {
        padding: 20px 15px 20px 15px;
    }

    th {
        background-color: white;
        text-align: right;
    }

    .table td:nth-child(1),
    .table th:nth-child(1) {
        text-align: left;
    }

    .lastSection {
        padding: 20px 15px 30px 15px;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="row main-section">
                    <div class="col-md-12 col-sm-12 header">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <a href="index.php"><img src="../upload/logo1.png" style="width:50%;"></a>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                                <p>Mã đơn hàng #<?php echo $dataUser[0]['id'] ?></p>
                                <span><?php echo $dataUser[0]['created_at'] ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 content">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <h4>Thông Tin Thanh Toán</h4>
                                <p><?php echo $dataUser[0]['name'] ?></p>
                                <p><?php echo $dataUser[0]['mail'] ?></p>
                                <p><?php echo $dataUser[0]['phone'] ?></p>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                                <h4>Địa Chỉ Giao Hàng</h4>
                                <p><?php echo $dataUser[0]['address'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 text-right">
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
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Phí vận chuyển: 30.000<sup>vnđ</sup></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Tổng Giá Trị Đơn Hàng: <?php 
                                                        $sum = 0;
                                                       
                                                            foreach($dataOrdere as $val)
                                                            {
                                                                $sum = $sum + $val['amount'] +30000;
                                                            }
                                                            echo number_format($sum);
                                                        
                                                        
                                                    ?><sup>vnđ</sup></td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12 col-sm-12 lastSection">
                        <p>

                            Qúy khách có thể kiểm tra ngoại quan sản phẩm (nhãn hiệu, mẫu mã, màu sắc, số lượng, ...)
                            trước khi thanh toán và có thể từ chối nhận hàng nếu không ưng ý. Vui lòng không kích hoạt
                            các thiết bị điện máy-điện tử hoặc dùng thử sản phẩm.
                        </p><br>
                        <p>
                            Nếu sản phẩm có dấu hiệu hư hỏng/ bể vỡ hoặc không đúng với thông tin trên website, bạn vui
                            lòng liên hệ với <a href="index.php">OSM</a> trong vòng 48 giờ kể từ thời điểm nhận hàng để được hỗ trợ.

                        </p><br>
                        <p>Qúy khách vui lòng giữ lại hóa đơn, hộp sản phẩm và phiếu bảo hành (nếu có) để đổi trả hàng
                            hoặc bảo hành khi cần thiết.</p><br>
                        <p>Bạn có thể tham khảo thêm tại trang <a href="#">Trung tâm hỗ trợ </a>hoặc liên hệ với <a href="index.php">OSM</a> bằng cách để lại
                            tin nhắn tại trang Liên hệ hoặc gửi thư đến đây. Hotline 1900 6035 (8-21h cả T7,CN).</p><br>
                            <br>
                            <p><a href="index.php">OSM</a> cảm ơn quý khách,</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>