<?php
include '../include/auth_admin.php';
require_once '../class/system.php';
require_once("../class/javascript.php");
require_once("../class/tools.php");
JavaScript::setCharset("UTF-8");
if (!Permission::hasPermission($_SESSION['admin'], $_SESSION['permit'], $_MODULE->modules[$_MODULE->log_payment][1])){exit("權限不足!!");}
$pageno = Tools::parseInt2($_POST["pageno"], 1);
$memberlist = $_POST["memberlist"];
$userid = $_POST["userid"];
if ($memberlist <> ""){
    include("../include/db_open.php");
    $sql = "DELETE FROM logATM WHERE No IN ($memberlist)";
    mysql_query($sql) or die("資料庫錯誤：" . mysql_error());
    include("../include/db_close.php");
}//if
else{
    JavaScript::Alert("輸入欄位不足!!");
}//else
JavaScript::Redirect("log_payment.php?pageno=$pageno&userid=$userid");
?>