<?php
include 'check_session.php';
if ($_SESSION['RoleId'] != 2) {
    header('Location: home.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>BranchAdmin Dashboard</title>
</head>
<body>

<h2>Welcome Admin, <?php echo $_SESSION['FirstName']; ?>!</h2>
<p>You are now logged in as Admin.</p>
<a href="logout.php">Logout</a>

</body>
</html>