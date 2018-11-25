<?php
//
   require_once('connectDB.php');

    if(isset($_POST['name'])){


         //Check if the field is completed
        if (strlen($_POST['name']) ==0) {
            $_SESSION['error'] = " Field is required";
//            header("Location: getCh.php");
            error_log("Field entry fail");
            return;
        }

        //Insert the data to the database
        $sql = 'INSERT INTO contract_house(name) VALUES (:nm)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array (
            ':nm' => $_POST['name']));
//        $_SESSION['success']= "Record added";
        header("Location: getCh.php");
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

        <?php include "menu.php" ?>

        <h1>Enter Contact house</h1>
        <form method="POST" >
        <input type="text" name="name" placeholder="enter name contract house" required>
        <input type="submit" name="submit">
        </form>
        </body>

    </html>
