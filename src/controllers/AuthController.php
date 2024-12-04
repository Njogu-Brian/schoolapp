<?php
class AuthController
{
    public function login()
    {
        // Ensure POST variables are set
        if (!isset($_POST['username']) || !isset($_POST['password'])) {
            error_log("Username or Password missing from POST data.");
            header("Location: /school-management-system/public/login?error=missing_credentials");
            exit;
        }

        global $pdo;

        $username = $_POST['username'];
        $password = $_POST['password'];

        error_log("Attempting login - Username: $username, Password: $password");

        // Query the database for the user
        $stmt = $pdo->prepare("SELECT user_id, username, password_hash, role FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password_hash'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Debug the role for redirection
            error_log("Role for user '$username': " . $user['role']);

            // Redirect to respective dashboard
            switch ($user['role']) {
                case 'super_admin':
                case 'admin':
                    header("Location: /school-management-system/public/admin/dashboard");
                    break;
                case 'teacher':
                    header("Location: /school-management-system/public/teacher/dashboard");
                    break;
                case 'accountant':
                    header("Location: /school-management-system/public/accountant/dashboard");
                    break;
                case 'receptionist':
                    header("Location: /school-management-system/public/receptionist/dashboard");
                    break;
                case 'librarian':
                    header("Location: /school-management-system/public/librarian/dashboard");
                    break;
                case 'parent':
                    header("Location: /school-management-system/public/parent/dashboard");
                    break;
                default:
                    error_log("Invalid role detected for user: $username");
                    header("Location: /school-management-system/public/login?error=invalid_role");
                    break;
            }
            exit;
        } else {
            // Invalid credentials
            error_log("Invalid credentials for username: $username");
            header("Location: /school-management-system/public/login?error=invalid_credentials");
            exit;
        }
    }
}
?>
