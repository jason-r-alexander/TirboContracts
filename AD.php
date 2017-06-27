<html>
<head>
	<title>Dynamic Dependent Select Box using jQuery and Ajax</title>
</head>
<body>

<div>
<label>Athelic Director:</label><select name="ad_id" class="ad_id">
<option selected="selected" value="0">Select AD</option>

<?php

include('db.php');
$sql=mysql_query("select * from Athelic_Director");
while($row=mysql_fetch_array($sql))
{
echo '<option value="'.$row['AD_ID'].'">'.$row['AD_EMAIL'].'</option>';
} 
?>

</select><br/><br/>
<label>City :</label><select name="ad" class="ad">
<option selected="selected">Select AD</option>
</select>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
$(".ad_id").change(function()
{
var id=$(this).val();
var id_String = 'id='+ id;

$.ajax
({
type: "POST",
url: "ajax_ad.php",
data: id_String,
cache: false,
success: function(ad_data)
{
$(".ad").html(ad_data);
} 
});

});
});
</script>
</body>
</html>