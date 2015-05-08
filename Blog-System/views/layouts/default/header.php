<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/content/styles.css" />
    <title>
        <?php if (isset($this->title)) echo htmlspecialchars($this->title) ?>
    </title>
</head>

<body>
    <header>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/posts/index">Posts</a></li>
            <?php if($this->isLoggedIn) : ?>
            <li><a href="/posts/newPost">New Post</a></li>
            <?php else : ?>
            <li><a href="/account/login">Login</a></li>
            <li><a href="/account/register">Register</a></li>
            <?php endif; ?>
        </ul>
        <?php if($this->isLoggedIn) : ?>
        <div id="logged-in-info">
        	<span>Hello, <?php echo $_SESSION['username']; ?></span>
        	<form action="/account/logout"><input type="submit" value="Logout" /></form>
        </div>
        <?php endif; ?>
    </header>

    <?php include('messages.php'); ?>
