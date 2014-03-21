<div id="menu-hotservices"><!--/熱門服務推-->
	<dl id="dl-1">
		<dt><h1>熱門服務推薦</h1></dt>
		<dd>
			<ul>
				<?php
				  include './include/db_open.php';
				  $sql = 'SELECT * FROM Product order by Used desc';
				  $result = mysql_query($sql);
				  $i=1;
				  if($result){
				  	while($i<6 && $rs = mysql_fetch_array($result)){
					  	$pics = "/images/none.png";
					    if($rs['Mode'] == 1){
							if($rs['Deliver'] == 0){
								$type=1;
							}
							if($rs['Deliver'] == 1){
								$type=2;
							}
						}
						if($rs['Mode'] == 2){
							if($rs['Deliver'] == 0){
								$type=4;
							}
							if($rs['Deliver'] == 1){
								$type=5;
							}
						}
						$url = "member_product".$type."_detail.php?no=".$rs['No'];
					  	if(mb_strlen($rs['Description'], 'utf8') > 25){
					      $caption = mb_substr($rs['Description'], 0, 25, 'utf8') . "…" ;
					    }
					    else{
					      $caption = mb_substr($rs['Description'], 0, 25, 'utf8');
					    }
					  	echo '<li><a target="_blank" href="'.$url.'"><img src="./upload/'.$rs['Photo'].'" width="75" height="65"></a><a target="_blank"  href="'.$url.'"><h3>'.$rs['Name'].'</h3></a>'.$caption.'</li>';
					    $i++;
					  }
				  }
				  
				  include './include/db_close.php';
				?>
			</ul>
		</dd>
	</dl>
<!--/menu-hotservices-熱門服務推-->
</div>