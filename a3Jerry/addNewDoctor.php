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
            $fname=$_POST["fname"];
            $lname=$_POST["lname"];
            $birthdate=$_POST["birthdate"];
            $speciality=$_POST["speciality"];
            $licensenum=$_POST["licensenum"];
            $licensedate=$_POST["licensedate"];
            $hosworksat=$_POST["hosworksat"];

            // check if license in database
            $query='SELECT licensenum FROM doctor WHERE licensenum="'.$licensenum.'"';
            $result=mysqli_query($connection,$query);

            if(!$result) {
                die("<ul>databases query (check duplicate license) failed:<br>".mysqli_error($connection)."</ul>");
            }

            if (mysqli_num_rows($result) > 0) {
                die("<h1>Doctor License already in database</h1>");
            }

            mysqli_free_result($result);

            // check if hospital exists
            $query='SELECT hoscode FROM hospital WHERE hoscode="'.$hosworksat.'"';
            $result=mysqli_query($connection,$query);

            if(!$result) {
                die("<ul>databases query (check if hospital exists) failed:<br>".mysqli_error($connection)."</ul>");
            }

            if (mysqli_num_rows($result) == 0) {
                die("<h1>Hospital Doesn't exist in database</h1>");
            }

            mysqli_free_result($result);

            // insert doctor
            $query='INSERT INTO doctor VALUES ("'.$licensenum.'","'.$fname.'", "'.$lname.'","'.$licensedate.'", "'.$birthdate.'","'.$hosworksat.'","'.$speciality.'")';
            $result=mysqli_query($connection,$query);

            if(!$result) {
                die("<ul>databases query (insert new doc) failed:<br>".mysqli_error($connection)."</ul>");
            }

            //mysqli_free_result($result); unneeded as not saved?

            echo "<h1> DOCTOR INSERTED </h1><br>";
            echo "<ul>".$licensenum." - ".$fname." ".$lname." - licened on ".$licensedate." - born on ".$birthdate." : ".$speciality." at ".$hosworksat."</ul>";
        ?>
        <?php
            mysqli_close($connection)
        ?>
    </body>
</html>