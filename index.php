<?php
$number = 5;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>

<body>
    <div id="header">
        <div id="welcome">
            <h1>Welcome to the Quiz game </h1>
        </div>
        <div id="personal_details">
            <form action="question.php?n=1" method="POST" class="form">
                <label for="">Name</label><br>
                <input type="text" name="name" /><br>
                <label for="">Number of questions</label><br>
                <input type="text" name="total" /><br>
                <button id="button">Start quiz</button>
            </form>
        </div>
    </div>
</body>

</html>