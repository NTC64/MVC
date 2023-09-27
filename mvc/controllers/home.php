<?php
class Home extends Controller
{

	function show()
	{
		$obj = $this->model("productModel");
		$data = $obj->showProducttype();
		$this->view("view_AdproductType", $data);
	}
	function insert($ma_loaisp, $ten_loaisp, $mota_loaisp)
	{
		$obj = $this->model("productModel");
		$obj->insertproductype($ma_loaisp, $ten_loaisp, $mota_loaisp);
		header("Refresh: 0.0001 ; url=http://localhost/mvc_lab3/home/show");
	}
	function delete($ma_loaisp)
	{
		$obj = $this->model("productModel");
		$obj->deleteproductype($ma_loaisp);
		header("Refresh: 0.0001 ; url=http://localhost/mvc_lab3/home");
	}
	/*quanlydanhmucsanpham*/
}
