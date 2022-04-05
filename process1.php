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
    session_start() ?>
    <?php if (!isset($_SESSION['score'])) {
        $_SESSION['score'] = 0;
    }
    $inputJSON = file_get_contents('php://input');
    if ($_POST) {

        // echo $_POST;
        echo 'hi reached here';
        // $number = $_POST['number'];
        // $total = $_POST['total'];
        // echo $total;
        echo  $inputJSON;
        $selected_choice = $_POST['day'] ?? 'none selected';
        $next = $number + 1;
        $correct_answer = $_SESSION['correct_answer'];
        if ($selected_choice == $correct_answer) {
            $_SESSION['score']++;
        }
        // echo "<p>Question Number: $number </p>";
        // echo "<p>Selected Answer: $selected_choice </p>";
        // echo "<p>Correct Answer: $correct_answer </p>";
        // echo "<p>Score:  $_SESSION[score] </p>";
        $output = array(
            'number' =>    $number,
            'score'        =>    $_SESSION['score'],
            'correct_answer'    =>    $_SESSION['correct_answer'],
            'selected_choice'    =>    $selected_choice,

        );
        echo json_encode($output);
    }
    // if (isset($_POST['submit'])) {


    //     echo json_encode($output);
    //     if ($number == 5) {
    //         header("location:final.php");
    //         exit();
    //     }
    //     // else {
    //     //     header("location:question.php?n=" . $next);
    //     // }
    // }
    // if (isset($_POST['log'])) {
    //     echo "<button type='button' id='back'>Next question</button><br><input type='hidden' value='" . $next . "' id='number'><input type='hidden' value='" . $total . "' id='total'>";
    // }

    ?>

</body>

</html>