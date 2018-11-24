<?php
require_once('connectDB.php');
?>
<?php


   if(isset($_POST['Name']) && isset($_POST['DOB']) && isset($_POST['applicationId']) && isset($_POST['ContractHouseId'])){

        if(strlen($_POST['Name']==0 && strlen($_POST['DOB']==0 && strlen($_POST['applicationId']==0 && strlen($_POST['ContractHouseId']))))){
            $_SESSION['error']="Field required";
            header('Location:addConsul.php');
            error_log('error required');
            return;
        }

        $sql = 'INSERT INTO consultants(Name,DOB,applicationId,ContractHouseId) VALUES (:Nm,:dob,:appId,contrHousId)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array (
            ':Nm' => $_POST['Name'],
            ':dob'=>$_POST['DOB'],
            ':appId'=>$_POST['applicationId'],
            ':contrHousId'=>$_POST['ContractHouseId']
        ));
        $_SESSION['success']= "Record added";
        return;
}

?>

<!DOCTYPE>
<html>
<body>
<h1>Enter Consultant<h1>
        <form method="POST">
            <input type="text" name="Name" placeholder="Enter name">
            <input type="date" name="DOB" placeholder="Enter date of birth">

            <input type="text" name="applicationId" placeholder="Enter application Id">

            <select name="ContractHouseId">
                <?php
                foreach ($pdo->query("SELECT * FROM contract_house") as $row) {
                    ?>
                    <option value="<?= $row['id'] ?>">
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