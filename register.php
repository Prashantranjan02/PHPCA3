<?php
require_once "config.php";
$name = "";
$username = "";
$password = "";
$confirmPassowrd = "";
$nameError = "";
$usernameError = "";
$passwordError = "";
$confirmPasswordError = "";


if (isset($_REQUEST['username'])) {
    $q = mysqli_query($conn, "SELECT username FROM users WHERE username = '". $_REQUEST['username']."'");
    // Username
    if (empty(trim($_REQUEST["username"]))) {
        $usernameError = "Username cannot be blank.";
        echo "<div class='alert alert-warning'>Username cannot be empty.</div>";
    } elseif(mysqli_num_rows($q)) {
        $usernameError = "This username is already taken.";
        echo "<div class='alert alert-warning'>Username already taken.</div>";
    } else {
        $username = trim($_REQUEST['username']);
    }
    // Name
    if (empty(trim($_REQUEST['name']))) {
        $nameError = "Name cannot be blank.";
        echo "<div class='alert alert-warning'>Name not inserted.</div>";

    } else {
        $name = trim($_REQUEST['name']);
    }
    // Password
    if (empty(trim($_REQUEST['password']))) {
        $passwordError = 'Password cannot be blank.';
        echo "<div class='alert alert-warning'>Password not inserted.</div>";
    } elseif (strlen(trim($_REQUEST['password'])) < 5) {
        $passwordError = 'Password cannot be less than 5 characters.';
        echo "<div class='alert alert-warning'>Password not inserted.</div>";
    } else {
        $password = trim($_REQUEST['password']);
    }
    // Confirm password
    if (trim($_REQUEST['password']) != trim($_REQUEST['confirmPassword'])) {
        $passwordError = 'Passwords should match.';
    }
    // If there were no errors, insert in database
    if (empty($usernameError) && empty($passwordError) && empty($confirmPasswordError) && empty($nameError)) {
        $sql = "INSERT INTO users (name, username, password) VALUES ('$name', '$username', '" . md5($password) . "')";
        $result = $conn -> query($sql);
        header("location: login.php");
        echo "<div class='alert alert-success'>Query inserted.</div>";
        }
    }
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <style>
        body{
            background-image: linear-gradient(to bottom right, wheat, lightgreen);
        }
    </style> -->
    <title>AMS</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">AMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
            </div>
        </div>
    </nav>

    <!-- Form -->
    <div class="container my-4">
        <h2>Register Here 👇</h2>
        <hr>
        <form action="" method="post" class="row g-3 needs-validation">
            <div class="col-md-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <!-- <div class="col-md-3">
                <label for="validationCustom02" class="form-label">Last name</label>
                <input type="text" class="form-control" id="validationCustom02" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div> -->
            <div class="col-md-2">
                <label for="username" class="form-label">Username</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input type="text" class="form-control" name="username" id="username" aria-describedby="inputGroupPrepend" required>
                    <div id="usernameHelp" class="form-text">It should be unique buddy.</div>
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <div class="col-md-4">
                <label for="confirmPassword" class="form-label">Confirm Password</label>
                <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" required>
            </div>

            <div class="col-12">
                <div>
                    <a href="login.php">
                        <label class="form-check-label">
                            Already have an account? Login here.
                        </label>
                    </a>
                    <div class="invalid-feedback">
                        You must agree before submitting.
                    </div>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
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

