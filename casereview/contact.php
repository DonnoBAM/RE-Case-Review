<?php

include("./connection/config.php");
include("./helpers/SystemOperators.php");

$con = connect();
$so = new SystemOperators();

if (isset($_POST["btnSubmit"])) {

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $fback = $_POST["fback"];
    $email = $_POST["email"];

    $sql = 'INSERT INTO userinfo (fname, lname, fback, email)
            VALUES (?, ?, ?, ?)';

    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssss", $fname, $lname, $fback, $email);

    if ($stmt->execute()) {
        echo "<script>
        alert('Thank you for your feedback, Agent.');
        window.location.href='index.php#contact';
        </script>";
    } else {
        echo "Error: " . $stmt->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>

    <style>
        body{
            background-color: black;
        }
        form{
            text-align: center;
            color: white;
        }
        button[type=submit] {
            color: black;
            border: white;
            border-radius: 5px;
        }
        input[type="text"] {
            border: 2px solid white;
            border-radius: 5px;
            box-sizing: border-box;
            width: 20%;
            padding: 10px;
            margin: 8px 0;
        }
    </style>

</head>
<body>
     <form action="" method="post">
        <div class="form-fields">
            <div class="form-items">
                <label for="">What is your first name?:</label>
                <input type="text" name="fname" required>
            </div>
            <div class="form-items">
                <label for="">What is your last name?</label>
                <input type="text" name="lname" required>
            </div>
            <div class="form-items">
                <label for="">Is there anything you'd like to tell us?</label>
                <input type="text" name="fback" required>
            </div>
            <div class="form-items">
                <label for="">Please write down your email for contact purposes.</label>
                <input type="text" name="email" required>
            </div>
            <button type="submit" name="btnSubmit">Submit</button>
        </div>
    </form>
</body>
</html>