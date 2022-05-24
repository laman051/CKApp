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
      <li class="breadcrumb-item active"><a href="#"><b>Danh sách tài khoản</b></a></li>
    </ul>
    <div id="clock"></div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">

          <div class="row element-button">
            <?php if (isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) { ?>
              <div class="col-sm-4">
                <a class="btn btn-add btn-sm" href="./?mod=customer&act=add" title="Thêm"><i class="fas fa-plus"></i>
                  Thêm mới tài khoản</a>
              </div>
            <?php } ?>
          </div>
          <table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0" border="0" id="sampleTable">
            <thead>
              <tr>
                <th>ID tài khoản</th>
                <th width="150">Họ và tên</th>
                <th>Tài khoản</th>
                <th width="300">Địa chỉ</th>
                <th>SĐT</th>
                <th>Chức vụ</th>
                <th width="120">Tính năng</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data as $row) { ?>
                <tr>
                  <td>#<?= $row['id_cus'] ?></td>
                  <td><?= $row['name_cus'] ?></td>
                  <td><?= $row['gmail_cus'] ?></td>
                  <td><?= $row['address_cus'] ?></td>
                  <td><?= $row['phone_cus'] ?></td>
                  <td><?php
                      if ($row['id_phanquyen'] == 2) {
                        echo 'Quản trị viên';
                      } else {
                        if ($row['id_phanquyen'] == 1) {
                          echo 'Khách hàng';
                        } elseif ($row['id_phanquyen'] == 4) {
                          echo 'Nhân viên giao hàng';
                        } elseif ($row['id_phanquyen'] == 5) {
                          echo 'Biên tập viên';
                        } else {
                          echo 'Nhân viên';
                        }
                      }
                      ?></td>
                  <td class="table-td-center">
                    <button class="btn btn-primary btn-sm trash" type="button" title="Xóa" onclick="location.href='./?mod=customer&act=delete&id=<?= $row['id_cus'] ?>';confirm('Do you really want to delete?');"><i class="fas fa-trash-alt"></i>
                    </button>
                    <button class="btn btn-primary btn-sm edit" onclick="location.href='./?mod=customer&act=edit&id=<?= $row['id_cus'] ?>'" type="button" title="Sửa" id="show-emp"><i class="fas fa-edit"></i>
                    </button>
                    <button class="btn btn-primary btn-sm edit" onclick="location.href='./?mod=customer&act=detail&id=<?= $row['id_cus'] ?>'" type="button" title="Xem" id="show-emp"><i class="fas fa-eye"></i>
                    </button>
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