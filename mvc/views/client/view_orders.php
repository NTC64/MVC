<?php
$obj = new order;
$obj->showlistorder();
?>
<h3>Quản lý đơn hàng</h3>
<table class="table table-borderless">
    <thead>
        <tr>
            <th>Mã đơn hàng</th>
            <th>Ngày đặt hàng</th>
            <th>Tên khách hàng</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Tổng giá</th>
            <th>Chi tiết</th>

        </tr>
    </thead>
    <tbody>
        <!-- Dòng dữ liệu ví dụ -->
        <?php foreach ($data as $k => $v) {

        ?>
            <tr>
                <td><?php echo $v['mahd'] ?></td>
                <td><?php echo $v['date'] ?></td>
                <td><?php echo $v['tenkh'] ?></td>
                <td><?php echo $v['diachi_lienhe'] ?></td>
                <td><?php echo $v['dienthoai'] ?></td>
                <td><?php echo $v['email'] ?></td>
                <td><?php echo $v['tongtien'] ?></td>
                <td><a href="<?php echo url; ?>/order/showdetailorder/<?php echo $v['mahd'] ?>/<?php echo $v['makh'] ?>">Chi tiết</a></td>

            </tr>
        <?php
        }
        ?>

        <!-- Các dòng dữ liệu khác tương tự -->
    </tbody>
</table>