<?  include_once($_SERVER["DOCUMENT_ROOT"] . '/lib/application.php');


$result = $_GET['result'];
$select_id = $_GET['select_id'];
 ?>


<? if($result=='amphur_id'){ 
	$rstTemp=mysql_query("select * from amphur Where PROVINCE_ID ='".$select_id."' Order By AMPHUR_ID ASC");
	echo "<option value=''>กรุณาเลือก</option>";
	while($arr_2=mysql_fetch_array($rstTemp)){
?>

<option value="<?=$arr_2['AMPHUR_ID']?>">
<?  echo $arr_2['AMPHUR_NAME']?>
</option>
<? }}?>


<? if($result=='district_id'){ ?>
<select name='district' id='district'>
    <?
	$rstTemp=mysql_query("select * from district Where AMPHUR_ID ='".$select_id."'  Order By DISTRICT_ID ASC");
	echo "<option value=''>กรุณาเลือก</option>";
	while($arr_2=mysql_fetch_array($rstTemp)){
	?>
    <option value="<?=$arr_2['DISTRICT_ID']?>">
    <?  echo $arr_2['DISTRICT_NAME']?>
    </option>
    <? }?>
</select>
<? }?>
