<?php
class ClassController {
    public function listClasses() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM classes");
        $classes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo "<h1>Classes List</h1>";
        echo "<a href='/school-management-system/public/admin/classes/add'>Add Class</a>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Name</th><th>Section</th></tr>";
        foreach ($classes as $class) {
            echo "<tr>
                <td>{$class['class_id']}</td>
                <td>{$class['name']}</td>
                <td>{$class['section']}</td>
            </tr>";
        }
        echo "</table>";
    }

    public function showAddClassForm() {
        global $pdo;

        // Fetch sessions for the dropdown
        $sessions = $pdo->query("SELECT * FROM sessions")->fetchAll(PDO::FETCH_ASSOC);

        echo "<h1>Add Class</h1>";
        echo "<form method='POST' action='/school-management-system/public/admin/classes/store'>
                <label for='name'>Class Name:</label>
                <input type='text' id='name' name='name' required><br>

                <label for='section'>Section:</label>
                <select id='section' name='section'>
                    <option value='Preschool'>Preschool</option>
                    <option value='Primary'>Primary</option>
                    <option value='Junior High'>Junior High</option>
                </select><br>

                <label for='session_id'>Session:</label>
                <select id='session_id' name='session_id'>";
        foreach ($sessions as $session) {
            echo "<option value='{$session['session_id']}'>{$session['name']}</option>";
        }
        echo "</select><br>

                <button type='submit'>Add Class</button>
              </form>";
    }

    public function storeClass() {
        global $pdo;

        $stmt = $pdo->prepare("INSERT INTO classes (name, section, session_id) VALUES (:name, :section, :session_id)");
        $stmt->execute([
            'name' => htmlspecialchars($_POST['name']),
            'section' => htmlspecialchars($_POST['section']),
            'session_id' => intval($_POST['session_id'])
        ]);

        header('Location: /school-management-system/public/admin/classes');
    }
}
