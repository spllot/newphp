<div id="menu-article"><!--/精選推薦文章-->
  	<dl id="dl-1">
		<dt><h1>精選推薦文章</h1></dt>
		<dd>
			<ul>
				<?php
				  include './include/db_open.php';
				  $sql = 'SELECT * FROM blog';
				  $result = mysql_query($sql);
				  $i=1;
				  while($i<6 && $rs = mysql_fetch_array($result)){
				  	if(mb_strlen($rs['Subject'], 'utf8') > 9){
				      $caption = mb_substr($rs['Subject'], 0, 8, 'utf8') . "…" ;
				    }
				    else{
				      $caption = mb_substr($rs['Subject'], 0, 9, 'utf8');
				    }
				  	echo '<li><a target="_blank" href="'.$rs['Url'].'"><img src="images/home-article-'.$i.'.jpg" width="80" height="65"></a><a target="_blank"  href="'.$rs['Url'].'"><h3>'.$rs['Subject'].'</h3></a></li>';
				    $i++;
				  }

				  include './include/db_close.php';
				?>
			</ul>
		</dd>
	</dl>
<!--/menu-article-精選推薦文章-->
</div>