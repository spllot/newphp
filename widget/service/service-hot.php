<div id="menu-hot-product"><!--/熱門業者推薦-->
	<dl id="dl-1">
		<dt><h1>熱門商品推薦</h1></dt>
		<dd>
			<ul>
				<?php
					include './include/db_open.php';
					$result = mysql_query("SELECT * FROM AD WHERE Member=0 OR (AD.Member > 0 AND dateExpire > CURRENT_TIMESTAMP) order by dateSubmit DESC, Sort");
					$ad = "<center><table width='190' align='center' cellpadding=0 cellspacing=0>";
					$i=0;
					$num = mysql_num_rows($result);
					while($rs = mysql_fetch_array($result)){
						$i++;
						$pics = "/images/none.png";
						if($rs['Src'] == 1){
							$pics = $rs['Link'];
						}

						if($rs['Src'] == 2){
							$pics = "./upload/{$rs['Icon']}";
						}
						//<span class=\"icon-sale\">5.5折</span>
						echo "<li><a href=\"{$rs['Url']}\">{$rs['Caption']}</a><div class=\"menu-hot-product-pic\"><img src=\"{$pics}\" width=\"212\" height=\"137\"></div></li>";
					}
					include './include/db_close.php';
				?>
			</ul>
		</dd>
	</dl>
<!--/menu-dealer-熱門業者推薦-->
</div>