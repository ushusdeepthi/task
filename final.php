<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <h1>Congrats you have completed the test</h1>
    <div><?php echo $_SESSION['score'] ?></div>
    <a href="index.php" class="button">Try again</a>
    <?php session_destroy() ?>
</body>

</html>