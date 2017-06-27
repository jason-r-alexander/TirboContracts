<!-- Connect to DB -->
<?php
include('TirboConfig.php');

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySql: " . mysqli_connect_error();
}

// QUERY FOR ATHLETIC DIRECTOR INFORMATION https://www.sitepoint.com/community/t/populate-dropdown-menu-from-mysql-database/6481/6

    $result = $con->query("SELECT AD_ID, AD_FIRST_NAME, AD_LAST_NAME FROM Athletic_Director");
    
    echo "<html>";
    echo "<body>";
    echo "<form>";
    echo "<select name='AD_ID'>";

    while ($row = $result->fetch_assoc()) {

                  unset($AD_ID, $AD_FIRST_NAME, $AD_LAST_NAME);
                  $AD_ID = $row['AD_ID'];
                  $AD_LAST_NAME = $row['AD_LAST_NAME'];
                  $AD_FIRST_NAME = $row['AD_FIRST_NAME']; 
                  echo '<option value="'.$AD_ID.'">'.$AD_FIRST_NAME.' '.$AD_LAST_NAME.'</option>';
                 
}

    echo "</select>";
    echo "<button type='submit'>Submit</button>";
    echo "</form>";
    echo "</body>";
    echo "</html>";

// Close connection
mysqli_close($con);
?>
<html>
<body>
<h2>Test</h2>
<form>
<input>test</input>
<button>Submit</button>
</form>
</body>
</html>