<?php
include 'check_session.php';
if ($_SESSION['RoleId'] != 3) {
    header('Location: home.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>IT Staff Dashboard</title>
</head>
<body>

<h2>Welcome LIC, <?php echo $_SESSION['FirstName']; ?>!</h2>
<p>You are now logged in as Library In Charge.</p>
<a href="logout.php">Logout</a>

</body>
</html>