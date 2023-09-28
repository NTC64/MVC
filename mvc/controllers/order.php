<?php
session_start();
class order extends Controller
{
    public function addtocart($ma_sp)
    {
        $obj = $this->model("productModel");
        $data = $obj->getProductDetail($ma_sp);
        //var_dump($data);

        if (isset($_SESSION['cart'])) {
            //lưu số lượng vào giỏ hàng theo biến session 
            if (isset($_SESSION['cart'][$ma_sp])) {
                $_SESSION['cart'][$ma_sp]['qty'] += 1;
            } else {
                $_SESSION['cart'][$ma_sp]['qty'] = 1;
            }
            //lưu thông tin của sản phẩm vào mảng session 
            $_SESSION['cart'][$ma_sp]['ma_sp'] = $data['ma_sp'];
            $_SESSION['cart'][$ma_sp]['tensp'] = $data['tensp'];
            $_SESSION['cart'][$ma_sp]['hinhanh'] = $data['hinhanh'];
            $_SESSION['cart'][$ma_sp]['dongia'] = $data['dongia'];
            $_SESSION['cart'][$ma_sp]['khuyenmai'] = $data['khuyenmai'];
            $_SESSION['cart'][$ma_sp]['soluong'] = $data['soluong'];
        } else {
            $_SESSION['cart'][$ma_sp]['qty'] = 1;
            $_SESSION['cart'][$ma_sp]['ma_sp'] = $data['ma_sp'];
            $_SESSION['cart'][$ma_sp]['tensp'] = $data['tensp'];
            $_SESSION['cart'][$ma_sp]['hinhanh'] = $data['hinhanh'];
            $_SESSION['cart'][$ma_sp]['dongia'] = $data['dongia'];
            $_SESSION['cart'][$ma_sp]['khuyenmai'] = $data['khuyenmai'];
            $_SESSION['cart'][$ma_sp]['soluong'] = $data['soluong'];
        }
        header("refresh:0.001; url=http://localhost/mvc_lab3/order/getlistAddtocart");
    }
    public function getlistAddtocart()
    {
        if (isset($_SESSION['cart'])) {
            $this->view("view_addtocart", $_SESSION['cart']);
        }
    }
    public function deleteAddtocart($ma_sp)
    {
        if (array_key_exists($ma_sp, $_SESSION['cart'])) {
            unset($_SESSION['cart'][$ma_sp]);
        }
        header("refresh:0.001; url=http://localhost/mvc_lab3/order/getlistAddtocart");
    }
    //cap nhap so luong san pham cho gio hang
    public function updateAddtocart($ma_sp, $newQuantity)
    {

        if (isset($_SESSION['cart'][$ma_sp])) {
            $_SESSION['cart'][$ma_sp]['qty'] = $newQuantity;
        }
    }
    /*luu thông tin don hang, khach hanh vo database
    customer(makh,tenkh,dienthoai,email,diachi_lienhe, diachigiaohang)
    oderDetail(mahd,masp,tensp,soluong,dongia,khuyenmai)
    oder(maHD,date_create,tongtien,makh)
    */
}
