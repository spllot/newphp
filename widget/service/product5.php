<?php
include './include/db_open.php';
ob_start();
$tab =$_REQUEST['tab'];
$area=$_REQUEST['area'];
$type=$_REQUEST['type'];
$catalog=$_REQUEST['catalog'];
$catalog2=isset($_REQUEST['catalog2']) ? $_REQUEST['catalog2'] : 0;
$catalog3=isset($_REQUEST['catalog3']) ? $_REQUEST['catalog3'] : 0;

$tmp_type = $type;
if($type != "all"){
	$type = $tab;
}


$sql = "SELECT *, (SELECT Name FROM Catalog WHERE Catalog.No = (SELECT Area1 FROM Member WHERE No=Product.Member)) AS Area1, (SELECT Name FROM Catalog WHERE Catalog.No = Product.Area) AS City, getDistance(Product.Latitude, Product.Longitude, '" . $_SESSION['Latitude'] . "', '" . $_SESSION['Longitude'] . "') AS KM, (SELECT Level FROM Member WHERE Member.No = Product.Member) AS Level FROM Product WHERE Status = 2 AND Mode = 2 AND Deliver = 0 AND dateClose >= CURRENT_TIMESTAMP";


$sql = "SELECT *, (SELECT Name FROM Catalog WHERE No=Product.Catalog) AS CName, IFNULL((SELECT COUNT(*) FROM logCoupon INNER JOIN Coupon ON Coupon.No=logCoupon.couponNo WHERE logCoupon.Product=Product.No), 0) AS Coupon, IFNULL((SELECT COUNT(*) FROM Orders WHERE Orders.Product=Product.No), 0) AS Sold, IFNULL((SELECT SUM(Amount) FROM Orders WHERE Orders.Product=Product.No), 0) AS Solds, IFNULL((SELECT SUM(Amount) FROM Orders WHERE Orders.Product=Product.No), 0) AS Solds, IFNULL((SELECT COUNT(*) FROM logActivity WHERE logActivity.Product=Product.No), 0) AS Joins, (SELECT Name FROM Catalog WHERE Catalog.No = (SELECT Area1 FROM Member WHERE No=Product.Member)) AS Area1, (SELECT Latitude1 FROM Member WHERE No = Product.Member) AS M1, IF((SELECT Latitude1 FROM Member WHERE No = Product.Member) > 0, (SELECT Latitude1 FROM Member WHERE No = Product.Member), Product.Latitude) AS L1, IF((SELECT Longitude1 FROM Member WHERE No = Product.Member) > 0,(SELECT Longitude1 FROM Member WHERE No = Product.Member), Product.Longitude) AS L2, (SELECT Name FROM Catalog WHERE Catalog.No = Product.Area) AS City, getDistance(IF((SELECT Latitude1 FROM Member WHERE No = Product.Member) > 0, (SELECT Latitude1 FROM Member WHERE No = Product.Member), Product.Latitude), IF((SELECT Longitude1 FROM Member WHERE No = Product.Member) > 0,(SELECT Longitude1 FROM Member WHERE No = Product.Member), Product.Longitude), '" . $_SESSION['Latitude'] . "', '" . $_SESSION['Longitude'] . "') AS KM, (SELECT Level FROM Member WHERE Member.No = Product.Member) AS Level FROM Product WHERE Status = 2 AND Mode = 2 AND Deliver = 1 AND dateClose >= CURRENT_TIMESTAMP";

$sql .= (($area!="") ? " AND (((SELECT Latitude1 FROM Member WHERE No = Product.Member) = 0 AND Area = '$area') OR ((SELECT Latitude1 FROM Member WHERE No = Product.Member) > 0 AND (SELECT Area1 FROM Member WHERE No=Product.Member) = '$area'))" : "");

