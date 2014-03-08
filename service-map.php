<!doctype html>
<html>
<head>
<meta charset="utf-8">
<style type="text/css">
#wrap{
	width:100% !important;
	}
	
.fb-good{
	position:absolute;
	left:175px !important;
	bottom:7px !important;
	z-index:5 !important;
}


.page{
	position:relative;
	padding:5px 0px !important;
	margin-top:3px;
	margin-left:13px;
	width:368px;
}

.page-number{
	word-spacing:8px!important;
}

	
.page-prev {
	position:absolute;
	left:50px!important;
	top:7px !important;
}

.page-next {
	position:absolute;
	right:50px!important;
	top:7px !important;
}

#quicklink{
	width:73px;
	position:absolute;
	right:10px!important;
	top:-130px;
	z-index:2;
}

</style>
<script type="text/javascript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function P7_HScroller(el,dr,tx,ox,spd) { //v1.7 by PVII
 var g,gg,fr,sp,pa='',slw=true,m=false,w,ww,lx,rx;tx=parseInt(tx);
 if((g=MM_findObj(el))!=null){gg=(document.layers)?g:g.style;}else{return;}
 if(dr=="Stop"){if(g.toMove){clearTimeout(g.p7Magic);}g.toMove=false;}
 if((parseInt(navigator.appVersion)>4 || navigator.userAgent.indexOf("MSIE")>-1)&& !window.opera){pa="px";}
 if(navigator.userAgent.indexOf("NT")>-1 || navigator.userAgent.indexOf("Windows 2000")>-1){slw=false;}
 if(spd=="Slow"){sp=(slw)?2:1;fr=(slw)?40:30;}else if(spd=="Medium"){sp=(slw)?4:1;fr=(slw)?40:10;
 }else{sp=(slw)?8:4;fr=(slw)?40:10;}if(spd=="Warp"){sp=10000;}var xx = parseInt(gg.left);if(isNaN(xx)){
 if(g.currentStyle){xx=parseInt(g.currentStyle.left);}else if(document.defaultView&&document.defaultView.getComputedStyle){
 xx=parseInt(document.defaultView.getComputedStyle(g,"").getPropertyValue("left"));}else{xx=0;}}
 if(document.all || document.getElementById){w=parseInt(g.offsetWidth);if(!w){w=parseInt(g.style.pixelWidth);}
 if(g.hasChildNodes){for(wx=0;wx<g.childNodes.length;wx++){ww=parseInt(g.childNodes[wx].offsetWidth);
 if(ww>w){w=ww;}}}}else if(document.layers){w=parseInt(g.clip.width);}lx=tx-w+parseInt(ox);rx=tx;
 if(dr=="Right"){if(xx>lx){m=true;xx-=sp;if(xx<lx){xx=lx;}}}
 if(dr=="Left"){if(xx<rx){m=true;xx+=sp;if(xx>rx){xx=rx;}}}
 if(dr=="Reset"){gg.left=tx+pa;if(g.toMove){clearTimeout(g.p7Magic);}g.toMove=false;}
 if(m){gg.left=xx+pa;if(g.toMove){clearTimeout(g.p7Magic);}g.toMove=true;
  eval("g.p7Magic=setTimeout(\"P7_HScroller('"+el+"','"+dr+"',"+tx+","+ox+",'"+spd+"')\","+fr+")");
 }else{g.toMove=false;}
}
//-->
</script>
<?php include_once("com-meta.php");?>
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
<ul><li class="select-btn-1"><a href="service.php"><img src="images/select-btn-1.gif" width="93" height="28"></a></li>
<li class="select-btn-2"><a href="#"><img src="images/select-btn-2-1.gif" width="93" height="28"></a></li>
</ul><!--/select-btn--></div>
</form>
<!--/search--></div>
<!--/search-wrap--></div>
<div id="wrap">
<?php include_once("com-quicklink.php");?><!--/右邊服務選項-->
<div id="service-map">
<p class="map-icon-open"><img src="images/map-icon-open.png" width="16" height="52" onClick="P7_HScroller('service-map-list','Left',0,0,'Fast')"></p>
<div id="service-map-list">
<dl><dt>搜尋結果列表<span>重新整理</span></dt>
<dd><ul>
<li><p class="map-list-icon-title"><img src="images/map-icon-taxi.png"></p>
<div id="map-list-right">
<div class="map-list-title"><h1><a href="#" title="Keson共乘服務" >Keson共乘服務</a></h1>
 <p class="map-list-label"><img src="images/map-label-taxi-1.png"></p><p class="map-list-route">1.1公里</p></div>
