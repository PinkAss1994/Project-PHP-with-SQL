
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

					
		<h2 class="text-center">Tin Tức</h2>
		<?php
require('../../../lib/mysqli_connect.php');
?>
<?php
if (isset($_GET['xoa'])) {
	$id = $_GET['xoa'];
	$sql_xoa = mysqli_query($conn, "DELETE FROM news WHERE id='$id'");
}
?>


<div class="right_col" role="main">
	<div class="row">
		<div class="col-md-12 col-sm-12 ">
        <?php
            if (isset($_GET['quanly']) == 'capnhat')
                $id_capnhat = $_GET['id_id'];
            $sql_capnhat = mysqli_query($conn, "SELECT * FROM news WHERE id='$id_capnhat'");
            $row_capnhat = mysqli_fetch_array($sql_capnhat);
            $id_category_1 = $row_capnhat['id'];
            ?>
			<div class="dashboard_graph">
                    <h5>Tiêu Đề </h5>
                <?php
                echo $row_capnhat['title'];
                ?>
                <h5>Giới Thiệu</h5>
                <?php
                echo $row_capnhat['intro'];
                ?>
                <h5>Nội Dung </h5>
                <?php
                echo $row_capnhat['content'];
                ?>
                <img src="../../image/<?php echo $row_capnhat['image_link'] ?>" height="150">
                
                
            </div>

          
						

					</div>

				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
</div>

<?php

include '../teamplate1/script.php';
?>














