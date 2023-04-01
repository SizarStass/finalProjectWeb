<!DOCTYPE html>

<html>

<head>

    <title>HTML Embedded Form with echo and \</title>

</head>

<body>



    <h1> <span class="form">Submit numbers</span> </h1>

    <hr>


    <!--Form-->

    <form id="form1" method="post" action="game_response.php"> <!--Beginning form tag-->

        <label for="grades">Please enter all the numbers separated by a comma:</label>
        <br>
        <input id="inputIname" type="text" name="grades" placeholder="50,60,100,..." required="required">
        <br>
        <br>
        <input id="submitbutton1" type="submit" name="send" value="Send" />
        <!--Submit button to send form data-->



    </form> <!--Closing form tag-->

</body>

</html>