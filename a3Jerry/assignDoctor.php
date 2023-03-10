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
            $ohipnum=$_POST["ohipnum"];

            // check if relation already exists in database
            $query='SELECT licensenum FROM looksafter WHERE licensenum="'.$licensenum.'" AND ohipnum="'.$ohipnum.'"';
            $result=mysqli_query($connection,$query);

            if(!$result) {
                die("<ul>databases query (check duplicate relation) failed:<br>".mysqli_error($connection)."</ul>");
            }

            if (mysqli_num_rows($result) > 0) {
                die("<h1>Doctor Patient relationship already in database</h1>");
            }

            mysqli_free_result($result);

            // insert doctor
            $query='INSERT INTO looksafter VALUES ("'.$licensenum.'", "'.$ohipnum.'")';
            $result=mysqli_query($connection,$query);

            if(!$result) {
                die("<ul>databases query (check if hospital exists) failed:<br>".mysqli_error($connection)."</ul>");
            }

            //mysqli_free_result($result); unneeded as not saved?

            echo "<h1> DOCTOR - PATIENT RELATIONSHIP INSERTED </h1><br>";
            echo "<ul>".$licensenum." - looks after - ".$ohipnum."</ul>";
        ?>
        <?php
            mysqli_close($connection)
        ?>
    </body>
</html>