if($type != ""){
	switch($type){
		case 'all':
			$sql .= " AND Activity = '0'";
			break;
		case 'activity':
			$sql .= " AND Activity = '1'";
			break;
		case 'welfare':
			$sql .= " AND welfare = '1'";
			break;
		case 'free':
			$sql .= " AND Price1 = '0' AND price_mode=0 AND Transport = 0";
			break;
		case 'allnew':
			$c .= " AND Allnew = '1'";
			break;
		case 'transfer':
			$c .= " AND Transport = '1'";
			break;
		case 'used':
			$sql .= " AND Used = '1'";
			break;
		case 'sale':
			$sql .= " AND Sale = '1'";
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

$c =  " AND Status = 2 AND Mode = 2 AND Deliver = 1 AND dateClose >= CURRENT_TIMESTAMP";
$c .= (($area!="") ? " AND (((SELECT Latitude1 FROM Member WHERE No = Product.Member) = 0 AND Area = '$area') OR ((SELECT Latitude1 FROM Member WHERE No = Product.Member) > 0 AND (SELECT Area1 FROM Member WHERE No=Product.Member) = '$area'))" : "");
if($type != ""){
	switch($type){
		case 'all':
			$c .= " AND Activity = '0'";
			break;
		case 'activity':
			$c .= " AND Activity = '1'";
			break;
		case 'allnew':
			$c .= " AND Allnew = '1'";
			break;
		case 'transfer':
			$c .= " AND Transport = '1'";
			break;
		case 'used':
			$c .= " AND Used = '1'";
			break;
		case 'sale':
			$c .= " AND Sale = '1'";
			break;
		default:
			$c .= " AND Type = '$type'";
			break;
	}
}
$c .= (($catalog!="") ? " AND Catalog = '$catalog'" : "");
$sql = "SELECT DISTINCT Member, (SELECT No FROM Product WHERE Member=P.Member AND Cashflow=0 {$c} ORDER BY Sort LIMIT 1) AS No FROM Product P WHERE Cashflow = 0" . $c;
$result = mysql_query($sql) or die(mysql_error());
$num = mysql_num_rows($result);
$nos = "";
$i=0;
while($rs=mysql_fetch_array($result)){
	$i++;
	$nos .= $rs['No'];
	$nos .= (($num > $i) ? ",":"");
}
$nos = "";



//echo $sql;
$sql1 = "SELECT *, IFNULL((SELECT COUNT(*) FROM logCoupon INNER JOIN Coupon ON Coupon.No=logCoupon.couponNo WHERE logCoupon.Product=Product.No), 0) AS Coupon, IFNULL((SELECT COUNT(*) FROM Orders WHERE Orders.Product=Product.No), 0) AS Sold, IFNULL((SELECT SUM(Amount) FROM Orders WHERE Orders.Product=Product.No), 0) AS Solds, IFNULL((SELECT COUNT(*) FROM logActivity WHERE logActivity.Product=Product.No), 0) AS Joins, (SELECT Name FROM Catalog WHERE Catalog.No = (SELECT Area1 FROM Member WHERE No=Product.Member)) AS Area1, (SELECT Latitude1 FROM Member WHERE No = Product.Member) AS M1, IF((SELECT Latitude1 FROM Member WHERE No = Product.Member) > 0, (SELECT Latitude1 FROM Member WHERE No = Product.Member), Product.Latitude) AS L1, IF((SELECT Longitude1 FROM Member WHERE No = Product.Member) > 0,(SELECT Longitude1 FROM Member WHERE No = Product.Member), Product.Longitude) AS L2, (SELECT Name FROM Catalog WHERE Catalog.No = Product.Area) AS City, getDistance(IF((SELECT Latitude1 FROM Member WHERE No = Product.Member) > 0, (SELECT Latitude1 FROM Member WHERE No = Product.Member), Product.Latitude), IF((SELECT Longitude1 FROM Member WHERE No = Product.Member) > 0,(SELECT Longitude1 FROM Member WHERE No = Product.Member), Product.Longitude), '" . $_SESSION['Latitude'] . "', '" . $_SESSION['Longitude'] . "') AS KM, (SELECT Level FROM Member WHERE Member.No = Product.Member) AS Level FROM Product WHERE 1=1 AND Cashflow=1";
$sql1 .= $c;

$sql2 = "SELECT *, IFNULL((SELECT COUNT(*) FROM logCoupon INNER JOIN Coupon ON Coupon.No=logCoupon.couponNo WHERE logCoupon.Product=Product.No), 0) AS Coupon, IFNULL((SELECT COUNT(*) FROM Orders WHERE Orders.Product=Product.No), 0) AS Sold, IFNULL((SELECT SUM(Amount) FROM Orders WHERE Orders.Product=Product.No), 0) AS Solds, IFNULL((SELECT COUNT(*) FROM logActivity WHERE logActivity.Product=Product.No), 0) AS Joins, (SELECT Name FROM Catalog WHERE Catalog.No = (SELECT Area1 FROM Member WHERE No=Product.Member)) AS Area1, (SELECT Latitude1 FROM Member WHERE No = Product.Member) AS M1, IF((SELECT Latitude1 FROM Member WHERE No = Product.Member) > 0, (SELECT Latitude1 FROM Member WHERE No = Product.Member), Product.Latitude) AS L1, IF((SELECT Longitude1 FROM Member WHERE No = Product.Member) > 0,(SELECT Longitude1 FROM Member WHERE No = Product.Member), Product.Longitude) AS L2, (SELECT Name FROM Catalog WHERE Catalog.No = Product.Area) AS City, getDistance(IF((SELECT Latitude1 FROM Member WHERE No = Product.Member) > 0, (SELECT Latitude1 FROM Member WHERE No = Product.Member), Product.Latitude), IF((SELECT Longitude1 FROM Member WHERE No = Product.Member) > 0,(SELECT Longitude1 FROM Member WHERE No = Product.Member), Product.Longitude), '" . $_SESSION['Latitude'] . "', '" . $_SESSION['Longitude'] . "') AS KM, (SELECT Level FROM Member WHERE Member.No = Product.Member) AS Level FROM Product WHERE 1=1 AND Cashflow=0" . (($nos != "") ? " AND No IN ($nos)" : "");
$sql2 .= $c;

$sql = "($sql1) UNION ($sql2)";
$sql .= " ORDER BY " .(($_SESSION['Latitude'] > 0 && $_SESSION['Longitude'] > 0) ? "KM, Level DESC, dateUpdate DESC" : "Level DESC, dateUpdate DESC");


$c =  " AND Status = 2 AND Mode = 2 AND Deliver = 1 AND dateClose >= CURRENT_TIMESTAMP";
$c .= (($area!="") ? " AND (((SELECT Latitude1 FROM Member WHERE No = P.Member) = 0 AND Area = '$area') OR ((SELECT Latitude1 FROM Member WHERE No = P.Member) > 0 AND (SELECT Area1 FROM Member WHERE No=P.Member) = '$area'))" : "");
if($type != ""){
	switch($type){
		case 'all':
			$c .= " AND Activity = '0'";
			break;
		case 'activity':
			$c .= " AND Activity = '1'";
			break;
		case 'used':
			$c .= " AND Used = '1'";
			break;
		case 'allnew':
			$c .= " AND Allnew = '1'";
			break;
		case 'transfer':
			$c .= " AND Transport = '1'";
			break;
		case 'sale':
			$c .= " AND Sale = '1'";
			break;
		default:
			$c .= " AND Type = '$type'";
			break;
	}
}
$c .= (($catalog!="") ? " AND Catalog = '$catalog'" : "");
//$sql = "SELECT DISTINCT Member, (SELECT No FROM Product WHERE Member=P.Member AND Cashflow=0 {$c} ORDER BY Sort LIMIT 1) AS No FROM Product P WHERE Cashflow = 0" . $c;
$sql = "SELECT DISTINCT Member, (SELECT No FROM Product WHERE Member=P.Member {$c} ORDER BY Sort LIMIT 1) AS No FROM Product P WHERE 1=1" . $c;
$result = mysql_query($sql) or die(mysql_error());
$num = mysql_num_rows($result);
$nos = "";
$i=0;
while($rs=mysql_fetch_array($result)){
	$i++;
	$nos .= $rs['No'];
	$nos .= (($num > $i) ? ",":"");
}


$c =  " AND Status = 2 AND Mode = 2 AND Deliver = 1 AND dateClose >= CURRENT_TIMESTAMP";
$c .= (($area!="") ? " AND (((SELECT Latitude1 FROM Member WHERE No = Product.Member) = 0 AND Area = '$area') OR ((SELECT Latitude1 FROM Member WHERE No = Product.Member) > 0 AND (SELECT Area1 FROM Member WHERE No=Product.Member) = '$area'))" : "");
if($type != ""){
	switch($type){
		case 'all':
			$c .= " AND Activity = '0'";
			break;
		case 'activity':
			$c .= " AND Activity = '1'";
			break;
		case 'allnew':
			$c .= " AND Allnew = '1'";
			break;
		case 'transfer':
			$c .= " AND Transport = '1'";
			break;
		case 'used':
			$c .= " AND Used = '1'";
			break;
		case 'sale':
			$c .= " AND Sale = '1'";
			break;
		default:
			$c .= " AND Type = '$type'";
			break;
	}
}
$c .= (($catalog!="") ? " AND Catalog = '$catalog'" : "");









$sql2 = "SELECT *, IFNULL((SELECT COUNT(*) FROM logCoupon INNER JOIN Coupon ON Coupon.No=logCoupon.couponNo WHERE logCoupon.Product=Product.No), 0) AS Coupon, IFNULL((SELECT COUNT(*) FROM Orders WHERE Orders.Product=Product.No), 0) AS Sold, IFNULL((SELECT SUM(Amount) FROM Orders WHERE Orders.Product=Product.No), 0) AS Solds, IFNULL((SELECT COUNT(*) FROM logActivity WHERE logActivity.Product=Product.No), 0) AS Joins, (SELECT Name FROM Catalog WHERE Catalog.No = (SELECT Area1 FROM Member WHERE No=Product.Member)) AS Area1, (SELECT Latitude1 FROM Member WHERE No = Product.Member) AS M1, IF((SELECT Latitude1 FROM Member WHERE No = Product.Member) > 0, (SELECT Latitude1 FROM Member WHERE No = Product.Member), Product.Latitude) AS L1, IF((SELECT Longitude1 FROM Member WHERE No = Product.Member) > 0,(SELECT Longitude1 FROM Member WHERE No = Product.Member), Product.Longitude) AS L2, (SELECT Name FROM Catalog WHERE Catalog.No = Product.Area) AS City, getDistance(IF((SELECT Latitude1 FROM Member WHERE No = Product.Member) > 0, (SELECT Latitude1 FROM Member WHERE No = Product.Member), Product.Latitude), IF((SELECT Longitude1 FROM Member WHERE No = Product.Member) > 0,(SELECT Longitude1 FROM Member WHERE No = Product.Member), Product.Longitude), '" . $_SESSION['Latitude'] . "', '" . $_SESSION['Longitude'] . "') AS KM, (SELECT Level FROM Member WHERE Member.No = Product.Member) AS Level, (SELECT Latitude1 FROM Member WHERE No = Product.Member) AS M1 FROM Product WHERE 1=1 " . (($nos != "") ? " AND No IN ($nos)" : "");
$sql2 .= $c;

$sql = "$sql2";
$sql .= " ORDER BY " .(($_SESSION['Latitude'] > 0 && $_SESSION['Longitude'] > 0) ? "KM, Level DESC, dateUpdate DESC" : "Level DESC, dateUpdate DESC");










$sql = "SELECT *, (SELECT Nick FROM Member WHERE No=Product.Member) AS Nick, IFNULL((SELECT COUNT(*) FROM logCoupon INNER JOIN Coupon ON Coupon.No=logCoupon.couponNo WHERE logCoupon.Product=Product.No), 0) AS Coupon, IFNULL((SELECT COUNT(*) FROM Orders WHERE Orders.Product=Product.No), 0) AS Sold, IFNULL((SELECT SUM(Amount) FROM Orders WHERE Orders.Product=Product.No), 0) AS Solds, IFNULL((SELECT COUNT(*) FROM logActivity WHERE logActivity.Product=Product.No), 0) AS Joins, (SELECT Name FROM Catalog WHERE Catalog.No = (SELECT Area1 FROM Member WHERE No=Product.Member)) AS Area1, (SELECT Latitude1 FROM Member WHERE No = Product.Member) AS M1, IF((SELECT Latitude1 FROM Member WHERE No = Product.Member) > 0, (SELECT Latitude1 FROM Member WHERE No = Product.Member), Product.Latitude) AS L1, IF((SELECT Longitude1 FROM Member WHERE No = Product.Member) > 0,(SELECT Longitude1 FROM Member WHERE No = Product.Member), Product.Longitude) AS L2, (SELECT Name FROM Catalog WHERE Catalog.No = Product.Area) AS City, getDistance(IF((SELECT Latitude1 FROM Member WHERE No = Product.Member) > 0, (SELECT Latitude1 FROM Member WHERE No = Product.Member), Product.Latitude), IF((SELECT Longitude1 FROM Member WHERE No = Product.Member) > 0,(SELECT Longitude1 FROM Member WHERE No = Product.Member), Product.Longitude), '" . $_SESSION['Latitude'] . "', '" . $_SESSION['Longitude'] . "') AS KM, (SELECT Level FROM Member WHERE Member.No = Product.Member) AS Level FROM Product WHERE Status = 2 AND Mode = 2 AND Deliver = 1 AND dateClose >= CURRENT_TIMESTAMP";

$sql .= (($area!="") ? " AND (((SELECT Latitude1 FROM Member WHERE No = Product.Member) = 0 AND Area = '$area') OR ((SELECT Latitude1 FROM Member WHERE No = Product.Member) > 0 AND (SELECT Area1 FROM Member WHERE No=Product.Member) = '$area'))" : "");

if($type != ""){
	switch($type){
		case 'all':
			$sql .= " AND Activity = '0'";
			break;
		case 'activity':
			$sql .= " AND Activity = '1'";
			break;
		case 'welfare':
			$sql .= " AND welfare = '1'";
			break;
		case 'free':
			$sql .= " AND Price1 = '0' AND price_mode=0 AND Transport = 0";
			break;
		case 'allnew':
			$sql .= " AND Allnew = '1'";
			break;
		case 'transfer':
			$sql .= " AND Transport = '1'";
			break;
		case 'used':
			$sql .= " AND Used = '1'";
			break;
		case 'sale':
			$sql .= " AND Sale = '1'";
			break;
		default:
			$sql .= " AND Type = '$type'";
			break;
	}
}



$sql .= (($catalog!="") ? " AND Catalog = '$catalog'" : "");
$sql .= (($catalog2!="") ? " AND Catalog2 = '$catalog2'" : "");
$sql .= (($catalog3!="") ? " AND Catalog3 = '$catalog3'" : "");


$sql .= " ORDER BY dateUpdate DESC";










$result = mysql_query($sql) or die(mysql_error());
$num = mysql_num_rows($result);
$pagesize  = 20;
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
			if($data['Cashflow'] == 1){
				if($data['Duration'] == 0){
					$activity_timer="不限時";
				}
				else if($data['Druation'] == 1){
					$left = strtotime($data['dateClose']) - time();
					$m = floor($left / 60);
					$h = floor($m / 60);
					$m = $m % 60;
					$d = floor($h / 24);
					$h = $h % 24;
					if($d > 30){
						$activity_timer = (($d > 0) ? $d . "天" : "");
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
			}
			if($data['Activity'] == 1){
//				$data['Price1'] = 0;
				$left = strtotime($data['activity_end'] . " 23:59:59") - time();
				$m = floor($left / 60);
				$h = floor($m / 60);
				$m = $m % 60;
				$d = floor($h / 24);
				$h = $h % 24;
				if($d > 30){
					$activity_timer = (($d > 0) ? $d . "天" : "");
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
				$activity_join = $data['Joins'] . "人參加";
				$activity = ";background:url('./images/activity.gif'); background-repeat:no-repeat; background-position:605px 3px";
			}
			else if($data['hr'] == 1){
				$activity = ";background:url('./images/hr.gif'); background-repeat:no-repeat; background-position:605px 3px";
			}
			else if($data['event'] == 1){
				$activity = ";background:url('./images/activity2.gif'); background-repeat:no-repeat; background-position:605px 3px";
			}
			else if(strpos($data['CName'], "展演") > -1){
				$activity = ";background:url('./images/show.gif'); background-repeat:no-repeat; background-position:605px 3px";
			}
			else{
				$activity = ";background:url('./images/product.gif'); background-repeat:no-repeat; background-position:605px 3px";
			}
			$price = "$" . number_format($data['Price']);
			$sell = "$" . number_format($data['Price1']);
			$save = "$" . number_format($data['Price'] - $data['Price1']);
			/*
			if($_SESSION['Latitude'] > 0 && $_SESSION['Longitude']>0){
				$dis =(($data['Latitude']>0 && $data['Longitude'] > 0) ? "距離：" .  (float)(number_format($data['KM'], 1)) . "公里" : "");
			}
			else{
				$dis = "距離：? (請輸入<a href='member_location.php?url=" . urlencode("product5.php?area=$area&catalog=$catalog&type=$type&pageno=$pageno") . "&tab=4' style='text-decoration:underline'>我的位置</a>，再回頁面)</font>";
			}
			*/
			$counts = 0;
			$used = "";
			if($data['Used'] == 1){$used = "<img src='./images/old_good.gif'>";}
			if($data['Sale'] == 1){$used = "<img src='./images/will_phase_out.gif'>";}
//			if($data['Allnew'] == 1){$used = "<img src='./images/allnew.gif'>";}


			if($data['Transport'] == 1){
				$discount = (($data['taxi_discount']) ? "{$data['taxi_discount']}折":"");
			}
			else{
				if($data['price_mode'] == 1){
					$discount = "<span style='color:red; font-size:40px; font-weight:bold; text-shadow: 0px 0px 6px rgba(255,255,255,0.7);'>- -</span><span style='color:red; font-size:16px; font-weight:bold; text-shadow: 0px 0px 6px rgba(255,255,255,0.7);'>折</span>";
				}
				else{
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
				}
			}		
			
			
			
			$name = mb_substr($data['Name'], 0, 12, 'utf8') . ((mb_strlen($data['Name'], 'utf8') > 12) ? "…" : "") ;
			$seller = mb_substr($data['Nick'], 0, 4, 'utf8') . ((mb_strlen($data['Nick'], 'utf8') > 4) ? "…" : "") ;

			$city = (($data['M1'] > 0 && $data['mobile'] == 1) ? $data['Area1'] : $data['City']);
			$city = (($data['Status2'] == 2) ? "XX" : $city);
			$cashflow = (($data['Cashflow'] == 1) ? "pay_money.gif" : (($data['welfare'] == 1) ? "welfare.gif" : "non_pay_money.gif") );


			$hot = "";
			if($data['Cashflow'] == 1){
				$hot = "<img src='./images/explosive.gif' style='width:60px; height:60px'>";
				$activity_join = $data['Sold'] . "人購買";
			}
			else if($data['Cashflow'] == 0 && $data['Deliver'] == 0 && $data['coupon_YN'] == 1){
				$hot = "<img src='./images/anihot1_hot.gif' style='width:60px; height:60px'>";
				$activity_join = $data['Coupon'] . "人索取";
			}
			$city = "- - -";
			$city = "宅配";
			
			if($data['Price'] == $data['Price1']){
				$price = "- -";
				$save = "- -";
				$discount = "<span style='color:red; font-size:40px; font-weight:bold; text-shadow: 0px 0px 6px rgba(255,255,255,0.7);'>- -</span><span style='color:red; font-size:16px; font-weight:bold; text-shadow: 0px 0px 6px rgba(255,255,255,0.7);'>折</span>";
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
				$price_info = "<div style='padding-top:5px;color:#FFFFFF; text-align:center; font-size:24px; line-height:50px'>a"  . $data['taxi_discount'] . "</div>";				
			}
			else if($data['price_mode'] == 1){
				$price_info = "<div style='padding-top:0px;color:#FFFFFF; text-align:center; font-size:24px; line-height:50px; width:150px'>"  . $data['price_info'] . "</div>";
			}
			else{
			if($data['Price1'] > 9999){
				$price_info = <<<EOD
								<table>
									<tr>
										<td style="color:white; font-size:24px;" nowrap>c{$sell}</td>
									</tr>
								</table>
EOD;
			}
			else{
				$price_info = <<<EOD
							<table border=0 style='border:0px solid blue;margin-top:1px;'>
								<tr>
									<td rowspan="2" style="color:white; font-size:24px; width:80px" nowrap>{$sell}</td>
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
						<table>
							<td style="width:33px; height:54px; text-align:center"><img src="./images/price.png" style="margin-top: -20px;height:40px;"></td>
							<td><div style="width:165px; height:54px; overflow:hidden;margin-top:-22px;">{$price_info}</div></td>
						</table>
EOD;

			
			
			$WEB_CONTENT .= <<<EOD
				<tr>
					<td style="text-align:left; background:white">
						<div class="product-item">
							<div style="width:720px; height:279px; overflow:hidden">
								<table width="720" height="279" cellpadding="0" cellspacing="0" border=0 style="{$activity}">
									<tr>
										<td style="width:348px; height:22px; color:white">
											<table cellpadding="0" cellspacing="0" border=0 style="width:348px">
												<tr>
													<td style="width:160px; padding-left:15px; height:22px; color:white; text-align:center; vertical-align:bottom; font-size:11pt"><div style="width:160px; height:22px; overflow:hidden; text-align:center; line-height:25px">&nbsp;</div></td>
													<td style="width:184px; padding-left:10px; height:22px; color:white; text-align:center; vertical-align:bottom; font-size:11pt"><div style="width:160px; height:22px; overflow:hidden; text-align:center; line-height:25px">&nbsp;</div></td>
												</tr>
											</table>
										</td>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<td style="padding-left:26px; padding-bottom:14px">
										<div style="width:305px; height:198px; overflow:hidden; border:solid 0px gray"><a href="service_product5_detail.php?tab={$tab}&no={$data['No']}&area={$area}&type={$type}&catalog={$catalog}"><img src="./upload/{$data['Photo']}" style="width:305px; height:198px" border='0'></a></div>
										</td>
										<td style="vertical-align:top; padding-left:5px" valign="top" >
											<div style="margin-top: 20px;"><a class="product-title" href="service_product5_detail.php?tab={$tab}&no={$data['No']}&area={$area}&type={$type}&catalog={$catalog}" style="color:#000000; font-size:22px; font-weight:bold" title="{$data['Name']}：{$data['Description']}">{$name}</a></div>
											<div class="product-desc">{$data['Description']}</div>
											<div style="width:310px; height:34px; margin-top:2px; border:solid 1px transparent; overflow:hidden; text-align:center; color:blue; font-size:13px; line-height:30px"></div>
											<div class="product-shop"><a href="member_product.php?no={$data['Member']}" style="color:#FFFFFF; font-size:14px" target="_blank" title="商家：{$data['Nick']}">商家 [{$seller}] 其它服務</a></div>
											<div id="product-list-price-info">
												<div class="product-list-price">
													<ul><li><h2>{$price_info}</h2></li></ul>
													<span style="display:inline-block;margin-top:12px;margin-left:-4px;">{$discount}</span>
												</div>
											</div>
											<div style="width:300px; margin-top:5px; border:solid 1px transparent; overflow:hidden">
												<table style="width:300px" cellpadding="0" cellspacing="0" border=0>
													<tr>
														<td style="width:27px; height:22px; text-align:right; padding-right:2px"><img src="./images/icon-buy.png"></td>
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
							<div class="label" style="position:relative; z-index:5; top:-244px; left:15px; width:70px; height:70px; text-align:center"><img src="./images/{$cashflow}"></div>
							<div class="label" style="position:relative; z-index:6; top:-167px; left:15px; width:70px; height:70px; text-align:center">{$used}</div>
							<div class="label" style="position:relative; z-index:5; top:-240px; left:262px; width:70px; height:70px; text-align:center">{$hot}</div>
							<!--table width="706" height="242" cellpadding="0" cellspacing="0" border=0 style="{$activity}">
								<tr>
									<td width="353" align='center' style="padding:22px; padding-bottom:22px; padding-left:22px;">
										<div style="width:305px; height:198px; overflow:hidden; border:solid 1px gray"><a href="service_product5_detail.php?tab={$tab}&no={$data['No']}&area={$area}&type={$type}&catalog={$catalog}"><img src="./upload/{$data['Photo']}" style="width:305px; height:198px" border='0'></a></div>
									</td>
									<td width="353" align='center' valign='top' aling='center' style="padding-top:22px; padding-bottom:22px; padding-right:22px">
										<table width="303" cellpadding="0" cellspacing="0" border="0" align='center'>
											<tr>
												<td align='left'><div style='position:relative; left:-10px; text-align:left; color:#F74521; font-weight:bold; line-height:30px; height:30px; overflow:hidden'>【<a href="service_product5_detail.php?tab={$tab}&no={$data['No']}&area={$area}&type={$type}&catalog={$catalog}" style="color:#F74521">{$name}</a>】{$discount}</div></td>
											</tr>
											<tr>
												<td align='left'><div style="text-align:left; height:40px; overflow:hidden">{$data['Description']}</div></td>
											</tr>
											<tr>
												<td height="52" style="vertical-align:bottom; text-align:right; color:#F74521">
												<div style="float:right">{$dis}</div>
												<div style='position:relative; left:-10px; text-align:left; color:green'>【<a href="member_product.php?no={$data['Member']}" style="; color:green" target="_blank">賣家其它商品/活動</a>】</div>
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
							</table-->
						</div>
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
	$WEB_CONTENT .= "		</table>";
	$WEB_CONTENT .= "	</td>";
	$WEB_CONTENT .= "</tr>";
}

$WEB_CONTENT .= "</table></div>";

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

//include 'search.php';

$usefor = basename($_SERVER['PHP_SELF']);
$usefor = strtoupper(substr($usefor, 0, 8));
$catalog = $_REQUEST['catalog'];
//include 'template0.php';
$WEB_CONTENT .= <<<EOD

<script language="javascript">
	$("#catalog").val($catalog);
	if($catalog2>0){
		getCat2($catalog);
		setTimeout(500);
		$("#catalog2").val($catalog2);
		if($catalog3>0){
			getCat3($catalog2);
			setTimeout(500);
			$("#catalog3").val($catalog3);
		}
	}
	
	$.each($("#select input"),function(index,item){
		if($(item).val() == '$tmp_type'){
			$(item)[0].checked = "checked";
		}
	});

</script>
	<table cellpadding='0' cellspacing='0' border='0' idd="tbl1">
EOD;
?>

<?=$WEB_CONTENT?>
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
//parent.iAD.location.href="ad.php?usefor=<?=$usefor?>&catalog=<?=$catalog?>";
</script>
<script language="javascript">
//parent.setTab(5);
</script>