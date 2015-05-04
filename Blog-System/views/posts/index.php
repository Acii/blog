


<h1><?= htmlspecialchars($this->title) ?></h1>

<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Date</th>
    </tr>
    <?php foreach ($this->posts as $post) : ?>
        <tr>
        	
            <td><?= $post['id'] ?></td>
            <td><?= htmlspecialchars($post['title']) ?></td>
            <td><?= htmlspecialchars($post['description']) ?></td>
            <td><?= $post['postDate'] ?></td>
            <td><?= $post['name'] ?></td>
        </tr>
    <?php endforeach ?>
</table>

