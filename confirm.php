<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>AMS</title>
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">AMS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Profile</a>
                        </li>
                        <li>
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li>
                            <h5 class="nav-link">
                                <?php
                                session_start();
                                echo "Welcome " . $_SESSION['username'] . "!!!";
                                ?>
                            </h5>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container my-4">
        <?php

        $hostname = "localhost";
        $user = "root";
        $pwd = "";
        $db = "student";
        $conn = new mysqli($hostname, $user, $pwd, $db);
        ?>
        <h4>
        <?php
        if ($conn) {
            echo "Connection successfully established.✔ <br>";
        } else {
            echo "Connection failed. Please try again!!!";
        }
        ?>
        </h4>

        <?php
        $fname = $_REQUEST['fname'];
        $lname = $_REQUEST['lname'];
        $section = $_REQUEST['section'];
        $roll = $_REQUEST['roll'];

        $sql = "INSERT INTO student_info (fname, lname, section, roll) VALUES ('$fname', '$lname', '$section', '$roll')";
        ?>
        <h4>
            <?php
            if ($conn->query($sql) === TRUE) {
                echo "Record successfully inserted.✔";
            } else {
                echo "Error while inserting records. Please check connection and try again!!!";
            }
            ?>
        </h4>
        <br><br>
        <p>
            Click 👇 the button below to get redirected to the Student's list.
        </p>
        <a href="student_list.php"><button class="btn btn-success">Redirect</button></a>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>