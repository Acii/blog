
<h1>New Post</h1>

<form method="post" action="/posts/newPost">
	Username <input type="text" name="username" value="<?php echo $_SESSION['username']; ?>"/>
	<br/>
    Title: <input type="text" name="title" required>
    <br/>
     Description: <textarea rows="4" cols="50" name="description" required></textarea>
    <br/>
    <input type="submit" value="Create">
</form>