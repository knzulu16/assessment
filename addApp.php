<?php
require_once('connectDB.php');

if(isset($_POST['description'])){

    $description=$_POST['description'];

    //Check if the field is completed
    if (strlen($_POST['description']) ==0) {
        $_SESSION['error'] = " Field is required";
        header("Location:addApp.php");
        error_log("Field entry fail");
        return;
    }

    //Insert the data to the database
    $sql = 'INSERT INTO application(description) VALUES (:descr)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array (
        ':descr' => $_POST['description']));
    $_SESSION['success']= "Record added";
    return;
}





   ?>




<!DOCTYPE>
<html>
<head>
    <meta charset="utf-8">
    <title></title>

</head>

<body>
<h1>Enter Application</h1>
<form method="POST">
    <input type="text" name="description" placeholder="enter name application">
    <input type="submit" name="submit">
</form>
</body>

</html>


