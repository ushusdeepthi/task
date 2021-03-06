<?php session_start() ?>
<?php
$number = (int)$_GET['n'];
if ($number == 1) {
    $_SESSION['score'] = 0;
    $_SESSION['correct_answer'] = '';
    $_SESSION['correct_answer'] = '';
}
if (isset($_POST['total'])) $_SESSION['total'] = (int)$_POST['total'];
if (isset($_POST['name'])) $_SESSION['name'] = $_POST['name'];

?>
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
    <?php
    if ($number == 1) {

        $_SESSION['timestamp1'] = mt_rand(1, time());
        $_SESSION['timestamp2'] = mt_rand(1, time());
    }
    $timestamp = rand($_SESSION['timestamp1'], $_SESSION['timestamp2']);
    $randomDate = date("d M Y", $timestamp);
    $actual_day = date('l', $timestamp);
    $_SESSION['correct_answer'] = $actual_day;
    $min = min($_SESSION['timestamp1'], $_SESSION['timestamp2']);
    $max = max($_SESSION['timestamp1'], $_SESSION['timestamp2']);
    ?>
    <div id="welcome">
        <h1>Hi <?php echo  $_SESSION['name'] ?> </h1>
        <p>The range is from <?php echo date('d M Y', $min) ?> - <?php echo date('d M Y', $max) ?> </p>

    </div>
    <div id="current_date">
        <button id="button">Current Date</button>
    </div>
    <div class="current"> Question <?php echo $number ?>/<?php echo $_SESSION['total']  ?></div>
    <p class="question"><?php echo $randomDate ?></p>
    <form action="process.php" method="POST">
        <ul class="choices">
            <input type='radio' id='monday' name='day' value='Monday'>
            <label for='monday'>Monday</label><br>
            <input type='radio' id='tuesday' name='day' value='Tuesday'>
            <label for='tuesday'>Tuesday</label><br>
            <input type='radio' id='wednesday' name='day' value='Wednesday'>
            <label for='wednesday'>Wednesday</label> <br />
            <input type='radio' id='thursday' name='day' value='Thursday'>
            <label for='thursday'>Thursday</label> <br />
            <input type='radio' id='friday' name='day' value='Friday'>
            <label for='friday'>Friday</label> <br />
            <input type='radio' id='saturday' name='day' value='Saturday'>
            <label for='saturday'>Saturday</label> <br />
            <input type='radio' id='sunday' name='day' value='Sunday'>
            <label for='sunday'>Sunday</label> <br />
            <input type='submit' id='submit' value='Submit' name="submit">
            <input type='submit' id='log' value='Check you answer' name="log">
            <input type='hidden' value="<?php echo $number ?>" name="number">
        </ul>
    </form>
    <a href="./index.php" class="back_button">Exit</a>
    <script src="app.js"></script>
</body>

</html>