<!---->
<!--    --><?php
//
   require_once('connectDB.php');

    if(isset($_POST['name'])){

         $name=$_POST[name];
         //Check if the field is completed
        if (strlen($_POST['name']) ==0) {
            $_SESSION['error'] = " Field is required";
            header("Location:addApp.php");
            error_log("Field entry fail");
            return;
        }

        //Insert the data to the database
        $sql = 'INSERT INTO contract_house(name) VALUES (:nm)';
        print($sql);
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array (
            ':nm' => $_POST['name']));
        $_SESSION['success']= "Record added";
        return;
    }



//        $sql = "UPDATE contract_house SET name=? WHERE id=?";
//        $stmt= $dpo->prepare($sql);
//        $stmt->execute([$name]);

//    ?>




    <!DOCTYPE>
    <html>
    <head>
        <meta charset="utf-8">
        <title></title>

    </head>

        <body>
        <h1>Enter Contact house</h1>
        <form method="POST">
        <input type="text" name="name" placeholder="enter name contract house">
        <input type="submit" name="submit">
        </form>
        </body>

    </html>
