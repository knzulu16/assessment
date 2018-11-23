<?php

if(isset($_POST['Name'])){

    if(strlen($_POST['Name']==0)){
        $_SESSION['error']="Field required";
        header('Location:addConsul.php');
        error_log('error required');
        return;
    }
    $sql='INSERT INTO';

}




?>




  <!DOCTYPE>
  <html>
    <body>
  <h1>Enter Consultant<h1>
    <form method="POST">
        <input type="text" name="Name" placeholder="Enter name">
        <input type="date" placeholder="Enter date of birth">
        <input type="submit" name="submit">
    </form>
    </body>

    </html>