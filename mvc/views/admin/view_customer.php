<form action="" method="post">
    <h1>Quản lý khách hàng</h1>
    <table border="1">

        <tr>
            <td>Tên khách hàng</td>
            <td>Số điện thoại</td>
            <td>Email</td>
            <td>Địa chỉ liên hệ</td>
            <td>Địa chỉ giao hàng</td>
        </tr>
        <tr>
            <?php
            foreach ($data as $key => $value) {  ?>
        <tr>
            <td><?php echo $value['tenkh'] ?></td>
            <td><?php echo $value['dienthoai'] ?></td>
            <td><?php echo $value['email'] ?></td>
            <td><?php echo $value['diachi_lienhe'] ?></td>
            <td><?php echo $value['diachi_giaohang'] ?></td>
        </tr>
    <?php
            }
    ?>
    </tr>
    </tbody>
    </table>
</form>