<?php
class User extends Controller
{
    function show()
    {
        $obj = $this->model("productModel");
        $data =  $obj->showcustomer();
        $this->view("admin/view_customer", $data);
    }
    public function update() {
        //get makh from url
        $makh = $_GET['makh'];
        var_dump($makh); die();
        $obj = $this->model("productModel");
        $data = $obj->getcustomer($makh);
        $this->view("admin/view_updatecustomer", $data);
    }
    public function delete() {
        //get makh from url
        $makh = $_GET['makh'];
        $obj = $this->model("productModel");
        $obj->deletecustomer($makh);
        header("Location: /mvc_lab3/user/show"); // Chú ý: Dùng "Location" để điều hướng đến trang khác.
    }
}
