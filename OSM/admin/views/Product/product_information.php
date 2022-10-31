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
                        <h2 class="text-center">Thông tin sản phẩm</h2>
                        <?php
		 try {
              $id = $_GET["id"];
			// connect to database
			require('../../../lib/mysqli_connect.php');
			// (1) set the number of rows per display page
			$page_rows = 5;
			// (2) get the total number of pagess already been calculated?
			if ((isset($_GET['p']) && is_numeric($_GET['p']))) {
				$pages = htmlspecialchars($_GET['p'], ENT_QUOTES);
			} else {
				// first, check for the total number of records
				$query = "SELECT COUNT(id) FROM product";
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
            $query = "SELECT product.id, product.name,category.name as category_name,product.price,product.sale,product.content,product.quantity,product.hot,product.avatar,product.created_at,product.display ,product.camera_front,product.ram,product.rom,product.cpu,product.graphics_chip,product.operating_system,product.rear_camera 
			FROM (product INNER JOIN category ON product.category_id = category.id )	where product.id =   $id ";
			// $query1 = "SELECT image_name FROM images where images.product_id  = $id  ";
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
					// name sale price quantity
					
					$id = htmlspecialchars($row['id'], ENT_QUOTES);
					$iddd = $row['id'];
					$query1 = "SELECT * FROM images where product_id= $iddd ";
					$stmt = $conn->stmt_init();
					$stmt->prepare($query1);
					$stmt->execute();
					$result1 = $stmt->get_result();
					$name = htmlspecialchars($row['name'], ENT_QUOTES);	
					$ram = htmlspecialchars($row['ram'], ENT_QUOTES);			
					$rom = htmlspecialchars($row['rom'], ENT_QUOTES);		
					$cpu = htmlspecialchars($row['cpu'], ENT_QUOTES);		
					$camera_front = htmlspecialchars($row['camera_front'], ENT_QUOTES);		
					$rear_camera = htmlspecialchars($row['rear_camera'], ENT_QUOTES);
					$display = htmlspecialchars($row['display'], ENT_QUOTES);		
						
					$price = htmlspecialchars($row['price'], ENT_QUOTES);
                    $graphics_chip = htmlspecialchars($row['graphics_chip'], ENT_QUOTES);
                    $operating_system = htmlspecialchars($row['operating_system'], ENT_QUOTES);
                    $sale = htmlspecialchars($row['sale'], ENT_QUOTES);
					$category_name = htmlspecialchars($row['category_name'], ENT_QUOTES);		
                    $quantity = htmlspecialchars($row['quantity'], ENT_QUOTES);
					$avatar = $row['avatar'];
				
					$created_at = htmlspecialchars($row['created_at'], ENT_QUOTES);	
					}

                    echo '
					<form   enctype="multipart/form-data">
					
					<div class = "row">     
					<div class = "row col-4 card">
                      <div class="form-group col-10  ">                                        
                      <label class="col-4"  > </label >     
					  <td><img src=" ../../../upload/product/'. $avatar .' " alt=" " width= "300px "></td>     
					  </div>';
					  if ($result1)  {
						while ($row1 = $result1->fetch_array(MYSQLI_ASSOC)) {
							
							$image_name2 = $row1['image_name'];
							
							echo '  <div class="form-group col-12 d-flex  ">                                        
							<label class="col-3  "> </label >     
							<td><img src=" ../../../upload/product/'. $image_name2 . ' " alt="" width= "100px"></td>     
							</div>';
						}
					  }
					    echo '
					</div>

					<div class = "row card col-8">                          
                      <div class = "col-12 ">
                     <div class="form-group row ">
                     <label class="col-3" >Mã sản phẩm </label >
                     <td>:' . $id . '</td>
                     </div>
					
                     <div class="form-group row">
                     <label class="col-3" >Tên </label >
                     <td>:' .$name. '</td>
					 </div>

					 <div class="form-group row">
                     <label class="col-3" >Ram </label >
                     <td>:' .$ram. '</td>
					 </div>

					 <div class="form-group row">
                     <label class="col-3" >Rom </label >
                     <td>:' .$rom. '</td>
					 </div>

					 <div class="form-group row">
                     <label class="col-3" >Camera  trước</label >
                     <td>:' .$camera_front. '</td>
					 </div>

					 <div class="form-group row">
                     <label class="col-3" >Camera  sau</label >
                     <td>:' .$rear_camera. '</td>
					 </div>

					 <div class="form-group row">
                     <label class="col-3" >Hệ điều hành </label >
                     <td>:' .$operating_system. '</td>
					 </div>

					 <div class="form-group row">
                     <label class="col-3" >Chip đồ họa </label >
                     <td>:' .$graphics_chip. '</td>
					 </div>

					 <div class="form-group row">
                     <label class="col-3" >CPU </label >
                     <td>:' .$cpu. '</td>
					 </div>

					 <div class="form-group row">
                     <label class="col-3" >Kích thước </label >
                     <td>:' .$display. '</td>
					 </div>
					 
                     <div class="form-group row">
                     <label class="col-3" >Gía:</label >
                      <td>:' .$price. '₫</td>
                     </div>   

                      <div class="form-group row">                                        
                     <label class="col-3" >khuyến mãi</label >                    
                      <td>:' .$sale. '%</td>              
                      </div>   

                       <div class="form-group row">                        
                     <label class="col-3" >Tên loại</label >                    
                       <td>:' .$category_name. '</td>
                     </div>

                     <div class="form-group row">
                     <label class="col-3" >Số lượng</label > 
                     <td>:' .$quantity. '</td>
                      </div>
    
                      <div class="form-group row">
                     <label class="col-3" >Thời gian </label > 
                     <td>:' .$created_at. '</td>
                      </div>   
					 </div> 
					 
                     </div>    
					 </div>  
					 </div>
                     ';
        
                    echo '</form>';
            
                                                                     
				$result->free_result(); 
				$query = "SELECT COUNT(id) FROM product";
				$result = $conn->query($query);
				$row = $result->fetch_array(MYSQLI_NUM);
				$members = htmlspecialchars($row[0], ENT_QUOTES);
				$conn->close();   
				$nav_string = "<p class='text-center'>Mã sản phẩm: $id</p>";
				$nav_string .= "<p class='text-center'>";
				if ($pages > 1) {                                             
					// what number is the current page?
					$current_page = ($start / $page_rows) + 1;
					// if the page is not the first page then create a Previous link
					if ($current_page != 1) {
						$nav_string .= '<a href="list_of_products.php?s=' . ($start - $page_rows) .
							'&p=' . $pages . '">Quay lại</a> | ';
					}
					// create a Next link                                                  
					if ($current_page != $pages) {
						$nav_string .= ' <a href="list_of_products.php?s=' . ($start + $page_rows) .
							'&p=' . $pages . '">Danh sách sản phẩm</a> ';
					}
					$nav_string .= '</p>';
					echo $nav_string;
			}
			 else { 
				echo '<p class="text-center">The current db_user could not be retrieved.</p>';
				
			}
			// (6) display the total number of records and paging button     
		
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