<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Form</title>
    <?php echo '<link href="survey.css" rel="stylesheet">';?>
</head>
<body>
    <!-- Heading-->
    <div class= "header_container">
            <div class="inline_logo">
            <h1>Cancellation Survey</h1>
            <img src="https://png.pngtree.com/png-clipart/20200214/ourlarge/pngtree-goodbye-dialog-chat-bubble-png-image_2138987.jpg" alt="">
        </div>
        <p>Thank you for your feedback.</p>
        <br>
        <hr>
    </div>
    <?php
        //print_r($_POST); //show POSTed variables
        if(isset($_POST['submit'])){ //when form is submitted write to file
            $data = $_POST['reason'];
            $fp = fopen('survey.txt', 'w');
            fwrite($fp, 'Name: '); fwrite($fp, $_POST['name'].PHP_EOL);
            fwrite($fp, 'Account #: '); fwrite($fp, $_POST['accountNumber'].PHP_EOL);
            fwrite($fp, 'Used for: '); fwrite($fp, $_POST['timeWith'].PHP_EOL);
            fwrite($fp, 'How often: '); fwrite($fp, $_POST['lengthUsed'].PHP_EOL);
            fwrite($fp, 'Would use again: '); fwrite($fp, $_POST['reuse'].PHP_EOL);
            fwrite($fp, 'Reason: '); fwrite($fp, $_POST['reason'].PHP_EOL);
            fclose($fp);
        }
    ?>
    <div class="survey_container">
        <form action="" method="POST">
        <div class="row">
            <div class="column">
                <h3>Your Information</h3>
                <p>Name:&emsp;&emsp;&emsp;&emsp;&ensp;&nbsp; <input type="text" name="name" value=""></p>
                <p>Account Number: <input type="text" name="accountNumber" value=""></p>
                <br>
            </div>
            <div class="column">
                <h3>How long were you with us?</h3>
                <input type="radio" name="timeWith" value="Less than a month">
                <label for="oneMonth">Less than a month</label><br>
                <input type="radio" name="timeWith" value="1-3 Months">
                <label for="mulMonths">1-3 months</label><br>
                <input type="radio" name="timeWith" value="Over half a year">
                <label for="halfYear">Over half a year</label><br> 
            </div>
        </div>
        <div class="row">
            <div class="column">
                <h3>How often did you use our service?</h3>
                <input type="radio" name="lengthUsed" value="Weekly">
                <label for="Weekly">Weekly</label><br>
                <input type="radio" name="lengthUsed" value="Biweekly">
                <label for="Biweekly">Biweekly</label><br>
                <input type="radio" name="lengthUsed" value="Monthly">
                <label for="Monthly">Monthly</label><br> 
                <input type="radio" name="lengthUsed" value="Yearly">
                <label for="Yearly">Yearly</label><br> 
            </div>
            <div class="column">
                <h3>Would you consider using our service again?</h3>
                <select name="reuse">
                    <option value="Unsure">Unsure</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
            <h3>Reason for leaving:</h3>
            <textarea name="reason" value=""></textarea>
            <br>
            <input type="submit" name="submit" value="Submit" class="button">
        </form>
        <br>
        <button type="submit" class="button" onclick="openPopup()">Check</button>
        <div class="popup" id="popup">
                <img src="check-mark.png">
                <h2>Thank you!</h2>
                <p>Your survery has been submitted.</p>
                <button type="button">OK</button>
            </div>
    </div>
    <script src= "survey.js"></script>
</body>
</html>