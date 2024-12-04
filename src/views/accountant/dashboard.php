
<?php
global $pdo;

// Fetch accountant statistics
$stmt = $pdo->query("SELECT COUNT(*) AS total_invoices FROM invoices");
$total_invoices = $stmt->fetch(PDO::FETCH_ASSOC)['total_invoices'] ?? 0;

$stmt = $pdo->query("SELECT SUM(total_amount) AS total_paid FROM invoices WHERE status = 'Paid'");
$total_paid = $stmt->fetch(PDO::FETCH_ASSOC)['total_paid'] ?? 0;

echo "<h1>Accountant Dashboard</h1>";
echo "<p>Total Invoices: {$total_invoices}</p>";
echo "<p>Total Paid: KES {$total_paid}</p>";
echo "<nav>
    <a href='/school-management-system/public/accountant/fees'>Manage Fees</a>
    <a href='/school-management-system/public/logout'>Logout</a>
</nav>";
?>
