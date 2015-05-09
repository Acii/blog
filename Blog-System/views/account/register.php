<div class="panel panel-default text-center col-sm-offset-2 col-sm-4">
  <div class="panel-heading">Register</div>
  <div class="panel-body">
    <form class="form-horizontal" method="post" action="/account/register">
    	<div class="form-group">
    		<label class="control-label col-sm-5" for="username">Username:</label>
    		<div class="col-sm-6">
    			<input id="username" type="text" name="username" required="" class="form-control" placeholder="Username">
    		</div>
  		</div>
  		<div class="form-group">
    		<label class="control-label col-sm-5" for="password">Password:</label>
    		<div class="col-sm-6">
    			<input id="password" type="password" name="password" required="" class="form-control" placeholder="Password">
    		</div>
  		</div>
		<div class="form-group">
    		<label class="control-label col-sm-5" for="cpassword">Confirm Password:</label>
    		<div class="col-sm-6">
    			<input id="cpassword" type="password"name="confirmPassword" required="" class="form-control" placeholder="Confirm Password">
    		</div>
  		</div>
  		<div class="form-group">
		    <div class="col-sm-offset-5 col-sm-4">
		      <input type="submit" class="btn btn-default" value="Register" />
		    </div>
		  </div>
	</form>
  </div>
</div>
