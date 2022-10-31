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
					<h2 class="text-center">Danh sách khách hàng</h2>
					<form action="" id = "product-search" method = "GET">
        <!-- <label class = "form-header">Tìm kiếm Khách Hàng</label> -->
        <!-- <select name="" id="input"  required = "required" >
                                     <option value="id">Mã </option>
									 <option value="id">Tên</option>
									 <option value="id">Email</option>
         </select> -->

       
		<!-- <form class="form-header" action="" method="POST"> -->
		<form class="form-header" action="" id = "product-search" method = "GET">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Tìm kiếm Khách Hàng" />
                                <button class="au-btn--submit" type="submit">
									<!-- <i class="zmdi zmdi-search"></i> -->
									<input class = "form-header" type="submit" value ="Tìm kiếm">
                                </button>
                            </form>

</form>

		<?php
		try {

			// connect to database
			require('../../../lib/mysqli_connect.php');
			// (1) set the number of rows per display page
			$page_rows = 5;
			$search = $_GET["search"];
			// (2) get the total number of pagess already been calculated?
			if ((isset($_GET['p']) && is_numeric($_GET['p']))) {
				$pages = htmlspecialchars($_GET['p'], ENT_QUOTES);
			} else {
				// first, check for the total number of records
				$query = "SELECT COUNT(id) FROM db_user";
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
			$query = "SELECT id, name, email ,active FROM db_user WHERE id LIKE '%". $search ."%'  or name LIKE '%". $search ."%' or email LIKE '%". $search ."%' ORDER BY id DESC";
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
                        <tr >
                        <th scope="col">Id</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Email</th>
                        <th scope="col">Thông tin khách hàng</th>
						<th scope="col">Trạng thái</th>
                        </tr>';
                        

				// fetch and print all the records:							
				while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
					// remove special characters that might already be in table to reduce the chance of XSS exploits
					$id = htmlspecialchars($row['id'], ENT_QUOTES);		
                    $name = htmlspecialchars($row['name'], ENT_QUOTES);
					$email = htmlspecialchars($row['email'], ENT_QUOTES);	
					$active = htmlspecialchars($row['active'], ENT_QUOTES);	
                
					echo '<tr>
                            <td>' . $id . '</td>
                            <td>' . $name . '</td>
                            <td>' . $email . '</td>
                            <td><a href="../Customer/customer_information.php?id=' . $id . '">Xem thông tin khách hàng </a></td>
							';
							if ($active == 0) {
								echo'
								<td><a href="../Customer/show_customer.php?id=' . $id . '">Đã thôi hoạt động </a></td>';
							}else{
								echo'
								<td><a href="../Customer/edit_customer.php?id=' . $id . '"">Đang hoạt động</a></td>';
							}
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
			$query = "SELECT id, name, email ,active FROM db_user WHERE id LIKE '%". $search ."%'  or name LIKE '%". $search ."%' or email LIKE '%". $search ."%' ORDER BY id DESC";
			$result = $conn->query($query);
			$row = $result->fetch_array(MYSQLI_NUM);
			$members = htmlspecialchars($row[0], ENT_QUOTES);
			$conn->close();   
			$nav_string = "<p class='text-center'>Số lượng khách hàng:". $result->num_rows ."</p>";
			$nav_string .= "<p class='text-center'>";
			if ($pages > 1) {                                             
				// what number is the current page?
				$current_page = ($start / $page_rows) + 1;
				// if the page is not the first page then create a Previous link
				if ($current_page != 1) {
					$nav_string .= '<a href="../Customer/list_customer.php?s=' . ($start - $page_rows) .
						'&p=' . $pages . '">Quay lại</a> | ';
				}
				// create a Next link                                                  
				if ($current_page != $pages) {
					$nav_string .= ' <a href="../Customer/list_customer.php?s=' . ($start + $page_rows) .
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
	<?php

include '../teamplate1/script.php';
?>