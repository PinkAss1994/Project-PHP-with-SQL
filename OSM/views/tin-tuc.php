<?php 
session_start();
    require_once("../autoload/autoload.php");
    class News extends My_Model{
        public function __construct()
        {
            parent::__construct();
        }


        public function getNew($id)
        {
            $where = 'id = '.$id;
            return $data = parent::fetchwhere('news',$where);
        }

         public function listNew(){
            return $data = parent::fetchwhere('news',' 1 ORDER BY created  DESC LIMIT 0,4');
        }
    }

    $new = new News();
    if(isset($_GET['id']))
    {
        $id = validate_id($_GET['id']);
        $data_new = $new ->getNew($id);

        $list_new = $new -> listNew();
        
       
    }else
    {
        redirect_to('index.php');
    }
?>
<!DOCTYPE html>
<html lang="vn">
<?php  require_once __DIR__."/teamplate/head1.php"; ?>
<style>
li a {
    display: block;
}
.content{
    margin-left: 15px;
}
</style>

<body class="js">
    <!-- header -->
    <?php  require_once __DIR__."/teamplate/header1.php"; ?>
    <!-- END header -->
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="index.php">Trang Chủ<i class="ti-arrow-right"></i></a></li>
                            <li class="active">Tin Tức</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Breadcrumbs -->
    <div class="container">
        <div class="row">
            <div class="content">
                <?php foreach($data_new as $value): ?>
                <h1 class="entry-title"><?php echo $value['title'] ?></h1>
                <div class="entry-content">

                    <p>
                        <?php  if(isset($value['image_link'])):?>
                        <img class="aligncenter size-full wp-image-178658"
                            src="../upload/news/<?php echo $value['image_link'] ?>" alt="<?php echo $value['intro'] ?>"
                            width="310" height="310">
                        <?php endif; ?>
                    </p>
                    <div class="content">
                        <?php echo $value['content'] ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- <div class="row">
            <h3 class="title-yy">Bài viết <span>liên quan</span></h3>
            <div class="col-md-3">
                <ul>
                    <?php  foreach ($list_new as $key => $value): ?>
                    <li class="single-lienquan" style="list-style:none; float:left;">
                        <a href="<?php echo 'tin-tuc1.php?id='.$value['id']; ?>" rel="bookmark"
                            title="<?php echo $value['title'] ?>"><img width="400" height="300"
                                src="../upload/news/<?php echo $value['image_link'] ?>"
                                class="attachment-post-thumbnail wp-post-image"></a>
                        <h3><a href="<?php echo 'tin-tuc1.php?id='.$value['id']; ?>" rel="bookmark"
                                title="<?php echo $value['title'] ?>"><?php echo $value['title'] ?></a></h3>
                    </li>
                    <?php endforeach; ?>

                </ul>
            </div>
        </div> -->
    </div>

    <?php  require_once __DIR__."/teamplate/footer1.php"; ?>
</body>

</html>