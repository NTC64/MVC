<?php
class product extends Controller
{
     public function showlist()
     {
          $obj = $this->model("productModel");
          $data = $obj->showListproduct();
          $this->view("view_home", $data);
     }

     public function getProductID()
     {
          $obj = $this->model("productModel");
          $data1 = $obj->showListproduct(); // Lấy dữ liệu cho Data 1
          $data2 = $obj->showProducttype(); // Lấy dữ liệu cho Data 2
          // Gom cả hai dữ liệu vào một biến
          $data = array(
               "data1" => $data1,
               "data2" => $data2
          );

          // Truyền biến chứa cả hai dữ liệu vào hàm view
          $this->view("view_Adproduct", $data);
     }
     function delete($ma_sp)
     {
          $obj = $this->model("productModel");
          $obj->deleteproduct($ma_sp);
          header("Location: /mvc_lab3/product/getProductID");
     }
     function getProduct($ma_sp)
     {
          $obj = $this->model("productModel");
          $data = $obj->getProduct($ma_sp);
          $this->view("view_Adproduct", $data);
     }
     public function insert($ma_loaisp, $ma_sp, $tensp, $hinhanh, $dongia, $soluong, $khuyenmai, $create_date)
     {
          $obj = $this->model("productModel");
          $obj->inserProduct($ma_loaisp, $ma_sp, $tensp, $hinhanh, $dongia, $soluong, $khuyenmai, $create_date);
          header("Location: /mvc_lab3/product/getProductID"); // Chú ý: Dùng "Location" để điều hướng đến trang khác.
     }
}
