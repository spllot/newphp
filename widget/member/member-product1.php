<?php
$ip = ((getenv(HTTP_X_FORWARDED_FOR)) ?  getenv(HTTP_X_FORWARDED_FOR) :  getenv(REMOTE_ADDR));
include './include/db_open.php';

if(!empty($_SESSION['member']) && substr($_SESSION['member']['dateLogin'], 0, 10) != date('Y-m-d')){
	mysql_query("UPDATE Member SET Days = Days + 1 WHERE userID = '" . $_SESSION['member']['userID'] . "'");
    $_SESSION['member']['dateLogin'] = date('Y-m-d H:i:s');
			mysql_query("UPDATE Member SET Level = 2 WHERE userID = '$userid' AND Days >= 15  AND Days <30");
			mysql_query("UPDATE Member SET Level = 3 WHERE userID = '$userid' AND Days >= 30  AND Days <60");
			mysql_query("UPDATE Member SET Level = 4 WHERE userID = '$userid' AND Days >= 60  AND Days <120");
			mysql_query("UPDATE Member SET Level = 5 WHERE userID = '$userid' AND Days >= 120  AND Days <240");
			mysql_query("UPDATE Member SET Level = 6 WHERE userID = '$userid' AND Days >= 240  AND Days <480");
			mysql_query("UPDATE Member SET Level = 7 WHERE userID = '$userid' AND Days >= 480  AND Days <960");
			mysql_query("UPDATE Member SET Level = 8 WHERE userID = '$userid' AND Days >= 960");
	$sql = "INSERT INTO logLogin(dateLogin, userID, Status, ipLogin) VALUES (CURRENT_TIMESTAMP, '" . $_SESSION['member']['userID'] . "', '1', '$ip')";
	mysql_query($sql) or die (mysql_error());
}
$result = mysql_query("SELECT * FROM Config");
while($rs = mysql_fetch_array($result)){
	$_CONFIG[$rs['ID']] = $rs['YN'];
}

$area=$_REQUEST['area'];
$type=$_REQUEST['type'];
$catalog=$_REQUEST['catalog'];
$catalog2=$_REQUEST['catalog2'];
$catalog3=$_REQUEST['catalog3'];
$seller=$_REQUEST['seller'];


switch($type){
	case 'transfer':
		$usefor = "TYPE_TPT";
		break;
	case 'hr':
		$usefor = "TYPE_JOB";
		break;
	case 'event':
		$usefor = "TYPE_ACT";
		break;
	default:
		$usefor = "TYPE_PRO";
		break;
}




$result = mysql_query("SELECT * FROM Catalog WHERE useFor='$usefor' AND Parent=0 ORDER BY Sort");
$catalog_list = "";
while($rs=mysql_fetch_array($result)){
	$catalog_list .= "<option value='" . $rs['No'] . "'" . (($catalog == $rs["No"] ) ? " SELECTED" : "") . ">" . $rs["Name"] . "</option>";
}
$disabled2= " disabled";
$disabled3= " disabled";
if($catalog != ""){
	$result = mysql_query("SELECT * FROM Catalog WHERE useFor='$usefor' AND Parent=$catalog ORDER BY Sort");
	$catalog_list2 = "";
	while($rs=mysql_fetch_array($result)){
		$catalog_list2 .= "<option value='" . $rs['No'] . "'" . (($catalog2 == $rs["No"] ) ? " SELECTED" : "") . ">" . $rs["Name"] . "</option>";
	}
	$disabled2= "";
}

if($catalog2 != ""){
	$result = mysql_query("SELECT * FROM Catalog WHERE useFor='$usefor' AND Parent=$catalog2 ORDER BY Sort");
	$catalog_list3 = "";
	while($rs=mysql_fetch_array($result)){
		$catalog_list3 .= "<option value='" . $rs['No'] . "'" . (($catalog3 == $rs["No"] ) ? " SELECTED" : "") . ">" . $rs["Name"] . "</option>";
	}
	$disabled3= "";
}



$tab = 4;
$result = mysql_query("SELECT * FROM Member WHERE No='$seller'") or die(mysql_error());
$member = mysql_fetch_array($result);






include './include/db_close.php';
$current = basename($_SERVER['PHP_SELF']);

$src_logo = (($_CONFIG['imgurl0'] != "") ? $_CONFIG['imgurl0'] : "/upload/" . $_CONFIG['logo']);
$img_banner = (($_CONFIG['showimg1'] == "Y") ? "<img src=\"" . (($_CONFIG['imgurl1'] != "") ? $_CONFIG['imgurl1']:"/upload/" . $_CONFIG['ad_picpath1']) . "\" style=\"width:590px; height:96px\" border=0/>" : "");