<p class="map-list-des">車輛開放共乘時段, 歡迎同路的舊雨新知加入共乘!</p>
<p class="map-list-icon-1"><img src="images/map-icon-shop.png" width="34" height="20"></p>
<p class="fb-good">7654</p>
<div class="map-list-star"><span>3.9</span><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star-g.png" width="14" ></div>
<!--/map-list-right--></div>
<p class="clear"></p>
</li>
<li><p class="map-list-icon-title"><img src="images/map-icon-taxi.png"></p>
<div id="map-list-right">
<div class="map-list-title"><h1><a href="#" title="大黃共乘服務">大黃共乘服務</a></h1>
 <p class="map-list-label"><img src="images/map-label-taxi-2.png"></p><p class="map-list-route">1.1公里</p></div>
<p class="map-list-des">車輛開放共乘時段, 歡迎同路的舊雨新知加入共乘!</p>
<p class="fb-good">7654</p>
<div class="map-list-star"><span>3.9</span><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star-g.png" width="14" ></div>
<!--/map-list-right--></div>
<p class="clear"></p>
</li>
<li><p class="map-list-icon-title"><img src="images/map-icon-product.png"></p>
<div id="map-list-right">
<div class="map-list-title"><h1><a href="#">酥皮蔥抓餅 (加蛋)</a></h1>
 <p class="map-list-label"><img src="images/map-label-taxi-sale.png"  ></p><p class="map-list-route">1.1公里</p></div>
<p class="map-list-des">地點:桃園中壢古華花園飯店; 日期時間:2013/
12/15(日),中午11:30; 捐款3000元</p>
<p class="map-list-icon-1">&nbsp;</p>
<p class="fb-good">7654</p>
<div class="map-list-star"><span>3.9</span><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star-g.png" width="14" ></div>
<!--/map-list-right--></div>
<p class="clear"></p>
</li>
<li><p class="map-list-icon-title"><img src="images/map-icon-product.png" ></p>
<div id="map-list-right">
<div class="map-list-title"><h1><a href="#" title="蔡媽媽酥皮蔥抓餅">蔡媽媽酥皮蔥抓餅 </a></h1>
 <p class="map-list-label">&nbsp;</p>
 <p class="map-list-route">1.1公里</p></div>
<p class="map-list-des">地點:桃園中壢古華花園飯店; 日期時間:2013/
  12/15(日),中午11:30; 捐款3000元</p>
<p class="map-list-icon-1"><img src="images/map-icon-sale.png" width="34" height="20"><img src="images/map-icon-shop.png" width="34" height="20"><img src="images/map-icon-service.png" width="34" height="20"></p>
<p class="fb-good">7654</p>
<div class="map-list-star"><span>3.9</span><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star-g.png" width="14" ></div>
<!--/map-list-right--></div>
<p class="clear"></p>
</li>
<li><p class="map-list-icon-title"><img src="images/map-icon-activities.png"></p>
<div id="map-list-right">
<div class="map-list-title"><h1><a href="#" title="憨樂音樂募款餐會">憨樂音樂募款餐會</a></h1>
 <p class="map-list-label"><img src="images/map-label-taxi-sale.png"></p>
 <p class="map-list-route">1.1公里</p></div>
<p class="map-list-des">地點:桃園中壢古華花園飯店; 日期時間:2013/
  12/15(日),中午11:30; 捐款3000元</p>
<p class="fb-good">7654</p>
<div class="map-list-star"><span>3.9</span><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star-g.png" width="14" ></div>
<!--/map-list-right--></div>
<p class="clear"></p>
</li>
<li><p class="map-list-icon-title"><img src="images/map-icon-work-1.png"></p>
<div id="map-list-right">
<div class="map-list-title"><h1><a href="#" title="一心義工服務團">一心義工服務團</a></h1>
 <p class="map-list-label"><img src="images/map-label-work-1.png"  ></p>
 <p class="map-list-route">1.1公里</p></div>
<p class="map-list-des">義工服務是一個城市進步與互助的指標，義工
把歡樂帶給社會與自己，有效的促進社會。</p>
<p class="map-list-icon-1"><img src="images/map-icon-sale.png" width="34" height="20"><img src="images/map-icon-shop.png" width="34" height="20"><img src="images/map-icon-service.png" width="34" height="20"></p>
<p class="fb-good">7654</p>
<div class="map-list-star"><span>3.9</span><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star-g.png" width="14" ></div>
<!--/map-list-right--></div>
<p class="clear"></p>
</li>
<li><p class="map-list-icon-title"><img src="images/map-icon-work-2.png"></p>
<div id="map-list-right">
<div class="map-list-title"><h1><a href="#" title="家庭托育專業保母">家庭托育專業保母</a></h1>
 <p class="map-list-label"><img src="images/map-label-work-2.png"></p>
 <p class="map-list-route">1.1公里</p></div>
