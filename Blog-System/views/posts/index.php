


<h1><?= htmlspecialchars($this->title) ?></h1>

<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Date</th>
        <th>Username</th>
    </tr>
    <?php foreach ($this->posts as $post) : ?>
        <tr>
        	
            <td><?= $post['id'] ?></td>
            <td><a href="/posts/post/<?=$post['id']?>"><?= htmlspecialchars($post['title']) ?></a></td>
            <td><?= htmlspecialchars($post['description']) ?></td>
            <td><?= $post['dataCreate'] ?></td> 
            <td><?= $post['name'] ?></td>

        </tr>
    <?php  endforeach ?>
</table>
<a href="/posts/index/<?php if($this->page > 0){ echo $this->page - 1;}?>/<?php  echo $this->pageSize ?>">Previous</a>
<a href="/posts/index/<?php echo $this->page + 1;?>/<?php  echo $this->pageSize ?>">Next</a>



