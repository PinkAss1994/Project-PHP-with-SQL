<?php
include '../teamplate1/head.php';
?>
<?php
include '../teamplate1/header.php';
?>

<div class="page-container">

	<div class="main-content">
		<div class="section__content section__content--p30">
			<div class="container-fluid">
				<h2 class="text-center">Chi tiết hóa đơn</h2>
				<?php
		try {
			  $id = $_GET["id"];
			  
			 
			// connect to database
			require('../../../lib/mysqli_connect.php');
			
			$page_rows = 5;
			$search = $_GET["search"];
			// (2) get the total number of pagess already been calculated?
			if ((isset($_GET['p']) && is_numeric($_GET['p']))) {
				$pages = htmlspecialchars($_GET['p'], ENT_QUOTES);
			} else {
				// first, check for the total number of records
				$query = "SELECT COUNT(id) FROM ordere";
				$result = $conn->query($query);
				$row = $result->fetch_array(MYSQLI_NUM);
				$records = htmlspecialchars($row[0], ENT_QUOTES);
				// calculate the number of pages
				if ($records > $page_rows) { // if the number of records will fill more than one page
					// calculate the number of pages and round the result up to the nearest integer
					$pages = ceil($records / $page_rows);
				} else {
					$pages = 1;
				}
			}
			// (3) declare which record to start with                                                     
			if ((isset($_GET['s'])) && (is_numeric($_GET['s']))) {
				// make sure it is not executable XSS
				$start = htmlspecialchars($_GET['s'], ENT_QUOTES);
			} else {
				$start = 0;
			}

            $query = "SELECT o.id, o.quantity,o.name as product_name,o.price,o.amount,transaction.name as transaction_name,transaction.address as transaction_address,transaction.phone as transaction_phone,transaction.payment as transaction_payment,transaction.created_at as transaction_created_at ,transaction.status as transaction_status
			FROM ordere o INNER JOIN transaction ON o.transaction_id = transaction.id where transaction.id =  $id ";
			$stmt = $conn->stmt_init();
			$stmt->prepare($query);
			$stmt->bind_param("ii", $start, $page_rows);
			// execute query
			$stmt->execute();
			$result = $stmt->get_result();
			
			if ($result) {
				
				while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
				{
                    // remove special characters that might already be in table to reduce the chance of XSS exploits
                    // name sale price quantity
					$id = htmlspecialchars($row['id'], ENT_QUOTES);
					$transaction_name = htmlspecialchars($row['transaction_name'], ENT_QUOTES);		
					$transaction_address = htmlspecialchars($row['transaction_address'], ENT_QUOTES);
					$transaction_phone = htmlspecialchars($row['transaction_phone'], ENT_QUOTES);	
					$product_name = htmlspecialchars($row['product_name'], ENT_QUOTES);
					$price = htmlspecialchars($row['price'], ENT_QUOTES);
					$quantity = htmlspecialchars($row['quantity'], ENT_QUOTES);	
					$amount = htmlspecialchars($row['amount'], ENT_QUOTES);
					$transaction_payment = htmlspecialchars($row['transaction_payment'], ENT_QUOTES);
					$transaction_status = htmlspecialchars($row['transaction_status'], ENT_QUOTES);
					$transaction_created_at = htmlspecialchars($row['transaction_created_at'], ENT_QUOTES);	
				}
                    echo '
                    <form class="table table-bordered card"  enctype="multipart/form-data">
                        
                    <div class = "container  ">
                   <div class = "col-12 ">
				   <div class="form-group ">
				   
                   <label class="col-3" >Mã hóa đơn </label >
                   <td >:' . $id . '</td>
					</div>
					 
                <div class="form-group ">
                   <label class="col-3" >Tên khách hàng </label >
                   <td scope="col">:' .$transaction_name. '</td>
			   </div>

			   <div class="form-group ">
			   <label class="col-3" >Địa chỉ </label >
			   <td scope="col">:' .$transaction_address. '</td>
		   </div>

		   <div class="form-group ">
		   <label class="col-3" >Số điện thoại </label >
		   <td scope="col">:' .$transaction_phone. '</td>
	        </div>

	         <div class="form-group ">                                        
	         <label class="col-3" >Tên sản phẩm</label >                    
	         <td scope="col">:' .$product_name. '</td>              
	            </div>   

               <div class="form-group ">
                  <label class="col-3" >Gía:</label >
                 
                  <td scope="col">:' .$price. '₫</td>
			   </div>   
			   
               <div class="form-group ">
                 <label class="col-3" >Số lượng</label > 
                 <td scope="col">:' .$quantity. '</td>
			   </div>

			   <div class="form-group ">
			   <label class="col-3" >Tổng tiền</label > 
			   <td scope="col">:' .$amount. '₫</td>
			 </div>

			 <div class="form-group ">
			 <label class="col-3" >Thanh toán </label >
			 <td scope="col">:' .$transaction_payment. '</td>
		      </div>
             <div class="form-group ">
             <label class="col-3" >Ngày giao dich </label > 
              <td scope="col">:' .$transaction_created_at. '</td>
			  </div>   
				
				 <div class="form-group ">
				 <label class="col-3" >Trạng thái </label > 	
				  <td scope="col">:';
			
				if ($transaction_status == 1) {
					echo'Đã tiếp nhận đơn hàng';
				}
				else if($transaction_status == 2) {
					echo'Đã giao Chuyển hàng cho shipper ';
				}
				else if($transaction_status == 3) {
					echo'Shipper đang giao hàng';
				}
				else if($transaction_status == 4) {
					echo'Người dùng đã nhận hàng';
				}
				else if($transaction_status == 5) {
					echo'Hoàn thành';
				}
				else if($transaction_status == 6) {
					echo'Người dùng đã hủy';
				}
				else if($transaction_status == 0) {
					echo'Đang chờ xử lý';
				}
				echo '</td>
				</div>   
				</div>  ';    
        echo '</form>';
            
                                                                    
				$result->free_result(); 
				echo '<a href="../../views/Order/list_order.php">Danh sách hóa đơn</a>';
		
			} else { 
				echo '<p class="text-center">Không thể truy xuất đơn hàng hiện tại.</p>';
			}
			$conn->close();   
		} catch (Exception $e) {
			print "An Exception occurred. Message: " . $e->getMessage();
		}
		?>
			</div>
			<?php

include '../teamplate1/script.php';
?>