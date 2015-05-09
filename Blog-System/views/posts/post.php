<div class="page-header text-center">
  <h1><?= htmlspecialchars($this->title) ?></h1>
</div>
<div class="media col-sm-offset-2">
	<div class="media-body col-sm-8">
		<?php foreach ($this->posts as $post) :   ?>
		<h4 class="media-heading longWord"><?= htmlspecialchars($post['title']) ?></h4>
		<p class="longWord postDesc"><?= htmlspecialchars($post['description']) ?></p>
		<p class="longWord">
			<span class="glyphicon glyphicon-time" aria-hidden="true"></span> <?= $post['dataCreate'] ?> 
			<span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?= htmlspecialchars($post['name']) ?>
		</p>
		<?php  endforeach ?>
		<?php if($this->tags != null) : ?>
		<p class="longWord postDesc">
			<span class="glyphicon glyphicon-tags" aria-hidden="true"></span> <?php foreach ($this->tags as $tag) :   ?>
			 	<?= htmlspecialchars($tag['title']) ?>
			<?php  endforeach ?>
		</p>
		<?php endif; ?>
	</div>
	<?php if($this->comments != null) : ?>
	<div class="panel panel-default col-sm-8">
		<div class="panel-heading">Comments</div>
  		<div class="panel-body">
  			<?php foreach ($this->comments as $comment) :  ?>
  				<div class="list-group
		            <p class="longWord col-sm-offset-1"><span class="glyphicon glyphicon-user col-sm-offset-1" aria-hidden="true"></span> <?= htmlspecialchars($comment['name']) ?> <?= htmlspecialchars($comment['email']) ?></p>
		            <p class="longWord col-sm-offset-1"><?= htmlspecialchars($comment['content']) ?></p>
            	</div>
           	<?php  endforeach; ?>
    	</div>
    </div>
    <?php endif; ?>
	<div class="panel panel-default col-sm-8">
		<div class="panel-heading form-group">Add Comment</div>
		<form class="form-horizontal" method="post" action="/posts/addComment/<?=$post['id']?>">
	    	<div class="form-group">
	    		<label class="control-label col-sm-4" for="name">Name:</label>
	    		<div class="col-sm-4">
	    			<input id="name" type="text" name="name" value="<?php if(isset($_SESSION['username'])) { echo $_SESSION['username'];} else { echo "";} ?>" required="" class="form-control" placeholder="Name">
	    		</div>
	  		</div>
	  		<div class="form-group">
	    		<label class="control-label col-sm-4" for="email">Email:</label>
	    		<div class="col-sm-4">
	    			<input id="email" type="email" name="email" class="form-control" placeholder="Email@example.com">
	    		</div>
	  		</div>
	  		<div class="form-group">
	    		<label class="control-label col-sm-6" for="content">Comment text:</label>
	    		<div class="col-sm-12">
	    			<textarea rows="4" cols="50" id="content" name="content" required="" class="form-control" placeholder="Comment text"></textarea>
	    		</div>
	  		</div>
	  		<div class="form-group">
			    <div class="col-sm-offset-4 col-sm-4">
			      <input type="submit" class="btn btn-default" value="Add" />
			    </div>
			  </div>
		</form>
	</div>
</div>