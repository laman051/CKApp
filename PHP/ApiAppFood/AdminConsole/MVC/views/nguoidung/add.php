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
      $("#myfileupload").html('<input type="file" id="uploadfile"  onchange="readURL(this);" />');
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
      <li class="breadcrumb-item">Danh sách nhân viên</li>
      <li class="breadcrumb-item"><a href="#">Thêm nhân viên</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">

      <div class="tile">

        <h3 class="tile-title">Tạo mới nhân viên</h3>
        <div class="tile-body">
          <div class="row element-button">
            <div class="col-sm-2">
              <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#exampleModalCenter"><b><i class="fas fa-folder-plus"></i> Tạo chức vụ mới</b></a>
            </div>
          </div>
          <?php if (isset($_COOKIE['msg'])) { ?>
            <div class="alert alert-warning">
              <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
            </div>
          <?php } ?>
          <form action="./?mod=nguoidung&act=store" method="POST" role="form" enctype="multipart/form-data" class="row">
            <div class="form-group col-md-4">
              <label class="control-label">Họ</label>
              <input class="form-control" name="Ho" type="text" required>
            </div>
            <div class="form-group col-md-4">
              <label class="control-label">Tên</label>
              <input class="form-control" name="Ten" type="text" required>
            </div>
            <div class="form-group col-md-4">
              <label class="control-label">Tên tài khoản</label>
              <input class="form-control" name="TaiKhoan" type="text" required>
            </div>
            <div class="form-group col-md-4">
              <label class="control-label">Địa chỉ email</label>
              <input class="form-control" name="Email" type="text" required>
            </div>
            <div class="form-group col-md-4">
              <label class="control-label">Tỉnh/Thành Phố</label>
              <input class="form-control" name="DiaChi" type="text" required>
            </div>
            <div class="form-group col-md-4">
              <label class="control-label">Quận/Huyện</label>
              <input class="form-control" name="Quan" type="text" required>
            </div>
            <div class="form-group col-md-4">
              <label class="control-label">Địa chỉ thường trú</label>
              <input class="form-control" name="Phuong" type="text" required>
            </div>
            <div class="form-group  col-md-4">
              <label class="control-label">Số điện thoại</label>
              <input class="form-control" name="SDT" type="tel" required>
            </div>
            <div class="form-group col-md-3">
              <label class="control-label">Giới tính</label>
              <select name="GioiTinh" class="form-control" id="exampleSelect2" required>
                <option>-- Chọn giới tính --</option>
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
              </select>
            </div>
            <div class="form-group  col-md-4">
              <label class="control-label">Mật khẩu</label>
              <input class="form-control" name="MatKhau" type="password" required>
            </div>
            <div class="form-group  col-md-3">
              <label for="exampleSelect1" class="control-label">Chức vụ</label>
              <select name="MaQuyen" class="form-control" id="exampleSelect1">
                <option>-- Chọn chức vụ --</option>
                <option value="1">Khách hàng</option>
                <option value="2">Quản trị viên</option>
                <option value="3">Nhân viên</option>
                <option value="4">Nhân viên giao hàng</option>
                <option value="5">Biên tập viên</option>
              </select>
            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Ảnh 3x4 nhân viên</label>
              <div id="myfileupload">
                <input type="file" id="uploadfile" name="HinhAnh" onchange="readURL(this);" />
              </div>
              <div id="thumbbox">
                <img height="300" width="300" alt="Thumb image" id="thumbimage" style="display: none" />
                <a class="removeimg" href="javascript:"></a>
              </div>
              <div id="boxchoice">
                <a href="javascript:" class="Choicefile"><i class='bx bx-upload'></i></a>
                <p style="clear:both"></p>
              </div>
            </div>

            <div class="form-group  col-md-4">
              <button class="btn btn-save" type="submit">Lưu lại</button>
              <button class="btn btn-cancel" href="/doc/table-data-table.html">Hủy bỏ</button>
            </div>
          </form>
        </div>

      </div>

</main>


<!--
  MODAL
-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <div class="row">
          <div class="form-group  col-md-12">
            <span class="thong-tin-thanh-toan">
              <h5>Tạo chức vụ mới</h5>
            </span>
          </div>
          <div class="form-group col-md-12">
            <label class="control-label">Nhập tên chức vụ mới</label>
            <input class="form-control" type="text" required>
          </div>
        </div>
        <BR>
        <button class="btn btn-save" type="button">Lưu lại</button>
        <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
        <BR>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>