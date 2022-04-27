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
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
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
                            <a class="nav-link" aria-current="page" href="admin.php">Back</a>
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
        <h1 align="center">Student's List</h1>
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

        $sql_a = "SELECT fname, lname, roll FROM student_info WHERE section='A'";
        $sql_b = "SELECT fname, lname, roll FROM student_info WHERE section='B'";
        $sql_c = "SELECT fname, lname, roll FROM student_info WHERE section='C'";
        $sql_d = "SELECT fname, lname, roll FROM student_info WHERE section='D'";
        // $query = mysqli_query("select * from employee", $connection);
        // $row1 = mysqli_fetch_array($sql);
        $result_a = $conn->query($sql_a);
        $result_b = $conn->query($sql_b);
        $result_c = $conn->query($sql_c);
        $result_d = $conn->query($sql_d);
        ?>
        <!-- For section A -->
        <div class="container my-4"><br>
            <h3>Section - A</h3><br>
            <table style="width:100%" cellspacing="0" cellpadding="10">
                <tr align="center" bgcolor="lightblue">
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Roll No.</th>
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
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
        <!-- For section B -->
        <div class="container my-4"><br>
            <h3>Section - B</h3><br>
            <table style="width:100%" cellspacing="0" cellpadding="10">
                <tr align="center" bgcolor="lightblue">
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Roll No.</th>
                </tr>
                <?php
                while ($rows = $result_b->fetch_assoc()) {
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
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
        <!-- For section C -->
        <div class="container my-4"><br>
            <h3>Section - C</h3><br>
            <table style="width:100%" cellspacing="0" cellpadding="10">
                <tr align="center" bgcolor="lightblue">
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Roll No.</th>
                </tr>
                <?php
                while ($rows = $result_c->fetch_assoc()) {
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
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
        <!-- For section D -->
        <div class="container my-4"><br>
            <h3>Section - D</h3><br>
            <table style="width:100%" cellspacing="0" cellpadding="10">
                <tr align="center" bgcolor="lightblue">
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Roll No.</th>
                </tr>
                <?php
                while ($rows = $result_d->fetch_assoc()) {
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
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>

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