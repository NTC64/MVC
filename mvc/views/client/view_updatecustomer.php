<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="<?=url?>/user/updates" method="post">
    <table>
        <tr>
            <td>Tên khách hàng</td>
            <td>Số điện thoại</td>
            <td>Email</td>
            <td>Địa chỉ liên hệ</td>
            <td>Địa chỉ giao hàng</td>
        </tr>

        <tr>
            <td><input name="tenkh" type="text" value="<?php echo $data['tenkh'] ?>"></td>
            <td><input name="dienthoai" type="text" value="<?php echo $data['dienthoai'] ?>"></td>
            <td><input name="email" type="text" value="<?php echo $data['email'] ?>"></td>
            <td><input name="diachi_lienhe" type="text" value="<?php echo $data['diachi_lienhe'] ?>"></td>
            <td><input name="diachi_giaohang" type="text" value="<?php echo $data['diachi_giaohang'] ?>"></td>
            <td><input name="makh" type="hidden" value="<?php echo $data['makh'] ?>"></td>
        <tr>
    </table>
    <input type="submit" value="Cập nhật">
</form>
</body>
</html>