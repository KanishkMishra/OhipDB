<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Doctor List</title>
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
        <h1> List of Doctors: </h1>
        <?php
            $orderBy=$_POST["orderBy"];
            $direction=$_POST["direction"];
            $specialty=$_POST["specialty"];
            $query='SELECT * FROM doctor WHERE speciality LIKE "'.$specialty.'" ORDER BY '.$orderBy.' '.$direction;
            $result=mysqli_query($connection,$query);

            if(!$result) {
                die("<ul>databases query (doctorList) failed:<br>".mysqli_error($connection)."</ul>");
            }

            echo "<ul>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<li>";
                echo $row["licensenum"]." - ".$row["firstname"]." ".$row["lastname"]." - licened on ".$row["licensedate"]." - born on ".$row["birthdate"]." : ".$row["speciality"]." at ".$row["hosworksat"];
                echo "</li>";
            }
            echo "</ul>";

            mysqli_free_result($result);
        ?>
        <?php
            mysqli_close($connection)
        ?>
    </body>
</html>