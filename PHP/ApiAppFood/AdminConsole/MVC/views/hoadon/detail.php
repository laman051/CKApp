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
        <h3 class="tile-title">Kiểm tra đơn hàng</h3>
        <?php if (isset($data) and $data != null) {
          if ((isset($_SESSION['isLogin_Admin'])) || (isset($_SESSION['isLogin_Nhanvien']))) { ?>
            <div class="col-sm-2">
              <a href="./?mod=donhang&act=xetduyet&id=<?= $data['0']['id'] ?>" class="btn btn-success">Browse bills</a>
            </div>
          <?php } ?>

          <?php if (isset($_SESSION['isLogin_Admin'])) { ?>
            <div class="col-sm-2">
              <a href="./?mod=donhang&act=delete&id=<?= $data['0']['id'] ?>" onclick="return confirm('Do you really want to delete?');" type="button" class="btn btn-danger">Xóa</a>
            </div>

        <?php }
        } ?>
        <div class="tile-body">
          <table class="table table-hover table-bordered" id="sampleTable">
            <thead>
              <tr>
                <th width="10"><input type="checkbox" id="all"></th>
                <th>Tên món</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng đơn hàng</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data as $row) { ?>
                <tr>
                  <td><input type="checkbox" id="all"></td>
                  <td><?= $row['tenmon'] ?></td>
                  <td>$ <?= number_format($row['gia']) ?></td>
                  <td><?= $row['soluong'] ?></td>
                  <td>$ <?= number_format($row['gia'] * $row['soluong']) ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
</main>