<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php include_once("com-meta.php");?>
<script src="SpryAssets/SpryEffects.js" type="text/javascript"></script>
<script type="text/javascript">
function MM_effectGrowShrink(targetElement, duration, from, to, toggle, referHeight, growFromCenter)
{
	Spry.Effect.DoGrow(targetElement, {duration: duration, from: from, to: to, toggle: toggle, referHeight: referHeight, growCenter: growFromCenter});
}
function MM_effectAppearFade(targetElement, duration, from, to, toggle)
{
	Spry.Effect.DoFade(targetElement, {duration: duration, from: from, to: to, toggle: toggle});
}
</script>

<script src="script/jquery.js" type="text/javascript"></script>
<script src="script/jquery.treeview.js" type="text/javascript"></script>
<script src="script/gNavi.js" type="text/javascript"></script>
<script src="script/tabmenu.js" type="text/javascript"></script>
</head>
<body>
<?php include_once("com-head.php");?><!--/表頭-->
<!--/上方服務選項-->
<nav id="menu">
<ul>
<?php include_once("com-menu.php");?><!--/服務選項下拉選單-->
<li class="menu-title"><img src="images/head-menu-service.gif" alt="本地服務" width="132" height="38"></li>
<li class="menu-service01"><a href="#"><img src="images/head-menu-service01-1.gif" width="125" height="38"></a></li>
<li class="menu-service02"><a href="#"><img src="images/head-menu-service02.gif" width="125" height="38"></a></li>
<li class="menu-service03"><a href="#"><img src="images/head-menu-service03.gif" width="125" height="38"></a></li>
<li class="menu-service04"><a href="#"><img src="images/head-menu-service04.gif" width="125" height="38"></a></li>
<li class="menu-service05"><a href="#"><img src="images/head-menu-service05.gif" width="125" height="38"></a></li>
</ul>
<!--/menu-上方服務選項--></nav>
<div id="search-wrap" class="clearfix">
<div id="search">
<form action="" method="get" id="search">
<div id="select">
<input name="selectall" type="radio" value="">全部<br>
<input name="selectall" type="radio" value="">公益品項<br>
<input name="selectall" type="radio" value="" checked="CHECKED">全新品項<br>
<input name="selectall" type="radio" value="">中古即期品<br>
<!--/select--></div>
<div id="select-map">
搜尋位置 :&nbsp;<input name="add" type="text" class="input-1 icon-search" id="add" value=" 輸入查詢位置地址"size="45"onfocus="if (value==defaultValue){ value=''; className='input-1 icon-search'; }"onblur="if (value==''){ value=defaultValue; className='input-1 icon-search'; }" >&nbsp;或&nbsp;<input type="text" class="input-1" value="經度" size="10"onfocus="if (value==defaultValue){ value=''; className='input-1'; }"onblur="if (value==''){ value=defaultValue; className='input-1'; }" >
<input type="text" class="input-1" value="緯度" size="10"onfocus="if (value==defaultValue){ value=''; className='input-1'; }"onblur="if (value==''){ value=defaultValue; className='input-1'; }" ><br>
分類選擇 :&nbsp;<select name="" class="input-2 icon-search">
  <option>所有分類&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
  <option>所有分類&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
</select>&nbsp;>&nbsp;<select name="" class="input-2">
  <option>所有分類&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
</select>&nbsp;>&nbsp;<select name="" class="input-2">
  <option>所有分類&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
