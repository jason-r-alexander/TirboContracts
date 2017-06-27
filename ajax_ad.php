<?php
include('db.php');

if($_REQUEST['id']){

	$id=$_REQUEST['id'];
	if($id==0){
		echo "<option>Select AD</option>";
	}

else{
	$sql = mysql_query("select * from Athletic_Director");
		while($row=mysql_fetch_array($sql)){
		echo '<option value="'.$row['AD_ID'].'">'.$row['AD_EMAIL'].'</option>';
		}
	}
}

?>