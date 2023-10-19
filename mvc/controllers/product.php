<?php
class product extends controller
{
     public function showlist()
     {
          $obj = $this->model("productModel");
          $data = $obj->showListproduct();
          $this->view("client/view_index");

          $this->view("client/view_home", $data);
     }

     public function getProductID()
     {
          $obj = $this->model("productModel");
          $data1 = $obj->showListproduct();
          $data2 = $obj->showProducttype();
          // Gom cả hai dữ liệu vào một biến
          $data = array(
               "data1" => $data1,
               "data2" => $data2
          );

          // Truyền biến chứa cả hai dữ liệu vào hàm view
          $this->view("client/view_index");

          $this->view("admin/view_Adproduct", $data);
     }
     function delete($ma_sp)
     {
          $obj = $this->model("productModel");
          $obj->deleteproduct($ma_sp);
          header("Location: " . url . "/product/getProductID");
     }
     function getdetail($ma_sp)
     {
          $obj = $this->model("productModel");
          $data = $obj->getProductDetail($ma_sp);
          $this->view("client/view_index");

          $this->view("client/view_Dtproduct", $data);
     }
     function getProduct($ma_sp)
     {
          $obj = $this->model("productModel");
          $data1 = $obj->showListproduct();
          $data2 = $obj->showProducttype();
          $data3 = $obj->getProduct($ma_sp);
          $data = array(
               "data1" => $data1,
               "data2" => $data2,
               "data3" => $data3

          );
          $this->view("client/view_index");

          $this->view("admin/view_Adproduct", $data);
     }
     public function insert($ma_loaisp, $ma_sp, $tensp, $hinhanh, $dongia, $soluong, $khuyenmai, $create_date)
     {
          $obj = $this->model("productModel");
          $obj->inserProduct($ma_loaisp, $ma_sp, $tensp, $hinhanh, $dongia, $soluong, $khuyenmai, $create_date);
          header("Location:" . url . "/product/getProductID"); // Chú ý: Dùng "Location" để điều hướng đến trang khác.
     }
     public function update($ma_loaisp, $ma_sp, $tensp, $hinhanh, $dongia, $soluong, $khuyenmai, $create_date)
     {
          $obj = $this->model("productModel");
          $obj->updateProduct($ma_loaisp, $ma_sp, $tensp, $hinhanh, $dongia, $soluong, $khuyenmai, $create_date);
          header("Location:" . url . "/product/getProductID"); // Chú ý: Dùng "Location" để điều hướng đến trang khác.
     }
}
