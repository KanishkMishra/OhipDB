<?php
    $query="SELECT hoscode, hosname, city FROM hospital";
    $result=mysqli_query($connection,$query);

    if (!$result) {
        die("database query (hosworksat) failed<br>".mysqli_error($connection));
    }

    // create dropdown for all specialities
    echo '<select name="hosworksat">';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="'.$row["hoscode"].'">'.$row["hosname"].' at '.$row["city"].'('.$row["hoscode"].')'.'</option>';
    }
    echo '</select>';

    mysqli_free_result($result);
?>