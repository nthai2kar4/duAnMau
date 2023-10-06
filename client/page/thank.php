<?php if(isset($_SESSION['login_user'])){?>
<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Cảm ơn</h1>
					<nav class="d-flex align-items-center">
						<a href="?index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
						<a href="">Cảm ơn</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<section class="order_details section_gap">
		<div class="container">
			<h3 class="title_confirmation">Cảm ơn. Đơn hàng của bạn đã được xử lý.</h3>
			<div class="order_details_table">
               
				<h2>Chi tiết đơn hàng</h2><h3 class="float-end"># <?= $id = $_SESSION['cart_code']?></h3>
               
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Sản phẩm</th>
								<th scope="col">SL</th>
								<th scope="col">Tổng</th>
							</tr>
						</thead>
						<tbody>
                           <?php foreach(getOrdersDetail($id) as $data):?>
							<tr>
								<td>
									<p><?= $data['name']?></p>
								</td>
								<td>
									<h5>x <?= $data['qty']?></h5>
								</td>
								<td>
									<p><?= number_format($data['sale_price'])?></p>
								</td>
							</tr>			
                            <?php endforeach?>			
								<td>
									<h4>Tổng cộng</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p><?= number_format($_SESSION['total'])?></p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<?php }else{
		echo ' ';
	}?>