<div class="panel panel-default col-sm-8 col-sm-offset-2">
	<div class="panel-heading form-group">New Post</div>
	<form class="form-horizontal" method="post" action="/posts/newPost">
		<div class="form-group">
			<label class="control-label col-sm-4" for="username">Username:</label>
				<div class="col-sm-4">
					<input id="username" type="text" name="username" value="<?php echo $_SESSION['username']; ?>" required="" class="form-control" placeholder="Username">
	    		</div>
	  	</div>
	  	<div class="form-group">
	    	<label class="control-label col-sm-4" for="title">Title:</label>
	    		<div class="col-sm-4">
	    			<input id="title" type="text" name="title" required="" class="form-control" placeholder="Title">
	    		</div>
	  	</div>
	  	<div class="form-group">
	    	<label class="control-label col-sm-6" for="description">Description:</label>
	    		<div class="col-sm-12">
	    			<textarea rows="4" cols="50" id="description" name="description" required="" class="form-control" placeholder="Description"></textarea>
	    		</div>
	  	</div>
	  	<div class="form-group">
	    	<label class="control-label col-sm-4" for="tags">Tags:</label>
	    		<div class="col-sm-4">
	    			<input id="tags" type="text" name="tags" class="form-control" placeholder="Tags">
	    		</div>
	  	</div>
	  	<div class="form-group">
		    <div class="col-sm-offset-4 col-sm-4">
		      <input type="submit" class="btn btn-default" value="Create" />
		    </div>
		</div>
	</form>
</div>

