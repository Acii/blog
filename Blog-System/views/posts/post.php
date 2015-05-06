


<h1><?= htmlspecialchars($this->title) ?></h1>

<table>
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Date</th>
        <th>Username</th>
    </tr>
    <?php foreach ($this->posts as $post) :  ?>
        <tr>
        	
            <td><?= htmlspecialchars($post['title']) ?></td>
            <td><?= htmlspecialchars($post['description']) ?></td>
            <td><?= $post['dataCreate'] ?></td> 
            <td><?= htmlspecialchars($post['name']) ?></td> 
            
            
            
        </tr>
    <?php  endforeach ?>
</table>
<?php if($this->comments != null) : ?>
<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Content</th>
    </tr>
    <?php foreach ($this->comments as $comment) :  ?>
        <tr>
        	
            <td><?= htmlspecialchars($comment['name']) ?></td>
            <td><?= htmlspecialchars($comment['email']) ?></td>
            <td><?= htmlspecialchars($comment['content']) ?></td>  
            
            
            
        </tr>
    <?php  endforeach; ?>
</table>
<?php endif; ?>
<h1>Add Comment</h1>

<form method="post" action="/posts/addComment/<?=$post['id']?>">
    Name: <input type="text" name="name" required>
    <br/>
    Email: <input type="email" name="email">
    <br/>
     Comments: <textarea rows="4" cols="50" name="content" required></textarea>
    <br/>
    <input type="submit" value="Add">
</form>