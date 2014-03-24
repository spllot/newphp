<?php
	$lpic  = "images/btn-login.gif";
	$llink = "member_login.php";
	$lclazz="btn-login";
	if($_SESSION['member'] && $_SESSION['member']['No'] && $_SESSION['member']['No']!=""){
		$lpic = "images/btn-login-2.gif";
		$llink = "member_logout2.php";
		$lclazz="btn-login-1";
	}
?>
<div id="marquee">
	<a href="#">3大手機品牌最高送3500      時尚服裝單品 快搶！      年終特賣!一件不留3折起</a><!--/marquee--></div>
	<ul id="home-login">
	  <li class="<?=$lclazz?>"><a href="<?=$llink?>"><img src="<?=$lpic?>" width="114" height="35"></a></li>
	  <li class="btn-member-1"><a href="member.php"><img src="images/btn-member-2.gif" width="121" height="35"></a></li>
	</ul>
</div>