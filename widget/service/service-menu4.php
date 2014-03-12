<?php
	$s1 = "images/head-menu-service01.gif";
	$s2 = "images/head-menu-service02.gif";
	$s3 = "images/head-menu-service03.gif";
	$s4 = "images/head-menu-service04.gif";
	$s5 = "images/head-menu-service05.gif";
	$tab = $_REQUEST['tab'];
	if($tab == "all"){
		$s1 = "images/head-menu-service01-1.gif";
	}
	if($tab == "activity"){
		$s2 = "images/head-menu-service02-1.gif";
	}
	if($tab == "transfer"){
		$s3 = "images/head-menu-service03-1.gif";
	}
	if($tab == "hr"){
		$s4 = "images/head-menu-service04-1.gif";
	}
	if($tab == "event"){
		$s5 = "images/head-menu-service05-1.gif";
	}
?>
<nav id="menu">
  <ul>
	  <?php include_once("common/com-menu.php");?><!--/服務選項下拉選單-->
	  <li class="menu-title"><img src="images/head-menu-service.gif" alt="本地服務" width="132" height="38"></li>
	  <li class="menu-service01">
	  	<a href="service_product4.php?tab=all"><img src="<?=$s1?>" width="125" height="38"></a>
	  </li>
	  <li class="menu-service02">
	  	<a href="service_product4.php?tab=activity"><img src="<?=$s2?>" width="125" height="38"></a>
	  </li>
	  <li class="menu-service03">
	  	<a href="service_product4.php?tab=transfer"><img src="<?=$s3?>" width="125" height="38"></a>
	  </li>
	  <li class="menu-service04">
	  	<a href="service_product4.php?tab=hr"><img src="<?=$s4?>" width="125" height="38"></a>
	  </li>
	  <li class="menu-service05">
	  	<a href="service_product4.php?tab=event"><img src="<?=$s5?>" width="125" height="38"></a>
	  </li>
  </ul>
<!--/menu-上方服務選項-->
</nav>