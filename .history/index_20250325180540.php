<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QCPL STS Login</title>
    <link rel="icon" type="image/x-icon"  alt="qcpl_logo" href="asset/qcpl-logo.png">

    <!-- Link for Bootstrap -->
    <link href="../vendor/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../vendor/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- CSS Link -->
    <link rel="stylesheet" href="forms.css">
  
    <style>
        body, html{
    background-color: var(--color-lightgray-100);
  
  }
  .invalid-feedback {
    display: none;
    width: 100%;
    margin-top: 0.25rem;
    font-size: 80%;
    color: #e74a3b;
  }
  
  .please-enter-your,
  .welcome-back-admin {
    margin: 0;
    align-self: stretch;
    position: relative;
    font-weight: 700;
    font-family: inherit;
  }
  .welcome-back-admin {
    font-size: inherit;
  }
  .please-enter-your {
    font-size: 1.688rem;
  }
  .adminstaff-login-page-inner,
  .welcome-back-admin-parent {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: flex-start;
  }
  .welcome-back-admin-parent {
    align-self: stretch;
    gap: 2.768rem;
  }
  .adminstaff-login-page-inner {
    width: 50%;
    padding: 13.381rem 0 0;
    box-sizing: border-box;
    min-width: 25.575rem;
    max-width: 100%;
  }
  .frame-child115 {
    width: 36rem;
    height: 45rem;
    position: relative;
    border-radius: var(--br-32xl);
    background-color: var(--color-gray-200);
    display: none;
    max-width: 100%;
  }
  .infoserve3,
  .logo-2-icon3 {
    position: relative;
    flex-shrink: 0;
    z-index: 1;
  }
  .logo-2-icon3 {
    width: 9.231rem;
    height: 9.231rem;
    object-fit: cover;
  }
  .infoserve3 {
    flex: 1;
    font-size: var(--font-size-xl);
    letter-spacing: 0.15em;
    font-family: var(--font-source-sans-pro);
    color: var(--color-darkslateblue-200);
    text-align: center;
  }
  .infoserve-wrapper,
  .logo-container1 {
    display: flex;
    align-items: flex-start;
    justify-content: flex-start;
  }
  .infoserve-wrapper {
    align-self: stretch;
    flex-direction: row;
    padding: 0 var(--padding-4xs) 0 var(--padding-6xs);
  }
  .logo-container1 {
    width: 9.231rem;
    flex-direction: column;
    gap: 1.143rem;
  }
  .logo-container-wrapper {
    width: 22.75rem;
    display: flex;
    flex-direction: row;
    align-items: flex-start;
    justify-content: center;
    max-width: 100%;
  }
  .text-field-item {
    height: 3.25rem;
    width: 22.688rem;
    position: relative;
    border-radius: var(--br-21xl);
    background-color: var(--color-gray-200);
    border: 2px solid var(--color-slategray);
    box-sizing: border-box;
    display: none;
    max-width: 100%;
  }
  .email-address {
    width: 17.563rem;
    border: 0;
    outline: 0;
    font-family: var(--font-poppins);
    font-size: var(--font-size-mini);
    background-color: transparent;
    height: 1.438rem;
    position: relative;
    letter-spacing: 0.04em;
    color: var(--color-darkslategray);
    text-align: left;
    display: flex;
    align-items: center;
    padding: 0;
    z-index: 1;
  }
  .text-field10 {
    flex: 1;
    border-radius: var(--br-21xl);
    background-color: var(--color-gray-200);
    border: 2px solid var(--color-slategray);
    box-sizing: border-box;
    display: flex;
    flex-direction: row;
    align-items: flex-start;
    justify-content: flex-start;
    padding: var(--padding-xs) var(--padding-3xl) var(--padding-2xs);
    max-width: 100%;
    z-index: 1;
  }
  .input-fields1 {
    align-self: stretch;
    flex-direction: row;
    padding: 0 0 0 var(--padding-12xs);
  }
  .input-fields-parent,
  .input-fields1,
  .text-field11 {
    display: flex;
    align-items: flex-start;
    justify-content: flex-start;
    box-sizing: border-box;
    max-width: 100%;
  }
  .text-field11 {
    align-self: stretch;
    border-radius: var(--br-21xl);
    background-color: var(--color-gray-200);
    border: 2px solid var(--color-slategray);
    flex-direction: row;
    padding: var(--padding-xs) var(--padding-3xl) var(--padding-2xs);
    z-index: 1;
  }
  .input-fields-parent {
    width: 22.75rem;
    flex-direction: column;
    padding: 0 0 var(--padding-5xs);
    gap: var(--gap-2xs);
  }
  .login-child {
    height: 2.981rem;
    width: 22.663rem;
    position: relative;
    border-radius: var(--br-27xl);
    background-color: var(--color-darkslateblue-200);
    display: none;
    max-width: 100%;
  }
  .login1 {
    width: 8.25rem;
    position: relative;
    font-size: var(--font-size-xl);
    display: inline-block;
    font-family: var(--font-poppins);
    color: var(--color-white);
    text-align: center;
    flex-shrink: 0;
    z-index: 1;
  }
  .forgot-password-click,
  .login {
    align-self: stretch;
    flex-shrink: 0;
    cursor: pointer;
    z-index: 1;
  }
  .login {
    border: 0;
    padding: 0.7rem var(--padding-xl) 0.406rem;
    background-color: var(--color-darkslateblue-200);
    border-radius: var(--br-27xl);
    display: flex;
    flex-direction: row;
    align-items: flex-start;
    justify-content: center;
    box-sizing: border-box;
    max-width: 100%;
  }
  .login:hover {
    background-color: var(--color-steelblue-300);
  }
  .forgot-password-click {
    position: relative;
    font-size: var(--font-size-xl);
    font-family: var(--font-source-sans-pro);
    color: var(--color-darkslateblue-200);
    text-align: center;
  }
  .actions {
    width: 22.663rem;
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    justify-content: flex-start;
    gap: 0.518rem;
    max-width: 100%;
  }
  .adminstaff-login-page,
  .frame-form {
    display: flex;
    justify-content: flex-start;
    box-sizing: border-box;
  }
  .frame-form {
    margin: 0;
    flex: 1;
    border-radius: var(--br-32xl);
    background-color: var(--color-gray-200);
    flex-direction: column;
    align-items: center;
    padding: 5.437rem var(--padding-xl) 6.125rem;
    gap: 4.375rem;
    width: 50%;
  }
  .adminstaff-login-page {
    width: 100%;
    position: relative;
    background-color: var(--color-lightgray-100);
    overflow: hidden;
    flex-direction: row;
    align-items: flex-start;
    padding: var(--padding-37xl) var(--padding-45xl) var(--padding-37xl) 5rem;
    gap: 9.425rem;
    line-height: normal;
    letter-spacing: normal;
    text-align: left;
    font-size: 3.125rem;
    color: var(--color-darkslateblue-200);
    font-family: var(--font-poppins);
  }
  @media screen and (max-width: 1025px) {
    .adminstaff-login-page-inner {
      flex: 1;
    }
    .adminstaff-login-page {
      flex-wrap: wrap;
    }
  }
  @media screen and (max-width: 975px) {
    .welcome-back-admin {
      font-size: 2.5rem;
    }
  }
  @media screen and (max-width: 725px) {
    .adminstaff-login-page-inner,
    .frame-form {
      padding-top: 8.688rem;
      box-sizing: border-box;
      min-width: 100%;
    }
    .frame-form {
      padding-top: 3.563rem;
      padding-bottom: var(--padding-45xl);
    }
    .adminstaff-login-page {
      gap: 4.688rem;
      padding-left: var(--padding-21xl);
      padding-right: var(--padding-13xl);
      box-sizing: border-box;
    }
  }
  @media screen and (max-width: 450px) {
    .welcome-back-admin {
      font-size: var(--font-size-11xl);
    }
    .please-enter-your {
      font-size: 1.375rem;
    }
    .welcome-back-admin-parent {
      gap: var(--gap-3xl);
    }
    .forgot-password-click,
    .infoserve3,
    .login1 {
      font-size: var(--font-size-base);
    }
    .frame-form {
      gap: 2.188rem;
    }
    .adminstaff-login-page {
      gap: var(--gap-19xl);
    }
  }
  
  .spinner-border {
    width: 2rem;
    height: 2rem;
    border: 0.25em solid currentcolor;
    border-right-color: transparent;
    border-radius: 50%;
    animation: spinner-border 0.75s linear infinite; 
  
  }
  
  .spinner-border-sm {
    width: 1rem;
    height: 1rem;
    border-width: 0.2em;
  }
  
  @keyframes spinner-border 
   {
    0% {
      transform: rotate(0deg);
    }
    100% {
      transform: rotate(360deg);
    }
  }
    </style>
</head>

<body>
    <div class="row align-items-center vh-100">
        <div class="col-5 mx-auto">
            <div class="card shadow-lg">
                <div class="card-body">
                    <div class="text-center mb-5 logo">
                        <img src="asset/qcpl-logo.png" alt="Logo" class="logo" width="120px">
                        <p class="p-2 mb-5">QUEZON CITY PUBLIC LIBRARY</p>
                    </div>

                    <div id="error-message" class="alert alert-danger mt-3" style="display: none;"></div>

                    <!-- Updated form with action to login.php -->
                    <form action="login.php" method="POST" id="login-form">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mt-3">Sign in</button>
                    </form>

                    <div class="text-center mt-3">
                        <a href="gen_forgot_password.html" class="links">Forgot Password?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/auth/admin/gen_login.js"></script>
</body>



<!--<body>

<h2>Login</h2>
<form action="login.php" method="POST">
    <label>Email:</label>
    <input type="email" name="email" required><br>
    <label>Password:</label>
    <input type="password" name="password" required><br>
    <button type="submit">Login</button>
</form>

<hr>

<h2>Register</h2>
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
