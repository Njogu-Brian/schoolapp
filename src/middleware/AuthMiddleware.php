<?php
function checkAuth() {
    if (!isset($_SESSION['user_id'])) {
        header('Location: /school-management-system/public/login');
        exit();
    }
}

function checkRole($role) {
    if ($_SESSION['role'] !== $role) {
        header('Location: /school-management-system/public');
        exit();
    }
}
?>
