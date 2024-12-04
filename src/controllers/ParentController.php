<?php
class ParentController {
    public function listParents() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM parents");
        $parents = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include __DIR__ . '/../views/admin/list_parents.php';
    }

    public function showAddParentForm() {
        include __DIR__ . '/../views/admin/add_parent.php';
    }

    public function storeParent() {
        global $pdo;

        $stmt = $pdo->prepare("INSERT INTO parents (first_name, last_name, email, phone) VALUES (:first_name, :last_name, :email, :phone)");
        $stmt->execute([
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone']
        ]);

        header('Location: /school-management-system/public/admin/parents');
        exit;
    }
}
