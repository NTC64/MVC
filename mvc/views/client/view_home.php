<?php

$obj = new product;
$obj->showlist();
?>

<table border="1">
    <thead>
        <tr>
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Đơn giá</th>
            <th>Khuyến mãi</th>
            <th>Chi tiết</th>
            <th>Thêm vào giỏ hàng</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $key => $value) : ?>
            <tr>
                <td><img src="<?php echo url; ?>/public/images/<?php echo $value['hinhanh'] ?>" width="50"></td>
                <td><?php echo $value['tensp']; ?></td>

                <?php if ($value["khuyenmai"] > 0) : ?>
                    <td><del><?php echo $value['dongia']; ?> VND</del></td>
                    <td><?php echo $value["khuyenmai"]; ?> VND</td>
                <?php else : ?>
                    <td> <?php echo $value['dongia']; ?> VND</td>
                    <td> 0 VND</td>

                <?php endif; ?>


                <td><a href="<?php echo url; ?>/product/getdetail/<?php echo $value['ma_sp']; ?>">Chi tiết</a></td>
                <td><a href="<?php echo url; ?>/order/addtocart/<?php echo $value['ma_sp']; ?>">Thêm</a></td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>