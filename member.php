<!doctype html>
<html>
<head>
<meta charset="utf-8">
<style type="text/css">
#quicklink{
	position:absolute;
	top:10px !important;
}

#head-member{
	position:absolute;
	bottom:25px !important;
}

#wrap-content{
	background:url(images/member-sub-bg.gif) left repeat-y;
	margin-top:18px;
	border-right:5px solid #5f5f5f;
	border-bottom:5px solid #5f5f5f;
	border-top:5px solid #5f5f5f;
}
</style>
<?php include_once("com-meta.php");?>

<script language="javascript">
var selected = null;
function mClk(x, url){
	if(selected){
		selected.style.backgroundImage="url('./images/" + selected.id + "_clk.gif')";
	}
	selected = x;
	selected.style.backgroundImage="url('./images/" + selected.id + ".gif')";
	if(url)
		iAcontent.location.href=url;
}
</script>

</head>
<body>
<a id="top" ></a>
<header id="head">
<h1><img src="images/head-logo.jpg" width="365" height="115"></h1>
<div id="member-out"><a href="#" class="member-out">登出</a>
<a href="#" class="member-home">回到首頁</a>
<!--/member-out--></div>
<p id="head-member"><img src="images/head-icon-1.gif" width="18" height="18">Hi, 大黃 ( 等級5 ) , &nbsp;<img src="images/head-icon-2.gif" width="20" height="16">儲值金：$7505</p>
</header><!--/表頭-->
<!--/上方服務選項-->
<nav id="menu">
<ul>
<?php include_once("com-menu.php");?><!--/服務選項下拉選單-->
 <li><img src="images/menu-member.gif" width="154" height="38"></li>
</ul>
<!--/menu-上方服務選項--></nav>
<div id="wrap">
  <?php include_once("com-quicklink.php");?><!--/右邊服務選項-->
<div id="wrap-content" class="clearfix">
<div id="member-sub">
<h1>用戶中心</h1>
<h2>我的帳戶</h2>
<ul>
<li><div id="m1" style="height:25px; background:url('./images/m1_clk.gif'); background-repeat:no-repeat; background-position:center center; cursor:pointer" onClick="mClk(this, 'member_info.php');"></div></li>
<li><a href="#"><div id="m2" style="height:25px; background:url('./images/m2_clk.gif'); background-repeat:no-repeat; background-position:center center; cursor:pointer" onClick="mClk(this, 'member_data.php');"></div></a></li>
<li><div id="m3" style="height:25px; background:url('./images/m3_clk.gif'); background-repeat:no-repeat; background-position:center center; cursor:pointer" onClick="mClk(this, 'member_apply.php');"></div></li>
<li><div id="m4" style="height:25px; background:url('./images/m4_clk.gif'); background-repeat:no-repeat; background-position:center center; cursor:pointer" onClick="mClk(this, '');"></div></li>
<li><div id="m5" style="height:25px; background:url('./images/m5_clk.gif'); background-repeat:no-repeat; background-position:center center; cursor:pointer" onClick="mClk(this, 'member_transaction.php');"></div></li>
<li><div id="m6" style="height:25px; background:url('./images/m6_clk.gif'); background-repeat:no-repeat; background-position:center center; cursor:pointer" onClick="mClk(this, 'member_message.php');"></div></li>
<li><div id="m7" style="height:25px; background:url('./images/m7_clk.gif'); background-repeat:no-repeat; background-position:center center; cursor:pointer" onClick="mClk(this, 'member_question.php');"></div></li>
</ul>
<h2>我是買家</h2>
<ul>
<li><div id="m8" style="height:25px; background:url('./images/m8_clk.gif'); background-repeat:no-repeat; background-position:center center; cursor:pointer" onClick="mClk(this, 'member_favorite.php');"></div></li>
<li><div id="m9" style="height:25px; background:url('./images/m9_clk.gif'); background-repeat:no-repeat; background-position:center center; cursor:pointer" onClick="mClk(this, 'member_favorite.php');"></div></li>
</ul>
<h2>我是業者(提案者)</h2>
<ul>
<li><div id="m10" style="height:25px; background:url('./images/m10_clk.gif'); background-repeat:no-repeat; background-position:center center; cursor:pointer" onClick="mClk(this, 'member_favorite.php');"></div></li>
<li><div id="m11" style="height:25px; background:url('./images/m11_clk.gif'); background-repeat:no-repeat; background-position:center center; cursor:pointer" onClick="mClk(this, 'member_favorite.php');"></div></li>
<li><div id="m12" style="height:25px; background:url('./images/m12_clk.gif'); background-repeat:no-repeat; background-position:center center; cursor:pointer" onClick="mClk(this, 'member_favorite.php');"></div></li>
<li><div id="m13" style="height:25px; background:url('./images/m13_clk.gif'); background-repeat:no-repeat; background-position:center center; cursor:pointer" onClick="mClk(this, 'member_favorite.php');"></div></li>
<li><div id="m14" style="height:25px; background:url('./images/m14_clk.gif'); background-repeat:no-repeat; background-position:center center; cursor:pointer" onClick="mClk(this, 'member_favorite.php');"></div></li>
</ul>
<!--/member-sub--></div>
<div id="member-content">
<h1>我的收藏與追蹤</h1>
<div  id="member-product" class="clearfix">
<p class="member-pic"><a href="#"><img src="images/member-pic-1.jpg" width="152" height="99"></a></p>
<ul id="member-produc-text-1">
<li><h2><a href="#">元山牌迴風式烘碗機YS-9911DD</a></h2></li>
<li>售價：$600 <span class="membe-price-text">原價：$1,450</span></li>
<li>收藏日期：2013-11-30	 </li>
<!--/member-produc-text-1--></ul>
<div id="member-produc-text-2">
<ul>
<li>服務狀態：上架中</li>
</ul>
<!--/member-produc-text-2--></div>
<p class="membe-icon-del"><a href="#"><img src="images/member-icon-2.gif" width="26" height="28"></a></p>
<p id="member-produc-text-3">商家[<a href="#">大黃</a>]預告事項：1/10啟動共乘服務前往花蓮, 歡迎來電詢問加入!</p>

