<?php
include '../auth/check_session.php';
if ($_SESSION['RoleId'] != 1) {
    header('Location: home.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>

<h2>Welcome Admin, <?php echo $_SESSION['FirstName']; ?>!</h2>
<p>You are now logged in as Admin.</p>
<a href="../auth/logout.php">Logout</a>

</body>
</html>
