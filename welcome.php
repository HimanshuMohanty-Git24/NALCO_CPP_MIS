<?php
require_once "config.php";
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
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
    <title>CPP MIS</title>
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <!-- nav-bar -->
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
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item active">
                        <a class="nav-link active" href="#">
                            <img src="https://img.icons8.com/metro/26/000000/guest-male.png">
                            <?php echo "Welcome " . $_SESSION['username'] ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Welcome Heading -->
    <div class="container mt-4">
        <h3 class="heading display-4 text-center text-lg-start">
            <?php echo "Welcome " . $_SESSION['username'] ?>! You can now use the MIS System.
        </h3>
        <hr>
    </div>
    <!-- MIS-System -->
    <div class="mis-system reset-this">
        <form id="myForm" method="post" onsubmit="event.preventDefault(); submitForm();">
            <div class="main">
                <!-- Basic info of MIS section -->
                <div class="top">
                    <div class="Date_Wrap">
                        <label for="run_dt">Run Dt:</label>
                        <input type="hidden" id="current-date" />
                        <input type="datetime-local" name="run_dt" id="rundate" required>
                    </div>
                    <div class="shift_Wrap">
                        <label for="Shift">Shift:</label>
                        <select name="w_shift" id="Shift" required>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select>
                    </div>
                    <div class="Unit_Wrap">
                        <label for="w_unit">Unit No:</label>
                        <select name="w_unit" id="Unit" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                </div>
                <!-- Electricity Unit Section -->
                <div class="middle">
                    <div class="reading">
                        <div class="heading">
                            <label>Start Meter <br />Reading</label>
                            <label>End Meter <br />Readng</label>
                            <label>Difference</label>
                        </div>
                        <hr style="border: 1px solid red; margin-top: 0px;" />
                        <div class="defect">
                            <label for="defect_flg">Meter Any Defect:</label>
                            <select name="defect_flg" id="defect"
                                style="background-color: red; width: 89px; height: 31px; align-self: end;">
                                <option value="op1">op1</option>
                                <option value="op2">op2</option>
                                <option value="op3">op3</option>
                            </select>
                        </div>
                        <div class="calc">
                            <div class="MWHR">
                                <label for="ga_mwhr_s">Gen MWHR:</label>
                                <input type="text" name="ga_mwhr_s" required>
                                <input type="text" name="ga_mwhr_e" required>
                                <input type="text" name="gen_act" style="width: 72px" required>
                            </div>
                            <div class="MVAR">
                                <label for="ga_mwhr_s" style="width: 99px;">Gen MVAR:</label>
                                <input type="text" name="ga_mvar_s" required>
                                <input type="text" name="ga_mvar_e" required>
                                <input type="text" name="gen_react" style="width: 72px" required>
                            </div>
                            <div class="umwhr">
                                <label for="ga_mwhr_s">Uat MWHR::</label>
                                <input type="text" name="ua_mwhr_s" required>
                                <input type="text" name="ua_mwhr_e" required>
                                <input type="text" name="uat_act" style="width: 72px" required>
                            </div>
                        </div>
                    </div>
                    <div class="reason">
                        <div class="heading" style="display: flex; justify-content: start">
                            <label style="background-color: #a0a0a4; color: #000080">GENERATION LOSS DETAILS</label>
                        </div>
                        <div class="he2">
                            <label style="margin-left: 5px">MWHr</label>
                            <label>Reasons</label>
                            <label type="hidden" style="border: 0px"></label>
                        </div>
                        <hr style="border: 1px solid red; margin-top: 0px;" />
                        <div class="res">
                            <div>
                                <input type="text" style="width: 71px" name="short_fall1" required>
                                <input type="text" style="width: 306px" name="reason1" required>
                            </div>
                            <div>
                                <input type="text" style="width: 71px" name="short_fall2" required>
                                <input type="text" style="width: 306px" name="reason2" required>
                            </div>
                            <div>
                                <input type="text" style="width: 71px" name="short_fall3" required>
                                <input type="text" style="width: 306px" name="reason3" required>
                            </div>
                            <div>
                                <input type="text" style="width: 71px" name="short_fall4" required>
                                <input type="text" style="width: 306px" name="reason4" required>
                            </div>
                            <div>
                                <input type="text" name="res_sort_fal" style="width: 387px" required>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Display Data unit -->
                <div class="Display" id="displayDiv">
                    <div id="tableContainer"></div>
                </div>
                <!-- NavBar -->
                <div class="nav">
                    <button type="submit" class="btn">Submit</button>
                    <button type="reset" class="btn">Reset</button>
                    <button type="button" class="btn" onclick="displayData()">Display</button>
                </div>
            </div>
        </form>

    </div>
    <script>
    function submitForm() {
        var form = document.getElementById("myForm");
        var formData = new FormData(form);
        var xhr = new XMLHttpRequest();

        xhr.open("POST", "submit.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = xhr.responseText;
                // Process the response if needed
                console.log(response);
            }
        };

        xhr.send(formData);
    }
    </script>
    <script src="script.js"></script>
    <!-- Optional JavaScript -->
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>