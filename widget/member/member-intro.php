<?php
$ip = ((getenv(HTTP_X_FORWARDED_FOR)) ?  getenv(HTTP_X_FORWARDED_FOR) :  getenv(REMOTE_ADDR));
include './include/db_open.php';
if(!empty($_SESSION['member']) && substr($_SESSION['member']['dateLogin'], 0, 10) != date('Y-m-d')){
	mysql_query("UPDATE Member SET Days = Days + 1 WHERE userID = '" . $_SESSION['member']['userID'] . "'");
    $_SESSION['member']['dateLogin'] = date('Y-m-d H:i:s');
			mysql_query("UPDATE Member SET Level = 2 WHERE userID = '$userid' AND Days >= 15  AND Days <30");
			mysql_query("UPDATE Member SET Level = 3 WHERE userID = '$userid' AND Days >= 30  AND Days <60");
			mysql_query("UPDATE Member SET Level = 4 WHERE userID = '$userid' AND Days >= 60  AND Days <120");
			mysql_query("UPDATE Member SET Level = 5 WHERE userID = '$userid' AND Days >= 120  AND Days <240");
			mysql_query("UPDATE Member SET Level = 6 WHERE userID = '$userid' AND Days >= 240  AND Days <480");
			mysql_query("UPDATE Member SET Level = 7 WHERE userID = '$userid' AND Days >= 480  AND Days <960");
			mysql_query("UPDATE Member SET Level = 8 WHERE userID = '$userid' AND Days >= 960");
	$sql = "INSERT INTO logLogin(dateLogin, userID, Status, ipLogin) VALUES (CURRENT_TIMESTAMP, '" . $_SESSION['member']['userID'] . "', '1', '$ip')";
	mysql_query($sql) or die (mysql_error());
}
$result = mysql_query("SELECT * FROM Config");
while($rs = mysql_fetch_array($result)){
	$_CONFIG[$rs['ID']] = $rs['YN'];
}


$result = mysql_query("SELECT * FROM Catalog WHERE useFor='TYPE_PRO' AND Parent=0 ORDER BY Sort");
$catalog_list = "";
while($rs=mysql_fetch_array($result)){
	$catalog_list .= "<option value='" . $rs['No'] . "'" . (($_REQUEST['catalog'] == $rs["No"] ) ? " SELECTED" : "") . ">" . $rs["Name"] . "</option>";
}


$area=$_REQUEST['area'];
$type=$_REQUEST['type'];
$catalog=$_REQUEST['catalog'];
$catalog2=$_REQUEST['catalog2'];
$catalog3=$_REQUEST['catalog3'];
$seller=$_REQUEST['seller'];
$tab = 0;
$result = mysql_query("SELECT * FROM Member WHERE No='$seller'") or die(mysql_error());
$member = mysql_fetch_array($result);






include './include/db_close.php';
$current = basename($_SERVER['PHP_SELF']);

$src_logo = (($_CONFIG['imgurl0'] != "") ? $_CONFIG['imgurl0'] : "/upload/" . $_CONFIG['logo']);
$img_banner = (($_CONFIG['showimg1'] == "Y") ? "<img src=\"" . (($_CONFIG['imgurl1'] != "") ? $_CONFIG['imgurl1']:"/upload/" . $_CONFIG['ad_picpath1']) . "\" style=\"width:590px; height:96px\" border=0/>" : "");

if($_CONFIG['link1'] != ""){
	$img_banner = "<a href='{$_CONFIG['link1']}' target='_blank'>{$img_banner}</a>";
}

?>

<div id="introForm" class="centerForm" style="padding-bottom:20px;">
	<table cellpadding="0" cellspacing="0" border="0"  align="center">
		<tr>
			<td style="vertical-align:top; padding-right:10px">
				<!-- InstanceBeginEditable name="content" -->
				<div style="text-align:center">預告事項：
				<?php
					echo $member['warning'];
				?>
				</div>
				<?php
					echo $member['Intro'];
				?>

			<!-- InstanceEndEditable -->
			</td>
		</tr>
	</table>
</div>