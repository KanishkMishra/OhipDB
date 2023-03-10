<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Patient List</title>
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
            $hoscode=$_POST["hosworksat"];

            // output hospital information
            $query='SELECT hosname, city, prov, numofbed FROM hospital WHERE hospital.hoscode="'.$hoscode.'"';
            $result=mysqli_query($connection,$query);
            if(!$result) {
                die("databases query (hospital) failed:<br>".mysqli_error($connection));
            }

            while($row = mysqli_fetch_assoc($result)) {
                echo "<p><b>".$row["hosname"]." Hospital - located in ".$row["city"].", ".$row["prov"]." - ".$row["numofbed"]." beds</b></p><br>";
            }

            mysqli_free_result($result);

            // output the head doctor
            $query='SELECT doctor.firstname, doctor.lastname FROM doctor, hospital WHERE doctor.licensenum=hospital.headdoc AND hospital.hoscode="'.$hoscode.'"';
            $result=mysqli_query($connection,$query);

            if(!$result) {
                die("databases query (headDoc) failed:<br>".mysqli_error($connection));
            }

            if (mysqli_num_rows($result) > 0) {
                echo "<p><b>Head Doctor:</b> ";
                while($row = mysqli_fetch_assoc($result)) {
                    echo "Dr.".$row["firstname"]." ".$row["lastname"]."</p><br>";
                }
            } else {
                echo "<p>This hospital has no Head Doctor</p><br>";
            }

            mysqli_free_result($result);

            // output all doctors that work here
            $query='SELECT doctor.firstname, doctor.lastname FROM doctor, hospital WHERE doctor.hosworksat=hospital.hoscode AND hospital.hoscode="'.$hoscode.'"';
            $result=mysqli_query($connection,$query);

            if (mysqli_num_rows($result) > 0) {
                echo "<br><p><b>Doctors who Work Here (including Head Doctors):</b></p><ul>";
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<li>";
                    echo "Dr.".$row["firstname"]." ".$row["lastname"];
                    echo "</li>";
                }
                echo "</ul>";
            } else {
                echo "<ul>This hospital has no Doctors</ul><br>";
            }

            mysqli_free_result($result);
        ?>
        <?php
            mysqli_close($connection)
        ?>
    </body>
</html>