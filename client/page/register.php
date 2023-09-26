<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Register</h1>
                <nav class="d-flex align-items-center">
                    <a href="?index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="category.html">Register</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->
<!--================Login Box Area =================-->
<section class="login_box_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <img class="img-fluid" src="client/asset/img/login.jpg" alt="">
                    <div class="hover">
                        <h4>New to our website?</h4>
                        <p>There are advances being made in science and technology everyday, and a good example of this
                            is the</p>
                        <a class="primary-btn" href="?pages=login">You have account?</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner">
                    <h3>Register</h3>
                    <form class="row login_form" action="" method="post" id="contactForm" novalidate="novalidate">
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="name" name="fullname" placeholder="Full name"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Full name'">
                            <? if (isset($_POST['register'])) {
								echo $erroName;
							} ?>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="name" name="email" placeholder="Email"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
                            <? if (isset($_POST['register'])) {
								echo $erroEmail;
							} ?>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" id="name" name="password" placeholder="Password"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                            <? if (isset($_POST['register'])) {
								echo $erroPass;
							}?>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" id="name" name="confirmpassword"
                                placeholder="Confirm Password" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Confirm Password'">
                            <? if (isset($_POST['register'])) {
								echo $erroConfirm;
							}?>
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" name="register" class="primary-btn">Register</button>
                        </div>
                        <? if (isset($_POST['register'])) {
								echo $acp;
							}?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Login Box Area =================-->