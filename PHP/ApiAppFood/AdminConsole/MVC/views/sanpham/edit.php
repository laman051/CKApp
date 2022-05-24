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
            <li class="breadcrumb-item"><a href="#">Chỉnh sửa sản phẩm</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Chỉnh sửa sản phẩm</h3>

                <div class="row element-button">
                    <div class="col-sm-2">
                        <a class="btn btn-add btn-sm" href="?mod=mon&act=add" title="Thêm"><i class="fas fa-plus"></i>
                            Thêm sản phẩm mới
                        </a>
                    </div>
                    <?php if (isset($_SESSION['isLogin_Admin'])) { ?>
                        <div class="col-sm-2">
                            <a class="btn btn-add btn-sm" href="?mod=mon&act=add" title="Thêm"><i class="fas fa-plus"></i>
                                Thêm danh mục
                            </a>
                        </div>
                        
                    <?php } ?>
                    <div class="col-sm-2">
                        <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#adddanhmuc"><i class="fas fa-folder-plus"></i> Thêm Màu Sản Phẩm</a>
                    </div>
                </div>


                <div class="tile-body">
                    <form action="?mod=mon&act=update" method="POST" enctype="multipart/form-data" class="row">

                        <div class="form-group">
                            <input type="hidden" name="id" value="<?= $data['id'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="exampleSelect1" class="control-label">Danh mục</label>
                            <select class="form-control" name="madanhmuc" id="exampleSelect1">
                                <?php foreach ($data_dm as $row) { ?>
                                    <option <?= ($row['id'] == $data['madanhmuc']) ? 'selected' : '' ?> value="<?= $row['id'] ?>"><?= $row['tendanhmuc'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label class="control-label">Giá bán</label>
                            <input class="form-control" value="<?= $data['gia'] ?>" name="gia" type="text">
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label class="control-label">Tên sản phẩm</label>
                            <input class="form-control" value="<?= $data['tenmon'] ?>" name="tenmon" type="text">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label">Link ảnh mới</label>
                            <input class="form-control" name="hinhmon" type="text">
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label">Ảnh món ăn</label>
                            <div id="boxchoice">
                                <img width="200" height="200" src="<?= $data['hinhmon'] ?>" alt="" srcset="">
                            </div>

                        </div>
                       
                      
                        <div class="form-group col-md-9">
                            <label class="control-label">Mô tả</label>
                           
                            <textarea name="mota" id="" cols="100" rows="100"><?= $data['mota'] ?></textarea>
                        </div>
                      
                        <div class="form-group col-md-3 text-center">
                            <button class="btn btn-save" type="submit">Lưu lại</button>
                            <a class="btn btn-cancel" href="?mod=mon">Hủy bỏ</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</main>
<style>
    .app-menu__item.active2 {
        background: #c6defd;
        text-decoration: none;
        color: rgb(22 22 72);
        box-shadow: none;
        border: 1px solid rgb(22 22 72);
    }
</style>

