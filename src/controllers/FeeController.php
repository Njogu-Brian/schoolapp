<?php
class FeeController {
    public function listInvoices() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM invoices");
        $invoices = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        echo "<h1>Invoices</h1>";
        echo "<table border='1'>";
        echo "<tr><th>Invoice ID</th><th>Student</th><th>Amount</th><th>Status</th></tr>";
        foreach ($invoices as $invoice) {
            echo "<tr>
                <td>{$invoice['invoice_id']}</td>
                <td>{$invoice['student_id']}</td>
                <td>{$invoice['total_amount']}</td>
                <td>{$invoice['status']}</td>
            </tr>";
        }
        echo "</table>";
    }
    public function showCreateInvoiceForm() {
        global $pdo;
    
        // Fetch students for the dropdown
        $students = $pdo->query("SELECT * FROM students")->fetchAll(PDO::FETCH_ASSOC);
    
        echo "<h1>Add Invoice</h1>";
        echo "<form method='POST' action='/school-management-system/public/accountant/fees/store'>
                <label for='student_id'>Student:</label>
                <select id='student_id' name='student_id'>";
        foreach ($students as $student) {
            echo "<option value='{$student['student_id']}'>{$student['name']}</option>";
        }
        echo "</select><br>
    
                <label for='total_amount'>Amount:</label>
                <input type='number' id='total_amount' name='total_amount' required><br>
    
                <label for='status'>Status:</label>
                <select id='status' name='status'>
                    <option value='Unpaid'>Unpaid</option>
                    <option value='Paid'>Paid</option>
                </select><br>
    
                <button type='submit'>Create Invoice</button>
              </form>";
    }
    
    public function createInvoice() {
        global $pdo;
    
        $stmt = $pdo->prepare("INSERT INTO invoices (student_id, total_amount, status) VALUES (:student_id, :total_amount, :status)");
        $stmt->execute([
            'student_id' => $_POST['student_id'],
            'total_amount' => $_POST['total_amount'],
            'status' => $_POST['status']
        ]);
    
        header('Location: /school-management-system/public/accountant/fees');
    }
    
    
}
