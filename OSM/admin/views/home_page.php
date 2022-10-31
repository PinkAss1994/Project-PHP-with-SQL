<?php

include '../teamplate/head.php';

?>
<?php

include '../teamplate/header.php';
require('../../lib/mysqli_connect.php');
?>


<div class="page-container">
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Tổng quat</h2>

                        </div>
                    </div>
                </div>
                <div class="row m-t-25">
                    <div class="col-sm-6 col-lg-4">
                        <a href="../views/Customer/list_customer.php">
                            <div class="overview-item overview-item--c1">
                                <div class="overview__inner">
                                    <div class="overview-box clearfix">
                                        <div class="icon">
                                            <i class="zmdi zmdi-account-o"></i>
                                        </div>
                                        <div class="text">
                                            <span>Danh Sách Khách Hàng</span>
                                        </div>
                                    </div>
                                    <div class="overview-chart">
                                        <!-- <canvas id="widgetChart1"></canvas> -->
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <a href="../views/Order/list_order.php">
                            <div class="overview-item overview-item--c2">
                                <div class="overview__inner">
                                    <div class="overview-box clearfix">
                                        <div class="icon">
                                            <i class="zmdi zmdi-shopping-cart"></i>
                                        </div>
                                        <div class="text">
                                            <span>Danh Sách Đơn Hàng</span>
                                        </div>
                                    </div>
                                    <div class="overview-chart">
                                        <!-- <canvas id="widgetChart2"></canvas> -->
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <a href="../views/Product/list_of_products.php">
                            <div class="overview-item overview-item--c3">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-smartphone"></i>
                                    </div>
                                    <div class="text">
                                        <span>Danh Sách Sản Phẩm</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <!-- <canvas id="widgetChart3"></canvas> -->
                                </div>
                            </div>
                    </div></a>
                </div>
            </div>
        </div>
        <div class="page-container col-12">
                        <h2 class="text-center">Đơn hàng chưa được sử lý</h2>

                        <form class="form-header" action="" id="product-search" method="GET">
                            <input class="au-input au-input--xl" type="text" name="search"
                                placeholder="Tìm kiếm đơn hàng" />
                            <button class="au-btn--submit" type="submit">

                                <input class="form-header" type="submit" value="Tìm kiếm">
                            </button>
                        </form>
                        <?php
		try {
			// connect to database
            require('../../lib/mysqli_connect.php');
 
            
			// (1) set the number of rows per display page
			$page_rows = 10;
			$search = $_GET["search"];
			
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
			$query = "SELECT id, name, created_at ,status  FROM transaction  where  id LIKE '%". $search ."%'  and name LIKE '%". $search ."%'  and created_at LIKE '%". $search ."%' and status = 0 ORDER BY id DESC ";
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
				echo '<table class="table table-bordered ">
						<tr>
						<th scope="col">Mã</th>
						<th scope="col">Tên khách hàng</th>
                        <th scope="col">Ngày mua </th>
						<th scope="col">Thông Tin </th>
						<th scope="col">Trạng thái </th>
					
                        	</tr>';
				// fetch and print all the records:							
				while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                    // remove special characters that might already be in table to reduce the chance of XSS exploits
                    // name sale price quantity
					$id = htmlspecialchars($row['id'], ENT_QUOTES);
					$name = htmlspecialchars($row['name'], ENT_QUOTES);	
					$status = htmlspecialchars($row['status'], ENT_QUOTES);	
					$created_at = htmlspecialchars($row['created_at'], ENT_QUOTES);
				
					
					echo '<tr>
							
							<td>' . $id . '</td>
                            <td>' . $name . '</td>
							<td>' . $created_at .' </td>
							<td><a href="../views/Order/order_information.php?id=' . $id . '">Xem thông tin </a></td>
							<td><a href="../views/Order/edit_order.php?id=' . $id . '">';
							if ($status == 0) {
								echo'Đang chờ xử lý';
							}
							else{
								echo'Đã được tiếp nhận ';
							}
							echo '</a></td>
							';
					
							echo '</tr>';
				}
				echo '</table>';
				// free up the resources                                                         
				$result->free_result(); 
			} else { 
				echo '<p class="text-center">The current db_user could not be retrieved.</p>';
				exit;
			}
			// (6) display the total number of records and paging button     
			// $query = "SELECT id, name, created_at,status   FROM transaction  where  id LIKE '%". $search ."%'  and name LIKE '%". $search ."%'  and created_at LIKE '%". $search ."%' and status = 0 ORDER BY id DESC";
			$query = "SELECT id, name, created_at ,status  FROM transaction  where  id LIKE '%". $search ."%'  and name LIKE '%". $search ."%'  and created_at LIKE '%". $search ."%' and status = 0 ORDER BY id DESC ";
			$result = $conn->query($query);
			$row = $result->fetch_array(MYSQLI_NUM);
			$members = htmlspecialchars($row[0], ENT_QUOTES);
			$conn->close();   
			$nav_string = "<p class='text-center'>Số lượng hóa đơn chưa được tiếp nhận:". $result->num_rows ."</p>";
			$nav_string .= "<p class='text-center'>";
			if ($pages > 1) {                                             
				// what number is the current page?
				$current_page = ($start / $page_rows) + 1;
				// if the page is not the first page then create a Previous link
				if ($current_page != 1) {
					$nav_string .= '<a href="../views/home_page.php?s=' . ($start - $page_rows) .
						'&p=' . $pages . '">Quay lại</a> | ';
				}
				// create a Next link                                                  
				if ($current_page != $pages) {
					$nav_string .= ' <a href="../views/home_page.php?s=' . ($start + $page_rows) .
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
    </div>
</div>
<?php

include '../teamplate/script.php';
?>