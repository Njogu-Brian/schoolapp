
<h1>Students List</h1>
<a href="/school-management-system/public/admin/students/add">Add Student</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Class</th>
        <th>Parent</th>
    </tr>
    <?php foreach ($students as $student): ?>
    <tr>
        <td><?= htmlspecialchars($student['student_id']); ?></td>
        <td><?= htmlspecialchars($student['student_name']); ?></td>
        <td><?= htmlspecialchars($student['class_name']); ?></td>
        <td><?= htmlspecialchars($student['parent_name']); ?></td>
    </tr>
    <?php endforeach; ?>
</table>
