<style>
    .app-menu__item.active4 {
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
            <li class="breadcrumb-item active"><a href="#"><b>Danh sách đơn hàng</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <?php if (isset($_SESSION['isLogin_Admin']) || isset($_SESSION['isLogin_Nhanvien'])) { ?>
                        <div class="row element-button">
                            <div class="col-sm-2">
                                <a class="btn btn-add btn-sm" href="./?mod=donhang&id=1" title="Thêm"><i class="fas fa-plus"></i>
                                    Đã duyệt</a>
                            </div>
                            <div class="col-sm-2">
                                <a class="btn btn-add btn-sm" href="./?mod=donhang&id=0" title="Thêm"><i class="fas fa-plus"></i>
                                    Chưa duyệt</a>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if (isset($_COOKIE['msg'])) { ?>
                        <div class="alert alert-success">
                            <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
                        </div>
                    <?php } ?>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th width="10"><input type="checkbox" id="all"></th>
                                <th>Tên người nhận</th>
                                <th>Ngày order</th>
                                <th>Tổng cộng</th>
                                <th>Địa chỉ giao hàng</th>
                                <th>Số điện thoại</th>
                                <th>E-mail</th>
                                <th>Ghi chú</th>
                                <?php if (isset($_SESSION['isLogin_Admin']) || isset($_SESSION['isLogin_Nhanvien'])) { ?>
                                    <th>Trạng thái</th>
                                <?php } ?>
                                <th>Tình Trạng</th>
                                <th>Tính năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $row) { ?>
                                <tr>
                                    <td width="10"><input type="checkbox" name="check1" value="1"></td>
                                    <td><?= $row['tenkhachhang'] ?></td>
                                    <td><?= $row['NgayLap'] ?></td>
                                    <td>$ <?= number_format($row['tongtien']) ?></td>
                                    <td><?=$row['diachi'] ?> </td>
                                    <td><?= $row['sodienthoai'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                  
                                    <td><?= $row['ghichu'] ?></td>
                                    <?php if (isset($_SESSION['isLogin_Admin']) || isset($_SESSION['isLogin_Nhanvien'])) { ?>
                                        <td><?php if ($row['trang_thai'] == 0) {
                                                echo 'Chưa xét duyệt';
                                            } else {
                                                echo 'Đã xét duyệt';
                                            }
                                            ?>
                                        </td>
                                    <?php } ?>
                                    <td><b style="color: red;">
                                            <?php if ($row['trang_thai'] == 0) {
                                                echo '<b class="badge bg-info">Chưa xét duyệt</b>';
                                            } elseif ($row['trang_thai'] == 1) {
                                                echo '<b class="badge bg-success">Đã xét duyệt</b>';
                                            }
                                            ?>
                                        </b></td>
                                    <td>
                                        <?php if (isset($_SESSION['isLogin_Admin']) || isset($_SESSION['isLogin_Nhanvien'])) { ?>
                                            <a class="btn btn-primary btn-sm trash" href="./?mod=donhang&act=delete&id=<?= $row['id'] ?>" onclick="return confirm('Do you really want to delete?');"><i class="fas fa-trash-alt"></i> Xóa</a>
                                        <?php } ?>
                                        <a href="./?mod=donhang&act=chitiet&id=<?= $row['id'] ?>" class="btn btn-primary btn-sm edit"><i class="fas fa-eye"></i> Xem chi tiết</a>

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