if($_CONFIG['link1'] != ""){
	$img_banner = "<a href='{$_CONFIG['link1']}' target='_blank'>{$img_banner}</a>";
}

?>


<?php
include './include/db_open.php';



$sql = "SELECT *, (SELECT Name FROM Catalog WHERE Catalog.No = (SELECT Area1 FROM Member WHERE No=Product.Member)) AS Area1, (SELECT Name FROM Catalog WHERE Catalog.No = Product.Area) AS City, getDistance(Product.Latitude, Product.Longitude, '" . $_SESSION['Latitude'] . "', '" . $_SESSION['Longitude'] . "') AS KM, (SELECT Level FROM Member WHERE Member.No = Product.Member) AS Level FROM Product WHERE Status = 2 AND Mode = 2 AND Deliver = 0 AND dateClose >= CURRENT_TIMESTAMP";


$sql = "SELECT *, (SELECT Name FROM Catalog WHERE No=Product.Type) AS TName, (SELECT Name FROM Catalog WHERE No=Product.Catalog) AS CName, IFNULL((SELECT COUNT(*) FROM logCoupon INNER JOIN Coupon ON Coupon.No=logCoupon.couponNo WHERE logCoupon.Product=Product.No), 0) AS Coupon, IFNULL((SELECT COUNT(*) FROM Orders WHERE Orders.Product=Product.No), 0) AS Sold, IFNULL((SELECT SUM(Amount) FROM Orders WHERE Orders.Product=Product.No), 0) AS Solds, IFNULL((SELECT COUNT(*) FROM logActivity WHERE logActivity.Product=Product.No), 0) AS Joins, (SELECT Name FROM Catalog WHERE Catalog.No = (SELECT Area1 FROM Member WHERE No=Product.Member)) AS Area1, (SELECT Latitude1 FROM Member WHERE No = Product.Member) AS M1, IF((SELECT Latitude1 FROM Member WHERE No = Product.Member) > 0, (SELECT Latitude1 FROM Member WHERE No = Product.Member), Product.Latitude) AS L1, IF((SELECT Longitude1 FROM Member WHERE No = Product.Member) > 0,(SELECT Longitude1 FROM Member WHERE No = Product.Member), Product.Longitude) AS L2, (SELECT Name FROM Catalog WHERE Catalog.No = Product.Area) AS City, getDistance(IF((SELECT Latitude1 FROM Member WHERE No = Product.Member) > 0, (SELECT Latitude1 FROM Member WHERE No = Product.Member), Product.Latitude), IF((SELECT Longitude1 FROM Member WHERE No = Product.Member) > 0,(SELECT Longitude1 FROM Member WHERE No = Product.Member), Product.Longitude), '" . $_SESSION['Latitude'] . "', '" . $_SESSION['Longitude'] . "') AS KM, (SELECT Level FROM Member WHERE Member.No = Product.Member) AS Level FROM Product WHERE Status = 2 AND Mode = 1 AND Deliver = 0 AND dateClose >= CURRENT_TIMESTAMP AND Member='$seller'";

$sql .= (($area!="") ? " AND (((SELECT Latitude1 FROM Member WHERE No = Product.Member) = 0 AND Area = '$area') OR ((SELECT Latitude1 FROM Member WHERE No = Product.Member) > 0 AND (SELECT Area1 FROM Member WHERE No=Product.Member) = '$area'))" : "");

if($type != ""){
	switch($type){
		case 'all':
			$sql .= " AND Activity = '0'";
			break;
		case 'activity':
			$sql .= " AND Activity = '1'";
			break;
		default:
			$sql .= " AND Type = '$type'";
			break;
	}
}



$sql .= (($catalog!="") ? " AND Catalog = '$catalog'" : "");
$sql .= (($catalog2!="") ? " AND Catalog2 = '$catalog2'" : "");
$sql .= (($catalog3!="") ? " AND Catalog3 = '$catalog3'" : "");


$sql .= " ORDER BY " .(($_SESSION['Latitude'] > 0 && $_SESSION['Longitude'] > 0) ? "KM, Level DESC, dateUpdate DESC" : "Level DESC, dateUpdate DESC");
//echo $sql;
$result = mysql_query($sql) or die(mysql_error());
$num = mysql_num_rows($result);
$pagesize  = 10;
$pages = ceil($num / $pagesize);
$pageno = $_REQUEST['pageno'];
if($pageno == "" || $pageno > $pages){$pageno = 1;}


