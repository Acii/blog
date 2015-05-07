


<h1><?= htmlspecialchars($this->title) ?></h1>

<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Date</th>
        <th>Username</th>
         <th>Tags</th>
    </tr>
    <?php foreach ($this->posts as $post) : ?>
        <tr>
        	
            <td><?= $post['id'] ?></td>
            <td><a href="posts/post/<?=$post['id']?>"><?= htmlspecialchars($post['title']) ?></a></td>
            <td><?= htmlspecialchars($post['description']) ?></td>
            <td><?= $post['dataCreate'] ?></td> 
            <td><?= $post['name'] ?></td>
            <td><?= $post['tagTitle'] ?>  </td>
            
            
        </tr>
    <?php  endforeach ?>
</table>

