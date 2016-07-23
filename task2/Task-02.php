<?php
session_start();

$err = [];
$condition = false;
if (!empty($_POST)) {
    $a = $_POST['name'];
    $b = $_POST['password'];
    $c = $_POST['password2'];
    if ($b == $c) {
        $condition = true;
    } else {
        $err[] = "Both passwords are not the same";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        input{
            display: block;
        }
        #trve {
            display: block;
        }
    </style>
</head>
<body>
    <form method="post">
        <input type="text" name="name" placeholder="Enter your username here">
        <input type="password" name="password" placeholder="Enter your password">
        <input type="password" name="password2" placeholder="Repeat your password">
        <input type="submit" value="Submit">
    </form>
    <?php if($condition == true): ?>
        <p>
            <?php $a; ?>
        </p>
        <p>
            <?php $b; ?>
        </p>
        <p>
            <?php $c; ?>
        </p>
    <?php else: ?>
        <?php foreach ($err as $e) : ?>
            <p><?= $e?></p>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>