<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to the Landing Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
    .navbar-nav {
        margin-left: auto;
    }
    </style>
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container">
            <a class="navbar-brand" href="home.php">
                <img src="images/NalcoLogo.jpg" alt="Logo" height="30">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 class="heading display-4 text-center text-lg-start">Welcome to the CPP Production MIS</h1>
        <p class="paragraph lead text-center text-lg-start">The CPP (Nalco) Production MIS is a computerized system that
            has been developed specifically to monitor and
            manage the production processes at the Captive Power Plant of the National Aluminium Company Limited
            (NALCO). This system provides real-time data on a variety of aspects related to power generation and
            consumption, including raw material usage, production output, energy consumption, and quality control
            parameters.
            <br>
            The data collected by the CPP (Nalco) Production MIS is analyzed and processed to create reports, charts,
            and graphs that help plant managers and operators make informed decisions and optimize the efficiency and
            reliability of the plant. The system plays a crucial role in ensuring that the CPP plant operates smoothly
            and efficiently while meeting the production targets set by the company.
        </p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>