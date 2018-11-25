<?php
    require_once('connectDB.php');

if(isset($_POST["action"]) and $_POST["action"]=="Delete"){
    $pdo->prepare('DELETE FROM application WHERE id=?')->execute([$_POST['id']]);
}
?>
    <html>
    <head>
        <style>
            form {
                margin: 0;
            }
        </style>
    </head>
    <body>

    <?php include "menu.php" ?>

    <h1>Application</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        <?php
        foreach ($pdo->query("SELECT * FROM application") as $row) {
            ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['Description'] ?></td>
                <td>
                    <form method="post" action="getApp.php">
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
        <a href="addApp.php">Capture Application</a>
    </p>

    </body>
    </html>