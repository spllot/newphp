<div id="menu-dealer"><!--/熱門業者推薦-->
	<dl id="dl-1">
		<dt><h1>熱門業者推薦</h1></dt>
		<dd>
			<ul>
				<?php 
					include './include/db_open.php';
					$result = mysql_query("SELECT * FROM AD WHERE Member=0 OR (AD.Member > 0 AND dateExpire > CURRENT_TIMESTAMP) order by dateSubmit DESC, Sort");
					$html   = "";
					$i      = 1;
					$num = mysql_num_rows($result);
					while($rs = mysql_fetch_array($result)){
						if($i > 15){
							break;
						}
						$html = $html.'<li><a href="'.$rs['Link'].'">'.$rs['Caption'].'</a></li>';
						$i++;
					}
					include './include/db_close.php';
				?>
				<?=$html?>
			</ul>
		</dd>
	</dl>
<!--/menu-dealer-熱門業者推薦-->
</div>