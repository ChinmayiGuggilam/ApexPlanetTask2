
<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $conn->real_escape_string($_POST['title']);
    $content = $conn->real_escape_string($_POST['content']);
    $conn->query("INSERT INTO posts (title, content, created_at) VALUES ('$title', '$content', NOW())");
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; padding: 30px; }
        .container { max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        h2 { text-align: center; }
        input[type=text], textarea {
            width: 100%; padding: 12px; margin: 10px 0 20px;
            border: 1px solid #ccc; border-radius: 8px;
        }
        button {
            background: #007BFF; color: white; padding: 12px 20px;
            border: none; border-radius: 8px; font-size: 16px;
        }
        a { display: block; margin-top: 15px; text-align: center; color: #007BFF; }
    </style>
</head>
<body>
<div class="container">
    <h2>Create New Post</h2>
    <form method="post">
        <input type="text" name="title" placeholder="Post Title" required />
        <textarea name="content" placeholder="Post Content" rows="6" required></textarea>
        <button type="submit">Publish</button>
    </form>
    <a href="index.php">Back to Home</a>
</div>
</body>
</html>

