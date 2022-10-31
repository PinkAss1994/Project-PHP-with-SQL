		
	<?php
include '../teamplate1/head.php';
?>
<?php
include '../teamplate1/header.php';
?>
		<h2 class="text-center">Các Đơn Vị Giao Hàng</h2>
		<?php
require('../../../lib/mysqli_connect.php');
?>

<?php
if (isset($_GET['xoa'])) {
	$id = $_GET['xoa'];
	$sql_xoa = mysqli_query($conn, "DELETE FROM logistics WHERE id='$id'");
}
?>
<div class="page-container">
<div class="right_col" role="main">
	<div class="row">
		<div class="col-md-12 col-sm-12 ">
			<div class="dashboard_graph">
				<div class="row x_title">
					<div class="col-md-12">
                        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
						<table class="table table-bordered">
							<div class="pagination">
								<tr>
									<th>STT</th>
									<th>Tên Đơn Vị</th>
                                    <th>Giá Vận Chuyển</th>
                                    <th>Xóa</th>
                                    <th>Cập Nhật</th>     
								</tr>
								<?php
								
						// TÌM TỔNG SỐ RECORDS
						$result = mysqli_query($conn, "SELECT * FROM logistics");
								while ($row = mysqli_fetch_assoc($result)) {
								?>
									<tr>
										<td><?php echo $row['id'] ?></td>
										<td><?php echo $row['name'] ?></td>
										<td><?php echo $row['price'] ?></td>
                                    </button>      
                                    <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="?xoa=<?php echo $row['id'] ?>">Xóa</a></td>
                                        <td> <a href="updateLogistics.php?quanly=capnhat&id=<?php echo $row['id'] ?>">Cập nhật</a></td>                               
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
</div>

                 
<?php

include '../teamplate1/script.php';
?>
                
                     
                       
                        
   


















