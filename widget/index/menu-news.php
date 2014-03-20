<div id="menu-news"><!--/最新商品-->
	<dl id="dl-1">
		<dt>
			<h1>最新商品&amp;服務 / 本地服務</h1>
			<!-- <p id="menu-news-link">
				<a href="#"><img src="images/icon-9.png" width="9" height="8"></a>
				<a href="#"><img src="images/icon-10.png" width="9" height="8"></a>
				<a href="#"><img src="images/icon-9.png" width="9" height="8"></a>
				<a href="#"><img src="images/icon-9.png" width="9" height="8"></a>
			</p> -->
		</dt>
		<dd>
			<ul class="clearfix">
				<?php
				  include './include/db_open.php';
				  $sql = 'SELECT * FROM AD2 WHERE 1=1 AND (Member=0 OR (Member > 0 AND dateExpire > CURRENT_TIMESTAMP)) order by dateSubmit DESC, Sort';
				  $result = mysql_query($sql);
				  $i=0;
				  if($result){
				  	while($i<4 && $rs = mysql_fetch_array($result)){
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
					    echo '<li><a target="_blank" href="'.$rs['Url'].'"><img src="'.$pics.'" width="125" height="99"></a><a target="_blank" href="'.$rs['Url'].'"><h3>'.$caption.'</h3></a></li>';
					    $i++;
					  }
				  }

				  $result = mysql_query($sql);
				  include './include/db_close.php';
				?>
			</ul>
		</dd>
	</dl>
<!--/menu-news-最新商品-->
</div>