<style>
    .app-menu__item.active2 {
        background: #c6defd;
        text-decoration: none;
        color: rgb(22 22 72);
        box-shadow: none;
        border: 1px solid rgb(22 22 72);
    }
</style>
<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Danh sách sản phẩm</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">


                    <div class="row element-button">
                        <div class="col-sm-2">
                            <a class="btn btn-add btn-sm" href="./?mod=mon&act=add" title="Thêm"><i class="fas fa-plus"></i>
                                Thêm sản phẩm mới
                            </a>
                        </div>
                        <?php if (isset($_SESSION['isLogin_Admin'])) { ?>
                            <div class="col-sm-2">
                                <a class="btn btn-add btn-sm" href="./?mod=danhmuc&act=add" title="Thêm"><i class="fas fa-plus"></i>
                                    Thêm danh mục
                                </a>
                            </div>
                          
                        <?php } ?>
                    </div>

                    <?php if (isset($_COOKIE['msg'])) { ?>
                        <div class="alert alert-warning">
                            <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
                        </div>
                    <?php } ?>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th width="10"><input type="checkbox" id="all"></th>
                                <th width="200">Tên món ăn</th>
                                <th>Ảnh</th>
                                <th>Giá tiền</th>
                                <th>Danh mục</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $row) { ?>
                                <tr>
                                    <td width="10"><input type="checkbox" name="check1" value="1"></td>
                                 
                                    <td><?= $row['tenmon'] ?></td>
                                    <td><img src="<?= $row['hinhmon'] ?>" alt="" width="100px;"></td>
                                    
                                    <td>$ <?= number_format($row['gia']) ?></td>
                                    <td>
                                        <?php
                                            if($row['madanhmuc'] == 1){
                                                echo "Món chính";
                                            }elseif ($row['madanhmuc'] == 2) {
                                                echo "Ăn uống";
                                            }elseif ($row['madanhmuc'] == 3) {
                                                echo "Đồ uống";
                                            }elseif ($row['madanhmuc'] == 4) {
                                                echo "Món chay";
                                            }
                                        ?>
                                    </td>
                                   
                                    <td>
                                        <?php if (isset($_SESSION['isLogin_Admin'])) { ?>
                                            <button class="btn btn-primary btn-sm trash" type="button" title="Xóa" onclick="location.href='./?mod=mon&act=delete&id=<?= $row['id'] ?>';confirm('Do you really want to delete?');"><i class="fas fa-trash-alt"></i></button>
                                        <?php } ?>
                                        <button class="btn btn-primary btn-sm edit" onclick="location.href='./?mod=mon&act=edit&id=<?= $row['id'] ?>'" type="button" title="Sửa" id="show-emp"><i class="fas fa-edit"></i></button>
                                     </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>