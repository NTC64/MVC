<?php
//session_start();
?>
<h1>Giỏ hàng</h1>
<table border="1">
    <tr>
        <td>Mã sản phẩm</td>
        <td>Tên sản phẩm</td>
        <td>Hình ảnh </td>
        <td>Số lượng </td>
        <td> Đơn giá </td>
        <td>Khuyến mại</td>
        <td>Xóa</td>

    </tr>
    <?php
    foreach ($_SESSION['cart'] as $k => $v) {
    ?>
        <tr>
            <td><?php echo $v['ma_sp'] ?></td>
            <td><?php echo $v['tensp'] ?></td>
            <td><img src="<?php echo url; ?>/public/images/<?php echo $v['hinhanh'] ?>" alt="" width="50"></td>
            <td><input type="number" name="" id="" value="<?php echo $v['qty'] ?>" style="width: 50px; border:none;"></td>
            <td><?php echo $v['dongia'] ?></td>
            <td><?php echo $v['khuyenmai'] ?></td>
            <td><a href="<?php echo url; ?>/order/deleteAddtocart/<?php echo $v['ma_sp'] ?>">Xóa</a></td>

        </tr>
    <?php
    }
    ?>
</table>