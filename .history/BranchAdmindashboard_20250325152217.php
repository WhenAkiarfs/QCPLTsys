<?php
include 'check_session.php';
if ($_SESSION['RoleId'] != 2) {
    header('Location: ');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>BranchAdmin Dashboard</title>
</head>
<body>

<h2>Welcome LIC, <?php echo $_SESSION['FirstName']; ?>!</h2>
<p>You are now logged in as Library In Charge.</p>
<a href="logout.php">Logout</a>

</body>
</html>