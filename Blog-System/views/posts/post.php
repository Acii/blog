


<h1><?= htmlspecialchars($this->title) ?></h1>

<table>
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Date</th>
    </tr>
    <?php foreach ($this->posts as $post) : var_dump($post) ?>
        <tr>
        	
            <!-- <td><?= htmlspecialchars($post) ?></a></td> -->
            <!-- <td><?= htmlspecialchars($post[2]) ?></td>
            <td><?= $post[3] ?></td> -->
            
            
            
        </tr>
    <?php  endforeach ?>
</table>