</select><input name="送出" type="submit" value="搜尋" class="btn-search-1">
<!--/select-map--></div>
<div id="select-btn"> 
<ul><li class="select-btn-1"><a href="#"><img src="images/select-btn-1-1.gif" width="93" height="28"></a></li>
<li class="select-btn-2"><a href="service-map.php"><img src="images/select-btn-2.gif" width="93" height="28"></a></li>
</ul><!--/select-btn--></div>
</form>
<!--/search--></div>
<!--/search-wrap--></div>
<div id="wrap">
<?php include_once("com-quicklink.php");?><!--/右邊服務選項-->
<div id="wrap-content">
<div id="content-in">
<div id="service-in-join-w" style="display: none;">
<p class="join-w-btn"><img src="images/service-in-join-fb-1.gif" width="67" height="26"></p>
<p class="join-w-del"><a href="#in-a" onClick="MM_effectGrowShrink('service-in-join-w', 500, '100%', '0%', false, false, true);MM_effectAppearFade('service-in-join-w', 500, 100, 0, false)"><img src="images/map-icon-del.png" width="16" height="16"></a></p>
<dl><dt><img src="images/service-in-join-w-title.jpg" width="253" height="32"></dt>
<dd><ul>
<li class="clearfix"><h2><img src="images/service-in-join-w-1.gif" width="50" height="50">請先登入FaceBook :</h2><div class="join-w-right01"><p class="join-w-right-fb-pic"><img src="images/service-in-join-w-pic-1.gif" width="62" height="62"></p><h3>黃柏堯</h3></div></li>
<li  class="clearfix join-w-li02"><h2><img src="images/service-in-join-w-2.gif" width="50" height="50">按讚加入粉絲團 :</h2><div class="join-w-right02"><p class="join-w-right-fb-pic-2"><img src="images/service-in-join-w-pic.gif" width="47" height="48"></p><h3>全民共享的InTimeGo 即時服務<br>
<span><img src="images/service-in-join-fb-2.gif" width="50" height="26">你覺得這真讚</span></h3><br>
  </div></li>
  <li class="join-w-li03"><h2><img src="images/service-in-join-w-3.gif" width="50" height="50">留言推薦，分享朋友 :</h2><p class="join-w-right-s"><img src="images/service-in-join-fb-3.gif" width="87" height="26"></p></li>
</ul></dd>
</dl>
<!--/service-in-join-w--></div>
<h1 class="in-h1" id="in-a"><span>【大黃運輸服務】</span>車輛開放共乘時段, 歡迎同路的舊雨新知加入共乘!</h1>
<div class="service-in-pic"><img src="images/service-in-pic.jpg" width="393" height="245"></div>
<div id="service-in-right">
<div id="service-in-price-wrap">
<div id="service-in-price">
<p class="in-price">$0</p>
<p class="in-price-text">省$1,600</p>
<!--/service-in-price--></div>
<a href="#in-a" class="service-in-btn" onClick="MM_effectGrowShrink('service-in-join-w', 500, '0%', '100%', false, false, true);MM_effectAppearFade('service-in-join-w', 500, 0, 100, false)">參加活動</a>

<p>詳情請參考以下之說明介紹</p>
<!--/service-in-price--></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="service-in-dec">
  <tr>
    <th width="50%">原價$1600</th>
    <td width="50%">折扣0</td>
  </tr>
  <tr>
    <th>人數1225</th>
    <td>機率1.6%</td>
  </tr>
  <tr>
    <th>台北市</th>
    <td>122時45分23秒</td>
  </tr>
</table>
<!--/service-in-right--></div>
<div id="service-in-use">
<p>　服務代碼：<span class="font-red">1800013</span></p>
<div class="in-use-share"><p>分享即時服務資訊：</p>
<ul><li><a href="#"><img src="images/in-use-share-f.gif" width="19" height="18"></a></li>
<li><a href="#"><img src="images/in-use-share-p.gif" width="19" height="18"></a></li>
<li><a href="#"><img src="images/in-use-share-t.gif" width="18" height="18"></a></li>
<li class="in-use-share-e"><a href="#"><img src="images/in-use-share-e.gif" width="18" height="14"></a></li>
</ul>
</div>
<p class="in-use-add">加入收藏追蹤：<a href="#"><img src="images/in-use-add.gif" width="21" height="21"></a></p>
<!--/service-in-use--></div>

<Ul  id="global_navi">
<LI class="dp "><span><a href="#dp"  class="icon">活動參與須知</a></span>
	<UL class="clearfix">
	<LI><div class="navi-content">test<br>
測試</div></LI>
	</UL>
</LI>
<LI class="dp"><span><a href="#dp" class="icon">服務&資訊說明 </a></span>
	<UL class="clearfix">
	<LI><div class="navi-content">test</div></LI>
	</UL>
</LI>
<LI class="dp"><span><a href="#dp">業者(商家)資訊</a></span>
     <UL class="clearfix">
	<LI><div class="navi-content">test</div></LI>
	</UL>
</UL>

