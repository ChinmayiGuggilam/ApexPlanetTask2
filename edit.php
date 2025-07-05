<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$post = $conn->query("SELECT * FROM posts WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $conn->real_escape_string($_POST['title']);
    $content = $conn->real_escape_string($_POST['content']);
    $conn->query("UPDATE posts SET title='$title', content='$content' WHERE id=$id");
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; padding: 30px; }
        .container { max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        h2 { text-align: center; }
        input[type=text], textarea {
            width: 100%; padding: 12px; margin: 10px 0 20px;
            border: 1px solid #ccc; border-radius: 8px;
        }
        button {
            background: #28a745; color: white; padding: 12px 20px;
            border: none; border-radius: 8px; font-size: 16px;
        }
        a { display: block; margin-top: 15px; text-align: center; color: #007BFF; }
    </style>
</head>
<body>
<div class="container">
    <h2>Edit Post</h2>
    <form method="post">
        <input type="text" name="title" value="<?= htmlspecialchars($post['title']) ?>" required />
        <textarea name="content" rows="6" required><?= htmlspecialchars($post['content']) ?></textarea>
        <button type="submit">Update</button>
    </form>
    <a href="index.php">Back to Home</a>
</div>
</body>
</html>