<?php
//session_start();
$obj = new order();

// Xử lý lưu thông tin khách hàng nếu biểu mẫu đã được gửi đi
if (isset($_POST['bntupdate'])) {
    foreach ($_POST['quantity'] as $ma_sp => $newQuantity) {
        // Kiểm tra xem số lượng mới có hợp lệ không
        $newQuantity = intval($newQuantity); // Đảm bảo số lượng là kiểu số nguyên

        if ($newQuantity >= 0) { // Kiểm tra số lượng không âm
            // Gọi hàm updateAddtocart để cập nhật giỏ hàng
            $obj->updateAddtocart($ma_sp, $newQuantity);
        }
    }
} elseif (isset($_POST['buy'])) {

    $tenkh = $_POST['ten'];
    $dienthoai = $_POST['so_dien_thoai'];
    $email = $_POST['email'];
    $diachi_lienhe = $_POST['dia_chi_lien_he'];
    $diachi_giaohang = $_POST['dia_chi_giao_hang'];
    $tongtien = $_POST['tongtien'];
    $obj->insertCart($tenkh, $dienthoai, $email, $diachi_lienhe, $diachi_giaohang, $tongtien);
}
?>

<h1>Giỏ hàng của tôi</h1>
<form action="" method="post">
    <!-- Thêm các trường thông tin khách hàng -->
    <table>
        <tr>
            <td>Tên khách hàng</td>
            <td><input type="text" name="ten" id="ten"></td>
        </tr>
        <tr>
            <td>Địa chỉ liên hệ</td>
            <td><input type="text" name="dia_chi_lien_he" id="dia_chi"></td>
        </tr>
        <tr>
            <td>Số điện thoại</td>
            <td><input type="text" name="so_dien_thoai" id="so_dien_thoai"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td>Địa chỉ giao hàng</td>
            <td><input type="text" name="dia_chi_giao_hang" id="dia_chi_giao_hang"></td>
        </tr>
        <tr>

            <td><input type="submit" name="buy" id="buy" value="Đặt hàng"></td>
        </tr>
    </table>

    <br>
    <br>
    <table border="1">
        <tr>
            <td>Mã sản phẩm</td>
            <td>Tên sản phẩm</td>
            <td>Hình ảnh</td>
            <td>Số lượng</td>
            <td>Đơn giá</td>
            <td>Khuyến mại</td>
            <td>Xóa</td>
        </tr>
        <?php
        $tongtien = 0;
        foreach ($_SESSION['cart'] as $k => $v) {
        ?>
            <tr>
                <td><?php echo $v['ma_sp'] ?></td>
                <td><?php echo $v['tensp'] ?></td>
                <td><img src="<?php echo url; ?>/public/images/<?php echo $v['hinhanh'] ?>" alt="" width="50"></td>
                <td>
                    <input type="number" name="quantity[<?php echo $v['ma_sp'] ?>]" id="quantity_<?php echo $v['ma_sp'] ?>" value="<?php echo $v['qty'] ?>" style="width: 50px; ">
                </td>
                <?php if ($v["khuyenmai"] > 0) : ?>
                    <td> <del><?php echo $v['dongia']; ?> VND</del></td>
                    <td><?php echo $v['khuyenmai'];
                        $tongtien += ($v['khuyenmai'] * $v['qty']); ?> VND</td>
                <?php else : ?>
                    <td><?php echo $v['dongia'];
                        $tongtien += ($v['dongia'] * $v['qty']);  ?> VND</td>
                    <td> 0 VND</td>
                <?php endif; ?>

                <td><a href="<?php echo url; ?>/order/deleteAddtocart/<?php echo $v['ma_sp'] ?>">Xóa</a></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <?php

    echo '<td?><h3>Tổng tiền:<input type="text" name="tongtien" value="' . $tongtien . '" readonly style="border:none;"></h3></td>';
    ?>
    <input type="submit" value="Lưu sản phẩm vào giỏ hàng" name="bntupdate">
</form>