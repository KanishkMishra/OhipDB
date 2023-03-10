<?php
    $query="SELECT ohipnum, firstname, lastname FROM patient";
    $result=mysqli_query($connection,$query);

    if (!$result) {
        die("database query (list of all Patients) failed<br>".mysqli_error($connection));
    }

    // create dropdown for all specialities
    echo '<select name="ohipnum">';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="'.$row["ohipnum"].'">'.$row["firstname"]." ".$row["lastname"]." (".$row["ohipnum"].")".'</option>';
    }
    echo '</select><br>';

    mysqli_free_result($result);
?>