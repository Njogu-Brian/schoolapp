<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="/school-management-system/public/css/styles.css">
</head>
<body class="login-body">
    <p class="welcome-text">Welcome to the School Management System</p>
    <div class="login-container">
        <div class="login-left">
            <div class="login-header">
                <img src="/school-management-system/public/images/print-logo.png" alt="School Logo" class="login-logo">
                <h2>Admin Login</h2>
            </div>
            <form action="/school-management-system/public/auth/login" method="POST">
                <div class="form-group">
                    <input type="text" name="username" placeholder="Enter your username" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="btn-primary">Sign In</button>
            </form>
            <div class="quick-login">
                <button type="button" class="role-button super-admin" onclick="quickLogin('super_admin')">Super Admin</button>
                <button type="button" class="role-button admin" onclick="quickLogin('admin')">Admin</button>
                <button type="button" class="role-button teacher" onclick="quickLogin('teacher')">Teacher</button>
                <button type="button" class="role-button accountant" onclick="quickLogin('accountant')">Accountant</button>
                <button type="button" class="role-button receptionist" onclick="quickLogin('receptionist')">Receptionist</button>
                <button type="button" class="role-button librarian" onclick="quickLogin('librarian')">Librarian</button>
                <button type="button" class="role-button parent" onclick="quickLogin('parent')">Parent</button>
            </div>
        </div>
    </div>
    <script>
    function quickLogin(role) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '/school-management-system/public/auth/login';

        const usernameInput = document.createElement('input');
        usernameInput.type = 'hidden';
        usernameInput.name = 'username';
        usernameInput.value = role;
        form.appendChild(usernameInput);

        const passwordInput = document.createElement('input');
        passwordInput.type = 'hidden';
        passwordInput.name = 'password';
        passwordInput.value = role + '123'; // Use the role + "123" as the password
        form.appendChild(passwordInput);

        document.body.appendChild(form);
        form.submit();
    }
</script>
    </script>
</body>
</html>
