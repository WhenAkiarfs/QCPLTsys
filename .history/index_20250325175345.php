<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QCPL STS Login</title>
    <link rel="icon" type="image/x-icon" href="asset/qcid_logo.png">

    <!-- Link for Bootstrap -->
    <link href="../vendor/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../vendor/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- CSS Link -->
    <link rel="stylesheet" href="forms.css">
</head>
<body>

<h2>Login</h2>
<form action="login.php" method="POST">
    <label>Email:</label>
    <input type="email" name="email" required><br>
    <label>Password:</label>
    <input type="password" name="password" required><br>
    <button type="submit">Login</button>
</form>

<hr>

<!--<h2>Register</h2>
<form action="register.php" method="POST">
    <label>First Name:</label>
    <input type="text" name="first_name" required><br>
    <label>Last Name:</label>
    <input type="text" name="last_name" required><br>
    <label>Email:</label>
    <input type="email" name="email" required><br>
    <label>Contact No:</label>
    <input type="number" name="contactno" required><br>
    <label>District ID:</label>
    <input type="number" name="district_id" required><br>
    <label>Branch ID:</label>
    <input type="number" name="branch_id" required><br>
    <label>Password:</label>
    <input type="password" name="password" required><br>

    <label>Role:</label>
    <select name="role_id">
        <option value="1">Admin</option>
        <option value="2">BranchAdmin</option> 
        <option value="3">ITstaff</option>
        <option value="4"> UserEmp </option>


    </select><br>

    <div id="admin_fields" style="display:none;">
        <label>Position:</label>
        <input type="text" name="position"><br>
        <label>Department:</label>
        <input type="text" name="department"><br>
    </div>

    <button type="submit">Register</button>
</form>-->



<script>
    document.querySelector('select[name="role_id"]').addEventListener('change', function () {
        if (this.value == 1) {
            document.getElementById('admin_fields').style.display = 'block';
        } else {
            document.getElementById('admin_fields').style.display = 'none';
        }
    });
</script>

</body>
</html>
