<h1>Invoices</h1>
<a href="/school-management-system/public/accountant/fees/add" style="display: inline-block; padding: 10px 15px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; margin-bottom: 20px;">Add Invoice</a>
<table border="1">
    <tr>
        <th>Invoice ID</th>
        <th>Student</th>
        <th>Amount</th>
        <th>Status</th>
    </tr>
    <?php foreach ($invoices as $invoice): ?>
    <tr>
        <td><?= $invoice['invoice_id']; ?></td>
        <td><?= $invoice['student_name']; ?></td>
        <td><?= $invoice['total_amount']; ?></td>
        <td><?= $invoice['status']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
