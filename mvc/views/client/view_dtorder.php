<?php
$obj = new order;
?>
<h1>Chi tiết sản phẩm</h1>
<table class="table table-borderless">
    <thead>
        <tr>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Khuyến mại</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $k => $v) { ?>
            <tr>
                <td><?= $v['tensp'] ?></td>
                <td><?= $v['soluong'] ?></td>
                <?php if ($v["khuyenmai"] > 0) : ?>
                    <td><del><?= $v['dongia']; ?> VND</del></td>
                    <td><?= $v["khuyenmai"]; ?> VND</td>
                <?php else : ?>
                    <td> <?= $v['dongia']; ?> VND</td>
                    <td> 0 VND</td>

                <?php endif; ?>
            </tr>
        <?php } ?>

        <h3>Tổng tiền: <?= $v['tongtien'] ?></h3>

    </tbody>
</table>