<script>
  function readURL(input, thumbimage) {
    if (input.files && input.files[0]) { //Sử dụng  cho Firefox - chrome
      var reader = new FileReader();
      reader.onload = function(e) {
        $("#thumbimage").attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    } else { // Sử dụng cho IE
      $("#thumbimage").attr('src', input.value);

    }
    $("#thumbimage").show();
    $('.filename').text($("#uploadfile").val());
    $('.Choicefile').css('background', '#14142B');
    $('.Choicefile').css('cursor', 'default');
    $(".removeimg").show();
    $(".Choicefile").unbind('click');

  }
  $(document).ready(function() {
    $(".Choicefile").bind('click', function() {
      $("#uploadfile").click();

    });
    $(".removeimg").click(function() {
      $("#thumbimage").attr('src', '').hide();
      $("#myfileupload").html('<input type="file" id="uploadfile" name="HinhAnh"  onchange="readURL(this);" />');
      $(".removeimg").hide();
      $(".Choicefile").bind('click', function() {
        $("#uploadfile").click();
      });
      $('.Choicefile').css('background', '#14142B');
      $('.Choicefile').css('cursor', 'pointer');
      $(".filename").text("");
    });
  })
</script>

<style>
  .app-menu__item.active1 {
    background: #c6defd;
    text-decoration: none;
    color: rgb(22 22 72);
    box-shadow: none;
    border: 1px solid rgb(22 22 72);
  }

  .Choicefile {
    display: block;
    background: #14142B;
    border: 1px solid #fff;
    color: #fff;
    width: 150px;
    text-align: center;
    text-decoration: none;
    cursor: pointer;
    padding: 5px 0px;
    border-radius: 5px;
    font-weight: 500;
    align-items: center;
    justify-content: center;
  }

  .Choicefile:hover {
    text-decoration: none;
    color: white;
  }

  #uploadfile,
  .removeimg {
    display: none;
  }

  #thumbbox {
    position: relative;
    width: 100%;
    margin-bottom: 20px;
  }

  .removeimg {
    height: 25px;
    position: absolute;
    background-repeat: no-repeat;
    top: 5px;
    left: 5px;
    background-size: 25px;
    width: 25px;
    /* border: 3px solid red; */
    border-radius: 50%;

  }

  .removeimg::before {
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    content: '';
    border: 1px solid red;
    background: red;
    text-align: center;
    display: block;
    margin-top: 11px;
    transform: rotate(45deg);
  }

  .removeimg::after {
    /* color: #FFF; */
    /* background-color: #DC403B; */
    content: '';
    background: red;
    border: 1px solid red;
    text-align: center;
    display: block;
    transform: rotate(-45deg);
    margin-top: -2px;
  }
</style>
<main class="app-content">
  <div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item">Danh sách tài khỏan</li>
      <li class="breadcrumb-item"><a>Chỉnh sửa tài khoản</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">

      <div class="tile">

        <h3 class="tile-title">Chỉnh sửa tài khoản</h3>
        <div class="tile-body">
          <div class="row element-button">
            <div class="col-sm-2">
              <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#exampleModalCenter"><b><i class="fas fa-folder-plus"></i>Thêm tài khoản mới</b></a>
            </div>
          </div>
          <form action="./?mod=customer&act=update" method="POST" role="form" enctype="multipart/form-data" class="row">
            <input class="form-control" name="id_cus" type="hidden" value="<?= $data['id_cus'] ?>">
            <div class="form-group col-md-4">
              <label class="control-label">Gmail</label>
              <input class="form-control" name="gmail_cus" value="<?= $data['gmail_cus'] ?>" type="text" required>
            </div>
            <div class="form-group col-md-4">
              <label class="control-label">Tên</label>
              <input class="form-control" name="name_cus" type="text" value="<?= $data['name_cus'] ?>" required>
            </div>
            <div class="form-group col-md-4">
              <label class="control-label">Tỉnh/Thành Phố</label>
              <input class="form-control" type="text" name="address_cus" value="<?= $data['address_cus'] ?>" required>
            </div>
         
            <div class="form-group  col-md-4">
              <label class="control-label">Số điện thoại</label>
              <input class="form-control" name="phone_cus" value="<?= $data['phone_cus'] ?>" type="tel" required>
            </div>
          
            <div class="form-group col-md-4">
              <label class="control-label">Mật khẩu</label>
              <input class="form-control" name="pass_cus" value="<?= $data['pass_cus'] ?>" type="password">
            </div>

            <div class="form-group col-md-6">
              <label for="exampleSelect1" class="control-label">Chức vụ</label>
              <select class="form-control" name="id_phanquyen" id="exampleSelect1">
                <option>-- Chọn chức vụ --</option>
                <option <?= ($data['id_phanquyen'] == '1') ? 'selected' : '' ?> value="1">Khách hàng</option>
                <option <?= ($data['id_phanquyen'] == '2') ? 'selected' : '' ?> value="2">Quản trị viên</option>
                <option <?= ($data['id_phanquyen'] == '3') ? 'selected' : '' ?> value="3">Nhân viên</option>
                <option <?= ($data['id_phanquyen'] == '4') ? 'selected' : '' ?> value="4">Nhân viên giao hàng</option>
                <option <?= ($data['id_phanquyen'] == '5') ? 'selected' : '' ?> value="5">Biên tập viên</option>
              </select>
            </div>

            <div class="form-group col-md-6">
              <button class="btn btn-save btn_b" type="submit">Lưu lại</button>
              <a class="btn btn-cancel btn_b" href="./?mod=nguoidung">Hủy bỏ</a>
            </div>
          </form>
        </div>

      </div>

</main>