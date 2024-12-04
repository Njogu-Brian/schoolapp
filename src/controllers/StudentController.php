<?php
class StudentController {
    public function listStudents() {
        global $pdo;

        // Adjust query based on the actual column names in the parents table
        $stmt = $pdo->query("
            SELECT students.student_id, students.name AS student_name, 
                   classes.name AS class_name, 
                   parents.parent_id AS parent_id, 
                   CONCAT(parents.first_name, ' ', parents.last_name) AS parent_name
            FROM students
            JOIN classes ON students.class_id = classes.class_id
            JOIN parents ON students.parent_id = parents.parent_id
        ");
        $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include __DIR__ . '/../views/admin/students.php';
    }

    public function showAddStudentForm() {
        global $pdo;

        // Fetch classes and parents for the dropdowns
        $classes = $pdo->query("SELECT class_id, name FROM classes")->fetchAll(PDO::FETCH_ASSOC);
        $parents = $pdo->query("SELECT parent_id, CONCAT(first_name, ' ', last_name) AS name FROM parents")->fetchAll(PDO::FETCH_ASSOC);

        include __DIR__ . '/../views/admin/add_student.php';
    }

    public function storeStudent() {
        global $pdo;

        $stmt = $pdo->prepare("INSERT INTO students (name, class_id, parent_id) VALUES (:name, :class_id, :parent_id)");
        $stmt->execute([
            'name' => $_POST['name'],
            'class_id' => $_POST['class_id'],
            'parent_id' => $_POST['parent_id'],
        ]);

        header('Location: /school-management-system/public/admin/students');
    }
}

