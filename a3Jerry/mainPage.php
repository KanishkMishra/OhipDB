<!DOCTYPE HTML>

<!-- Kanishk Mishra : outputs list of doctors -->

<html lang="en" id="listDoc">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <title>OHIP Doctors List</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <header>
        <h1>OHIP Database</h1>
        <ul>
            <li><a href="#listDoc">Doctor List</a></li>
            <li><a href="#addDoc">Add Doctor</a></li>
            <li><a href="#delDoc">Delete Doctor</a></li>
            <li><a href="#docToPat">Assign Doctor</a></li>
            <li><a href="#patOfDoc">Doctor's Patients</a></li>
            <li><a href="#docAtHos">Hospital Information</a></li>
            <li><a href="#numBed">Hospital Beds</a></li>
        </ul>
        <img src="img/ohip.png" height="80px" width="auto">
    </header>
    <body>
        <?php
            include 'php/connectdb.php';
        ?>
        <div class="section">
            <h2>List OHIP Doctors</h2>
            <form action="doctorList.php" method="post" target="_blank">
                <h3>List by:</h3>
                <input type="radio" name="orderBy" value="lastname" checked> Last Name <br>
                <input type="radio" name="orderBy" value="birthdate"> Birth Date <br>
                <br>
                <h3>Ascending or Descending:</h3>
                <input type="radio" name="direction" value="ASC" checked> Ascending <br>
                <input type="radio" name="direction" value="DESC"> Decending <br>
                <br>
                <h3>Pick Specialization</h3>
                <?php
                    include 'php/getSpecializations.php';
                ?>
                <br>
                <input type="submit" value="Get Doctor List" class="submit" onClick="window.location.reload();">
            </form>
        </div>
        <p>    
        <hr id="addDoc">
        <p>
        <div class="section">
            <h2>Add a New Doctor</h2>
            <form action="addNewDoctor.php" method="post" target="_blank">
                <div class="lbox"><p>First Name:</p>   <input type="text" name="fname" maxlength="20"></div><br>
                <div class="lbox"><p>Last Name:</p>    <input type="text" name="lname" maxlength="20"></div><br>
                <div class="lbox"><p>Birth Date:</p>   <input type="date" name="birthdate"></div><br>
                <br>
                <div class="lbox"><p>Speciality:</p>   <input type="text" name="speciality" maxlength="30"></div><br>
                <div class="lbox"><p>License:</p>      <input type="text" name="licensenum" maxlength="4"></div><br>
                <div class="lbox"><p>License Date:</p> <input type="date" name="licensedate"></div><br>
                <br>
                <div class="lbox"><p>Hospital Code:</p>
                <?php
                    include 'php/getHospitals.php';
                ?>
                </div>
                <br>
                <br>
                <input type="submit" value="Add Doctor" class="submit" onClick="window.location.reload();">
            </form>
        </div>
        <p>    
        <hr id="delDoc">
        <p>
        <div class="section">
            <h2>Delete a Doctor from Database</h2>
            <p class="help"><em>Refresh page if results not visible</em></p>
            <form action="deleteDoctor.php" method="post" target="_blank">
                <p>Remove 
                <?php
                    include 'php/getDoctors.php';
                ?> drom Database.
                </p>
                <br>
                <input type="submit" value="Delete Doctor" class="submit" onClick="return confirm('Are your sure you want to delete?')">
            </form>
        </div>
        <p>    
        <hr id="docToPat">
        <p>
        <div class="section">
            <h2>Assign Doctor to Patient</h2>
            <form action="assignDoctor.php" method="post" target="_blank">
                <p>Doctor:
                <?php
                    include 'php/getDoctors.php';
                ?></p>
                <br>
                <p>Patient:
                <?php
                    include 'php/getPatients.php';
                ?></p>
                <br>
                <input type="submit" value="Assign Doctor" class="submit" onClick="window.location.reload();">
            </form>
        </div>
        <p>    
        <hr id="patOfDoc">
        <p>
        <div class="section">
            <h2>List Patients of Doctor</h2>
            <form action="patientList.php" method="post" target="_blank">
                <p>Get Dr.
                <?php
                    include 'php/getDoctors.php';
                ?>
                's patients</p>
                <br>
                <input type="submit" value="List Patients" class="submit" onClick="window.location.reload();">
            </form>
        </div>
        <p>    
        <hr id="docAtHos">
        <p>
        <div class="section">
            <h2>List all Hospital Information</h2>
            <form action="worksAt.php" method="post" target="_blank">
                <p>Get all Doctors at
                <?php
                    include 'php/getHospitals.php';
                ?>
                hospital</p>
                <br>
                <input type="submit" value="Display Hospital" class="submit" onClick="window.location.reload();">
            </form>
        </div>
        <p>    
        <hr id="numBed">
        <p>
        <div class="section">
            <h2>Change Number of Beds at Hospital</h2>
            <form action="changeNumBed.php" method="post" target="_blank">
                <p> Set Number of beds at 
                <?php
                    include 'php/getHospitals.php';
                ?>
                hospital to 
                    <input type="number" name="numofbed" min="0">
                </p>
                <br>
                <input type="submit" value="Change Number of beds" class="submit" onClick="window.location.reload();">
            </form>
        </div> 
        <br>
        <?php
            mysqli_close($connection);
        ?>
    </body>
    <footer>
        <h3><a href="outputscript.txt" target="_blank">OHIP Database</a> Access</h3>
        <h3>Made By Kanishk Mishra</h3>
    </footer>
</html>
