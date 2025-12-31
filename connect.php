<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

/* DB CONNECTION */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cafe";

$con = mysqli_connect($servername, $username, $password, $dbname);

if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

/* FORM DATA */
$name  = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$pass  = $_POST['password'] ?? '';
$phone = $_POST['phone_number'] ?? '';
$spec  = $_POST['specials'] ?? '';
$dob   = $_POST['dob'] ?? '';

/* FILE UPLOAD */
$target_dir = "uploads/";
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

$target_file = "";
if (!empty($_FILES['id_proof']['name'])) {
    $target_file = $target_dir . basename($_FILES["id_proof"]["name"]);
    move_uploaded_file($_FILES["id_proof"]["tmp_name"], $target_file);
}

/* INSERT QUERY */
$sql = "INSERT INTO details 
(name, email, password, phone_number, specials, dob, id_proof)
VALUES 
('$name', '$email', '$pass', '$phone', '$spec', '$dob', '$target_file')";

if (mysqli_query($con, $sql)) {

    $_SESSION['user_details'] = [
        'name' => $name,
        'email' => $email,
        'phone_number' => $phone,
        'specials' => $spec,
        'dob' => $dob,
        'id_proof' => $target_file
    ];

    header("Location: detailsss.php");
    exit();

} else {
    echo "SQL ERROR: " . mysqli_error($con);
}

mysqli_close($con);
?>
