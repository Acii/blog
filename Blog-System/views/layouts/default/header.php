<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/content/bootstrap.css"/>
    <link rel="stylesheet" href="/content/bootstrap-theme.css"/>
    <link rel="stylesheet" href="/content/styles.css" />
    <title>
        <?php if (isset($this->title)) echo htmlspecialchars($this->title) ?>
    </title>
</head>

<body>
	<nav class="navbar navbar-default">
  		<div class="container-fluid">
    		<div class="navbar-header">
		        <ul class="nav navbar-nav">
		        	<li> <a href="/"><img src="/content/images/site-logo.png"></a></li>
		            <li><a href="/">Home</a></li>
		            <li><a href="/posts/index">Posts</a></li>
		            <?php if($this->isLoggedIn) : ?>
		            <li><a href="/posts/newPost">New Post</a></li>
		            <?php else : ?>
		            <li><a href="/account/login">Login</a></li>
		            <li><a href="/account/register">Register</a></li>
		            <?php endif; ?>
		        </ul> 
		     </div>
		     <?php if($this->isLoggedIn) : ?>
		        <div class="pull-right navbar-right">
		        	<ul class="nav navbar-nav">
		        		<li><span class="navbar-text">Hello, <?php echo $_SESSION['username']; ?></span></li>
		        		<li><form class="navbar-text" action="/account/logout"><input type="submit" value="Logout" /></form></li>
		        	</ul>
		        </div>
		    <?php endif; ?>
		</div>
	</nav>
    <?php include('messages.php'); ?>
