<header class="header_area sticky-header">
	<div class="main_menu">
		<nav class="navbar navbar-expand-lg navbar-light main_box">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<a class="navbar-brand logo_h" href="?index.php"><img src="client/asset/img/logo.png" alt=""></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
					<ul class="nav navbar-nav menu_nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="?index.php">Trang chủ</a></li>
						<li class="nav-item submenu dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cửa hàng</a>
							<ul class="dropdown-menu">
								<li class="nav-item"><a class="nav-link" href="?pages=shop&action=category">Shop Category</a></li>
								<li class="nav-item"><a class="nav-link" href="client/single-product.html">Product Details</a></li>
								<li class="nav-item"><a class="nav-link" href="client/checkout.html">Product Checkout</a></li>
								<li class="nav-item"><a class="nav-link" href="client/cart.html">Shopping Cart</a></li>
								<li class="nav-item"><a class="nav-link" href="client/confirmation.html">Confirmation</a></li>
							</ul>
						</li>
						<li class="nav-item submenu dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tin tức</a>
							<ul class="dropdown-menu">
								<li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
								<li class="nav-item"><a class="nav-link" href="single-blog.html">Blog Details</a></li>
							</ul>
						</li>
						<li class="nav-item submenu dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Trang</a>
							<ul class="dropdown-menu">
								<li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
								<li class="nav-item"><a class="nav-link" href="tracking.html">Tracking</a></li>
								<li class="nav-item"><a class="nav-link" href="elements.html">Elements</a></li>
							</ul>
						</li>
						<li class="nav-item"><a class="nav-link" href="contact.html">Liên hệ</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="nav-item"><a href="?pages=cart&action=list" class="cart"><span class="ti-bag"></span></a></li>
						<li class="nav-item">
							<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
						</li>
						<li class="nav-item"><span><form action="" method="post"><?php if (isset($_SESSION['login_user'])) {
													echo $data[0]["name"]." <button class='search' style='color:red; margin-left:5px;' name='logout' type='submit'>Đăng xuất</button>";
												} else {
													echo '<a href="?pages=login" class="search"><span class="lnr lnr-user" id="search"></span></a>';
												} ?></form></span></li>
					</ul>
				</div>
			</div>
		</nav>
	</div>
	<div class="search_input" id="search_input_box">
		<div class="container">
			<form class="d-flex justify-content-between">
				<input type="text" class="form-control" id="search_input" placeholder="Search Here">
				<button type="submit" class="btn"></button>
				<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
			</form>
		</div>
	</div>
</header>