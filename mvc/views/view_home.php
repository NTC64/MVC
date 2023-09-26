<?php
$obj = new home;
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
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $key => $value) : ?>
            <tr>
                <td><img src="../public/images/<?php echo $value['hinhanh'] ?>" width="50"></td>
                <td><?php echo $value['tensp']; ?></td>

                <?php if ($value["khuyenmai"] > 0) : ?>
                    <td><del><?php echo $value['dongia']; ?></del><br></td>
                    <td><?php echo $value["khuyenmai"]; ?></td>
                <?php else : ?>
                    <td> <?php echo $value['dongia']; ?></td>
                <?php endif; ?>


                <td><a href="home/getproductID/<?php echo $value['ma_sp']; ?>">Chi tiết</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>