$WEB_CONTENT = <<<EOD

<script language="javascript">
	function getClock(sec){
		var m = Math.floor(sec/60);
		var s = sec % 60;
		var h = Math.floor(m/60);
		m = m % 60;
		var d = Math.floor(h / 24);
		h = h % 24;
		
		h = d * 24 + h;
		return ((h > 0) ? h + "時" : "") + ((m > 0) ? m + "分" : "") + ((s > 0) ? s + "秒" : "");
		
		if(d > 30){
			return ((d > 0)? d + "天" : "");
		}
		if(d < 1 && h < 1 && m < 60){
			return ((m > 0) ? m + "分" : "") + ((s > 0) ? s + "秒" : "");
		}
		else{
			h = d * 24 + h;
			return ((h > 0) ? h + "時" : "") + ((m > 0) ? m + "分" : "");
		}
	}

</script>
	<table cellpadding='0' cellspacing='0' border='0'>
EOD;
if ($num>0){
	mysql_data_seek($result,($pageno-1)*$pagesize);
	for ($i = 0; $i < $pagesize; $i++) {
		if($data = mysql_fetch_array($result)){
			$activity_join = "已售 --";
			$activity_timer = "--時--分--秒";
			$price = "$" . number_format($data['Price']);
			$sell = "$" . number_format($data['Price1']);
			$save = "$" . number_format($data['Price'] - $data['Price1']);
			if($_SESSION['Latitude'] > 0 && $_SESSION['Longitude']>0){
				$dis =(($data['Latitude']>0 && $data['Longitude'] > 0) ? "距離：" .  (float)(number_format($data['KM'], 1)) . "公里" : "");
				$dis =(($data['L1']>0 && $data['L2'] > 0) ? "距離：" .  (float)(number_format($data['KM'], 1)) . "公里" : "");
			}
			else{
				$dis = "距離：? (請輸入<a href='member_location.php?url=" . urlencode("product1.php?area=$area&catalog=$catalog&type=$type&pageno=$pageno") . "&tab=1' style='text-decoration:underline'>我的位置</a>，再回頁面)</font>";
				$dis = "距離：<a id='dis{$data['No']}' style='color:#FFFFFF'; href='javascript:void(0);' onMouseOver='showDis();setDisPos({$data['No']}); '> ? </a>";
			}
			$counts = 0;
			$used = (($data['Used'] == 1) ? "<img src='./images/old_good.gif'>" : "");
			$used = (($data['Sale'] == 1) ? "<img src='./images/will_phase_out.gif'>" : $used);



			$discount = (float)(number_format(($data['Price1'] / $data['Price'])*10,1));
			if($discount <= 0){
				$discount = "<span style='font-size:20px; font-weight:bold; text-shadow: 0px 0px 6px rgba(255,255,255,0.7);'>免費</span>";
			}
			else if($discount >= 10){
				$discount = "";
			}
			else{
				$d = explode(".", strval($discount));
				$discount = "<span style='font-size:20px; font-weight:bold; text-shadow: 0px 0px 6px rgba(255,255,255,0.7);'>". $d[0] . "</span>";
				if(sizeof($d) > 1){
					$discount .= "<span style='font-size:20px; font-weight:bold; text-shadow: 0px 0px 6px rgba(255,255,255,0.7);'>.". $d[1] . "</span>";
				}


				$discount = $discount . "<span style='font-size:20px; text-shadow: 0px 0px 6px rgba(255,255,255,0.7);'>折</span>";
			}

			$name = mb_substr($data['Name'], 0, 12, 'utf8') . ((mb_strlen($data['Name'], 'utf8') > 12) ? "…" : "") ;
			$seller = mb_substr($data['Nick'], 0, 4, 'utf8') . ((mb_strlen($data['Nick'], 'utf8') > 4) ? "…" : "") ;
			$city = (($data['M1'] > 0 && $data['mobile'] == 1) ? $data['Area1'] : $data['City']);
			$city = (($data['Status2'] == 2) ? "XX" : $city);
//			$cashflow = (($data['Cashflow'] == 1) ? "pay_money.gif" :"non_pay_money.gif");
			$hot = "";
			

			$cashflow = "none1.gif";
			if($data['Broadcast'] == 1){
				$cashflow = "broadcast.gif";
				$hot = "<img src='./images/explosive.gif' style='width:60px; height:60px'>";
			}
			$js_count = "";
			if($data['Cashflow'] == 1){
				$activity_join = $data['Sold'] . "人購買";
				$left = strtotime($data['dateClose']) - time();
				$m = floor($left / 60);
				$h = floor($m / 60);
				$m = $m % 60;
				$d = floor($h / 24);
				$h = $h % 24;
				if($d > 30){
					$activity_timer = (($d > 0) ? $d . "天" : "");
//					$activity_timer .= (($h > 0) ? $h. "時" : "");
//					$activity_timer .= (($m > 0) ? $m . "分" : "");
				}
				else{
					$h = $d * 24 + $h;
					$activity_timer = (($h > 0) ? $h. "時" : "");
					$activity_timer .= (($m > 0) ? $m . "分" : "");
				}
				$js_count =<<<EOD
					<script language="javascript">
						var t{$data['No']} = $left;
						function Count{$data['No']}(){
							if(t{$data['No']} > 0){
								t{$data['No']} --;
								$("#timer{$data['No']}").html(getClock(t{$data['No']}));
								setTimeout("Count{$data['No']}()", 1000);
							}
							else{
								$("#timer{$data['No']}").html("已逾期");
							}
						}
						Count{$data['No']}();
					</script>
EOD;
			}
			else if($data['Cashflow'] == 0 && $data['Deliver'] == 0 && $data['coupon_YN'] == 1){
				$hot = "<img src='./images/anihot1_hot.gif' style='width:60px; height:60px'>";
				$activity_join = $data['Coupon'] . "人索取";
			}

			
			if($data['Price'] == $data['Price1']){
				$price = "- -";
				$save = "- -";
				$discount = "<span style='font-size:20px; font-weight:bold; text-shadow: 0px 0px 6px rgba(255,255,255,0.7);'>- -</span><span style='font-size:20px; font-weight:bold; text-shadow: 0px 0px 6px rgba(255,255,255,0.7);'>折</span>";
			}

			$price_decoration = "line-through";
			if($data['Price'] == $data['Price1']){
				$price = "- -";
				$save = "- -";
				$price_decoration="none";
				$discount = "<span style='font-size:20px; font-weight:bold; text-shadow: 0px 0px 6px rgba(255,255,255,0.7);'>--</span> <span style='font-size:20px; font-weight:bold; text-shadow: 0px 0px 6px rgba(255,255,255,0.7);'>折</span>";
			}

			if($data['Transport'] == 1){
				$discount = "<span style='font-weight:bold; text-shadow: 0px 0px 6px rgba(255,255,255,0.7);'>{$empty}</span>";
				$price_info = "<div style='color:#FFFFFF; text-align:center; font-size:24px; line-height:50px'>"  . $data['taxi_discount'] . "</div>";				
			}
			else if($data['price_mode'] == 1){
				$price_info = "<div style='color:#FFFFFF; text-align:center; font-size:20px; line-height:50px; width:150px'>"  . $data['price_info'] . "</div>";
			}
			else{
			if($data['Price1'] > 9999){
				$price_info = <<<EOD
								<table>
									<tr>
										<td style="color:white; font-size:30px;" nowrap>{$sell}</td>
									</tr>
								</table>
EOD;
			}
			else{
				$price_info = <<<EOD
							<table>
								<tr>
									<td rowspan="2" style="color:white; font-size:30px; width:90px" nowrap>{$sell}</td>
									<td style="color:white; font-size:14px; text-decoration: {$price_decoration}" nowrap>原價 {$price}</td>
								</tr>
								<tr>
									<td style="color:white; font-size:14px;" nowrap>節省 {$save}</td>
								</tr>
							</table>
EOD;
			}
				}


			$price_info = <<<EOD
						<table style="border: 0px solid green;margin-top: -13px;margin-left: -18px;">
							<td style="width:33px; height:54px; text-align:center"><img src="./images/price.png"></td>
							<td><div style="width:165px; height:54px; overflow:hidden">{$price_info}</div></td>
						</table>
EOD;


			if(strpos($data['CName'], "展演") > -1){
				$activity = ";background:url('./images/show.gif'); background-repeat:no-repeat; background-position:605px 3px";
			}
			else if($data['hr'] == 1){
				$activity = ";background:url('./images/hr.gif'); background-repeat:no-repeat; background-position:605px 3px";
			}
			else if($data['event'] == 1){
				$activity = ";background:url('./images/activity2.gif'); background-repeat:no-repeat; background-position:605px 3px";
			}
			else{
				$activity = ";background:url('./images/product.gif'); background-repeat:no-repeat; background-position:605px 3px";
			}
			if($data['hr'] == 1 || $data['event'] == 1 || $data['Transport'] == 1){
				$data['TName'] = "服務類型";
			}
			$WEB_CONTENT .= <<<EOD
				<tr>
					<td class="product-item">


						<div style="width:720px; height:262px; overflow:hidden;">
							<div style="width:720px; height:262px; overflow:hidden">
								<table width="720" height="262" cellpadding="0" cellspacing="0" border=0 style="{$activity}">
									<tr>
										<td style="width:348px; height:22px; color:white">
											<table cellpadding="0" cellspacing="0" border=0 class="table-title">
												<tr>
													<td style="width:160px; padding-left:15px; height:22px; color:white; text-align:center; vertical-align:bottom; font-size:11pt"><div  class="top-title1">{$data['TName']}</div></td>
													<td style="width:184px; padding-left:10px; height:22px; color:white; text-align:center; vertical-align:bottom; font-size:11pt"><div style="width:160px; height:22px; overflow:hidden; text-align:center; line-height:25px">&nbsp;</div></td>
												</tr>
											</table>
										</td>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<td style="padding-left:26px; padding-bottom:14px">
										<div style="width:305px; height:198px; overflow:hidden; border:solid 0px gray"><a href="member_product1_detail.php?no={$data['No']}&area={$area}&type={$type}&catalog={$catalog}"><img src="./upload/{$data['Photo']}" style="width:305px; height:198px" border='0'></a></div>
										</td>
										<td style="vertical-align:top; padding-left:5px" valign="top" >
											<div style="width:218px; height:28px; margin-top:15px; border:solid 0px gray; overflow:hidden"><a href="member_product1_detail.php?no={$data['No']}&area={$area}&type={$type}&catalog={$catalog}" style="color:#000000; font-size:22px; font-weight:bold">{$name}</a></div>
											<div class="product-desc">{$data['Description']}</div>
											<div style="width:310px; height:30px; margin-top:2px; border:solid 1px transparent; overflow:hidden; text-align:center; color:blue; font-size:13px; line-height:30px"></div>
											<div class="product-shop">&nbsp;</div>
											<div id="product-list-price-info" style="margin-top:25px;">
												<div class="product-list-price">
													<ul><li><h2>{$price_info}</h2></li></ul>
													<span style="display:inline-block;margin-top:12px;margin-left:9px;">{$discount}</span>
												</div>
											</div>
											<div style="width:300px; height:22px; margin-top:5px; border:solid 1px transparent; overflow:hidden">
												<table style="width:300px" cellpadding="0" cellspacing="0" border=0>
													<tr>
														<td style="width:27px; height:22px; text-align:right; padding-right:2px"><img src="./images/icon-taxi.png"></td>
														<td style="font-family: Arial,微軟正黑體;font-weight: bold;font-size: 14px;color: #a41101">{$activity_join}</td>
														<td style="width:22px; height:22px; text-align:right; padding-right:2px"><img src="./images/icon-time.png"></td>
														<td style="font-family: Arial,微軟正黑體;font-weight: bold;color: #434343;font-size: 14px;"><div id="timer{$data['No']}">{$activity_timer}</div></td>
													</tr>
												</table>
											</div>
										</td>
									</tr>
								</table>{$js_count}
							</div>
			
							<div class="label" style="position:relative; z-index:5; top:-244px; left:15px; width:90px; height:90px; text-align:center"><img src="./images/{$cashflow}"></div>
							<div class="label" style="position:relative; z-index:6; top:-158px; left:25px; width:70px; height:70px; text-align:center">{$used}</div>
							<div class="label" style="position:relative; z-index:5; top:-258px; left:263px; width:70px; height:70px; text-align:center">{$hot}</div>
						</div>



						<!--div style="height:242px; overflow:hidden">
							<div>
							<table width="660" height="242" cellpadding="0" cellspacing="0" border=0 style="{$activity}">
								<tr>
									<td width="353" align='center' style="padding:22px; padding-bottom:22px; padding-left:22px;">
										<div style="width:305px; height:198px; overflow:hidden; border:solid 1px gray"><a href="product1_detail.php?no={$data['No']}&area={$area}&type={$type}&catalog={$catalog}"><img src="./upload/{$data['Photo']}" style="width:305px; height:198px" border='0'></a></div>
									</td>
									<td width="353" align='center' valign='top' aling='center' style="padding-top:22px; padding-bottom:22px; padding-right:22px">
										<table width="303" cellpadding="0" cellspacing="0" border="0" align='center'>
											<tr>
												<td align='left'><div style='position:relative; left:-10px; text-align:left; color:#F74521; font-weight:bold; line-height:30px; height:30px; overflow:hidden'>【<a href="product1_detail.php?no={$data['No']}&area={$area}&type={$type}&catalog={$catalog}" style="color:#F74521">{$name}</a>】{$discount}</div></td>
											</tr>
											<tr>
												<td align='left'><div style="text-align:left; height:40px; overflow:hidden">{$data['Description']}</div></td>
											</tr>
											<tr>
												<td height="52" style="vertical-align:bottom; text-align:right; color:#F74521">
												<div style="float:right">{$dis}</div>
												<div style='position:relative; left:-10px; text-align:left; color:green'></div>
												</td>
											</tr>
											<tr>
												<td>
													<table cellpadding="0" cellspacing="0">
														<tr style="height:37px">
															<td style="width:101px;text-align:center; background:#F7C74A">原價{$price}</td>
															<td style="width:101px;text-align:center; background:#FFAA73">售{$sell}</td>
															<td style="width:101px;text-align:center; background:#FF7510">省{$save}</td>
														</tr>
														<tr style="height:4px"></tr>
														<tr style="height:37px">
															<td style="width:101px;text-align:center; background:#F7C74A">{$city}</td>
															<td style="width:101px;text-align:center; background:#FFAA73">{$activity_join}</td>
															<td style="width:101px;text-align:center; background:#FF7510"><div id="timer{$data['No']}">{$activity_timer}</div></td>
														</tr>
													</table>{$js_count}
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
							</div>
							<div class="label" style="position:relative; z-index:5; top:-226px; left:25px; width:70px; height:70px; text-align:center"><img src="./images/{$cashflow}"></div>
							<div class="label" style="position:relative; z-index:6; top:-158px; left:25px; width:70px; height:70px; text-align:center">{$used}</div>
							<div class="label" style="position:relative; z-index:5; top:-232px; left:260px; width:70px; height:70px; text-align:center">{$hot}</div>
						</div-->
					</td>
				</tr>
				<tr>
					<td style=";height:13px; background:#FFFFFF"></td>
				</tr>
EOD;


		}
		else{
			break;
		}
	}
}

