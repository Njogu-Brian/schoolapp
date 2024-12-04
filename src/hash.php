<?php
$passwords = [
    'admin' => password_hash('admin123', PASSWORD_BCRYPT),
    'teacher' => password_hash('teacher123', PASSWORD_BCRYPT),
    'parent' => password_hash('parent123', PASSWORD_BCRYPT),
    'accountant' => password_hash('accountant123', PASSWORD_BCRYPT),
];

foreach ($passwords as $role => $hash) {
    echo "$role: $hash\n";
}
