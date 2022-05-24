<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">Danh sách đơn hàng</li>
            <li class="breadcrumb-item"><a href="#">Kiểm tra đơn hàng</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Thông tin nhân viên giao hàng</h3>
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Tên nhân viên</th>
                                <th>Ngày bắt đầu giao hàng</th>
                                <th>Ngày kết thúc giao hàng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> <?= $data['NameTransports'] ?> </td>
                                <td> <?= $data['NgayBatDau'] ?></td>
                                <td> <?= $data['NgayKetThuc'] ?></td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>