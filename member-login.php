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
        <?php include_once("widget/member/member-login.php");?>
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