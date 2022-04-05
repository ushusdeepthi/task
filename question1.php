<?php session_start() ?>
<?php
$number = (int)$_GET['n'];
if ($number == 1) {
    $_SESSION['score'] = 0;
    $_SESSION['correct_answer'] = '';
}
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
    // $timestamp = mt_rand(1, time());
    $timestamp = rand(strtotime("Jan 01 2015"), strtotime("Nov 01 2016"));
    $randomDate = date("d M Y", $timestamp);
    $actual_day = date('l', $timestamp);
    $_SESSION['correct_answer'] = $actual_day;
    if ($_SESSION['score']) {
        echo $_SESSION['score'];
    }
    if ($_SESSION['correct_answer']) {
        echo $_SESSION['correct_answer'];
    }
    ?>
    <div id="current_date">
        <button id="button">Present Date</button>
    </div>
    <div class="current"> Question <?php echo $number ?>/5 </div>
    <p class="question"><?php echo $randomDate ?></p>
    <span id="message"></span>
    <form id="sample_form" action="" method="">
        <ul class="choices">
            <input type='radio' id='monday' name='day' value='Monday'>
            <label for='monday'>Monday</label><br>
            <input type='radio' id='css' name='day' value='Tuesday'>
            <label for='tuesday'>Tuesday</label><br>
            <input type='radio' id='wednesday' name='day' value='Wednesday'>
            <label for='wednesday'>Wednesday</label> <br />
            <input type='radio' id='thursday' name='day' value='Thursday'>
            <label for='thursday'>Thursday</label> <br />
            <input type='radio' id='friday' name='day' value='Friday'>
            <label for='friday'>Friday</label> <br />
            <input type='radio' id='saturday' name='day' value='Saturday'>
            <label for='saturday'>Saturday</label> <br />
            <input type='radio' id='sunday' name='day' value='sunday'>
            <label for='sunday'>sunday</label> <br />
            <input type='button' id='submit' value='Submit' name="submit" onClick="check_data();">
            <button type='button' id='log' name="log" onClick="check_data();">Check</button>

            <input type='hidden' value="<?php echo $number ?>" name="n" id="number">


        </ul>

    </form>

    <script>
        function check_data() {
            var day = document.getElementsByName("day");
            var number = document.getElementById("number").value;
            var selected = Array.from(day).find((item) => item.checked);
            console.log(selected.value, number);
            // document.getElementById("submit").disabled = true;
            // const postObj = {
            //     number: number,
            //     day: selected.value
            // };
            let fd = new FormData();
            fd.append("number", number)
            fd.append("day", selected.value);
            fetch("process1.php", {
                method: 'post',
                body: fd,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                }
            }).then((response) => {

                return response.text()
            }).then((data) => {

                console.log(data)
            }).then((res) => {
                if (res.status === 201) {
                    console.log("Post successfully created!")
                }
            }).catch((error) => {
                // console.log(error)
            })
        }
    </script>
</body>

</html>