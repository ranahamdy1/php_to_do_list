<?php
require 'db_conn.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-Do List</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="main-section">
    <div class="add-section" >
        <form action="app/add.php" method = "POST" autocomplete="off">
        <?php if(isset($_GET['mess']) && isset($_GET['mess']) == 'error'){ ?>
            <input type="text" name="title" style="border-color: #ff6666" placeholder="This field is required"/>
            <button type="submit">Add &nbsp;
                <span>&#43;</span>
            </button>
        <?php } else { ?>
            <input type="text" name="title"  placeholder="What do you need to do ?"/>
            <button type="submit">Add &nbsp;
                <span>&#43;</span>
            </button>
            <?php } ?>
        </form>
    </div>
    <?php
    $stmt = $conn->query("SELECT * FROM todos ORDER BY id DESC");
    ?>
    <div class="show-todo-section">
        <?php if ($stmt->rowCount() <= 0) { ?>
            <div class="todo_item">
                <div class="empty">
                    <img src="img/f.png" width="100%">
                    <img src="img/Ellipsis.gif" width="80px">
                </div>
            </div>
        <?php } else {
            while ($todo = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="todo_item">
                    <span id="<?php echo  $todo['id']; ?>" class="remove-to-do">x</span>
                    <?php if ($todo['checked']){?>
                        <input type="checkbox" class="check-box" checked>
                        <h2 class="checked"><?php echo htmlspecialchars($todo['title']); ?></h2>
                        <?php } else {?>
                        <input type="checkbox" class="check-box" >
                        <h2><?php echo htmlspecialchars($todo['title']); ?></h2>
                        <?php } ?>
                    <small>Created: <?php echo htmlspecialchars($todo['date_time']); ?></small>
                </div>
            <?php }
        } ?>
    </div>
</div>
</body>
</html>
