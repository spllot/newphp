<style type="text/css">
/*.btn-search-1{
	right:33px !important;
	top:10px!important;
}
#select-map{
	width:560px;
}*/
#address{
	width: 332px;
}
.fb-good{
	left:20px!important;
}
#quicklink{
	position:absolute;
	right:-90px;
	top:-88px !important;
}
</style>
<?php
include './include/db_open.php';
$result = mysql_query("SELECT * FROM Catalog WHERE useFor='TYPE_AREA' ORDER BY Sort");
$area_list = "";
while($rs=mysql_fetch_array($result)){
	$area_list .= "<option value='" . $rs['No'] . "'" . (($_REQUEST['area'] == $rs["No"] ) ? " SELECTED" : "") . ">" . $rs["Name"] . "</option>";
}
$result = mysql_query("SELECT * FROM Catalog WHERE useFor='TYPE_COM' ORDER BY Sort");
$type_list = "";
$type_other= "";
while($rs=mysql_fetch_array($result)){
	if($rs['Name'] != "其它")
		$type_list .= "<option value='" . $rs['No'] . "'" . (($_REQUEST['type'] == $rs["No"] ) ? " SELECTED" : "") . ">" . $rs["Name"] . "</option>";
	else
		$type_other .= "<option value='" . $rs['No'] . "'" . (($_REQUEST['type'] == $rs["No"] ) ? " SELECTED" : "") . ">" . $rs["Name"] . "</option>";
}
$result = mysql_query("SELECT * FROM Catalog WHERE useFor='TYPE_PRO' AND Parent=0 ORDER BY Sort");
$catalog_list = "";
while($rs=mysql_fetch_array($result)){
	$catalog_list .= "<option value='" . $rs['No'] . "'" . (($_REQUEST['catalog'] == $rs["No"] ) ? " SELECTED" : "") . ">" . $rs["Name"] . "</option>";
}
include './include/db_close.php';


if($tab == 2 || $tab ==5){
	$hide = ";display:none";
}
if($tab == 2){
	$hide_type = ";display:none";
}

if($tab == 4){
	$type_all = "<option value='all'" . (($_REQUEST['type'] == "all") ? " SELECTED":"") . ">所有到店商品</option>";
	$activity = "<option value='allnew'" . (($_REQUEST['type'] == "allnew") ? " SELECTED":"") . ">全新貨品販售</option>";
	$activity .= "<option value='used'" . (($_REQUEST['type'] == "used") ? " SELECTED":"") . ">中古貨品販售</option>";
	$activity .= "<option value='sale'" . (($_REQUEST['type'] == "sale") ? " SELECTED":"") . ">即期貨品販售</option>";
	$activity .= "<option value='activity'" . (($_REQUEST['type'] == "activity") ? " SELECTED":"") . ">商品粉絲抽獎活動</option>";
	$transfer = "<option value='transfer'" . (($_REQUEST['type'] == "transfer") ? " SELECTED":"") . ">運輸服務(計程車)</option>";
}
if($tab == 5){
	$type_all = "<option value='all'" . (($_REQUEST['type'] == "all") ? " SELECTED":"") . ">所有宅配商品</option>";
	$activity = "<option value='allnew'" . (($_REQUEST['type'] == "allnew") ? " SELECTED":"") . ">全新貨品販售</option>";
	$activity .= "<option value='used'" . (($_REQUEST['type'] == "used") ? " SELECTED":"") . ">中古貨品販售</option>";
	$activity .= "<option value='sale'" . (($_REQUEST['type'] == "sale") ? " SELECTED":"") . ">即期貨品販售</option>";
	$activity .= "<option value='activity'" . (($_REQUEST['type'] == "activity") ? " SELECTED":"") . ">商品粉絲抽獎活動</option>";
	$type_list = "";
	$type_other = "";
}
$act = str_replace("_detail", "", basename($_SERVER['PHP_SELF']));
?>

