<?php
class productModel  extends Database
{
    // hiển thị dữ liệu trong bảng adproducttype

    public function showProducttype()
    {
        $sql = "SELECT * FROM adproducttype";
        $stm = $this->connect()->query($sql);
        while ($row = $stm->fetch()) {
            $data[] = $row;
        }
        if (empty($data))
            echo ("");
        else
            // var_dump($data[]);
            return $data;
    }

    // thêm dữ liệu vào bảng adproducttype
    public function insertproductype($ma_loaisp, $ten_loaisp, $mota_loaisp)
    {
        $sql1 = "INSERT INTO adproducttype(ma_loaisp,ten_loaisp,mota_loaisp) VALUES ('$ma_loaisp','$ten_loaisp','$mota_loaisp')";
        $this->connect()->exec($sql1);
        echo "bạn ghi mới được tạo thành công";
    }
    public function deleteproductype($ma_loaisp)
    {
        $sql = "DELETE FROM adproducttype WHERE ma_loaisp='$ma_loaisp'";
        $this->connect()->exec($sql);
        echo "bản ghi được xóa thành công";
    }
    public function deleteproduct($ma_sp)
    {
        $sql = "DELETE FROM product WHERE  ma_sp='$ma_sp'";
        $this->connect()->exec($sql);
        echo "bản ghi được xóa thành công";
    }
    /*quan ly dnah muc san <pham */
    public function inserProduct($ma_loaisp, $ma_sp, $tensp, $hinhanh, $dongia, $soluong, $khuyenmai, $create_date)
    {
        $sql = "INSERT INTO product VALUE('$ma_loaisp','$ma_sp','$tensp', '$hinhanh','$dongia','$soluong','$khuyenmai','$create_date')";
        $this->connect()->exec($sql);
        echo "ghi mới thành công";
    }
    public function getProduct($ma_sp)
    {
        $sql = "select * from product where ma_sp='$ma_sp'";
        $stm = $this->connect()->query($sql);
        while ($row = $stm->fetch()) {
            $data[] = $row;
        }
        if (empty($data))
            echo ("");
        else
            // var_dump($data[]);
            return $data;
    }
    public function updateProduct($ma_loaisp, $ma_sp, $tensp, $hinhanh, $dongia, $soluong, $khuyenmai, $create_date)
    {
        $sql = "UPDATE product SET ma_loaisp='$ma_loaisp', tensp='$tensp', hinhanh='$hinhanh', dongia='$dongia', soluong='$soluong', khuyenmai='$khuyenmai', create_date='$create_date' WHERE  ma_sp='$ma_sp''";

        $this->connect()->exec($sql);
        echo "cập nhật thành công";
    }
    public function showListproduct()
    {
        $sql = "select * from product";
        $stm = $this->connect()->query($sql);
        while ($row = $stm->fetch()) {
            $data[] = $row;
        }
        if (empty($data))
            echo ("");
        else
            // var_dump($data[]);
            return $data;
    }
}
