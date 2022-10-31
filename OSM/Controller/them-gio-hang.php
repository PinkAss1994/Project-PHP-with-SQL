<?php
session_start();
	require_once("../autoload/autoload.php");

	$db = new My_Model();

	/*
		Xử lý giỏ hàng .

	*/
	// kiểm tra có tồn tại GET['id'] ( id của sản phầm )
	if(validate_id($_GET['id']))
	{
		// gán #id;
		$id = validate_id($_GET['id']);
		
	}
	
	// kiểm tra có tồn tại action (hành động ) thêm sửa xóa sản phẩm của giỏ hàng
	if(isset($_GET['action']))
	{
		$action = $_GET['action'];
	}

	switch ($action) {
		// nếu action là thêm giỏ hàng
		case 'addtocart':
			# code...

			/*
				kiểm tra xem sản phẩm có tồn tại hay không

			*/
				if(isset($id)){
					// nêu tồn tại id của sản phẩm thì lấy ra thông tin sản phẩm có id = id
					$product = $db->fetchwhere('product','id = '.$id);

					$where = 'id = '.$id.'  AND quantity =  0 ';
					$qty = $db->fetchwhere('product',$where);
	
					// kiểm tra số lượng sản phẩm
					if(!empty($qty))
					{
						$_SESSION['error'] ="Sorry . Sản phẩm đã hết không thể thêm vào giỏ hàng ";
						rdr_url('../views/gio-hang1.php');
						die;
					}

					// nếu tồn tại sản phẩm trong giỏ hàng
					if(isset($_SESSION['cart'][$id]))
					{
						// tiền hành lưu thông tin sản phẩm
						foreach($product as $value){
							// lưu id sản phẩm
							$product_id 	= $id;

							$qty 			= $_SESSION['cart'][$id]['quantity'] + 1; // cộng số lượng lên 1
							$name 			= $value['name'];
							$image 			= $value['avatar'];
							$price 			= ($value['sale'] > 0)?($value['price'] *(100 - $value['sale']))/100 :$value['price']; // tính giá tiền 
							$amount			= $qty * $price; // tính tỏng số tiền 
							
						}

					}else{
						// chưa só sản phẩm nào trong giỏ hàng tạo mới giỏ hàng
						
						foreach($product as $value){
							// lưu id sản phẩm 
							$product_id 	= $value['id'];
							$qty 			= 1; // gán số lượng =1 
							$name 			= $value['name']; // lưu tên sản phẩm
							$image 			= $value['avatar']; // ảnh sản phẩm 
							$price 			= ($value['sale'] > 0)?($value['price'] *(100 - $value['sale']))/100 :$value['price'];
							$amount			= $qty * $price;// tính tỏng số tiền
							
						}
						
					}
				// nếu không tồn tại sản phẩn thì chuyên trang chính
				}else
				{
					rdr_url('../index1.php');
				}

				// lưu lại thông tin vào giỏ hàng
				$_SESSION['cart'][$id]['product_id'] = $product_id;
				$_SESSION['cart'][$id]['quantity'] = $qty;
				$_SESSION['cart'][$id]['name'] = $name;
				$_SESSION['cart'][$id]['price'] = $price;
				$_SESSION['cart'][$id]['image'] = $image;
				$_SESSION['cart'][$id]['amount'] = $amount;
				rdr_url('../views/gio-hang1.php');

				
			    break;
		
		case 'delete-cart':
			# code...
			unset($_SESSION['cart'][$id]);
			rdr_url('../views/gio-hang1.php');

			break;

		case 'update_cart':
			# code...
			$id = $_GET['key'];
			$num = $_GET['quantity'];


			$where = 'id = '.$id;
			$qty = $db->fetchwhere('product',$where);

			// kiểm tra số lượng sản phẩm
			if(intval($qty[0]['quantity']) < intval($num))
			{
				$_SESSION['error'] ="Xin lỗi quý khách! Sản phẩm đã hết không thể thêm vào giỏ hàng ";
				rdr_url('../views/gio-hang1.php');
				die;
			}

			if(isset($_SESSION['cart'][$id]))
			{
				$_SESSION['cart'][$id]['quantity'] =  intval($num);
				$_SESSION['cart'][$id]['amount'] = $_SESSION['cart'][$id]['price'] * $num;
			}
			rdr_url('../views/gio-hang1.php');
			break;


		

	}

	
 ?>
