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
        <h1> Change Number of Beds: </h1>
        <?php
            $numofbed=$_POST["numofbed"];
            $hoscode=$_POST["hosworksat"];

            // update number of beds
            $query='UPDATE hospital SET numofbed="'.$numofbed.'" WHERE hospital.hoscode="'.$hoscode.'"';
            $result=mysqli_query($connection,$query);

            if(!$result) {
                die("<ul><p>databases query (update num beds) failed:</p><br>".mysqli_error($connection)."</ul>");
            }

            // inform user of success
            echo "<ul>Number of beds Successfully updated to ".$numofbed."</ul>";
        ?>
        <?php
            mysqli_close($connection)
        ?>
    </body>
</html>