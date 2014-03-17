<?php
	include './include/db_open.php';
	$result = mysql_query("SELECT * FROM Config");
	while($rs = mysql_fetch_array($result)){
		$_CONFIG[$rs['ID']] = $rs['YN'];
	}
	include './include/db_close.php';
?>

<div id="menu-notice"><!--/本站公告-->
	<dl id="dl-1">
		<dt><h1>本站公告</h1></dt>
		<dd>
			<ul>
				<?php
					include './include/db_open.php';
					$result = mysql_query("SELECT * FROM News ORDER BY Date DESC LIMIT 4") or die(mysql_error());
					$num = mysql_num_rows($result);
					$i=0;
					while($rs = mysql_fetch_array($result)){
						$i++;
						echo "<li><a href=\"javascript:Dialog1('news.php?no={$rs['No']}', 500);\" title=\"{$rs['Subject']}\">{$rs['Subject']}</a></li>";
					}
					include './include/db_close.php';
				?>
			</ul>
			<p>
				<a href="<?=$_CONFIG['link3']?>" target="_blank"><img width="220" height="57" src="./<?=(($_CONFIG['imgurl3'] != "") ? $_CONFIG['imgurl3'] : "/upload/" . $_CONFIG['ad_picpath3'])?>" border="0" ></a>
				<a href="<?=$_CONFIG['link8']?>" target="_blank"><img width="220" height="57" src="<?=(($_CONFIG['imgurl8'] != "") ? $_CONFIG['imgurl8'] : "/upload/" . $_CONFIG['ad_picpath8'])?>" border="0" ></a>
			</p>
		</dd>
	</dl>
<!--/menu-notice-本站公告-->
</div>