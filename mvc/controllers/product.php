<?php
class product extends Controller
{
     public function show()
     {
          $obj = $this->model("productModel");
     }

     public function getProductID()
     {
          $obj = $this->model("productModel");
          $data1 = $obj->showListproduct(); // Lấy dữ liệu cho Data 1
          $data2 = $obj->showProducttype(); // Lấy dữ liệu cho Data 2

          // Gom cả hai dữ liệu vào một biến
          $combinedData = array(
               "data1" => $data1,
               "data2" => $data2
          );

          // Truyền biến chứa cả hai dữ liệu vào hàm view
          $this->view("view_Adproduct", $combinedData);
     }
     function delete($ma_sp)
     {
          $obj = $this->model("productModel");
          $obj->deleteproduct($ma_sp);
          header("Location: /mvc_lab3/product/getProductID");
     }

     public function insert($ma_loaisp, $ma_sp, $tensp, $hinhanh, $dongia, $soluong, $khuyenmai, $create_date)
     {
          $obj = $this->model("productModel");
          $obj->inserProduct($ma_loaisp, $ma_sp, $tensp, $hinhanh, $dongia, $soluong, $khuyenmai, $create_date);
          header("Location: /mvc_lab3/product/getProductID"); // Chú ý: Dùng "Location" để điều hướng đến trang khác.
     }
}
