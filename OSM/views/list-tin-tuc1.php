<?php 
session_start();
    require_once("../autoload/autoload.php");
    class ListNew extends My_Model{
        public function __construct()
        {
            parent::__construct();
        }

        public function listNew($start,$num)
        {
            return $list = parent::fetchAllpagina('news',$start,$num);
        }


        public function countid()
        {
           $data = parent::countTable('news');
           return $data;
        }
    }

    $list = new ListNew();
    $display = 10;
    $start = (isset($_GET['s']) && filter_var($_GET['s'],FILTER_VALIDATE_INT,array('min_range'=>1)))?$_GET['s']:0;
    $num = $list ->countid();

    $list_new = $list -> listNew($start,$display);
?>
<!DOCTYPE html>
<html lang="vn">
<?php  require_once __DIR__."/teamplate/head1.php"; ?>

<body class="js">
    <!-- header -->
    <?php  require_once __DIR__."/teamplate/header-sub.php"; ?>
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
        <h1 class="archive-heading"><a href="list-tin-tuc1.php" title="" rel="nofollow"></a></h1>
        <?php foreach($list_new as $value): ?>
        <div class="tt">
            <div
                class="post-178509 post type-post status-publish format-standard has-post-thumbnail hentry category-tin-tuc entry">
                <a href="<?php echo 'tin-tuc.php?id='.$value['id']; ?>" title="<?php echo $value['title'] ?>"><img
                        width="300" height="300" src="../upload/news/<?php echo $value['image_link'] ?> "
                        class="alignleft post-image entry-image" alt="<?php echo $value['title'] ?>"
                        itemprop="image"></a>
                <h2 class="entry-title"><a href="<?php echo 'tin-tuc.php?id='.$value['id']; ?>"
                        rel="bookmark"><?php echo $value['title'] ?></a></h2>
                <div class="entry-content">
                    <p>
                        <?php echo $value['intro'] ?>
                    </p>
                    <p><a href="<?php echo 'tin-tuc.php?id='.$value['id']; ?>" class="more-link">Xem thêm</a></p>
                    <p></p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <div class="navigation">
            <?php 
                                        $table ='news';
                                        $link = 'list-tin-tuc1.php?';
                                        echo navigation($display,$table,$link,$num); 
                                    ?>
        </div>
    </div>


    <?php  require_once __DIR__."/teamplate/footer1.php"; ?>
</body>

</html>