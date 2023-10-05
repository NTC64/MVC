<?php
class User extends Controller
{
    function show()
    {
        $obj = $this->model("productModel");
        $data =  $obj->showcustomer();
        $this->view("view_customer", $data);
    }
}
