<?php
session_start();

if (!isset($_SESSION['user_details'])) {
    echo "No details found. Please submit the form first.";
    exit();
}

$user = $_SESSION['user_details'];
?>

<!DOCTYPE html>
<html>
<head>
<title>User Details</title>
<style>
body {
    font-family: Arial, sans-serif;
    background: #f4f4f4;
    padding: 20px;
}
.card {
    background: white;
    padding: 20px;
    max-width: 500px;
    margin: auto;
    border-radius: 8px;
}
img {
    margin-top: 10px;
    max-width: 100%;
}
</style>
</head>
<body>

<div class="card">
    <h2>Submitted Details</h2>

    <p><b>Name:</b> <?php echo $user['name']; ?></p>
    <p><b>Email:</b> <?php echo $user['email']; ?></p>
    <p><b>Phone:</b> <?php echo $user['phone_number']; ?></p>
    <p><b>Specials:</b> <?php echo $user['specials']; ?></p>
    <p><b>DOB:</b> <?php echo $user['dob']; ?></p>

    <p><b>ID Proof:</b></p>
    <img src="<?php echo $user['id_proof']; ?>" alt="ID Proof">
</div>

</body>
</html>