<p class="map-list-des">我是 余媽咪, 保母證號： 154-047512 , 本人修
畢保母專業訓練課程領有結業證書。</p>
<p class="map-list-icon-1"><img src="images/map-icon-sale.png" width="34" height="20"><img src="images/map-icon-shop.png" width="34" height="20"><img src="images/map-icon-service.png" width="34" height="20"></p>
<p class="fb-good">7654</p>
<div class="map-list-star"><span>3.9</span><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star-g.png" width="14" ></div>
<!--/map-list-right--></div>
<p class="clear"></p>
</li>
</ul>
</dd>
</dl>
<p class="map-icon-close"><img src="images/map-icon-close.png" width="16" height="52" onClick="P7_HScroller('service-map-list','Right',-16,0,'Fast')"></p>
<div class="page">
<ul>
  <li class="page-prev"><a href="#"><img src="images/page-pre.gif" ></a></li>
  <li class="page-number">1 <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">5</a> <a href="#">6</a></li>
  <li class="page-next"><a href="#"><img src="images/page-next.gif" ></a></li>
</ul>
<!--/page--></div>
<!--/service-map-list--></div>
<div id="map-icon" style="position: absolute; left: 358px; top: 126px">
<img src="images/map-icon-product.png"><div class="map-content" id="map-content"> <h1>酥皮蔥抓餅 (加蛋)...</h1>
<div class="map-star"><span>3.9</span><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star-g.png" width="14" ></div>
<!--/map-list-star--><p class="map-comment">6篇評論</p></div>
<!--/map-icon--></div>

<div id="map-icon" style="position: absolute; left: 807px; top: 416px">
<img src="images/map-icon-product.png"><div class="map-content" id="map-content"> <h1><a href="#">酥皮蔥抓餅(加蛋)...</a></h1><p class="map-label"><img src="images/map-label-taxi-sale.png"  ></p>
<div class="map-star"><span>3.9</span><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star-g.png" width="14" ></div>
<!--/map-list-star--><p class="map-comment">6篇評論</p></div>
<!--/map-icon--></div>

<div id="map-icon" style="position: absolute; left: 821px; top: 137px">
<img src="images/map-icon-product.png"><div class="map-content" id="map-content"> <h1><a href="#">蔡媽媽酥皮蔥抓餅加蛋...</a></h1><p class="map-label"><img src="images/map-label-taxi-sale.png"  ></p>
<div class="map-star"><span>3.9</span><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star-g.png" width="14" ></div>
<!--/map-list-star--><p class="map-comment">6篇評論</p></div>
<!--/map-icon--></div>


<div id="map-icon" style="position: absolute; left: 1306px; top: 264px">
<img src="images/map-icon-taxi.png"><div class="map-content" id="map-content"> <h1><a href="#" title="Keson共乘服務" >Keson共乘服務...</a></h1><p class="map-label"><img src="images/map-label-taxi-1.png"></p>
<div class="map-star"><span>3.9</span><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star-g.png" width="14" ></div>
<!--/map-list-star--><p class="map-comment">6篇評論</p></div>
<!--/map-icon--></div>



<div id="map-icon" style="position: absolute; left: 754px; top: 455px">
<img src="images/map-icon-taxi.png"><div class="map-content" id="map-content"> <h1><a href="#" title="大黃共乘服務">大黃共乘服務...</a></h1><p class="map-label"><img src="images/map-label-taxi-2.png"></p>
<div class="map-star"><span>3.9</span><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star-g.png" width="14" ></div>
<!--/map-list-star--><p class="map-comment">6篇評論</p></div>
<!--/map-icon--></div>

<div id="map-icon" style="position: absolute; left: 759px; top: 248px">
<img src="images/map-icon-activities.png"><div class="map-content" id="map-content"> <h1><a href="#" title="憨樂音樂募款餐會">憨樂音樂募款餐會...</a></h1><p class="map-label"><img src="images/map-label-taxi-sale.png"  ></p>
<div class="map-star"><span>3.9</span><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star-g.png" width="14" ></div>
<!--/map-list-star--><p class="map-comment">6篇評論</p></div>
<!--/map-icon--></div>

<div id="map-icon" style="position: absolute; left: 607px; top: 615px">
<img src="images/map-icon-work-1.png"><div class="map-content" id="map-content"> <h1><a href="#" title="一心義工服務團">一心義工服務團...</a></h1><p class="map-label"><img src="images/map-label-work-1.png"  ></p>
<div class="map-star"><span>3.9</span><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star-g.png" width="14" ></div>
<!--/map-list-star--><p class="map-comment">6篇評論</p></div>
<!--/map-icon--></div>

<div id="map-icon" style="position: absolute; left: 1362px; top: 621px">
<img src="images/map-icon-work-2.png"><div class="map-content" id="map-content"> <h1><a href="#" title="家庭托育專業保母">家庭托育專業保母...</a></h1><p class="map-label"><img src="images/map-label-work-2.png"></p>
<div class="map-star"><span>3.9</span><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star.png" width="14" ><img src="images/star-g.png" width="14" ></div>
<!--/map-list-star--><p class="map-comment">6篇評論</p></div>
<!--/map-icon--></div>

<!--/service-map--></div>



<?php include_once("com-footer.php");?><!--/表尾-->
<!--/wrap--></div>
</body>
</html>
