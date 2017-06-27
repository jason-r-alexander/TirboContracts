<html>
<body>
<button><a href="settings.html">Go Back to Settings</a></button>
<!-- Connect to DB -->
<?php
include('TirboConfig.php');

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySql: " . mysqli_connect_error();
}

// QUERY FOR ATHLETIC DIRECTOR INFORMATION
$sql = "SELECT * FROM Athletic_Director";
if($result1 = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result1) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>AD_ID</th>";
                echo "<th>AD_FIRST_NAME</th>";
                echo "<th>AD_LAST_NAME</th>";
                echo "<th>AD_EMAIL</th>";
                echo "<th>AD_PHONE</th>";
                echo "<th>AD_DEFAULT</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result1)){
            echo "<tr>";
                echo "<td>" . $row['AD_ID'] . "</td>";
                echo "<td>" . $row['AD_FIRST_NAME'] . "</td>";
                echo "<td>" . $row['AD_LAST_NAME'] . "</td>";
                echo "<td>" . $row['AD_EMAIL'] . "</td>";
                echo "<td>" . $row['AD_PHONE'] . "</td>";
                echo "<td>" . $row['AD_DEFAULT'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Close result set
        mysqli_free_result($result1);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}


// QUERY FOR UNIVERSITY INFORMATION
$sql = "SELECT * FROM University";
if($result2 = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result2) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>UNI_ID</th>";
                echo "<th>UNI_NAME</th>";
                echo "<th>UNI_ADDRESS</th>";
                echo "<th>UNI_PHONE</th>";
                echo "<th>UNI_FAX</th>";
                echo "<th>AD_ID</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result2)){
            echo "<tr>";
                echo "<td>" . $row['UNI_ID'] . "</td>";
                echo "<td>" . $row['UNI_NAME'] . "</td>";
                echo "<td>" . $row['UNI_ADDRESS'] . "</td>";
                echo "<td>" . $row['UNI_PHONE'] . "</td>";
                echo "<td>" . $row['UNI_FAX'] . "</td>";
                echo "<td>" . $row['AD_ID'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Close result set
        mysqli_free_result($result2);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}

// QUERY FOR LOCATION INFORMAITON
$sql = "SELECT * FROM Location";
if($result3 = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result3) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>L_ID</th>";
                echo "<th>L_ADDRESS</th>";
                echo "<th>L_PHONE</th>";
                echo "<th>UNI_ID</th>";
                echo "<th>T_ID</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result3)){
            echo "<tr>";
                echo "<td>" . $row['L_ID'] . "</td>";
                echo "<td>" . $row['L_ADDRESS'] . "</td>";
                echo "<td>" . $row['L_PHONE'] . "</td>";
                echo "<td>" . $row['UNI_ID'] . "</td>";
                echo "<td>" . $row['T_ID'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Close result set
        mysqli_free_result($result3);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
 
// QUERY FOR TEAM INFORMAITON
$sql = "SELECT * FROM Team";
if($result4 = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result4) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>T_ID</th>";
                echo "<th>T_SPORT</th>";
                echo "<th>T_GENDER</th>";
                echo "<th>T_DIVISION</th>";
                echo "<th>UNI_ID</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result4)){
            echo "<tr>";
                echo "<td>" . $row['T_ID'] . "</td>";
                echo "<td>" . $row['T_SPORT'] . "</td>";
                echo "<td>" . $row['T_GENDER'] . "</td>";
                echo "<td>" . $row['T_DIVISION'] . "</td>";
                echo "<td>" . $row['T_ID'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Close result set
        mysqli_free_result($result4);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}


// Close connection
mysqli_close($con);
?>