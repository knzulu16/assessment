<?php
require_once('connectDB.php');
?>
<?php

$stmt = $pdo->prepare('SELECT * FROM consultants WHERE id = ?');
$stmt->execute([$_GET['id']]);
$consultant = $stmt->fetch();  // TODO: Handle error

if(isset($_POST['Name']) && isset($_POST['DOB']) && isset($_POST['applicationId']) && isset($_POST['ContractHouseId'])){

    if(strlen($_POST['Name']==0 && strlen($_POST['DOB']==0 && strlen($_POST['applicationId']==0 && strlen($_POST['ContractHouseId']))))){
        $_SESSION['error']="Field required";
        header('Location:addConsul.php');
        error_log('error required');
        return;
    }

    $sql = 'UPDATE consultants SET Name=:Nm, DOB=:dob, ApplicationId=:appId, ContractHouseId=:contrHousId WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array (
        ':id' => $_GET['id'],
        ':Nm' => $_POST['Name'],
        ':dob'=>$_POST['DOB'],
        ':appId'=>$_POST['applicationId'],
        ':contrHousId'=>$_POST['ContractHouseId']
    ));
    header("Location: getConsul.php");
    return;
}

?>

<!DOCTYPE>
<html>
<body>
<?php include "menu.php" ?>
<h1>Enter Consultant<h1>
        <form method="POST">
            <input type="text" name="Name" required placeholder="Enter name" value="<?= $consultant['Name'] ?>">
            <input type="date" name="DOB" required placeholder="Enter date of birth" value="<?= $consultant['DOB'] ?>">

            <select name="applicationId">
                <?php
                foreach ($pdo->query("SELECT * FROM application") as $row) {
                    ?>
                    <option value="<?= $row['id'] ?>"
                            <?php if ($row['id'] == $consultant['ApplicationId']) { ?> selected <?php } ?>
                    >
                        <?= $row['Description'] ?>
                    </option>
                    <?php
                }
                ?>
            </select>

            <select name="ContractHouseId">
                <?php
                foreach ($pdo->query("SELECT * FROM contract_house") as $row) {
                    ?>
                    <option value="<?= $row['id'] ?>"
                        <?php if ($row['id'] == $consultant['ContractHouseId']) { ?> selected <?php } ?>
                    >
                        <?= $row['Name'] ?>
                    </option>
                    <?php
                }
                ?>
            </select>

            <input type="submit" name="submit">
        </form>
</body>

</html>