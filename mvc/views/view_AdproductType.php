<?php
$obj = new home();
$txt_maloaisp = isset($_POST['txt_maloaisp']) ? $_POST['txt_maloaisp'] : "";
$txt_tenloaisp = isset($_POST['txt_tenloaisp']) ? $_POST['txt_tenloaisp'] : "";
$txt_motaloaisp = isset($_POST['txt_motaloaisp']) ? $_POST['txt_maloaisp'] : "";
if (isset($_POST['btnsave'])) {
    $obj->insert($txt_maloaisp, $txt_tenloaisp, $txt_motaloaisp);
}
?>
<form action="" method="post">
    <table>
        <h1>Quản lý loại sản phẩm</h1>
        <tbody>

            <tr>
                <td> Mã loại sản phẩm:</td>
                <td> <input type="text" name="txt_maloaisp" id=""></td>
            </tr>
            <tr>
                <td> Tên loại sản phẩm:</td>
                <td> <input type="text" name="txt_tenloaisp" id=""></td>
            </tr>
            <tr>
                <td> Mô tả sản phẩm:</td>
                <td><input type="text" name="txt_motaloaisp" id=""></td>
            </tr>

            <tr>
                <td>
                    <input type="submit" value="Lưu" name="btnsave">
                </td>

            </tr>
    </table>
    <table border="1">

        <tr>
            <td>Mã loại sp</td>
            <td>Tên loại SP</td>
            <td>Mô tả loại SP</td>
            <td>Xóa</td>
            <td>Sửa</td>
        </tr>
        <tr>
            <?php
            foreach ($data as $key => $value) {  ?>
        <tr>
            <td><?php echo $value['ma_loaisp'] ?></td>
            <td><?php echo $value['ten_loaisp'] ?></td>
            <td><?php echo $value['mota_loaisp'] ?></td>
            <td><a href="home/delete/<?php echo $value['ma_loaisp']; ?>">Delete</a></td>
            <td><a href="home/show/<?php echo $value['ma_loaisp']; ?>">Edit</a></td>

        </tr>
    <?php
            }
    ?>
    </tr>
    </tbody>
    </table>
</form>