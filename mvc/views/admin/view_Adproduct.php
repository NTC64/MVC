<?php
$obj = new product;
$obj->getProductID();

$ma_loaisp = isset($_POST["dropdow"]) ? $_POST["dropdow"] : "";
$txt_masp = isset($_POST["txt_masp"]) ? $_POST["txt_masp"] : "";
$txt_tensp = isset($_POST["txt_tensp"]) ? $_POST["txt_tensp"] : "";
$txt_hinhanh = isset($_FILES['fileUpload']) ? $_FILES['fileUpload']['name'] : "";
$txt_dongia = isset($_POST["txt_dongia"]) ? $_POST["txt_dongia"] : "";
$txt_soluong = isset($_POST["txt_soluong"]) ? $_POST["txt_soluong"] : "";
$txt_khuyenmai = isset($_POST["txt_khuyenmai"]) ? $_POST["txt_khuyenmai"] : "";
$create_date = date("d/m/y");
if (isset($_POST["btn_save"])) {
    $obj->insert($ma_loaisp, $txt_masp, $txt_tensp, $txt_hinhanh, $txt_dongia, $txt_soluong, $txt_khuyenmai, $create_date);
} elseif (isset($_POST["btn_edit"])) {
    $obj->update($ma_loaisp, $txt_masp, $txt_tensp, $txt_hinhanh, $txt_dongia, $txt_soluong, $txt_khuyenmai, $create_date);
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Mã loại sản phẩm</td>
            <td>
                <select name="dropdow">
                    <?php
                    foreach ($data["data2"] as $key => $value) {  ?>
                        <option value="<?php echo isset($data["data3"][0]["ma_loaisp"]) ? $data["data3"][0]["ma_sp"] : $value['ma_loaisp'] ?>">
                            <?php echo isset($data["data3"][0]["ma_loaisp"]) ? $data["data3"][0]["ma_loaisp"] : $value['ma_loaisp'] ?>
                        </option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Mã sản phẩm</td>
            <td>
                <input type="text" name="txt_masp" id="" value="<?php echo isset($data["data3"][0]["ma_sp"]) ? $data["data3"][0]["ma_sp"] : ''; ?>">
            </td>
        </tr>
        <tr>
            <td>Tên sản phẩm</td>
            <td>
                <input type="text" name="txt_tensp" id="" value="<?php echo isset($data["data3"][0]["tensp"]) ? $data["data3"][0]["tensp"] : ''; ?>">
            </td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td>
                <?php
                if (isset($_FILES['fileUpload'])) {
                    $file_name = $_FILES['fileUpload']['name'];
                    $file_tmp = $_FILES['fileUpload']['tmp_name'];
                    if (empty($errors) == true) {
                        move_uploaded_file($file_tmp, "public/images/" . $file_name);
                    }
                }
                ?>
                <input type="file" name="fileUpload" id="uploadimage" value="<?php echo isset($data["data3"][0]["hinhanh"]) ? $data["data3"][0]["hinhanh"] : ''; ?>" />
            </td>
        </tr>
        <tr>
            <td>Đơn giá</td>
            <td>
                <input type="text" name="txt_dongia" id="" value="<?php echo isset($data["data3"][0]["dongia"]) ? $data["data3"][0]["dongia"] : ''; ?>">
            </td>
        </tr>
        <tr>
            <td>Số lượng</td>
            <td>
                <input type="text" name="txt_soluong" id="" value="<?php echo isset($data["data3"][0]["soluong"]) ? $data["data3"][0]["soluong"] : ''; ?>">
            </td>
        </tr>
        <tr>
            <td>Khuyến mại</td>
            <td>
                <input type="text" name="txt_khuyenmai" id="" value="<?php echo isset($data["data3"][0]["khuyenmai"]) ? $data["data3"][0]["khuyenmai"] : ''; ?>">
            </td>
        </tr>

        <tr>
            <td>Ngày nhập hàng</td>
            <td><?php echo date('d/m/y') ?></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="Lưu" name="btn_save">
                <input type="submit" value="Sửa" name="btn_edit">

            </td>
        </tr>
        <table border="1">
            <thead>
                <tr>
                    <th>Mã loại sp</th>
                    <th>Mã sp</th>
                    <th>Tên SP</th>
                    <th>Hình ảnh</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Khuyến mại</th>
                    <th>Xóa</th>
                    <th>sửa</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($data["data1"] as $key => $value) { ?>
                    <tr>
                        <td><?php echo $value['ma_loaisp'] ?></td>
                        <td><?php echo $value['ma_sp'] ?></td>
                        <td><?php echo $value['tensp'] ?></td>
                        <td><img src="<?php echo (url); ?>/public/images/<?php echo $value['hinhanh'] ?>" width="50"></td>
                        <td><?php echo $value['dongia'] ?></td>
                        <td><?php echo $value['soluong'] ?></td>
                        <td><?php echo $value['khuyenmai'] ?></td>

                        <td><a href="product/delete/<?php echo $value['ma_sp']; ?>">Delete</a></td>
                        <td><a href="<?php echo (url); ?>/product/getProduct/<?php echo $value['ma_sp']; ?>">sửa</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>