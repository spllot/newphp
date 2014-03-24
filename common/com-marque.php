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
	<?php
		include './include/db_open.php';
		$result=mysql_query("SELECT No, Subject, Content, useFor FROM Page WHERE useFor='MARQUEE'");
	    if(($num=mysql_num_rows($result))==1){
	        list($no, $subject, $content, $usefor) = mysql_fetch_row($result);
	        echo $content;
	    }
	    include './include/db_close.php';
	?>
</div>
<div>
	<ul id="home-login">
	  <li style="margin-top:-35px;" class="<?=$lclazz?>"><a href="<?=$llink?>"><img src="<?=$lpic?>" width="114" height="35"></a></li>
	  <li class="btn-member-1"><a href="member.php"><img src="images/btn-member-2.gif" width="121" height="35"></a></li>
	</ul>
</div>