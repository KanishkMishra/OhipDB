<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>New Doctor</title>
        <link rel="stylesheet" href="css/result.css">
    </head>
    <header>
        <h1>OHIP Database</h1>
        <img src="img/ohip.png" height="80px" width="auto">
    </header>
    <footer>
        <h3><a href="outputscript.txt" target="_blank">OHIP Database</a> Access</h3>
        <h3>Made By Kanishk Mishra</h3>
    </footer>
    <body>
        <?php
            include 'php/connectdb.php';
        ?>
        <?php
            $licensenum=$_POST["licensenum"];

            // check if license is head of some hospital
            $query='SELECT headdoc FROM hospital WHERE headdoc="'.$licensenum.'"';
            $result=mysqli_query($connection,$query);

            if(!$result) {
                die("databases query (check if headdoc) failed:<br>".mysqli_error($connection));
            }

            if (mysqli_num_rows($result) > 0) {
                die("<h1>Doctor is a Head Doctor, can't be removed</h1>");
            }

            mysqli_free_result($result);

            // check if patients are assigned
            $query='SELECT licensenum FROM looksafter WHERE licensenum="'.$licensenum.'"';
            $result=mysqli_query($connection,$query);

            if(!$result) {
                die("databases query (check if they have patients) failed:<br>".mysqli_error($connection));
            }

            if (mysqli_num_rows($result) > 0) {
                die("<h1>Doctor has ".mysqli_num_rows($result)." Patient(s), can't be removed</h1>");
            }

            mysqli_free_result($result);

            // delete doctor
            $query='DELETE FROM doctor WHERE licensenum="'.$licensenum.'"';
            $result=mysqli_query($connection,$query);

            if(!$result) {
                die("<ul>databases query (Detetion from database) failed:<br>".mysqli_error($connection)."</ul>");
            }

            // mysqli_free_result($result); not needed as nothing returns from query?

            echo "<h1> DOCTOR DELETED </h1><br>";
            echo "<ul>Doctor with license - ".$licensenum." - Removed from Database</ul>";
        ?>
        <?php
            mysqli_close($connection)
        ?>
    </body>
</html>