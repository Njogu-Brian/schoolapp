
<h1>Add Student</h1>
<form method="POST" action="/school-management-system/public/admin/students/store">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>

    <label for="class_id">Class:</label>
    <select id="class_id" name="class_id">
        <?php foreach ($classes as $class): ?>
        <option value="<?= $class['class_id']; ?>"><?= $class['name']; ?></option>
        <?php endforeach; ?>
    </select><br>

    <label for="parent_id">Parent:</label>
    <select id="parent_id" name="parent_id">
        <?php foreach ($parents as $parent): ?>
        <option value="<?= $parent['parent_id']; ?>"><?= $parent['name']; ?></option>
        <?php endforeach; ?>
    </select><br>

    <button type="submit">Add Student</button>
</form>
