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
            <input type='button' id='submit' value='Submit' name="submit" onClick="check_data()">
            <button type='button' id='log' name="log" onClick="check_data()" ;>Check</button>

            <input type='hidden' value="<?php echo $number ?>" name="n" id="number">
            <!-- <input type='hidden' id='submit' value="<?php echo $actual_day ?>" name="correct_answer"> -->

        </ul>

    </form>

    <script>
        function check_data() {
            var form_element = document.getElementsByClassName("form_data");

            var form_data = new FormData();

            //   for (var count = 0; count < form_element.length; count++) {
            //     form_data.append(form_element[count].name, form_element[count].value);
            //   }

            var day = document.getElementsByName("day");
            var number = document.getElementById("number").value;
            var selected = Array.from(day).find((item) => item.checked);
            console.log(selected.value, number);
            // document.getElementById("submit").disabled = true;
            const postObj = {
                number: number,
                day: selected.value
            };
            var ajax_request = new XMLHttpRequest();
            let post = JSON.stringify(postObj);


            ajax_request.onreadystatechange = function() {
                if (ajax_request.readyState == 4 && ajax_request.status == 200) {
                    // document.getElementById("submit").disabled = false;

                    // var response = JSON.parse(ajax_request.responseText);
                    console.log(ajax_request.responseText);

                    //   if (response.success != "") {
                    //     document.getElementById("sample_form").reset();

                    //     document.getElementById("message").innerHTML = response.success;

                    //     setTimeout(function () {
                    //       document.getElementById("message").innerHTML = "";
                    //     }, 5000);

                    //     document.getElementById("name_error").innerHTML = "";

                    //     document.getElementById("email_error").innerHTML = "";

                    //     document.getElementById("website_error").innerHTML = "";
                    //     document.getElementById("comment_error").innerHTML = "";
                    //     document.getElementById("gender_error").innerHTML = "";
                }
                // else {
                //     //display validation error
                //     document.getElementById("name_error").innerHTML = response.name_error;
                //     document.getElementById("email_error").innerHTML = response.email_error;
                //     document.getElementById("website_error").innerHTML =
                //       response.website_error;
                //     document.getElementById("comment_error").innerHTML =
                //       response.comment_error;
                //     document.getElementById("gender_error").innerHTML =
                //       response.gender_error;
                //   }
                // }
            };
            ajax_request.open("POST", "process.php", true);
            ajax_request.setRequestHeader(
                "Content-type",
                "application/json; charset=UTF-8"
            );

            ajax_request.send(post);
        }
    </script>
</body>

</html>