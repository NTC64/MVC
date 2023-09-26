<?php
//require_once ('productcontroller.php');
//$objproduct= new home;
//$data=   $objproduct->showProducttype();



//var_dump($data);
//thêm dữ liệu vào bảng adproducttype
//$objproduct->addProducttype("Bông xinh","đáng","yêu của mẹ");

//sửa dữ liệu trong bảng adproducttype
//$objproduct->updateProducttype("Nokia","chansd quá","chdhsak");

//xóa dữ liệu bảng adproducttype;
//$objproduct->deleteProductype('r3');
?>
<?php
$obj = new home();
    $txt_maloaisp =isset($_POST['txt_maloaisp'])? $_POST['txt_maloaisp']:"";
    $txt_tenloaisp =isset($_POST['txt_tenloaisp'])? $_POST['txt_tenloaisp']:"";
    $txt_motaloaisp =isset($_POST['txt_motaloaisp'])? $_POST['txt_maloaisp']:"";
if (isset ($_POST['btnsave'])){
    $obj ->insert($txt_maloaisp,$txt_tenloaisp ,$txt_motaloaisp );
}
        ?>
<form action="" method="post">
    <table>
        <tr>
        <td><input type="text" name="txt_maloaisp" id=""></td>
        <td><input type="text" name="txt_tenloaisp" id=""></td>
        <td><input type="text" name="txt_motaloaisp" id="">
             <input type="submit" value="Lưu" name ="btnsave">
        </td>
        </tr>
        <tr>
            <td>Mã loại sp</td>
            <td>Tên loại SP</td>
            <td>Mô tả loại SP</td>
            <td>Xóa</td>
        </tr>
        <tr>
        <?php
        foreach ($data as $key => $value) {  ?>
        <tr>
            <td><?php echo $value['ma_loaisp']?></td>
            <td><?php echo $value['ten_loaisp']?></td>
            <td><?php echo $value['mota_loaisp']?></td>
            <td><a href="home/delete/<?php echo $value['ma_loaisp']; ?>">Delete</a></td>         
        </tr>
        <?php
        }
        ?>
        </tr>
    </table>
</form>
        

