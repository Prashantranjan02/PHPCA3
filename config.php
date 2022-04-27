<!-- This file contains database configuration assuming you are running mysql using user "root" and password "". -->

<?php

    $DB_SERVER = 'localhost';
    $DB_USERNAME = 'root';
    $DB_PASSWORD = '';
    $DB_NAME = 'student';

    // Connecting to database
    $conn = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

    // Check the connection
    if ($conn == false) {
        echo 'Error: Connection failed!';
    }

?>