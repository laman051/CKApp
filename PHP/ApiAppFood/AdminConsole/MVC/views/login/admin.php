<style>
    .app-menu__item.active {
        background: #c6defd;
        text-decoration: none;
        color: rgb(22 22 72);
        box-shadow: none;
        border: 1px solid rgb(22 22 72);
    }
</style>
<?php if ((isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) || (isset($_SESSION['isLogin_Nhanvien']) && $_SESSION['isLogin_Nhanvien'] == true)) { ?>
    <main class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="app-title">
                    <ul class="app-breadcrumb breadcrumb">
                        <li class="breadcrumb-item"><a><b>Control Panel</b></a></li>
                    </ul>
                    <div id="clock"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <!--Left-->
            <div class="col-md-12 col-lg-12">
                <div class="row">

                    <div class="col-md-6">
                        <div class="widget-small info coloured-icon"><i class='icon bx bxs-data fa-3x'></i>
                            <div class="info">
                                <h4>Tổng tiền tháng <?= date('m') ?></h4>
                                <p><b><?= $data_countM['Count'] ?>$</b></p>
                                <p class="info-tong">Tổng số sản phẩm được quản lý.</p>
                            </div>
                        </div>
                    </div>
                    <!-- col-6 -->
                    <!-- col-6 -->
                    <div class="col-md-6">
                        <div class="widget-small info coloured-icon"><i class='icon bx bx-money fa-3x'></i>
                            <div class="info">
                                <h4>Tổng danh thu năm <?= date('Y') ?></h4>
                                <p><b><?= $data_countY['Count'] ?>$</b></p>
                            </div>
                        </div>
                    </div>
                    <!-- col-6 -->

                    <!-- col-6 -->
                    <div class="col-md-6">
                        <div class="widget-small warning coloured-icon"><i class='icon bx bxs-shopping-bags fa-3x'></i>
                            <div class="info">
                                <h4>Tổng đơn hàng</h4>
                                <p><b><?= $data_hd['Count'] ?> đơn hàng</b></p>
                                <p class="info-tong">Tổng số chưa xét duyệt</p>
                            </div>
                        </div>
                    </div>

                    <!-- col-6 -->
                    <div class="col-md-6">
                        <div class="widget-small primary coloured-icon"><i class='icon bx bxs-user-account fa-3x'></i>
                            <div class="info">
                                <h4>Tổng khách hàng</h4>
                                <p><b><?= $data_nguoidung['Count'] ?> khách hàng</b></p>
                                <p class="info-tong">Tổng số khách hàng được quản lý.</p>
                            </div>
                        </div>
                    </div>
                    <!-- col-6 -->
                    <div class="col-md-6">
                        <div class="widget-small info coloured-icon"><i class='icon bx bxs-data fa-3x'></i>
                            <div class="info">
                                <h4>Tổng sản phẩm</h4>
                                <p><b><?= $data_tong['Count'] ?> sản phẩm</b></p>
                                <p class="info-tong">Tổng số sản phẩm được quản lý.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="tile">
                            <h3 class="tile-title">Đơn hàng vừa cập nhật</h3>
                            <div>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Tên khách hàng</th>
                                            <th>Địa chỉ giao hàng</th>
                                            <th>Số điện thoại</th>
                                            <th>Phương thức thanh toán</th>
                                            <th>Trạng thái</th>
                                            <th>Tính năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data_hoadon as $row) { ?>
                                            <tr>
                                                <td><?= $row['tenkhachhang'] ?></td>
                                                <td><?= $row['diachi'] ?></td>
                                                <td><?= $row['sodienthoai'] ?></td>
                                                <td><?= $row['email'] ?></td>
                                                <td><?php if ($row['trang_thai'] == 0) {
                                                        echo 'Chưa xét duyệt';
                                                    } else {
                                                        echo 'Đã xét duyệt';
                                                    }
                                                    ?></td>
                                                <td>
                                                    <?php if (isset($_SESSION['isLogin_Admin'])) { ?>
                                                        <a class="btn btn-primary btn-sm trash" href="./?mod=hoadon&act=delete&id=<?= $row['id'] ?>" onclick="return confirm('Do you really want to delete?');"><i class="fas fa-trash-alt"></i> Xóa</a>
                                                    <?php } ?>
                                                    <a href="./?mod=hoadon&act=chitiet&id=<?= $row['id'] ?>" class="btn btn-primary btn-sm edit"><i class="fas fa-eye"></i> Xem chi tiết</a>
                                                </td>
                                            </tr>

                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!--END left-->
        </div>


        <div class="text-center" style="font-size: 13px">
            <p><b>Copyright
                    <script type="text/javascript">
                        document.write(new Date().getFullYear());
                    </script> &COPY; | Meta
                </b></p>
        </div>
    </main>

<?php } elseif (isset($_SESSION['isLogin_TransportStaff']) && $_SESSION['isLogin_TransportStaff'] == true) {
    require("MVC/views/hoadon/list.php");
} else {
    require("MVC/views/blogs/list.php");
} ?>