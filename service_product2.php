<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php include_once("common/com-meta.php");?>
</head>
<body>
  <?php include_once("common/com-head.php");?><!--/表頭-->
  <?php include_once("widget/service/service-menu.php");?>

  <?php include_once("widget/service/service-search.php");?>
  <div id="wrap">
    <?php include_once("common/com-quicklink.php");?><!--/右邊服務選項-->
    <div id="wrap-content">
      <div id="content-in"> <!--/頁籤-->
        <?php include_once("widget/service/service-recommend.php");?>
        <?php include_once("widget/service/product2.php");?>
      </div>
      <div id="sub-right" >
        <?php include_once("common/com-notice.php");?>
        <?php include_once("widget/service/service-hot.php");?>
        <?php include_once("widget/service/service-appraise.php");?>
      </div>
    </div>
    <?php include_once("common/com-footer.php");?><!--/表尾-->
  </div>
</body>
</html>
