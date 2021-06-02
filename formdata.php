<?php

require_once 'credentials.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <?php

        // variables for form data
        $userName = $_POST['name'];
        $userEmail = $_POST['email'];
        $userDomain = $_POST['domain'];

        //connect to database
        $dbConnection = new mysqli($serverName, $dbUser, $password, $dataBase);
        $connectionError = $dbConnection->connect_error;

        //checking connection
        if($connectionError){
            echo $connectionError;
            die();
        }
            echo "<br> <h3> Connection successful! </h3>";

        //inserting data into database
        $queryInsert = "INSERT INTO $studentsTable (username, useremail, userdomain) VALUES ('$userName', '$userEmail', '$userDomain')";

        if($dbConnection->query($queryInsert)){
            echo "<br><h3>Data inserted successfully!</h3>";
        }
        else{
            echo "<br><h3>Data not inserted!</h3>";
        }
    
    
    ?>

    <form action="table.php">
        <div>
            <button type="submit" class="btn btn-primary mb-4">Show Data</button>
        </div>
    </form>
</body>
</html>