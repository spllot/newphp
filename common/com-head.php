<?php
    include './include/session.php';
    include './include/db_open.php';
  	$result = mysql_query("SELECT * FROM Config WHERE  ID='logo'");
	while($rs = mysql_fetch_array($result)){
		$logo = $rs['YN'];
	}

	$userinfo = "";
	if($_SESSION['member'] && $_SESSION['member']['No'] && $_SESSION['member']['No']!=""){
		$result = mysql_query("SELECT * FROM Member WHERE userID = '" . $_SESSION['member']['userID'] . "'");
		$member = mysql_fetch_array($result);
		$balance=0;
		$trust = 0;
		$result = mysql_query("SELECT COALESCE(SUM(Amount), 0) as Amount FROM logTransaction WHERE Owner='" . $_SESSION['member']['userID'] . "'");
		if($rs=mysql_fetch_array($result)){
			$balance = $rs['Amount'];
		}
		$result = mysql_query("SELECT COALESCE(SUM(Quality), 0) as Amount FROM logRating WHERE Owner='" . $_SESSION['member']['No'] . "'");
		if($rs=mysql_fetch_array($result)){
			$trust = $rs['Amount'];
		}

		$trust = (($_SESSION['member']['Seller']==2) ? "，賣家評價：" . number_format($trust) . "" : "");

		$userinfo = '<div class="user-info">
						<span>Hi, '.$_SESSION["member"]["Nick"].'(等級：'.$_SESSION["member"]["Level"].$trust.')，&nbsp;</span>
						<span>儲值金：$'.number_format($balance).'&nbsp;</span>
					</div>';
	}

    include './include/db_close.php';

	$info  = "登入";
	$hlink = "member_login.php";
	if($_SESSION['member'] && $_SESSION['member']['No'] && $_SESSION['member']['No']!=""){
		$info = "登出";
		$hlink = "member_logout2.php";
	}
?>
<a id="top" ></a>
<header id="head">
<h1><a href="index.php"><img src="./upload/<?=$logo?>" width="365" height="115"></a></h1>
<nav><ul>
<li><a href="<?=$hlink?>"><?=$info?></a></li>
<li><a href="member_register.php">註冊會員</a>
</li>
<li><a href="member_lead.php">新手上路</a></li>
<li><a href="member_active.php">全民賺好康</a></li>
<li><a href="member_profit.php">會員獲利公告</a></li>
<li ><a href="member_cooperate.php">用戶協力資訊</a></li>
<li class="none-bg"><a href="member_contact.php">客服中心</a></li>
</ul>
</nav>

<div id="head-search">
<form action="member_search2.php">
<input name="keyword" type="text">
<select name="type">
  <option value="email">商家帳號</option>
   <option value="code">服務代碼</option>
</select>
<input name="" type="submit" value="送出" class="btn-search">
</form>
</div>
<?=$userinfo?>
</header>