
<h1>Classes List</h1>
<a href="/school-management-system/public/admin/classes/add">Add Class</a>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Section</th>
    </tr>
    <?php foreach ($classes as $class): ?>
    <tr>
        <td><?= $class['class_id']; ?></td>
        <td><?= $class['name']; ?></td>
        <td><?= $class['section']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
