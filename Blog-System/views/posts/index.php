


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
            <td><a href="posts/post/<?=$post['id']?>"><?= htmlspecialchars($post['title']) ?></a></td>
            <td><?= htmlspecialchars($post['description']) ?></td>
            <td><?= $post['postDate'] ?></td>  
            
            
        </tr>
    <?php  endforeach ?>
</table>

