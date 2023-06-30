<?php
//This script will handle login
session_start();

// check if the user is already logged in
if (isset($_SESSION['username'])) {
    header("location: welcome.php");
    exit;
}
require_once "config.php";

$username = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty(trim($_POST['username'])) || empty(trim($_POST['password']))) {
        $err = "Please enter username + password";
    } else {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }


    if (empty($err)) {
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        $param_username = $username;


        // Try to execute this statement
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                if (mysqli_stmt_fetch($stmt)) {
                    if (password_verify($password, $hashed_password)) {
                        // this means the password is corrct. Allow user to login
                        session_start();
                        $_SESSION["username"] = $username;
                        $_SESSION["id"] = $id;
                        $_SESSION["loggedin"] = true;

                        //Redirect user to welcome page
                        header("location: welcome.php");

                    }
                }

            }

        }
    }


}


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/cdfec94488.js" crossorigin="anonymous"></script>
    <title>PHP login system!</title>
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container">
            <a class="navbar-brand" href="home.php">
                <img src="images/NalcoLogo.jpg" alt="Logo" height="30">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto me-3">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <section class="vh-100" style="background-color: #eee;">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-12 col-xl-11">
                        <div class="card text-black" style="border-radius: 25px;">
                            <div class="card-body p-md-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                        <h1 class="text-center fw-bold mb-5 mx-1 mx-md-4 mt-4">Login</h1>
                                        <form class="mx-1 mx-md-4" method="post">
                                            <div class="form-group mb-4">
                                                <label for="username" class="form-label">Username</label>
                                                <div class="input-group">
                                                    <input type="text" id="username" class="form-control"
                                                        name="username" placeholder="Username">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-user fa-lg"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="password" class="form-label">Password</label>
                                                <div class="input-group">
                                                    <input type="password" id="password" class="form-control"
                                                        name="password" placeholder="Password">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-lock fa-lg"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                <button type="submit" class="btn btn-primary btn-lg">Login</button>
                                            </div>
                                            <div class="text-center">
                                                <p>Not a member? <a href="register.php">Register</a></p>
                                            </div>
                                        </form>
                                    </div>
                                    <div
                                        class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                        <img src="images/SideLogo.png" class="img-fluid" alt="Sample image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Optional JavaScript -->
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>