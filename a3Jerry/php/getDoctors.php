<?php
    $query="SELECT licensenum, firstname, lastname FROM doctor";
    $result=mysqli_query($connection,$query);

    if (!$result) {
        die("database query (list of all Doctors) failed<br>".mysqli_error($connection));
    }

    // create dropdown for all specialities
    echo '<select name="licensenum">';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="'.$row["licensenum"].'">'.$row["firstname"]." ".$row["lastname"]." (".$row["licensenum"].")".'</option>';
    }
    echo '</select>';

    mysqli_free_result($result);
?>