$WEB_CONTENT .= "</table>";

//分页
if($pages > 1){
	$WEB_CONTENT .= "<div class='page'><ul>";
	if($pageno > 1){
		$WEB_CONTENT .= "<li class='page-prev'><a href='javascript:" . (($pageno > 1) ? "setPage(" . ($pageno - 1) . ")" : "void(0)"). ";'>&lt;上一頁</a></li>";
	}
	$WEB_CONTENT .= "<li class='page-number'>";
	for($i=0; $i<$pages; $i++){
		if(($i+1)==$pageno){
			$WEB_CONTENT .= intval($i+1) ;
		}
		else{
			$WEB_CONTENT .= "<a style='margin-left: 10px;margin-right:10px;' href='javascript:" . "setPage(" . ($i+1) . ")". ';\'>'. ($i+1)."</a>";
		}
	}
	$WEB_CONTENT .= "</li>";
	if($pageno < $pages){
		$WEB_CONTENT .= "<li class='page-next'><a href='javascript:" . (($pageno < $pages) ? "setPage(" . ($pageno + 1) . ")" : "void(0)"). ";'>下一頁&gt;</a></li>";
	}
	$WEB_CONTENT .="</ul></div>";
}

include './include/db_close.php';

?>
<table cellpadding="0" cellspacing="0" border="0" width="720" style="padding-top:20px;">
	<tr>
		<td><?=$WEB_CONTENT?></td>
	</tr>
</table>

<script language="javascript">
	function setPage(x){
		var url = location.href;
		if(url.indexOf("pageno=")>0){
			location.href = url.replace(/pageno=\d+/,"pageno="+x);
		}else{
			if(url.indexOf("?")>0){
				location.href = url + "&pageno="+x;
			}else{
				location.href = url + "pageno="+x;
			}
		}
		
	}
	function setDisPos(x){
		var p = $("#dis"+x).offset();
		$("#dis").css({"top": p.top-320, "left": p.left-$("#dis").width()-50});

	}
	function showDis(){
		$("#dis").show();
	}
	function hideDis(){
		$("#dis").hide();
	}
</script>