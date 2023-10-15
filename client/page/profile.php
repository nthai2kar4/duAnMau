<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (isset($_SESSION['login_user'])) {
  $data = login();
}
?>

<section class="banner-area organic-breadcrumb">
  <div class="container">
    <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
      <div class="col-first">
        <h1>Hồ sơ của tôi</h1>
        <nav class="d-flex align-items-center">
          <a href="?index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
          <a href="?pages=profile">Hồ sơ</a>
        </nav>
      </div>
    </div>
  </div>
</section>
<section style="background-color: #eee;">
  <form action="" class="container py-5" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="<?= !empty($data[0]['avatar']) ? $data[0]['avatar'] : 'https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp' ?>" alt="avatar" class="rounded-circle img-fluid mb-2" style="width: 150px;">
            <div class="d-flex justify-content-center mb-2">
              <label for="image_user" class="btn btn-light btn--m btn--inline" style="border: 1px solid rgba(0,0,0,.09);">Chọn ảnh</label>
              <input type="file" id="image_user" name="avatar" style="display:none ;">
              <input type="hidden" value="<?= $data[0]['id'] ?>" name="id_user">
              <input type="hidden" value="<?= !empty($data[0]['avatar']) ? $data[0]['avatar'] : ''  ?>" name="avatar2">
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Họ và tên</p>
              </div>
              <div class="col-sm-9">
                <input class="text-muted mb-0" value="<?= $data[0]['name'] ?>" style="outline:none; width:80%; border:0;"></input>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $data[0]['email'] ?><a href="" style="text-decoration:underline; margin-left:10px">Sửa</a></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Số điện thoại</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php if (!empty($data[0]['phone'])) {
                                              echo $data[0]['phone']; ?>
                    <a href='?pages=profile&action=edphone&user=<?= $data[0]['id'] ?>' style='text-decoration:underline; margin-left:10px'>Thay đổi</a>
                  <?php   } else {
                  ?>
                    <a href="?pages=profile&action=edphone&user=<?= $data[0]['id'] ?>" style="text-decoration:underline; margin-left:10px">Thêm</a>
                  <?php
                                            }
                  ?>
                </p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Địa chỉ</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php if (!empty($data[0]['address'])) {
                                              echo $data[0]['address']; ?>
                    <a href='?pages=profile&action=edaddress&user=<?= $data[0]['id'] ?>' style='text-decoration:underline; margin-left:10px'>Thay đổi</a>
                  <?php   } else {
                  ?>
                    <a href="?pages=profile&action=edaddress&user=<?= $data[0]['id'] ?>" style="text-decoration:underline; margin-left:10px">Thêm</a>
                  <?php
                                            }
                  ?>
                </p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-12" style="padding-left: 340px;">
                <button class="btn phung" style=" color:#fff; width:70px" type="submit" name="save_user">Lưu</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </from>
</section>