<!--/member-product--></div>
<div  id="member-product" class="clearfix">
<p class="member-pic"><a href="#"><img src="images/member-pic-2.jpg" width="152" height="99"></a></p>
<ul id="member-produc-text-1">
<li><h2><a href="#">PON PON/Biore 沐浴乳</a></h2></li>
<li>售價：$640 <span class="membe-price-text">原價：720</span></li>
<li>收藏日期：2013-11-02	 </li>
<!--/member-produc-text-1--></ul>
<div id="member-produc-text-2">
<ul>
<li>服務狀態：上架中</li>
<li>服務位置：地圖查詢</li>
<li>緯度：24.91　經度：121.05</li>
</ul>
<!--/member-produc-text-2--></div>
<p class="membe-icon-del"><a href="#"><img src="images/member-icon-2.gif" width="26" height="28"></a></p>
<p id="member-produc-text-3">商家[<a href="#">大黃</a>]預告事項：1/10啟動共乘服務前往花蓮, 歡迎來電詢問加入!</p>

<!--/member-product--></div>

<div  id="member-product" class="clearfix">
<p class="member-pic"><a href="#"><img src="images/member-pic-3.jpg" width="152" height="99"></a></p>
<ul id="member-produc-text-1">
<li><h2><a href="#">一心義工服務團</a></h2></li>
<li>免費服務</li>
<li>收藏日期：2013-11-26	 </li>
<!--/member-produc-text-1--></ul>
<div id="member-produc-text-4">
  <ul>
    <li>服務狀態：上架中</li>
    <li>服務位置：地圖查詢</li>
    <li>緯度：24.91　經度：121.05</li>
  </ul>
  <!--/member-produc-text-2-->
</div>
<p class="membe-icon-del"><a href="#"><img src="images/member-icon-2.gif" width="26" height="28"></a></p>
<p id="member-produc-text-3">商家[<a href="#">一心</a>]預告事項：11/15 公休一日。</p>

<!--/member-product--></div>

<div  id="member-product" class="clearfix">
<p class="member-pic"><a href="#"><img src="images/member-pic-4.jpg" width="152" height="99"></a></p>
<ul id="member-produc-text-1">
<li><h2><a href="#">陽光元氣精緻早餐</a></h2></li>
<li>歡迎蒞臨</span></li>
<li>收藏日期：2013-11-02</li>
<!--/member-produc-text-1--></ul>
<div id="member-produc-text-5">
  <ul>
    <li>服務狀態：上架中</li>
    <li>服務位置：地圖查詢</li>
    <li>緯度：24.91　經度：121.05</li>
  </ul>
  <!--/member-produc-text-2-->
</div>
<p class="membe-icon-del"><a href="#"><img src="images/member-icon-2.gif" width="26" height="28"></a></p>
<p id="member-produc-text-3">商家[<a href="#">羅光宏</a>]預告事項:</p>

<!--/member-product--></div>

<div  id="member-product" class="clearfix">
<p class="member-pic"><a href="#"><img src="images/member-pic-5.jpg" width="152" height="99"></a></p>
<ul id="member-produc-text-1">
<li><h2><a href="#">2014大甲媽繞境路跑</a></h2></li>
<li>售價：$800 <span class="membe-price-text">原價：$888</span></li>
<li>收藏日期：2013-11-02	 </li>
<!--/member-produc-text-1--></ul>
<div id="member-produc-text-6">
  <ul>
    <li>服務狀態：上架中</li>
    <li>服務位置：地圖查詢</li>
    <li>緯度：24.91　經度：121.05</li>
  </ul>
  <!--/member-produc-text-2-->
</div>
<p class="membe-icon-del"><a href="#"><img src="images/member-icon-2.gif" width="26" height="28"></a></p>
<p id="member-produc-text-3">商家[<a href="#">大黃</a>]預告事項：1/10啟動共乘服務前往花蓮, 歡迎來電詢問加入!</p>

<!--/member-product--></div>

<!--/member-content--></div>
<!--/wrap-content--></div>
<?php include_once("com-footer.php");?><!--/表尾-->
<!--/wrap--></div>
</body>
</html>
<script language="javascript">document.getElementById("m1").click();</script>