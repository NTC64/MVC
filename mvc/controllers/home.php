<?php
class Home extends Controller
{
	function showIndex()
	{
		$this->view("view_index");
	}
	function show()
	{
		$obj = $this->model("productModel");
		$data = array("data1" => $obj->showProducttype());
		$this->view("admin/view_AdproductType", $data);
	}
	function insert($ma_loaisp, $ten_loaisp, $mota_loaisp)
	{
		$obj = $this->model("productModel");
		$obj->insertproductype($ma_loaisp, $ten_loaisp, $mota_loaisp);
		header("Refresh: 0.0001 ; url=http://localhost:2002/MVC/home/show");
	}
	function delete($ma_loaisp)
	{
		$obj = $this->model("productModel");
		$obj->deleteproductype($ma_loaisp);
		header("Location:" . url . "/home/show");
	}
	function getProducttype($ma_loaisp)
	{
		$obj = $this->model("productModel");
		$data1 = $obj->showProducttype();
		$data2 = $obj->getProducttype($ma_loaisp);
		$data = array(
			"data1" => $data1,
			"data2" => $data2
		);
		$this->view("view_AdproductType", $data);
	}
	public function update($ma_loaisp, $ten_loaisp, $mota_loaisp)
	{
		$obj = $this->model("productModel");
		$obj->updateProducttype($ma_loaisp, $ten_loaisp, $mota_loaisp);
		header("Location: /mvc_lab3/home/show"); // Chú ý: Dùng "Location" để điều hướng đến trang khác.
	}
	/*quanlydanhmucsanpham*/
}
