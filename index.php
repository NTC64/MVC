<?php
//gọi trang app.php
const url = "http://localhost:2002/mvc";
require_once "./mvc/core/app.php";
require_once "./mvc/core/controller.php";
require_once "./mvc/core/DB.php";
$app = new App();
