<?php
/**
 
 */
	/*
	 Hàm lấy link giá trị tuyệt đối
	*/
	 //echo " vào đây rồi function";

    function url()
        {
            
            $link = "http://localhost:8888/OSM/";
            return $link;
        }

    function redirect_to($page = 'index.php') {
        $url = url(). $page;
        header("Location: $url");
        exit();
    }

   
	
	/*
		Hàm kiểm tra giá trị trả về 
		Với $data là dữ liệu cần kiểm tra
	*/
	function pre($data, $exit = true)
    {
        echo"<pre>";
        print_r($data);
        echo"<pre>";

        if($exit)
        {
            die;
        }
    }// end pre
    /*
    	hàm tạo title 
    	vd $title ="lê ngọc xuân";
    	dữ liệu trả về le ngoc xuan
    */

    function safe_title($str = '')
    {
        $str = html_entity_decode($str, ENT_QUOTES, "UTF-8");
        $filter_in = array('#(a|à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#', '#(A|À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#', '#(e|è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#', '#(E|È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#', '#(i|ì|í|ị|ỉ)#', '#(I|ĩ|Ì|Í|Ị|Ỉ|Ĩ)#', '#(o|ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#', '#(O|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#', '#(u|ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#', '#(U|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#', '#(y|ỳ|ý|ỵ|ỷ|ỹ)#', '#(Y|Ỳ|Ý|Ỵ|Ỷ|Ỹ)#', '#(d|đ)#', '#(D|Đ)#');
        $filter_out = array('a', 'A', 'e', 'E', 'i', 'I', 'o', 'O', 'u', 'U', 'y', 'Y', 'd', 'D');
        $text = preg_replace($filter_in, $filter_out, $str);
        $text = preg_replace('/[^a-zA-Z0-9]/', ' ', $text);
        $text = trim(preg_replace('/ /', '-', trim(strtolower($text))));
        $text = preg_replace('/--/', '-', $text);
        $text = preg_replace('/--/', '-', $text);
        return preg_replace('/--/', '-', $text);
    }// end safe_title

    /*
    	Hàm cắt chuỗi lấy ra từ chuỗi 300 ký tự
    */
    function the_excerpt($text,$num)
    {
        
        if(strlen($text)> $num)
        {
            $cutstring = substr($text,0,$num);
            $word = substr($text,0,strrpos($cutstring,' '));
            return $word ;
        }
        else
        {
            return $text;
        }
    }//end the_excerpt

    /*
    	Hàm dùng để phân trang
    */
    function pagination($display,$table,$link,$record)
	{
		global $start;
		if(isset($_GET['p']) && filter_var($_GET['p'] , FILTER_VALIDATE_INT,array('min_range' =>1)))
			{
				$page = $_GET['p'];
			}
			else
			{
				if($record > $display)
				{
					// tìm số trang bằng cách chia cho display
					$page = ceil($record / $display);
				}
				else{
					$page = 1;
				}
			}
			$output = "<ul class ='pagination' style='justify-content: space-between; display: flex;'>";
		if($page >1)
		{
			$current_page = ($start / $display) +1;
			//nếu k phải ở trang đầu thì sẽ hiển thị trang trước
			if($current_page!=1)
			{
				$output .="<li class='paginate_button previous' id='example1_previous'>
                    <a href='".$link."?s=".($start - $display)."&p={$page}'aria-controls='example1' data-dt-idx='0' tabindex='0'>Previous</a></li>";
			}
			//hin thi phan so con lai cua trang
			for($i=1;$i<=$page;$i++)
			{
				if($i != $current_page)
				{
					$output .="<li><a href='".$link."?s=".($display * ($i-1))."&p={$page}' aria-controls='example1' data-dt-idx='1' tabindex='".$i."'>{$i}</a></li>";
					
				}
				else
				{
					$cls = "class = 'active'";
                    $output .="<li <?php if(isset ($page)){ echo  $cls ;} ><a href='".$link."s=".($display * ($i-1))."p={$page}' aria-controls='example1' data-dt-idx='1' tabindex='".$i."'>{$i}</a></li>";
				}
			}//end for loop
			//nếu k phải trang cuối thì hiển thị trang kế 
			 
			if($current_page != $page)
			{
				$output .="<li class='paginate_button next' id='example1_next'><a href='".$link."?s=".($start + $display)."&p={$page}' aria-controls='example1' data-dt-idx='7' tabindex='0'>Next</a></li>";
			}
		}// end pagination section
		$output .="</ul>";	
		return $output ;
	}// end pagination



    function navigation($display,$table,$link,$record)
    {
        global $start;
        if(isset($_GET['p']) && filter_var($_GET['p'] , FILTER_VALIDATE_INT,array('min_range' =>1)))
            {
                $page = $_GET['p'];
            }
            else
            {
                if($record > $display)
                {
                    // tìm số trang bằng cách chia cho display
                    $page = ceil($record / $display);
                }
                else{
                    $page = 1;
                }
            }
            $output = "<ul style='display: flex; justify-content: center;'>";
        if($page >1)
        {
            $current_page = ($start / $display) +1;
            //nếu k phải ở trang đầu thì sẽ hiển thị trang trước
            if($current_page!=1)
            {
                $output .="<li class='pagination-previous text-center' id='example1_previous' style ='padding:20px;'>
                    <a href='".$link."s=".($start - $display)."&p={$page}'aria-controls='example1' data-dt-idx='0' tabindex='0'>Previous</a></li>";
            }
            //hin thi phan so con lai cua trang
            for($i=1;$i<=$page;$i++)
            {
                if($i != $current_page)
                {
                    $output .="<li style ='padding:20px;> class='text-center' <a href='".$link."s=".($display * ($i-1))."&p={$page}' aria-controls='example1' data-dt-idx='1' tabindex='".$i."'>{$i}</a></li>";
                    
                }
                else
                {
                    $cls = "class = 'active'";
                    $output .="<li class='text-center' style ='padding:20px; <?php if(isset ($page)){ echo  $cls ;} ><a href='".$link."s=".($display * ($i-1))."p={$page}' aria-controls='example1' data-dt-idx='1' tabindex='".$i."'>{$i}</a></li>";
                }
            }//end for loop
            //nếu k phải trang cuối thì hiển thị trang kế 
             
            if($current_page != $page)
            {
                $output .="<li class='text-center' style ='padding:20px; class='pagination-next' id='example1_next'><a href='".$link."&s=".($start + $display)."&p={$page}' aria-controls='example1' data-dt-idx='7' tabindex='0'>Next</a></li>";
            }
        }// end pagination section
        $output .="</ul>";  
        return $output ;
    }// end pagination

	/*
		kiem tra xem co ton tai bien id hay k 
	*/
	 
	function validate_id($id)
	{
		if(isset($id) && filter_var($id,FILTER_VALIDATE_INT,array('min_range'=>1)))
		{
			$val_id = $id;
			return $val_id;
		}
		else
		{
			return NULL;
		}
		
	}// end validate_id


	/*
		// chuyen thanh cac the p 
	*/

	function the_content($text)
	{
		$sanitized = htmlentities($text,ENT_COMPAT,'UTF-8');
		return str_replace(array("\r\n"),array("<p>","</p>"),$sanitized);
	}

	/*
		Hàm kiểm tra xem có phải email hay không
	*/

	function clean_email($value)
	{
		$suspects = array('to:', 'bcc:','cc:','content-type:','mime-version:', 'multipart-mixed:','content-transfer-encoding:');
		foreach ($suspects as $s)
		{
			if(strpos($value,$s) !== FALSE)
			{
				return '';
			}
			// tra ve gia tri cho dau xuong hang 
			$value = str_replace(array('\n', '\r', '%0a', '%0d'), '', $value);
			return trim($value);
		}
	}

	

    /*
    	Hàm kiểm tra ip của máy khách
    */
    function get_client_ip() 
    {
    	$str= "cao da";
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress ;
    }



    /**
     * show button xóa
     *
     * @param  url $link
     * @return html
     */
    
    if ( ! function_exists('makeDeleteButton'))
    {
        function makeDeleteButton($link) {
            echo '<a class="btn btn-xs btn-danger" href="'. $link .'"><i class="icon-trash"></i></a>';
        }
    }
    


    /**
     * show buttom edit
     *
     * @param  url $link
     * @return html
     */
    
    if ( ! function_exists('makeEditButton'))
    {
        function makeEditButton($link) {
            echo '<a class="btn btn-xs btn-success" href="'. $link .'"><i class="icon-pencil"></i></a>';
        }
    }
    

    /**
     * show active button
     *
     * @param  url $link
     * @param  integer $currentActiveValue
     * @return html
     */
    
    if (! function_exists('makeActiveButton'))
    {
        function makeActiveButton($link, $currentActiveValue) {
            $classActive = $currentActiveValue == 1 ? 'fa-check-square' : 'fa-square-o';
            return '<a class="btn-action btn-xs btn-active-action" href="'. $link .'"><i class="fa '. $classActive .' fa-2x"></i></a>';
        }
    }

    /*
    	Hàm kiểm tra giá trị nhập vào của một chuỗi tồn tại và không trống .
    */
    if(! function_exists('testInputString'))
    {
	    function testInputString($data)
	    {
	    	if(isset($data) && !empty($data))
	    	{
	    		$data = strip_tags($data);
	    		return $data;
	    	}else
	    	{
	    		return false;
	    	}
	    }
	}
	if(!function_exists("testInputInt"))
	{
	     function testInputInt($data)
	    {
	    	if(isset($data) && filter_var($data,FILTER_VALIDATE_INT,array('min_range'=>1)))
			{
				$data = strip_tags($data);
				return $data;
			}else
			{
				return false;
			}
	    }
	}

	/*
		Hàm kiểm tran tồn tại của sesion và gán giá trị 
	*/

	if(! function_exists('isset_sesion'))
	{
		function isset_sesion($data)
		{
			if (isset($data)) {
				# code...
				return $data;
			}
			else
			{
				return false;
			}
		}
	}

	/*
		Hàm trả về giá trị ngày tháng năm 
	*/
	if (! function_exists('get_date')) {
		# code...
		function get_date()
		{
			$now = getdate();
			return $currentDate = $now["mday"] . "/" . $now["mon"] . "/" . $now["year"]; 
		}
	}

	/**
     *  redirect về các trang 
     */
    if ( ! function_exists('rdr_url'))
    {
        function rdr_url($url = "")
        {
            header("Location: {$url}",true, 301);
            exit();
        }
    }

    /*
    	Hàm show ra box cảnh báo 
    */
    if (!function_exists("warning")) {
    	# code...
    	function warning($data)
    	{
    		echo"<div class='alert alert-danger customalert'>
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> ".$data."
                  </div>";
                  
    	}
    }
     /*
    	Hàm show ra box thông báo thành công 
    */
    if(! function_exists("success"))
    {
    	function success($data)
    	{
    		echo "<div class='alert alert-success customalert' id='alertjs'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>".$data."
                    
                  </div>";
                  
    	}
    }


    /**
     * chống mã hack 
     * 
     */
    if( ! function_exists('xss_clean') ) {
        function xss_clean($data)
        {
            // Fix &entity\n;
            $data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
            $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
            $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
            $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

            // Remove any attribute starting with "on" or xmlns
            $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

            // Remove javascript: and vbscript: protocols
            $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
            $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
            $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

            // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
            $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
            $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
            $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

            // Remove namespaced elements (we do not need them)
            $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

            do
            {
                // Remove really unwanted tags
                $old_data = $data;
                $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
            }
            while ($old_data !== $data);

            // we are done...
            return $data;
        }
    }


    if (!function_exists('uploadImage')) {
        # code...
        function uploadImage($data,$folder ="",$action =" ")
        {

            if(isset($_FILES['image'])) {
    
                // Tao mot array, de kiem tra xem file upload co thuoc dang cho phep
                $allowed = array('image/jpeg', 'image/jpg', 'image/png', 'images/x-png');

                // Kiem tra xem file upload co nam trong dinh dang cho phep
                if(in_array(($_FILES['image']['type']), $allowed)) {
                    // Neu co trong dinh dang cho phep, tach lay phan mo rong

                    if(move_uploaded_file($_FILES['image']['tmp_name'], "../../upload/".$folder."/".$_FILES['image']['name'])) {
                        
                    } else {
                       
                        return true;
                    }
                } else {
                    // FIle upload khong thuoc dinh dang cho phep
                    $_SESSION['error'] = "Lỗi không thể up load ảnh (file ảnh bạn úp lên không thuộc định dạng cho phép ).";
                    //rdr_url("../views/".$folder."/index.php?action=".$action);
                    return false;
                } 
            } // END isset $_FILES

            if(isset($_FILES['image']['tmp_name']) && is_file($_FILES['image']['tmp_name']) && file_exists($_FILES['image']['tmp_name'])) 
            {
                unlink($_FILES['image']['tmp_name']);
            }

            return  $_FILES['image']['name'];

        }
    }


    if (!function_exists('uploadImage2')) {
        # code...
        function uploadImage2($data,$folder ="",$action =" ")
        {

            if(isset($_FILES['image'])) {
    
                // Tao mot array, de kiem tra xem file upload co thuoc dang cho phep
                $allowed = array('image/jpeg', 'image/jpg', 'image/png', 'images/x-png');

                // Kiem tra xem file upload co nam trong dinh dang cho phep
                if(in_array(($_FILES['image']['type']), $allowed)) {
                    // Neu co trong dinh dang cho phep, tach lay phan mo rong

                    if(move_uploaded_file($_FILES['image']['tmp_name'], "../upload/".$folder."/".$_FILES['image']['name'])) {
                        
                    } else {
                       
                        return true;
                    }
                } else {
                    // FIle upload khong thuoc dinh dang cho phep
                    $_SESSION['error'] = "Lỗi không thể up load ảnh (file ảnh bạn úp lên không thuộc định dạng cho phép ).";
                    //rdr_url("../views/".$folder."/index.php?action=".$action);
                    return false;
                } 
            } // END isset $_FILES

            if(isset($_FILES['image']['tmp_name']) && is_file($_FILES['image']['tmp_name']) && file_exists($_FILES['image']['tmp_name'])) 
            {
                unlink($_FILES['image']['tmp_name']);
            }

            return  $_FILES['image']['name'];

        }
    }



    if(!function_exists('checkLogin'))
    {
        function checkLogin($id,$role_id)
        {
            if(isset($id) && isset($role_id) && !empty($id) && !empty($role_id))
            {
                
            }
            else
            {
                die;
                redirect_to('admin/views/');
            }
        }
    }


	

?>