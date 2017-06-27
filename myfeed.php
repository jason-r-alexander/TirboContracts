<?php
      include('session.php');
      include('TirboConfig.php');

        // Create connection
        $con = mysqli_connect($servername, $username, $password, $dbname);
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySql: " . mysqli_connect_error();
        }

        // QUERY FOR ATHLETIC DIRECTOR INFORMATION 
        //$user = $_SESSION['login_user'];
        $query = "SELECT C_ID, C_SPORT, C_SITE, C_START_TIME, C_END_TIME, C_DATE 
        FROM Contract/*, Team_Contract TC, University U, Athletic_Director AD, Users */
        /*WHERE TC.C_ID=C.C_ID 
        AND   (U.UNI_ID=TC.T_HOME
            OR U.UNI_ID=TC.T_AWAY)
        AND    AD.AD_ID=U.AD_ID
        AND    $user=AD.Email*/";

        /*
        SELECT C.C_ID, C.C_SPORT, C.C_SITE, C.C_START_TIME, C.C_END_TIME, C.C_DATE 
        FROM Contract C, Team_Contract TC, Location L, Team T, University U, Athletic_Director AD, Users US
        WHERE TC.C_ID=C.C_ID
              AND C.L_ID = L.L_ID
              AND L.T_ID = T.T_ID
              AND T.UNI_ID = U.UNI_ID
              AND U.AD_ID = AD.AD_ID
              AND AD.Email = US.Email
              AND U.UNI_ID IN (TC.T_HOME, TC.T_AWAY)
              AND US.Email = 'INSERT EMAIL';
        */

        $result = mysql_query($query);
        //echo "<ul>";

        $arr = array();
        $lcv = 0;
        while($row = mysql_fetch_array($result)){
         $arr[] = array(
               'id'    => $row['C_ID'],
               'title' => $row['C_SPORT'].' at '.$row['C_SITE'],
               'start' => $row['C_DATE'].' '.$row['C_START_TIME'],
               'end'   => $row['C_DATA'].' '.$row['C_END_TIME'],
               'url'   => '/contractfinalized.php?id='.$row['C_ID']
            );
        // Close connection
          }

      mysqli_close($con);
      echo json_encode($arr);
?>