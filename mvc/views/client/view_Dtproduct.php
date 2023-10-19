<?php

$obj = new product;
?>
<h3>Chi tiết sản phẩm </h3>
<div style="display: flex;">

    <img src="<?php echo url ?>/public/images/<?php echo $data["hinhanh"] ?>" style="width:300px;margin-right:30px;" alt="">
    <div>
        <h3>Tên sản phẩm: <?php echo $data["tensp"] ?></h3>


        <?php if ($data["khuyenmai"] > 0) : ?>
            <h3>Giá sản phẩm: <del><?php echo $data['dongia']; ?> VND</del> </h3>
            <h3>Khuyến mại: <?php echo $data['dongia']; ?> VND</h3>
        <?php else : ?>
            <h3>Khuyến mại: <?php echo $data['dongia']; ?> VND</h3>
        <?php endif; ?>
        <p> Số lượng sản phẩm: <?php echo $data['soluong']; ?> </p>
        <a href="<?php echo url; ?>/order/addtocart/<?php echo $data['ma_sp']; ?>" class="btn btn-primary">Thêm vào giỏ hàng</a>
    </div>
</div>