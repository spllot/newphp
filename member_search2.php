<script type="text/javascript">
	function goSeller(xNo){
		location.href = "member_intro.php?seller=" + xNo;
	}
	function goProduct(xType, xNo){
		location.href = "member_product" + xType + "_detail.php?no=" + xNo;
	}
	function goBack(){
		history.go(-1);
	}
</script>
<?php
require_once './class/javascript.php';
require_once './class/tools.php';
$keyword = $_REQUEST["keyword"];
$type = $_REQUEST["type"];
JavaScript::setCharset("UTF-8");
include("./include/db_open.php");

if($type != "" && $keyword != ""){
	if($type == "email"){
		$result = mysql_query("SELECT * FROM Member WHERE userID='$keyword'");
		if($rs=mysql_fetch_array($result)){
			JavaScript::Execute("goSeller('{$rs['No']}');");
		}
		else{
			JavaScript::Alert("查無此商家帳號，請重新輸入!");
			JavaScript::Execute("goBack();");
		}
	}
	else if($type=="code"){
		$product = (int)substr($keyword, -5);
		$result = mysql_query("SELECT * FROM Product WHERE No='$product' AND Status=2 AND dateClose > CURRENT_TIMESTAMP");
		if($rs=mysql_fetch_array($result)){
			if($rs['Mode'] == 1){
				if($rs['Deliver'] == 0){
					$type=1;
				}
				if($rs['Deliver'] == 1){
					$type=2;
				}
			}
			if($rs['Mode'] == 2){
				if($rs['Deliver'] == 0){
					$type=4;
				}
				if($rs['Deliver'] == 1){
					$type=5;
				}
			}
			JavaScript::Execute("goProduct('{$type}', '{$product}');");
		}
		else{
			JavaScript::Alert("查無此商品或商品已下架，請重新輸入!");
			JavaScript::Execute("goBack();");
		}
	}
}
include("./include/db_close.php");
?>
