<div class="page-header text-center">
	<h1>Welcome to Home!</h1>
</div>
<?php foreach ($this->posts as $post) : ?>
	<div class="list-group col-sm-offset-2 col-sm-8">
	  <a href="/posts/post/<?=$post['id']?>" class="list-group-item">
	    <h4 class="list-group-item-heading longWord"><?= htmlspecialchars($post['title']) ?></h4>
	    <p class="list-group-item-text longWord"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?= $post['name'] ?></p>
	    <p class="list-group-item-text longWord"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> <?= $post['dataCreate'] ?></p>
	  </a>
	</div>
<?php  endforeach ?>
