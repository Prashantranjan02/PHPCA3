<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        table,
        th,
        td {
            border: 2px solid black;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }
    </style>
    <title>Test</title>
</head>

<body>
    <!-- Navbar -->
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
                            <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
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
        <h1 align="center">Attendance</h1>
        <?php
        $DB_SERVER = 'localhost';
        $DB_USERNAME = 'root';
        $DB_PASSWORD = '';
        $DB_NAME = 'student';

        // Connecting to database
        $conn = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

        // Check the connection
        if ($conn === false) {
            die("Error: Connection failed!");
        }

        $sql_a = "SELECT fname, lname, roll FROM student_info WHERE section='A' ORDER BY roll";
        // $query = mysqli_query("select * from employee", $connection);
        // $row1 = mysqli_fetch_array($sql);
        $result_a = $conn->query($sql_a);
        ?>
        <!-- For section A -->
        <div class="container my-4"><br>
            <h3>Section - A</h3>
            <p align="left">
                <a href="trackA.php"><button class="btn btn-warning">View Attendance</button></a>
            </p>
            <form method="POST">
                <table style="width:100%" cellspacing="0" cellpadding="10">
                    <tr align="center" bgcolor="grey">
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Roll No.</th>
                        <th>Status</th>
                    </tr>
                    <?php
                    while ($rows = $result_a->fetch_assoc()) {
                    ?>
                        <tr align="center">
                            <td>
                                <?php
                                echo $rows["fname"];
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $rows["lname"];
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $rows["roll"];
                                ?>
                            </td>
                            <td>
                                <input type="radio" name="attendance[<?php echo $rows['roll'] ?>]" value="Present" required>
                                <label for="present">Present</label><br>
                                <input type="radio" name="attendance[<?php echo $rows['roll'] ?>]" value="Absent" required>
                                <label for="absent">Absent</label><br>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
                <br>
                <p align="center">
                    <input type="submit" class="btn btn-primary pull-right" value="Mark attendance"></input>
                </p>
            </form>
        </div>
    </div>

    <?php
    $username = $_SESSION['username'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $att = $_POST['attendance'];
        $date = date('d-m-y');
        $query = "SELECT DISTINCT date FROM attendancea";
        $result = $conn->query($query);
        $bool = false;
        if ($result->num_rows > 0) {
            while ($check = $result->fetch_assoc()) {
                if ($date == $check['date']) {
                    $bool = true;
                    echo "<div class = 'alert alert-danger'>Attendance for this date has already been taken.</div>";
                }
            }
        }
        if (!$bool) {
            foreach ($att as $key => $value) {
                if ($value == "Present") {
                    $query = "INSERT INTO attendancea (username, status, roll, date) VALUES ('$username', 'Present', '$key', '$date')";
                    $insertResult = $conn->query($query);
                } else {
                    $query = "INSERT INTO attendancea (username, status, roll, date) VALUES ('$username', 'Absent', '$key', '$date')";
                    $insertResult = $conn->query($query);
                }
            }
            if ($insertResult) {
                echo "<div class = 'container alert alert-success'>Attendance has been taken successfully.</div>";
            }
        }
    }
    ?>

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