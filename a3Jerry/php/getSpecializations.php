<?php
    $query="SELECT DISTINCT speciality FROM doctor";
    $result=mysqli_query($connection,$query);

    if (!$result) {
        die("database query (speciality) failed<br>".mysqli_error($connection));
    }

    // create dropdown for all specialities
    echo '<select name="specialty">';
    echo '<option value="%">Any</option>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="'.$row["speciality"].'">'.$row["speciality"].'</option>';
    }
    echo '</select><br>';

    mysqli_free_result($result);
?>