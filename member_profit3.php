<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <?php include_once("common/com-meta.php");?>
    <link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css">
    <style type="text/css">
      #quicklink{
        top:0px !important;
      }
    </style>

    <meta name="Keywords" content="購物網, 購物, 網路購物, 線上購物, 團購, 廉售, 即購網" /><meta name="description" content="InTimeGo即購商品資訊網 (簡稱 InTimeGo即購網) 是全民性的行動商務平台，係針對一般傳統商店、行動商店 (包含攤販、餐車、便利商店車...等)以及個人商務，進行動態商品或活動搜尋以及商品販售的網路平台." />
  </head>
<body>
  <?php include_once("common/com-head.php");?><!--/表頭-->
  <nav id="menu">
    <ul>
      <?php include_once("common/com-menu.php");?><!--/服務選項下拉選單-->
      <li class="menu-home"><a href="#"><img src="images/menu-home.gif" width="99" height="30"></a></li>
    </ul>
  <!--/menu-上方服務選項-->
  </nav>
  <div id="wrap">
    <?php include_once("common/com-quicklink.php");?><!--/右邊服務選項-->
    
    <?php include_once("common/com-adsbar.php");?>

    <div id="wrap-marquee">
      <?php include_once("common/com-marque.php");?>

      <div id="wrap-content">
        <?php include_once("profit3.php");?>
        <div id="sub-right" >
          <?php include_once("common/com-notice.php");?>
          <?php include_once("common/com-dealer.php");?>
          <?php include_once("common/com-fans.php");?>
        </div>
      </div>
    </div>
    <?php include_once("common/com-footer.php");?><!--/表尾-->
  </div>
</body>
</html>