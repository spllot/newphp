<?
include '../include/auth_admin.php';
require_once '../class/admin.php';
require_once '../class/tools.php';
require_once '../class/system.php';
require_once '../class/pagging.php';
require_once '../class/javascript.php';

if (!Permission::hasPermission($_SESSION['admin'], $_SESSION['permit'], $_MODULE->modules[$_MODULE->page][1])){exit("權限不足!!");}

include '../include/db_open.php';
$no = $_REQUEST['no'];
JavaScript::setCharset("UTF-8");
echo "<html style='width:700px'>";
$sql = "SELECT * FROM Member WHERE Referral = (SELECT Code FROM Project WHERE No='$no') AND No IN (SELECT Member FROM Product WHERE dateApprove <> CURRENT_TIMESTAMP) ORDER BY dateRegister DESC";
$result = mysql_query($sql) or die(mysql_error());
echo <<<EOD
	<table style="width:100%">
		<tr>
			<td style="width:100px; line-height:22px; background:#b5b2b5;text-align:center">編號</td>
			<td style="width:100px; line-height:22px; background:#b5b2b5;text-align:center">姓名</td>
			<td style="width:100px; line-height:22px; background:#b5b2b5;text-align:center">手機號碼</td>
			<td style="; line-height:22px; background:#b5b2b5;text-align:center">e-mail</td>
		</tr>
EOD;

$num = mysql_num_rows($result);
while($rs = mysql_fetch_array($result)){
	$serial = str_pad($num, 4, '0', STR_PAD_LEFT);
	echo <<<EOD
		<tr>
			<td align="center">{$serial}</td>
			<td align="center">{$rs['Name']}</td>
			<td align="center">{$rs['Phone']}</td>
			<td>{$rs['userID']}</td>
		</tr>
EOD;
	$num --;
}

echo "</table>";
include '../include/db_close.php';
?>
