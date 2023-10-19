<?php

$obj = new product;
$obj->showlist();
?>
<style>
    .product {
        display: flex;
        flex-wrap: wrap;
    }

    .product .card {
        margin: 12px 12px;
    }
</style>
<div class="product">
    <?php foreach ($data as $key => $value) : ?>
        <div class="card" style="width:400px">
            <img class="card-img-top" style="height:300px;object-fit: cover;" src="<?php echo url; ?>/public/images/<?php echo $value['hinhanh'] ?>" alt="Card image">
            <div class="card-body">
                <h4 class="card-title"><?php echo $value['tensp']; ?></h4>
                <p class="card-text"><?php if ($value["khuyenmai"] > 0) : ?>
                <p><del><?php echo $value['dongia']; ?> VND</del></p>
                <p><?php echo $value["khuyenmai"]; ?> VND</p>
            <?php else : ?>
                <p> <?php echo $value['dongia']; ?> VND</p>
                <p> 0 VND</p>

            <?php endif; ?>
            </p>
            <a href="<?php echo url; ?>/product/getdetail/<?php echo $value['ma_sp']; ?>" class="btn btn-primary">Chi tiết</a>
            <a href="<?php echo url; ?>/order/addtocart/<?php echo $value['ma_sp']; ?>" class="btn btn-primary">Thêm vào giỏ hàng</a>

            </div>
        </div>
    <?php endforeach; ?>
</div>