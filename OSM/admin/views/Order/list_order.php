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
		<h2 class="text-center">Đơn hàng đang được sử lý</h2>
		<form class="form-header" action="" id = "product-search" method = "GET">
		<select name="status" id="">
		<option value="">Chọn trạng thái</option>
								<option value="1">Đã tiếp nhận đơn hàng</option>
								<option value="2">Đã giao Chuyển hàng cho shipper</option>
								<option value="3">Shipper đang giao hàng</option>
								<option value="4">Người dùng đã nhận hàng</option>
								<option value="5">Hoàn thành đơn hàng</option>
								<option value="6">Người dùng đã hủy</option>
								</select>
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Tìm kiếm đơn hàng"/>
                                <button class="au-btn--submit" type="submit">
									<input class = "form-header" type="submit" value ="Tìm kiếm">
                                </button>
								

        </form>

		<?php
		try {
			// connect to database
            require('../../../lib/mysqli_connect.php');
 
            
			// (1) set the number of rows per display page
			$page_rows = 10;
			$search = $_GET["search"];
			$status = $_GET["status"];
			// (2) get the total number of pagess already been calculated?
			if ((isset($_GET['p']) && is_numeric($_GET['p']))) {
				$pages = htmlspecialchars($_GET['p'], ENT_QUOTES);
			} else {
				// first, check for the total number of records
				$query = "SELECT COUNT(id) FROM transaction";
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
			// build the select user SQL
			$query = "SELECT id, name, created_at,status   FROM transaction  where  id LIKE '%". $search ."%'  and name LIKE '%". $search ."%'  and created_at LIKE '%". $search ."%'  and status > 0  and status LIKE '%". $status ."%' ORDER BY id DESC ";
			// (4) add LIMIT clause
			$query .= " LIMIT ?,?";
			$stmt = $conn->stmt_init();
			$stmt->prepare($query);
			// (5) bind param to SQL Statement
			$stmt->bind_param("ii", $start, $page_rows);
			// execute query
			$stmt->execute();
			$result = $stmt->get_result();
			if ($result) {
				echo '<table class="table table-banddered ">
						<tr>
						<th scope="col">Mã</th>
						<th scope="col">Tên khách hàng</th>
                        <th scope="col">Ngày mua </th>
						<th scope="col">Thông Tin </th>
						<th scope="col">Trạng thái </th>
						<th scope="col">Tình trạng</th>
                        	</tr>';
				// fetch and print all the records:							
				while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                    // remove special characters that might already be in table to reduce the chance of XSS exploits
                    // name sale price quantity
					$id = htmlspecialchars($row['id'], ENT_QUOTES);
					$name = htmlspecialchars($row['name'], ENT_QUOTES);	
					$status = htmlspecialchars($row['status'], ENT_QUOTES);	
					$created_at = htmlspecialchars($row['created_at'], ENT_QUOTES);
					$active = htmlspecialchars($row['active'], ENT_QUOTES);
					
					echo '<tr>
							
							<td>' . $id . '</td>
							<td>' . $name . '</td>
							<td>' . $created_at .' </td>
							<td><a href="../Order/order_information.php?id=' . $id . '">Xem thông tin </a></td>
							<td><a href="../Order/edit_order.php?id=' . $id . '">';
							if ($status == 1) {
								echo'Đã tiếp nhận đơn hàng';
							}
							else if($status == 2) {
								echo'Đã giao Chuyển hàng cho shipper ';
							}
							else if($status == 3) {
								echo'Shipper đang giao hàng';
							}
							else if($status == 4) {
								echo'Người dùng đã nhận hàng';
							}
							else if($status == 5) {
								echo'Hoàn thành';
							}
							else if($status == 6) {
								echo'Người dùng đã hủy';
							}
							else if($status == 0) {
								echo'Đang chờ xử lý';
							}
							echo '</td></a></td>
							';
							if ($active == 0) {
								echo'
								<td><a href="../Order/show_order.php?id=' . $id . '">Chưa hoàn thành</a></td>';
							}else{
								echo'
								<td><a href="../Order/hidden_order.php?id=' . $id . '" onclick="return checkDelete()">Đã hoàn thành </a></td>';
							}
							echo '</tr>';
				}
				echo '</table>';
				// free up the resources                                                         
				$result->free_result(); 
			} else { 
				echo '<p class="text-center">Không thể truy xuất đơn hàng hiện tại.</p>';
				exit;
			}
			// (6) display the total number of records and paging button     
			$query = "SELECT id, name, created_at,status   FROM transaction  where  id LIKE '%". $search ."%'  and name LIKE '%". $search ."%'  and created_at LIKE '%". $search ."%' and status > 0 ORDER BY id DESC";
			$result = $conn->query($query);
			$row = $result->fetch_array(MYSQLI_NUM);
			$members = htmlspecialchars($row[0], ENT_QUOTES);
			$conn->close();   
			$nav_string = "<p class='text-center'>Số lượng hóa đơn hàng:". $result->num_rows ."</p>";
			$nav_string .= "<p class='text-center'>";
			if ($pages > 1) {                                             
				// what number is the current page?
				$current_page = ($start / $page_rows) + 1;
				// if the page is not the first page then create a Previous link
				if ($current_page != 1) {
					$nav_string .= '<a href="../Order/list_order.php?s=' . ($start - $page_rows) .
						'&p=' . $pages . '">Quay lại</a> | ';
				}
				// create a Next link                                                  
				if ($current_page != $pages) {
					$nav_string .= ' <a href="../Order/list_order.php?s=' . ($start + $page_rows) .
						'&p=' . $pages . '">Trang tiếp</a> ';
				}
				$nav_string .= '</p>';
				echo $nav_string;
			}
			$conn->close(); 
		} catch (Exception $e) {
			print "An Exception occurred. Message: " . $e->getMessage();
		}
		?>
         </div>
            </div>
	</div>
</div>
<?php

include '../teamplate1/script.php';
?>
