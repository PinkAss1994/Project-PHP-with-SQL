<?php
session_start();
$email = $_SESSION["admin"];
print_r($email);
if ( ($email == "") || ($email == null) ) {
    header('Location: ../index.php');
}
?>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="../index.php">
                            <img src="../../../upload/logo.jpg" alt="OSM" style="width :180px;" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a href="../home_page.php">
                                <i class="zmdi zmdi-balance"></i>Trang Chủ </a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="../Order/list_order.php">
                                <i class="zmdi zmdi-shopping-cart"></i>Quản Lý Đơn Hàng</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="../Customer/list_customer.php">
                                <i class="zmdi zmdi-account-o"></i>Quản Lý khách hàng</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="zmdi zmdi-smartphone"></i>Quản Lý Sản phẩm</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="../Product/list_of_products.php">Danh Sách Sản phẩm</a>
                                </li>
                                <li>
                                    <a href="../Product/add_product.php">Thêm sản phẩm</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="zmdi zmdi-shopping-cart"></i>Quản Lý Danh Mục</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="../Category/manageCategory.php">Danh Sách Danh Mục</a>
                                </li>
                                <li>
                                    <a href="../Category/addCategory.php">Thêm Danh Mục</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="zmdi zmdi-eye"></i>Quản Lý Tin Tức</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="../News/manageNews.php">Danh Sách Tin Tức</a>
                                </li>
                                <li>
                                    <a href="../News/addNews.php">Thêm Tin Tức</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="zmdi zmdi-car"></i>Đơn Vị Giao Hàng</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="../Logistics/manageLogistics.php">Danh Sách Đơn Vị Giao Hàng</a>
                                </li>
                                <li>
                                    <a href="../Logistics/addLogistics.php">Thêm Đơn Vị Giao Hàng</a>
                                </li>
                            </ul>
                        </li>


                 

                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="../home_page.php">
                    <img src="../../../upload/logo.jpg" alt="OSM" style="width :180px;">
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">


                        <li>
                            <a href="../home_page.php">
                                <i class="zmdi zmdi-balance"></i>Trang Chủ </a>
                        </li>
                        
                        <li class="has-sub">
                            <a class="js-arrow" href="../Order/list_order.php">
                                <i class="zmdi zmdi-shopping-cart"></i>Quản Lý Đơn Hàng</a>                           
                        </li>

                        <li class="has-sub">
                            <a class="js-arrow" href="../Customer/list_customer.php">
                                <i class="zmdi zmdi-account-o"></i>Quản Lý khách hàng</a>
                        </li>

                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="zmdi zmdi-smartphone"></i>Quản Lý Sản phẩm</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="../Product/list_of_products.php">Danh Sách Sản phẩm</a>
                                </li>
                                <li>
                                    <a href="../Product/add_product.php">Thêm sản phẩm</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="zmdi zmdi-shopping-cart"></i>Quản Lý Danh Mục</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="../Category/manageCategory.php">Danh Sách Danh Mục</a>
                                </li>
                                <li>
                                    <a href="../Category/addCategory.php">Thêm Danh Mục</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="zmdi zmdi-eye"></i>Quản Lý Tin Tức</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="../News/manageNews.php">Danh Sách Tin Tức</a>
                                </li>
                                <li>
                                    <a href="../News/addNews.php">Thêm Tin Tức</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="zmdi zmdi-car"></i>Đơn Vị Vận Chuyển</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="../Logistics/manageLogistics.php">Danh Sách Đơn Vị Vận Chuyển</a>
                                </li>
                                <li>
                                    <a href="../Logistics/addLogistics.php">Thêm Đơn Vị Vận Chuyển</a>
                                </li>
                            </ul>
                        </li>

                     
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                            </form>
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="content">
                                            <?php
                                          
                                            if (isset($_SESSION["admin"])) {
                                            echo $_SESSION["admin"];} 
                                              //else {
                                            //     echo '<li><a href="login_form.php">Đăng nhập</a></li>';
                                            //      }
                                             ?>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="account-dropdown__footer">
                                                <a href="../logout.php">
                                                    <i class="zmdi zmdi-power"></i>Đăng xuất</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </div>

    </div>
</body>