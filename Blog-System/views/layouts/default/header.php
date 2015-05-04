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
            <li><a href="/posts">Posts</a></li>
            <li><a href="/createPost">Create Post</a></li>
            <li><a href="/login">Login</a></li>
            <li><a href="/registration">Registration</a></li>
            <li><a href="/logout">Logout</a></li>
        </ul>
    </header>

    <?php include('messages.php'); ?>
