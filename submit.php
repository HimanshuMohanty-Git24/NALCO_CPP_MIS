<?php
require_once "config.php";
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $run_dt = $_POST['run_dt'];
    $w_shift = $_POST['w_shift'];
    $w_unit = $_POST['w_unit'];
    $ga_mwhr_s = $_POST['ga_mwhr_s'];
    $ga_mwhr_e = $_POST['ga_mwhr_e'];
    $gen_act = $_POST['gen_act'];
    $ga_mvar_s = $_POST['ga_mvar_s'];
    $ga_mvar_e = $_POST['ga_mvar_e'];
    $gen_react = $_POST['gen_react'];
    $ua_mwhr_s = $_POST['ua_mwhr_s'];
    $ua_mwhr_e = $_POST['ua_mwhr_e'];
    $uat_act = $_POST['uat_act'];
    $res_sort_fal = $_POST['res_sort_fal'];
    $short_fall1 = $_POST['short_fall1'];
    $short_fall2 = $_POST['short_fall2'];
    $short_fall3 = $_POST['short_fall3'];
    $short_fall4 = $_POST['short_fall4'];
    $reason1 = $_POST['reason1'];
    $reason2 = $_POST['reason2'];
    $reason3 = $_POST['reason3'];
    $reason4 = $_POST['reason4'];

    // Prepare and execute the SQL INSERT statement
    $stmt = $conn->prepare("INSERT INTO MIS_DATA (run_dt, w_shift, w_unit, ga_mwhr_s, ga_mwhr_e, gen_act, gr_mvar_s, gr_mvar_e, gen_react, ua_mwhr_s, ua_mwhr_e, uat_act, res_sort_fal, short_fall1, short_fall2, short_fall3, short_fall4, reason1, reason2, reason3, reason4) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssssssssssssss", $run_dt, $w_shift, $w_unit, $ga_mwhr_s, $ga_mwhr_e, $gen_act, $ga_mvar_s, $ga_mvar_e, $gen_react, $ua_mwhr_s, $ua_mwhr_e, $uat_act, $res_sort_fal, $short_fall1, $short_fall2, $short_fall3, $short_fall4, $reason1, $reason2, $reason3, $reason4);

    if ($stmt->execute()) {
        // Data inserted successfully
        $_SESSION['success_message'] = "Data inserted successfully.";
        echo "success";
    } else {
        // Error occurred while inserting data
        $_SESSION['error_message'] = "Error: " . $stmt->error;
        echo "error";
    }

    exit;
}
?>