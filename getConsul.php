<?php
require_once("connectDB.php");
?>
<tml>
    <head>
        <style>
            form{
                display: inline-block;
                margin:0;
            }
        </style>
    </head>
    <body>
    <?php
    if(isset($_POST["action"]) and $_POST["action"]==="Delete"){
        $pdo->prepare('DELETE FROM consultants WHERE id=? ')->execute([$_POST['id']]);

    }


    ?>

    <?php include "menu.php" ?>

    <h1>Consultants Grid</h1>
    <table border="1">
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>DOB</th>
            <th>Age</th>
            <th>Application</th>
            <th>Contract Houses</th>
            <th>Action</th>
        </tr>
        <?php
        $sql = 'SELECT consultants.*, application.Description AS ApplicationDescription, contract_house.Name AS ContractHouseName
            FROM consultants
            INNER JOIN application ON ApplicationId = application.id
            INNER JOIN contract_house ON ContractHouseId = contract_house.id
        ';
        foreach ($pdo->query($sql) as $row){
            $now = new DateTime();
            $dob = new DateTime($row['DOB']);
            $ageInterval =  $now->diff($dob);
            $ageInYears = $ageInterval->y;
            ?>
             <tr>
                 <td><?=$row['id']?></td>
                 <td><?=$row['Name']?></td>
                 <td><?=$row['DOB']?></td>
                 <td><?=$ageInYears?></td>
                 <td><?=$row['ApplicationDescription']?></td>
                 <td><?=$row['ContractHouseName']?></td>
                 <td>

                     <form method="get" action="updateConsul.php">
                        <input type="hidden" name="id" value="<?= $row['id']?>">
                        <input type="submit" value="Update">
                    </form>

                     <form method="post" action="getConsul.php">
                        <input type="hidden" name="id" value="<?= $row['id']?>">
                        <input type="submit" name="action" value="Delete">
                    </form>

                 </td>

             </tr>
        <?php
         }

?>
    </table>

    <p>
        <a href="addConsul.php">Capture Consultant</a>
    </p>

    </body>
    <html>
