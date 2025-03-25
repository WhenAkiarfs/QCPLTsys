<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $contactno = $_POST['contactno'];
    $districtId = $_POST['district_id'];
    $branchId = $_POST['branch_id'];
    $roleId = $_POST['role_id']; // 1 for Admin, 2 for Staff, etc.
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Insert into t_users
    $sql = "INSERT INTO t_users (FirstName, LastName, Email, Contactno, DistrictId, BranchId, Password, RoleId)
            VALUES (:firstName, :lastName, :email, :contactno, :districtId, :branchId, :password, :roleId)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'firstName' => $firstName,
        'lastName' => $lastName,
        'email' => $email,
        'contactno' => $contactno,
        'districtId' => $districtId,
        'branchId' => $branchId,
        'password' => $password,
        'roleId' => $roleId
    ]);

    // Get the last inserted UserId
    $userId = $conn->lastInsertId();

    // If role is Admin, insert into t_admin
    if ($roleId == 1) {
        $adminId = uniqid('admin_');
        $position = $_POST['position'];
        $department = $_POST['department'];

        $sql = "INSERT INTO t_admin (AdminId, UserId, Position, Department) 
                VALUES (:adminId, :userId, :position, :department)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'adminId' => $adminId,
            'userId' => $userId,
            'position' => $position,
            'department' => $department
        ]);
    }

    header('Location: ../index.php?msg=registered');
    exit();
}
?>
