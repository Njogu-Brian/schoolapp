<h1>Parents List</h1>
<a href="/school-management-system/public/admin/parents/add" style="display: inline-block; padding: 10px 15px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; margin-bottom: 20px;">Add Parent</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
    </tr>
    <?php foreach ($parents as $parent): ?>
    <tr>
        <td><?= $parent['parent_id']; ?></td>
        <td><?= $parent['first_name']; ?></td>
        <td><?= $parent['last_name']; ?></td>
        <td><?= $parent['email']; ?></td>
        <td><?= $parent['phone']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
