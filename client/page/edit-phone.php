<section class="banner-area organic-breadcrumb">
  <div class="container">
    <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
      <div class="col-first">
        <h1>Chỉnh sửa số điện thoại</h1>
        <nav class="d-flex align-items-center">
          <a href="?pages=profile&action=profile">Hồ sơ<span class="lnr lnr-arrow-right"></span></a>
          <a href="">Chỉnh sửa SDT</a>
        </nav>
      </div>
    </div>
  </div>
</section>
<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <form action="" class="col-lg-8" method="post">
        <div class="card mb-4">
          <div class="card-body">
          <h3>Chỉnh sửa SDT</h3>
          <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Thay đổi số điện thoại</p>
              </div>
              <div class="col-sm-9">
                <input class="text-muted mb-0" value="<?= !empty($data[0]['phone']) ? $data[0]['phone']: ''  ?>" style="outline:none; width:80%;" name="phone"></input>
              </div>
              <div class="col-sm-12 mt-2" style="padding-left: 340px;">
                <button class="btn phung" style=" color:#fff; width:90px" type="submit" name="phone_user">Tiếp theo</button>
              </div>
            </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>