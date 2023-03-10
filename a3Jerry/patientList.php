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
        <h1> List of Patients: </h1>
        <?php
            $licensenum=$_POST["licensenum"];
 
            $query='SELECT patient.ohipnum, patient.firstname, patient.lastname FROM patient, looksafter WHERE patient.ohipnum=looksafter.ohipnum AND looksafter.licensenum="'.$licensenum.'"';
            $result=mysqli_query($connection,$query);

            if(!$result) {
                die("<ul>databases query (patientList) failed:<br>".mysqli_error($connection)."</ul>");
            }

            if (mysqli_num_rows($result) > 0) {
                echo "<ul>";
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<li>";
                    echo $row["ohipnum"]." - ".$row["firstname"]." ".$row["lastname"];
                    echo "</li>";
                }
                echo "</ul>";
            } else {
                echo "This doctor has no Patients";
            }

            mysqli_free_result($result);
        ?>
        <?php
            mysqli_close($connection)
        ?>
    </body>
</html>