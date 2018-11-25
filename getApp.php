<?php
    require_once('connectDB.php');
    ?>
    <html>
    <body>
    <?php

//    if(isset($_GET['del'])){
//        $id=$_GET['del'];
//        $sql="DELETE FROM  application  WHERE id=:id";
//        $stmt=$this->$pdo->prepare($sql);
//        $stmt->execute();
//    }
    echo "Record deleted successfully";

    ?>
    <h1>Contract Houses</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Description</th>
        </tr>
        <?php
        foreach ($pdo->query("SELECT * FROM application") as $row) {
            ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['Description'] ?></td>
                <td><a class="btn" href="getApp.php?del=<?php echo $row['id'];?>">Delete</a></td>
            </tr>
            <?php
        }
        ?>
    </table>

    </body>
    </html>