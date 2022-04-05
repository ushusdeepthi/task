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
    <div id="result">
        <h3>Congrats you have completed the test</h3>
        <h1> Correct Answers: <?php echo $_SESSION['score'] ?> out of <?php echo $_SESSION['total'] ?></h1>
    </div>
    <a href="index.php" class="button">Try again</a>
    <?php session_destroy() ?>
</body>

</html>