
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

					
		<h2 class="text-center">Danh Mục</h2>

<?php
 require('../../../lib/mysqli_connect.php');       
?>

<?php
if (isset($_GET['xoa'])) {
	$id = $_GET['xoa'];
	$sql_xoa = mysqli_query($conn, "DELETE FROM category WHERE id='$id'");
}
?>


<div class="right_col" role="main">
	<div class="row">
		<div class="col-md-12 col-sm-12 ">
			<div class="dashboard_graph">
				<div class="row x_title">
					<div class="col-md-12">
                        
						
						<table class="table table-bordered">
							<div class="pagination">
								<tr>

									<th>STT</th>
									<th>Tên</th>
									<th>Trạng Thái</th>
                                    <th>Xóa</th>
                                    <th>Cập Nhật</th>   
								</tr>
								<?php
								
						// TÌM TỔNG SỐ RECORDS
						$result = mysqli_query($conn, "SELECT * FROM category");
								while ($row = mysqli_fetch_assoc($result)) {
								?>
									<tr>
										<td><?php echo $row['id'] ?></td>
										<td><?php echo $row['name'] ?></td>
                                        <td><?php echo $row['status'] ?></td>
										<td><a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="?xoa=<?php echo $row['id'] ?>">Xóa</a></td>
                                        <td> <a href="updateCategory.php?quanly=capnhat&id=<?php echo $row['id'] ?>">Cập nhật</a></td>                               
									</tr>
									</tr>
								<?php
								}
								?>
						</table>

						
				
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