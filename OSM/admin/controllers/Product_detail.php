<?php
session_start();
    require_once("../autoload/autoload.php");
    class ViewProduct extends My_Model{

        public function __construct()
        {
            parent::__construct();

        }

		//lấy ra sản phẩm có id là vd id =1
        public function viewProduct($id)
        {
           $id =  validate_id($id);

           $where = "id = ".$id;

            $data = parent::fetchwhere('product',$where);
           // lấy ra danh mục cha
           foreach ($data as $key => $value) {
            # code...

                $data[$key]['category'] = parent::fetchwhere('category', 'id = '.$value['category_name']);
                
            }

            return $data;
        }

        public function viewProducts($id)
        {
            $id =  validate_id($id);
            $where = "id = ".$id;

            $data = parent::fetchwhere('product',$where);

            foreach ($data as $key => $value) {
            # code...

                $where = ' category_name = '.$value['category_name'];
                return $product_lq = parent::fetchwhere('product',$where);

                
            }
        }
    }

    $view_product = new ViewProduct();
    if(validate_id($_GET['id']))
    {
        $id = validate_id($_GET['id']);
        $data_new = $view_product->viewProduct($id);

        $product_lq = $view_product->viewProducts($id);
    }
      
?>