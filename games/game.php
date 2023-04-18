<!DOCTYPE html>

<html>

<head>
    <title>HTML Embedded Form with echo and \</title>
    <link rel="stylesheet" href="template/style.css">
</head>

<body>

    <?php include 'template/nav.php';
    require_once "functions.php";
    $randLetters = generateRandomLetters();

    ?>

    <form id="form1" method="post" action="">
        <h1>Game lvl 1</h1>
        <label for="letters">Please enter all the letters in alphabetical order and separate them by a comma:</label>


        <p> <?php echo $randLetters;
            echo "<br>";
            $randomLettersArr = explode(',', $randLetters);
            sort($randomLettersArr);
            $sortedRandLetters = implode("", $randomLettersArr);
            $flag = true;
            echo $sortedRandLetters;
            ?></p>
        <br>
        <input id="inputIname" type="text" name="letters" placeholder="A,B,C,..." required="required">
        <input type="hidden" name="randNum" value="<?php echo $sortedRandLetters; ?> ">
        <br>
        <br>
        <button type="submit" id="submitbutton1">Send</button>
        <!--Submit button to send form data-->



    </form>

    <section class="Message" id="message">
        <!-- Display the response from the server here -->
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#submitbutton1').click(function(e) {
                e.preventDefault(); // Prevent default form submission behavior
                $.ajax({
                    url: 'game1_response.php',
                    type: 'POST',
                    data: $('#form1').serialize(),
                    success: function(response) {
                        $('#message').html(response); // Display the response from the server
                    }
                });
            });
        });
    </script>



</body>

</html>