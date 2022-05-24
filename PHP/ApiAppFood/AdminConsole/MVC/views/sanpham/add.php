<style>
  .app-menu__item.active2 {
    background: #c6defd;
    text-decoration: none;
    color: rgb(22 22 72);
    box-shadow: none;
    border: 1px solid rgb(22 22 72);
  }

  .circle {
    border-radius: 50%;
  }
</style>
<main class="app-content">
  <div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item">Danh sách sản phẩm</li>
      <li class="breadcrumb-item"><a href="#">Thêm sản phẩm</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Tạo mới sản phẩm</h3>
        <div class="row element-button">
          <div class="col-sm-2">
            <a class="btn btn-add btn-sm" href="./?mod=danhmuc&act=add" title="Thêm"><i class="fas fa-plus"></i>
              Thêm danh mục
            </a>
          </div>
          <div class="col-sm-2">
            <a class="btn btn-add btn-sm" href="./?mod=loaisanpham&act=add" title="Thêm"><i class="fas fa-plus"></i>
              Thêm loại sản phẩm
            </a>
          </div>
        </div>
        <?php if (isset($_COOKIE['msg'])) { ?>
          <div class="alert alert-warning">
            <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
          </div>
        <?php } ?>
        <div class="tile-body">
          <form action="?mod=mon&act=store" method="POST" enctype="multipart/form-data" class="row">
            <div class="form-group col-md-3">
              <label for="exampleSelect1" class="control-label">Danh mục</label>
              <select class="form-control" name="MaDM" id="exampleSelect1">
                <option>-- Chọn danh mục --</option>
                <?php foreach ($data_dm as $row) { ?>
                  <option value="<?= $row['id'] ?>"><?= $row['tendanhmuc'] ?></option>
                <?php } ?>
              </select>
            </div>
          
            <div class="form-group col-md-12">
              <label class="control-label">Tên món</label>
              <input class="form-control" name="tenmon" type="text">
            </div>
            <div class="form-group col-md-3">
              <label class="control-label">Giá bán</label>
              <input class="form-control" name="gia" type="text">
            </div>

            <div class="form-group col-md-3">
              <label class="control-label">Link hình ảnh</label>
              <input class="form-control" name="hinhmon" type="text">
            </div>

            <div class="form-group col-md-3">
              <label class="control-label">Mô tả</label>
              <input class="form-control" name="mota" type="text">
            </div>
           
          
            <div class="form-group col-md-3">
              <button class="btn btn-save" type="submit">Lưu lại</button>
              <a class="btn btn-cancel" href="?mod=sanpham">Hủy bỏ</a>
            </div>
          </form>
        </div>
      </div>
    </div>
</main>