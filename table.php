<?php

require_once 'credentials.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body style="background-image: url('images/bg.jpg'); background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">
    <?php

    //connect to database
    $dbConnection = new mysqli($serverName, $dbUser, $password, $dataBase);
    $connectionError = $dbConnection->connect_error;

    //Select from Table
    $querySelect = "SELECT * FROM $studentsTable";
    $result = $dbConnection->query($querySelect);


        echo "<br><br>
                <div class ='container vh-100 d-flex align-items-center'>
                <table class='table table-warning table-bordered table-striped table-hover'>
                    <tr>
                        <th>id</td>
                        <th>User Name</td>
                        <th>User Email</td>
                        <th>Domain</td>
                    </tr>";

    for($i=0; $i<$result->num_rows; $i++){
        $result->data_seek($i);
        $row = $result->fetch_assoc();

        echo "<tr>
                <td> $row[id] </td> 
                <td> $row[username] </td> 
                <td> $row[useremail] </td> 
                <td> $row[userdomain] </td>
            </tr>";

    }

        echo "</table>
                </div>"

    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>