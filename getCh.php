<?php
require_once('connectDB.php');
?>
<html>
<body>
<h1>Contract Houses</h1>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr>
    <?php
    foreach ($pdo->query("SELECT * FROM contract_house") as $row) {
        ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['Name'] ?></td>
            <td><a class="btn" href="getApp.php?del=<?php echo $row['id'];?>">Delete</a></td>
        </tr>
        <?php
    }
    ?>
</table>

</body>
</html>
