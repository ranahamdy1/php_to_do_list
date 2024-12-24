<?php
require 'db_conn.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-Do List</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="main-section">
    <div class="add-section">
        <form action="" >
            <input type="text" name="title" placeholder="This field is required /">
            <button type="submit">Add &nbsp;
                <span>&#43;</span>
            </button>
        </form>
    </div>
    <?php
    $todos = $conn->query("SELECT * FROM todos ORDER BY id DESC");
    ?>
    <div class="show=todo-section">
        <div class="todo_item">
            <input type="checkbox">
            <h2>This is hhsx nknak</h2>
            <br>
            <small>Created: 3/3/2020</small>
        </div>
    </div>
</div>
</body>
</html>