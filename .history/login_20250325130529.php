<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user details
    $sql = "SELECT * FROM t_users WHERE Email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if user exists and password matches
    if ($user && password_verify($password, $user['Password'])) {
        $_SESSION['UserId'] = $user['UserId'];
        $_SESSION['RoleId'] = $user['RoleId'];
        $_SESSION['FirstName'] = $user['FirstName'];

        // If Admin, check for admin details
        if ($user['RoleId'] == 1) {
            $sql = "SELECT * FROM t_admin WHERE UserId = :userId";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['userId' => $user['UserId']]);
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($admin) {
                $_SESSION['AdminId'] = $admin['AdminId'];
                header('Location: admin/dashboard.php ');
                exit();
            }
        }

        // Redirect non-admins to home
        header('Location: ome.php ');
        exit();
    } else {
        echo "Invalid email or password.";
    }
}
?>
