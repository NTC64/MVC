<form action="" method="post">
    <h1>Quản lý khách hàng</h1>
    <table border="1">

        <tr>
            <td>Tên khách hàng</td>
            <td>Số điện thoại</td>
            <td>Email</td>
            <td>Địa chỉ liên hệ</td>
            <td>Địa chỉ giao hàng</td>
            <td><a>Chỉnh sửa</a></td>
            <td><a>Xoá</a></td>
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
            <td><a href="http://localhost:2002/MVC/user/update/<?= $value['makh']; ?>">Edit</a></td>
            <td><a href="http://localhost:2002/MVC/user/delete/<?= $value['makh']; ?>">Delete</a></td>
        </tr>
    <?php
            }
    ?>
    </tr>
    </tbody>
    </table>
</form>