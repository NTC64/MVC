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
}
