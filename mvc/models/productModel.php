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
    public function getProducttype($ma_loaisp)
    {
        $sql = "select * from adproducttype where ma_loaisp='$ma_loaisp'";
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
    public function getProductDetail($ma_sp)
    {
        $sql = "SELECT * FROM product WHERE ma_sp='$ma_sp'";
        $stms = $this->connect()->query($sql);
        $stm = $stms->fetch();
        return $stm;
    }
    // public function getProductDetail($ma_sp)
    // {
    //     $sql = "select * from product where ma_sp='$ma_sp'";
    //     $stm = $this->connect()->query($sql);
    //     while ($row = $stm->fetch()) {
    //         $data[] = $row;
    //     }
    //     if (empty($data))
    //         echo ("");
    //     else
    //         // var_dump($data[]);
    //         return $data;
    // }
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
        $sql = "UPDATE product SET ma_loaisp='$ma_loaisp', tensp='$tensp', hinhanh='$hinhanh', dongia='$dongia', soluong='$soluong', khuyenmai='$khuyenmai', create_date='$create_date' WHERE ma_sp='$ma_sp'";

        $this->connect()->exec($sql);
        echo "Cập nhật thành công";
    }
    public function updateProducttype($ma_loaisp, $ten_loaisp, $mota_loaisp)
    {
        $sql = "UPDATE adproducttype SET ten_loaisp='$ten_loaisp', mota_loaisp='$mota_loaisp' WHERE ma_loaisp='$ma_loaisp'";
        $this->connect()->exec($sql);
        echo "Cập nhật thành công";
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

    public function inserttocart($tenkh, $dienthoai, $email, $diachi_lienhe, $diachi_giaohang, $tongtien)
    {
        // Step 1: Insert data into the 'customer' table
        $sql = "INSERT INTO customer (tenkh, dienthoai, email, diachi_lienhe, diachi_giaohang) 
                VALUES ('$tenkh', '$dienthoai', '$email', '$diachi_lienhe', '$diachi_giaohang')";
        $this->connect()->exec($sql);
        $sql = "SELECT MAX(makh) FROM customer";
        $customerId = $this->connect()->query($sql);
        $customerId = $customerId->fetch();
        $date = date('y/m/d');
        $makh =  $customerId['MAX(makh)'];
        // Step 2: Insert data into the 'ordersp' table
        $sql = "INSERT INTO ordersp (date, tongtien, makh) VALUES ('$date', '$tongtien', '$makh')";
        $this->connect()->exec($sql);
        $sql = "SELECT MAX(mahd) FROM ordersp";
        $orderId = $this->connect()->query($sql);
        $orderId = $orderId->fetch();
        $mahd =  $orderId['MAX(mahd)'];
        // Step 3: Insert data into the 'orderdetail' table for each item in the order
        foreach ($_SESSION['cart'] as $k => $v) {
            $ma_sp = $v['ma_sp']; // Get the product ID
            $tensp = $v['tensp'];
            $quantity = $v['qty']; // Get the quantity
            $dongia = $v['dongia'];
            $khuyenmai = $v['khuyenmai'];

            // Step 4: Insert data into the 'orderdetail' table
            $sql = "INSERT INTO orderdetail (mahd, ma_sp, tensp, soluong, dongia, khuyenmai,`status`) 
                    VALUES ('$mahd', '$ma_sp', '$tensp', '$quantity', '$dongia', '$khuyenmai','Đang giao hàng')";
            $this->connect()->exec($sql);
        }
    }
    public function showListOrder()
    {
        $sql = "select * from `ordersp` join `customer` on `ordersp`.`makh`=`customer`.`makh` join orderdetail on ordersp.mahd=orderdetail.mahd";
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
    public function showDetailOrder($mahd, $makh)
    {
        $sql = "select * from `ordersp` join `orderdetail` on `ordersp`.`mahd`=`orderdetail`.`mahd` where `ordersp`.`mahd`='$mahd' and `ordersp`.`makh`=$makh";
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
    public function updateDetailOrder($mahd, $makh)
    {
        $sql = "UPDATE orderdetail SET status = 'Đã giao' WHERE mahd = $mahd";
        $this->connect()->exec($sql);
    }

    public function showcustomer()
    {
        $sql = "Select * From customer";
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
    public function getCustomerByID($makh)
    {
        $sql = "SELECT * FROM customer WHERE makh='$makh'";
        $stm = $this->connect()->query($sql);
        $stm = $stm->fetch();
        return $stm;
    }
    public function updateUser($makh, $tenkh, $dienthoai, $email, $diachi_lienhe, $diachi_giaohang)
    {
        $sql = "UPDATE customer SET tenkh='$tenkh', dienthoai='$dienthoai', email='$email', diachi_lienhe='$diachi_lienhe', diachi_giaohang='$diachi_giaohang' WHERE makh='$makh'";
        $this->connect()->exec($sql);
        if ($this->connect()->exec($sql) == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function deleteCustomerByID($makh)
    {
        $sql = "DELETE FROM customer WHERE makh='$makh'";
        $this->connect()->exec($sql);
        if ($this->connect()->exec($sql) == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function reportByWeek() {
        $sql = "SELECT * FROM ordersp WHERE date >= DATE_SUB(NOW(), INTERVAL 1 WEEK)";
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
    public function reportByMonth() {
        $sql = "SELECT * FROM ordersp WHERE date >= DATE_SUB(NOW(), INTERVAL 1 MONTH)";
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
    public function reportByYear() {
        $sql = "SELECT * FROM ordersp WHERE date >= DATE_SUB(NOW(), INTERVAL 1 YEAR)";
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
