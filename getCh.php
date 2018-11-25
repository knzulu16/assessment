<?php
require_once('connectDB.php');

if (isset($_POST['action']) and $_POST['action'] === 'Delete') {
    $pdo->prepare('DELETE FROM contract_house WHERE id=?')->execute([$_POST['id']]);
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

<h1>Contract Houses</h1>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    <?php
    foreach ($pdo->query("SELECT * FROM contract_house") as $row) {
        ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['Name'] ?></td>
            <td>
                <form method="post" action="getCh.php">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <input type="submit" name="action" value="Delete">
                </form>
            </td>
        </tr>
        <?php
    }
    ?>
</table>

<p>
    <a href="addCH.php">Capture  Contract House</a>
</p>

</body>
</html>
