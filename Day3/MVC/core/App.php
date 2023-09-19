<?php
class App
{
    public $controller = "home";
    public $action = "show";
    public $params;
    function __construct()
    {
        $arr = $_GET;
        $arr = $this->Urlprocess();
        if (file_exists("./MVC/controllers/" . $arr[0] . ".php")) {
            $this->controller = $arr[0];
            unset($arr[0]);
        }
        require_once "./MVC/controllers/" . $this->controller . ".php";
        //xử lý action xem funtion nào được gọi trong các controller
        $this->controller = new $this->controller;
        if (isset($arr[1])) {  //kiểm tra xem có tồn tại function trong controller không
            if (method_exists($this->controller, $arr[1])) {
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }
        // xử lý params 
        $this->params = $arr ? array_values($arr) : [];
        call_user_func_array([$this->controller, $this->action], $this->params);
    }
    function Urlprocess()
    {
        // echo $_GET["url"];
        if (isset($_GET["url"])) {
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
    }
}
