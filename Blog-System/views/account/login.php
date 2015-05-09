<div class="panel panel-default col-sm-offset-2 col-sm-4">
  <div class="panel-heading text-center">Login</div>
  <div class="panel-body">
    <form class="form-horizontal" method="post" action="/account/login">
    	<div class="form-group">
    		<label class="control-label col-sm-4" for="username">Username:</label>
    		<div class="col-sm-6">
    			<input id="username" type="text" name="username" required="" class="form-control" placeholder="Username">
    		</div>
  		</div>
  		<div class="form-group">
    		<label class="control-label col-sm-4" for="password">Password:</label>
    		<div class="col-sm-6">
    			<input id="password" type="password" name="password" required="" class="form-control" placeholder="Password">
    		</div>
  		</div>
  		<div class="form-group">
		    <div class="col-sm-offset-4 col-sm-4">
		      <input type="submit" class="btn btn-default" value="Login" />
		    </div>
		  </div>
	</form>
  </div>
</div>