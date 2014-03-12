<?php
	$s1 = "images/head-menu-delivery01.gif";
	$s2 = "images/head-menu-service02.gif";
	$tab = $_REQUEST['tab'];

	if($tab == "all"){
		$s1 = "images/head-menu-delivery01-1.gif";
	}
	if($tab == "activity"){
		$s2 = "images/head-menu-service02-1.gif";
	}
?>
<nav id="menu">
  <ul>
	  <?php include_once("common/com-menu.php");?><!--/服務選項下拉選單-->
	  <li class="menu-title"><img src="images/head-menu-service.gif" alt="本地服務" width="132" height="38"></li>
	  <li class="menu-service01">
	  	<a href="service_product5.php?tab=all"><img src="<?=$s1?>" width="125" height="38"></a>
	  </li>
	  <li class="menu-service02">
	  	<a href="service_product5.php?tab=activity"><img src="<?=$s2?>" width="125" height="38"></a>
	  </li>
  </ul>
<!--/menu-上方服務選項-->
</nav>