<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
global $pdo;

// Display the logged-in parent's ID for debugging
echo "Logged-in Parent ID: " . $_SESSION['user_id'] . "<br>";

// Fetch invoices for the parent's associated students
$stmt = $pdo->prepare("
    SELECT invoices.invoice_id, invoices.total_amount, invoices.status, students.name AS student_name
    FROM invoices 
    JOIN students ON invoices.student_id = students.student_id
    WHERE students.parent_id = :parent_id
");
$stmt->execute(['parent_id' => $_SESSION['user_id']]);
$invoices = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Display the invoices
echo "<h1>Your Invoices</h1>";
if (count($invoices) > 0) {
    echo "<table border='1'>
            <tr><th>Invoice ID</th><th>Student</th><th>Amount</th><th>Status</th></tr>";
    foreach ($invoices as $invoice) {
        echo "<tr>
                <td>{$invoice['invoice_id']}</td>
                <td>{$invoice['student_name']}</td>
                <td>{$invoice['total_amount']}</td>
                <td>{$invoice['status']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No invoices found for this parent.";
}
?>
