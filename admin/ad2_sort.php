<?php
include '../include/auth_admin.php';
require_once '../class/system.php';
require_once '../class/admin.php';
require_once '../class/javascript.php';
require_once '../class/tools.php';
JavaScript::setCharset("UTF-8");
if (!Permission::hasPermission($_SESSION['admin'], $_SESSION['permit'], $_MODULE->modules[$_MODULE->ad2][1])){exit("權限不足!!");}

$itemno = $HTTP_POST_VARS["itemno"];
$diff = $HTTP_POST_VARS["sort"];
$pageno = Tools::parseInt2($HTTP_POST_VARS["pageno"], 1);
$usefor = $_REQUEST["usefor"];
$catalog = $_REQUEST["catalog"];

if ($itemno > 0 && $diff != 0){
    include("../include/db_open.php");
	$sql = "SELECT Sort FROM AD2 WHERE No = '$itemno'";
	$result = mysql_query($sql) or die (mysql_error());
	if (list($curr_sort) = mysql_fetch_row($result)){
		$max_sort = 0;
		$sql = "SELECT max(Sort) FROM AD2 WHERE useFor = '$usefor' AND Catalog='$catalog'";
		$result = mysql_query($sql) or die (mysql_error());
		list($max_sort) = mysql_fetch_row($result);
		$new_sort = $curr_sort + $diff;
		if ($new_sort >= 0 && $new_sort <= $max_sort){
			mysql_query("UPDATE AD2 SET Sort = '$curr_sort' WHERE Sort = '$new_sort' AND useFor = '$usefor' AND Catalog='$catalog'") or die (mysql_error());
			mysql_query("UPDATE AD2 SET Sort = '$new_sort' WHERE No = '$itemno'") or die (mysql_error());
		}
	}
	include("../include/db_close.php");
}//if
else{
	JavaScript::Alert("輸入欄位不足!!" . $itemno . "-" . $diff);
}//else
JavaScript::Redirect("ad2.php?pageno=$pageno&usefor=$usefor&catalog=$catalog");
?>