<div id="service-in-map-title">
<h1>目前服務位置圖</h1>
<p><a href="#">商家位置更新</a>
<a href="#">商家遞送路徑</a>
<a href="#">買家前往路徑</a></p>
<!--/service-in-map-title--></div>
<div id="service-in-map">
<img src="images/service-in-map-pic.jpg" width="722" height="325">
<!--/service-in-map--></div>
<div id="service-in-join">
<h1>已經參加這個活動的人有 2473 位:</h1>
<img src="images/service-in-join.jpg" width="679" height="267">
<!--/service-in-join--></div>
<div id="service-in-epaper">
<form action="" method="get">訂閱電子報：<input type="text" class="service-in-epaper-input"><input type="button" class="service-in-epaper-btn" value="訂閱"></form>
<!--/service-in-epape--></div>
<div id="service-in-shop-title">
<p class="in-shop-icon-1">商家 大黃<a href="#">(金流交易評價：0</a> ) </p>
<p  class="in-shop-icon-2"><a href="#">商家其它服務</a></p>
<p class="in-shop-icon-3"><a href="#">詢問商家問題 </a></p>
<p class="in-shop-icon-4"><a href="#">發表本服務評論</a></p>
<!--/service-in-shop-title--></div>
<div id="service-in-comment">
<h1>最新詢問與評論文章</h1>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="in-comment-table">
  <tr>
    <th width="14%">作者</th>
    <th width="45%">留言內容</th>
    <th width="18%">評分 (4.0 av)</th>
    <th width="23%">留言時間</th>
  </tr>
  <tr>
    <td align="center">大黃</td>
    <td>詢問:??<br>
賣家回覆:OK</td>
    <td align="center">&nbsp;</td>
    <td align="center" class="font-blue-12">2013-10-21 13:44:47<br>
2013-10-21 13:45:27
</td>
  </tr>
  <tr>
    <td align="center">小芬</td>
    <td>評論:good</td>
    <td align="center" class="in-comment-table-star"><span>3.9</span><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star-g.png" width="14" ></td>
    <td align="center" class="font-blue-12">2013-10-21 22:05:35</td>
  </tr>
</table>

<!--/service-in-comment--></div>

<!--/content-in--></div>

<div id="sub-right" >
<div id="menu-notice"><!--/新手使用須知-->
<dl id="dl-1">
<dt><h1>新手使用須知</h1></dt>
<dd><ul>
<li><a href="#">即購網在生活上提供那些便利</a></li>
<li><a href="#">如何申請成為會員</a></li>
<li><a href="#">我的商品&服務如何提案 </a></li>
<li><a href="#">我的行動服務如何設置 </a></li>
<li><a href="#">商品&服務行銷功能如何設置 </a></li>
<li><a href="#">行動APP之功能介紹 </a></li>
<li><a href="#">如何設置我的即時監護服務 </a></li>
</ul>
<p>
<a href="#"><img src="images/banner-1.gif" width="220" height="57"></a> 
<a href="#"><img src="images/banner-2.gif" width="220" height="57"></a> 
</p>
</dd></dl>
<!--/menu-notice-新手使用須知--></div>

<div id="menu-hot-product"><!--/熱門業者推薦-->
<dl id="dl-1">
<dt><h1>熱門商品推薦</h1></dt>
<dd><ul>
<li><span class="icon-sale">5.5折</span><a href="#">每入只要90元起(含運費)
即可享有【Beauty Focus】台灣製
180D機能裡起...</a>
  <div class="menu-hot-product-pic"><img src="images/hot-product-1.jpg" width="212" height="137"> </div></li>
<li><a href="#">只要388元起，即可享有【新北投
-山水樂會館】單人美湯饗宴A/B
方案〈含...</a>
  <div class="menu-hot-product-pic"><img src="images/hot-product-2.jpg" width="212" height="137"></div></li>
  <li><span class="icon-sale">5.5折</span><a href="#">只要319元(免運費)，即
可享有【Vaseline 凡士林】身體乳
液二入，種類可...</a>
  <div class="menu-hot-product-pic"><img src="images/hot-product-3.jpg" width="212" height="137"></div></li>
  <li><a href="#">只要4498元，即可享有【台東-
娜路彎大酒店】2/28前假日入住
不加價！一...</a>
  <div class="menu-hot-product-pic"><img src="images/hot-product-4.jpg" width="212" height="137"></div></li>
  <li><span class="icon-sale">5.5折</span><a href="#">每入只要90元起(含運費)
即可享有【Beauty Focus】台灣製
180D機能裡起...</a>
  <div class="menu-hot-product-pic"><img src="images/hot-product-5.jpg"  width="212" height="137"></div></li>
</ul>
</dd></dl>
<!--/menu-dealer-熱門業者推薦--></div>
<!--/sub-right--></div>
<!--/wrap-content--></div>
<?php include_once("com-footer.php");?><!--/表尾-->
<!--/wrap--></div>
</body>
</html>
