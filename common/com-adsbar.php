<?php
    include './include/db_open.php';
  	$result = mysql_query("SELECT * FROM Config WHERE  ID='ad_picpath1'");
	while($rs = mysql_fetch_array($result)){
		$pic1 = $rs['YN'];
	}

	$result = mysql_query("SELECT * FROM Config WHERE  ID='ad_picpath2'");
	while($rs = mysql_fetch_array($result)){
		$pic2 = $rs['YN'];
	}

	$result = mysql_query("SELECT * FROM Config WHERE  ID='link1'");
	while($rs = mysql_fetch_array($result)){
		$link1 = $rs['YN'];
	}

	$result = mysql_query("SELECT * FROM Config WHERE  ID='link2'");
	while($rs = mysql_fetch_array($result)){
		$link2 = $rs['YN'];
	}
    include './include/db_close.php';
?>

<div id="main"> 
  <div id="main-left"><a href="<?=$link1?>"><img src="./upload/<?=$pic1?>" width="720" height="111"></a></div>
  <div id="main-right"><a href="<?=$link2?>"><img src="./upload/<?=$pic2?>" width="235" height="111"></div>
</div>