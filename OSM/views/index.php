<?php session_start(); 
    require_once("../autoload/autoload.php");
?>

<!DOCTYPE html>
<html lang="vn">

<head>
    <?php  require_once __DIR__."/teamplate/head1.php"; ?>
</head>

<body class="js">
    <!-- Preloader -->
    <!-- <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div> -->
    <!-- End Preloader -->
    <!-- header -->
    <?php  require_once __DIR__."/teamplate/header1.php"; ?>
    <!-- END header -->

    <!-- slider -->
    <?php  require_once __DIR__."/teamplate/content-slider1.php"; ?>
    <!-- END slider -->
<!-- Inner product -->
<?php  require_once __DIR__."/teamplate/inner1.php"; ?>
<!-- END inner product -->
    <!-- footer -->
    <?php  require_once __DIR__."/teamplate/footer1.php"; ?>
    <!-- End footer -->
</body>

</html>