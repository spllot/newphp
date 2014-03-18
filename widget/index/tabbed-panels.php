<?php
  include './include/db_open.php';
  $sql = 'SELECT * FROM AD2 WHERE 1=1 AND (Member=0 OR (Member > 0 AND dateExpire > CURRENT_TIMESTAMP)) order by dateSubmit DESC, Sort';
  $result = mysql_query($sql);
  $i=0;
  $p1 = $p2 = $p3 = $p4 = "";
  while($rs = mysql_fetch_array($result)){
    $pics = "/images/none.png";
    if($rs['Src'] == 1){
      $pics = $rs['Link'];
    }
    if($rs['Src'] == 2){
      $pics = "./upload/{$rs['Icon']}";
    }
    $tmp = substr(strtolower($rs['Url']), 0, 7);
    
    if(mb_strlen($rs['Caption'], 'utf8') > 9){
      $caption = mb_substr($rs['Caption'], 0, 8, 'utf8') . "…" ;
    }
    else{
      $caption = mb_substr($rs['Caption'], 0, 9, 'utf8');
    }
    if($rs['useFor'] == "PRODUCT1"){
      $p1 .= '<div class="TabbedPanelsContentIn">'.
                '<a target="_blank" href="'.$rs['Url'].'"><img src="'.$pics.'" width="120" height="70"></a>'.
                '<h4><a href="#"></a></h4>'.
                '<p><span class="icon-sale">'.(float)(number_format($rs['Discount'],1))."折</span>{$rs['Caption']}</p>".
              '</div>';
    }
    if($rs['useFor'] == "PRODUCT2"){
      $p2 .= '<div class="TabbedPanelsContentIn">'.
                '<a target="_blank" href="'.$rs['Url'].'"><img src="'.$pics.'" width="120" height="70"></a>'.
                '<h4><a href="#"></a></h4>'.
                '<p><span class="icon-sale">'.(float)(number_format($rs['Discount'],1))."折</span>{$rs['Caption']}</p>".
              '</div>';
    }
    if($rs['useFor'] == "PRODUCT4"){
      $p3 .= '<div class="TabbedPanelsContentIn">'.
                '<a target="_blank" href="'.$rs['Url'].'"><img src="'.$pics.'" width="120" height="70"></a>'.
                '<h4><a href="#"></a></h4>'.
                '<p><span class="icon-sale">'.(float)(number_format($rs['Discount'],1))."折</span>{$rs['Caption']}</p>".
              '</div>';
    }
    if($rs['useFor'] == "PRODUCT5"){
      $p4 .= '<div class="TabbedPanelsContentIn">'.
                '<a target="_blank" href="'.$rs['Url'].'"><img src="'.$pics.'" width="120" height="70"></a>'.
                '<h4><a href="#"></a></h4>'.
                '<p><span class="icon-sale">'.(float)(number_format($rs['Discount'],1))."折</span>{$rs['Caption']}</p>".
              '</div>';
    }
    $i++;
  }

  $result = mysql_query($sql);
  include './include/db_close.php';
?>

<div id="TabbedPanels1" class="TabbedPanels"><!--/頁籤-->
  <ul class="TabbedPanelsTabGroup">
    <li class="TabbedPanelsTab TabbedPanelsTabSelected" tabindex="0"><h5>本地服務精選</h5></li>
    <li class="TabbedPanelsTab" tabindex="0"><h5>宅配服務精選</h5></li>
     <li class="TabbedPanelsTab" tabindex="0"><h5>本地團購精選</h5></li>
    <li class="TabbedPanelsTab laster" tabindex="0"><h5>宅配團購精選</h5></li>
  </ul>
  <div class="TabbedPanelsContentGroup">
    <div class="TabbedPanelsContent TabbedPanelsContentVisible" style="display: block;">
      <?=$p1?>
    </div>
    <div class="TabbedPanelsContent" style="display: none;">
      <?=$p2?>
    </div>
    <div class="TabbedPanelsContent" style="display: none;">
      <?=$p3?>
    </div>
    <div class="TabbedPanelsContent" style="display: none;">
      <?=$p4?>
    </div>
  </div>
</div>