<div id="search-wrap" class="clearfix">
	<div id="search">
		<form name="sForm" action="<?=$act?>" id="search">
			<input type="hidden" name="tab" value="<?=$tab?>">
			<input type="hidden" name="pageno" value="<?=$_REQUEST['pageno']?>">
			<div id="select">
				<input name="type" type="radio" value="all"  checked="CHECKED">全部<br>
				<input name="type" type="radio" value="welfare">公益品項<br>
				<input name="type" type="radio" value="allnew">全新品項<br>
				<input name="type" type="radio" value="used">中古即期品<br>
				<!--/select-->
			</div>
			<div id="select-map">
				搜尋位置 :&nbsp;<input name="address" type="text" size="40" onblur="getLatitude();" class="input-1 icon-search" id="address" placeholder=" 輸入查詢位置地址" size="45" onfocus="if (value==defaultValue){ value=''; className='input-1 icon-search'; }" onblur="if (value==''){ value=defaultValue; className='input-1 icon-search'; }">&nbsp;或&nbsp;<input type="text" class="input-1" placeholder="經度" name="long" id="long" size="10" onfocus="if (value==defaultValue){ value=''; className='input-1'; }" onblur="if (value==''){ value=defaultValue; className='input-1'; }">
				<input type="text" name="lat" id="lat" class="input-1" placeholder="緯度" size="10" onfocus="if (value==defaultValue){ value=''; className='input-1'; }" onblur="if (value==''){ value=defaultValue; className='input-1'; }"><br>
				分類選擇 :&nbsp;				
				<td style="width:142px; height:45px; text-align:left">
 				<select style="width:132px"  class="input-2 icon-search" id="catalog" name="catalog" onChange="getCat2('');">
						<option value="">所有分類</option><?=$catalog_list?>
					</select>
				 </td>
				<td style="width:142px; height:45px; text-align:left">
					<select style="width:132px"  class="input-2" id="catalog2" name="catalog2" onChange="getCat3('');" disabled>
						<option value="">所有分類</option>
					</select>
				 </td>
            	<td style="width:150px; height:45px; text-align:left">
					<select style="width:132px" class="input-2" id="catalog3" name="catalog3" disabled>
						<option value="">所有分類</option>
					</select>
				</td>
				<input name="送出" type="button" value="搜尋" style="cursor:pointer" class="btn-search-1" onMouseOver="btnOver(this)" onMouseOut="btnOut(this)" onClick="Search();">
				<!--/select-map-->
			</div>
			<div id="select-btn"> 
				<ul>
					<li class="select-btn-1"><a href="#"><img src="images/select-btn-1-1.gif" width="93" height="28"></a></li>
					<li class="select-btn-2"><a href="service-map.php"><img src="images/select-btn-2.gif" width="93" height="28"></a></li>
				</ul>
			</div>
		</form>
	</div>
</div>
<script language="javascript">
	function Search(){
		var sForm = document.sForm;
		sForm.pageno.value = 1;
		sForm.submit();
	}
	function setPage(xNo){
		var sForm = document.sForm;
		sForm.pageno.value = xNo;
		sForm.submit();
	
	}
	function getLatitude(){
		
	}
	function btnOver(x){
		//x.style.backgroundImage="url(./images/btn_" + x.id + "_over.gif)";
	}
	function btnOut(x){
		//x.style.backgroundImage="url(./images/btn_" + x.id + ".gif)";
	}
	function getType(x){
		$.post(
			'get_type.php',
			{
				tab: x,
				type: "<?=$_REQUEST['type']?>"
			},
			function(data)
			{
				$("#type").html('<option value="">所有類型</option>' + data);
			}
		);	
	}

	function getCat1(x){
		$("#catalog").html('<option value="">所有分類</option>');
		$("#catalog2").html('<option value="">所有分類</option>');
		$("#catalog3").html('<option value="">所有分類</option>');
		document.sForm.catalog2.disabled = true;
		document.sForm.catalog3.disabled = true;
		$.post(
			'get_catalog0.php',
			{
				type: $("#type").val(),
				x: x
			},
			function(data)
			{
				$("#catalog").html('<option value="">所有分類</option>' + data);
			}
		);	
	}
	function getCat2(x){
		$("#catalog2").html('<option value="">所有分類</option>');
		$("#catalog3").html('<option value="">所有分類</option>');
		document.sForm.catalog2.disabled = true;
		document.sForm.catalog3.disabled = true;
		$.post(
			'get_catalog2.php',
			{
				no: $("#catalog").val(),
				x: x
			},
			function(data)
			{
				$("#catalog2").html('<option value="">所有分類</option>' + data);
				if(document.sForm.catalog2.options.length > 1){
					document.sForm.catalog2.disabled = false;
				}
			}
		);	
	}
	function getCat3(x){
		$("#catalog3").html('<option value="">所有分類</option>');
		document.sForm.catalog3.disabled = true;
		$.post(
			'get_catalog2.php',
			{
				no: $("#catalog2").val(),
				x: x
			},
			function(data)
			{
				$("#catalog3").html('<option value="">所有分類</option>' + data);
				
				if(document.sForm.catalog3.options.length > 1){
					document.sForm.catalog3.disabled = false;
				}
			}
		);	
	}
</script>

<script language="javascript">
	//setTab(<?=$tab?>);
	//getType(<?=$tab?>);
	// getCat1('<?=$catalog?>');
	// getCat2('<?=$catalog2?>');
	// getCat3('<?=$catalog3?>');
</script>

