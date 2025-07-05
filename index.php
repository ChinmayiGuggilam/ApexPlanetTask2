
<?php
session_start();
require 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Blog</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            padding: 20px;
        }
        .header {
            margin-bottom: 20px;
        }
        .header a {
            margin-right: 15px;
            text-decoration: none;
            color: #007BFF;
        }
        .post {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        .post h3 {
            margin: 0 0 10px;
        }
        .post p {
            color: #333;
        }
        .post a {
            color: #007BFF;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>My Blog</h2>
        <?php if (isset($_SESSION['user'])): ?>
            <p>Welcome, <strong><?= htmlspecialchars($_SESSION['user']) ?></strong> |
                <a href="create.php">Create Post</a> |
                <a href="logout.php">Logout</a>
            </p>
        <?php else: ?>
            <a href="login.php">Login</a> | <a href="register.php">Register</a>
        <?php endif; ?>
    </div>

    <?php
    $posts = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");
    while ($row = $posts->fetch_assoc()):
    ?>
        <div class="post">
            <h3><?= htmlspecialchars($row['title']) ?></h3>
            <p><?= nl2br(htmlspecialchars($row['content'])) ?></p>
            <small>Posted on: <?= $row['created_at'] ?></small><br>
            <?php if (isset($_SESSION['user'])): ?>
                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this post?')">Delete</a>
            <?php endif; ?>
        </div>
    <?php endwhile; ?>
</body>
</html>
