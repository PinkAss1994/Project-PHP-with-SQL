<?php 
session_start();
    require_once("../autoload/autoload.php");

    if (!isset($_SESSION['id'])) {
        redirect_to('views/dang-nhap1.php');
    }

    class ShowData extends My_Model{
        public function __construct(){
            parent::__construct();
        }

        // lấy ra danh sách giao dịch
        public function showTransaction($start,$display)
        {

          $datas = parent::fetchAllpaginaUser('transaction', $start, $display, $_SESSION['email'] );
          foreach ($datas as $key => $value) {
            $where = 'transaction_id = '.$value['id'];
            $datas[$key]['product'] = parent::fetchwhere('ordere', $where);

          }
          return $datas;
        }

        public function countData() {
            $datas = parent::fetchwhere('transaction','email = "'.$_SESSION['email'].'"');
            return count($datas);
        }
    }

    $show_data = new ShowData();

    $display = 10;
    $start = (isset($_GET['s']) && filter_var($_GET['s'],FILTER_VALIDATE_INT,array('min_range'=>1)))?$_GET['s']:0;
    $data_transaction =$show_data ->showTransaction($start,$display);
    $num = $show_data->countData();
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
                            <li class="status">Đơn hàng của bạn</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Breadcrumbs -->
    
    <div class="shopping-cart section">
        
    <h1 class="product-content">Đơn hàng</h1>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php 
                                            if(isset($_SESSION['success'])){

                                                    echo '<div class="message error" style="color: #06a829; font-size: 18px;">'.$_SESSION['success'].'</div>';
                                                    unset($_SESSION['success']);

                                                } elseif(isset($_SESSION['error'])){
                                                     echo '<div class="message error" style="color: red; font-size: 18px;">'.$_SESSION['error'].'</div>';
                                                    unset($_SESSION['error']);

                                                }
                                            ?>
                    <!-- Shopping Summery -->
                    <form action="" method="post" id="shop-cart-form">
                        <table class="table shopping-summery">
                            <thead>
                                <tr class="main-hading">
                                    <th class="text-center"> MÃ ĐƠN HÀNG</th>
                                    <th class="text-center">SẢN PHẨM</th>
                                    <th class="text-center">TỔNG TIỀN</th>
                                    <th class="text-center">TRẠNG THÁI</th>
                                    <th class="text-center">NGÀY LẬI</th>
                                    <th class="text-center">CHI TIẾT</th>
                                    <!-- <th class="text-center"><i class="fa fa-refresh"></i></th>
                                <th class="text-center"><i class="ti-trash remove-icon"></i></th> -->

                                </tr>
                            </thead>
                            <tbody>

                                <?php if(!empty($data_transaction)): ?>

                                <?php foreach($data_transaction as $key =>$value): ?>


                                <tr>

                                    <td class="product-des"><?php echo $value['id'] ;?> </td>
                                    <td class="image" data-title="ẢNH" width="">
                                        <?php foreach ($value['product'] as $key => $values): ?>
                                        <img width="60" height="60"
                                            src="../upload/product/<?php echo $values['image']?>"
                                            class="attachment-thumbnail">
                                        <span class="product-name"
                                            style="text-transform:lowercase;"><?php echo $values['name']?></span>
                                        <br>
                                        <?php endforeach; ?>

                                    </td>
                                    <td class="price" data-title="GIÁ">
                                        <span> <?php echo number_format($value['amount']) ?>vnđ </span>
                                    </td>

                                    <td class="total-amount" data-title="TÌNH TRẠNG">

                                    
                                        <a href="danh-sach-don-hang1.php" id_transaction="<?php echo $value['id'] ;?>"
                                            class="button update-transaction" type="submit" value="Update" onclick = "getConfirmation();">
                                            <?php
                                                                            if ( $value['status'] == 6) {
                                                                                echo "Đã hủy ";
                                                                            } else if ( $value['status'] == 2 ) {
                                                                                echo "Shipper Nhận Hàng";
                                                                            }
                                                                            else if ( $value['status'] == 3 ) {
                                                                                echo "Shipper Giao Hàng";
                                                                            }
                                                                            else if ( $value['status'] == 4 ) {
                                                                                echo "Đã Nhận Hàng";
                                                                            }
                                                                            else if ( $value['status'] == 5 ) {
                                                                                echo "Hoàn Thành";
                                                                            }
                                                                            else if
                                                                                ( $value['status'] == 1 ) {
                                                                                    echo "Đang giao hàng ";

                                                                            }
                                                                            else {
                                                                                echo "<span alt='bấm để hủy đơn hàng'>Hủy</span>";
                                                                            }
                                                                        ?>
                                        </a>
                                    </td>
                                    <td class="price" data-title="NGÀY TẠO">
                                        <span><?php echo substr($value['created_at'],0,10); ?> </span>
                                    </td>
                                    <td class="price"><a class="order-detail" href="chi-tiet-don-hang.php?id=<?php echo $value['id'] ?>">Chi
                                            Tiết</a></td>

                                </tr>
                                <?php endforeach; ?> <?php endif; ?>


                            </tbody>
                        </table>
                    </form>
                    <!--/ End Shopping Summery -->
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="navigation">
                        <?php 
                                        $table ='transaction';
                                        $link = 'danh-sach-don-hang1.php';
                                        echo pagination($display,$table,$link,$num); 
                                    ?>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php  require_once __DIR__."/teamplate/footer1.php"; ?>
</body>

</html>

<script type="text/javascript">
    $(function(){
        $update_transaction = $(".update-transaction");
        $update_transaction.click(function() {
        var id_transaction = $(this).attr('id_transaction');
            $.ajax({
                url:'http://localhost:8888/OSM/Controller/cap-nhat-trang-thai-don-hang.php',
                type:'get',
                async:true,
                dataType:'text',
                data:{'id_transaction':id_transaction },
                success:function(data)
                {
                    console.log(data);
                    
                }
            });
            
        });
    });

    
</script>
<script type = "text/javascript">
         
            function getConfirmation() {
               var retVal = confirm("Bạn Có Muốn Hủy Đơn Hàng");
               if( retVal == false ) {
                //   document.write ("Đã Hủy");
                  return false;
               } else {
                //   document.write ("User does not want to continue!");
                  return true;
               }
            }
         
      </script>     