<style>
    .app-menu__item.active1 {
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
            <li class="breadcrumb-item active"><a href="#"><b>Thông tin tài khoản của <?= $data['Ho'] . ' ' . $data['Ten'] ?></b></a></li>
        </ul>
        <div id="clock"></div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">

                    <div class="row element-button">
                        <?php if (isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) { ?>
                            <div class="col-sm-2">
                                <a class="btn btn-add btn-sm" href="./?mod=nguoidung&act=add" title="Thêm"><i class="fas fa-plus"></i>
                                    Thêm mới tài khoản</a>
                            </div>
                            <div class="col-sm-2">
                                <a class="btn btn-add btn-sm" href="./?mod=nguoidung&act=edit<?=$data['MaND']?>" title="Sửa"><i class="fas fa-plus"></i>
                                    Sửa lại tài khoản</a>
                            </div>
                            <div class="col-sm-2">
                                <a class="btn btn-add btn-sm" href="./?mod=nguoidung&act=delete<?=$data['MaND']?>" title="Sửa"><i class="fas fa-plus"></i>
                                    Xóa tài khoản</a>
                            </div>
                        <?php } ?>
                    </div>
                    <table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0" border="0" id="">
                        <thead>
                            <tr>
                                <th>ID tài khoản</th>
                                <th width="150">Họ và tên</th>
                                <th>Tài khoản</th>
                                <th width="300">Địa chỉ</th>

                                <th>Giới tính</th>
                                <th>SĐT</th>
                                <th>Chức vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#<?= $data['MaND'] ?></td>
                                <td><?= $data['Ho'] ?> <?= $data['Ten'] ?></td>
                                <td><?= $data['TaiKhoan'] ?></td>
                                <td><?= $data['Phuong'] ?> <?= $data['Quan'] ?><?= $data['DiaChi'] ?> </td>
                                <td><?= $data['GioiTinh'] ?></td>
                                <td><?= $data['SDT'] ?></td>
                                <td><?php
                                    if ($data['MaQuyen'] == 2) {
                                        echo 'Quản trị viên';
                                    } else {
                                        if ($data['MaQuyen'] == 1) {
                                            echo 'Khách hàng';
                                        } else {
                                            echo 'Nhân viên';
                                        }
                                    }
                                    ?>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>