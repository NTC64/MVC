<?php
class User extends Controller
{
    function show()
    {
        $obj = $this->model("productModel");
        $data =  $obj->showcustomer();
        $this->view("client/view_index");

        $this->view("admin/view_customer", $data);
    }
    public function update($makh)
    {
        //get makh from url
        $obj = $this->model("productModel");
        $data = $obj->getcustomer($makh);
        $this->view("client/view_index");
        $this->view("admin/view_updatecustomer", $data);
    }
    public function delete($makh)
    {

        $obj = $this->model("productModel");
        $obj->deletecustomer($makh);
        header("Location:" . url . "/user/show"); // Chú ý: Dùng "Location" để điều hướng đến trang khác.
    }
}
