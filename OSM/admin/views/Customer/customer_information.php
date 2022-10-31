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

					
		<h2 class="text-center">Thông tin khách hàng</h2>
		<?php
        try {
            $id = $_GET["id"];
            // dd(1);
			// connect to database
			require('../../../lib/mysqli_connect.php');
			// (1) set the number of rows per display page
			$page_rows = 5;
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
			$query = "SELECT id, name, email, phone, address, created_at FROM db_user  where  id = $id ";
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
                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
					// remove special characters that might already be in table to reduce the chance of XSS exploits
					$id = htmlspecialchars($row['id'], ENT_QUOTES);		
                    $name = htmlspecialchars($row['name'], ENT_QUOTES);
                    $email = htmlspecialchars($row['email'], ENT_QUOTES);		
                    $phone = htmlspecialchars($row['phone'], ENT_QUOTES);
                    $address = htmlspecialchars($row['address'], ENT_QUOTES);		
                    $created_at = htmlspecialchars($row['created_at'], ENT_QUOTES);}

                echo '
                <form   enctype="multipart/form-data">
						   
				<div class = "card">
                            <div class="form-group row">
                                <label class="col-2" >Mã khách hàng</label >
                                <td>: ' .$id. '</td>
                            </div>

                             <div class="form-group row">
                                <label class="col-2" >Tên </label >                
                                <td>: ' .$name. '</td>
                            </div>

                            <div class="form-group row">
                               <label class="col-2" >Email</label >
                               <td>: ' .$email. '</td>
                            </div>   

                            <div class="form-group row">                                        
                              <label class="col-2" >Số điện thoại</label >                    
                              <td>: ' .$phone. '</td>                
                            </div>   

                            <div class="form-group row">                        
                              <label class="col-2" >Địa chỉ</label >                    
                              <td>: ' .$address. '</td>
                            </div>

                            <div class="form-group row">
                              <label class="col-2" >Ngày tạo</label >                            
							  <td>: ' .$created_at. '</td>
							  </div>
                ';
                
				echo '</form>';
				// free up the resources                                                         
				$result->free_result(); 
			} else { 
				echo '<p class="text-center">Không thể truy xuất db_user hiện tại.</p>';
				exit;
			}
			// (6) display the total number of records and paging button     
			$query = "SELECT id, name, email, phone, address, created_at FROM db_user  where  id = $id  ";
			$result = $conn->query($query);
			$row = $result->fetch_array(MYSQLI_NUM);
			$members = htmlspecialchars($row[0], ENT_QUOTES);
			$conn->close();   
			$nav_string = "<p class='text-center'> khách hàng : $id</p>";
			$nav_string .= "<p class='text-center'>";
			if ($pages > 1) {                                             
				// what number is the current page?
				$current_page = ($start / $page_rows) + 1;
				// if the page is not the first page then create a Previous link
				if ($current_page != 1) {
					$nav_string .= '<a href="list_customer.php?s=' . ($start - $page_rows) .
						'&p=' . $pages . '">Danh sách khách hàng</a> | ';
				}
				// create a Next link                                                  
				if ($current_page != $pages) {
					$nav_string .= ' <a href="list_customer.php?s=' . ($start + $page_rows) .
						'&p=' . $pages . '">Danh sách khách hàng</a> ';
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
