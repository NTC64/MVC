<?php

class User extends Controller
{
    function show()
    {
        $obj = $this->model("productModel");
        $data = $obj->showcustomer();
        $this->view("admin/view_customer", $data);
    }

    public function update($makh)
    {
        $id = $makh;
        $obj = $this->model("productModel");
        $data = $obj->getCustomerByID($makh);
        $this->view("client/view_updatecustomer", $data);
    }
    public function updates() {
        $data = [
            'makh' => $_POST['makh'],
            'tenkh' => $_POST['tenkh'],
            'dienthoai' => $_POST['dienthoai'],
            'email' => $_POST['email'],
            'diachi_lienhe' => $_POST['diachi_lienhe'],
            'diachi_giaohang' => $_POST['diachi_giaohang']
        ];
        $obj = $this->model("productModel");
        $obj->updateUser($data['makh'], $data['tenkh'], $data['dienthoai'], $data['email'], $data['diachi_lienhe'], $data['diachi_giaohang']);
        header("Location: /MVC/user/show");
    }

    public function delete($makh)
    {
        //get makh from url
        $id = $makh;
        $obj = $this->model("productModel");
        if ($obj->deleteCustomerByID($id) == TRUE) {
            header("Location: /MVC/user/show");
        } else {
            echo "<script>alert('Xóa không thành công')</script>";
        }
    }
}
