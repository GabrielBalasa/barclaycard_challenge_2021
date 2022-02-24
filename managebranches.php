<?php
    if(isset($_POST['createbranch'])){

        $stmt=$pdo->prepare('INSERT INTO  branches (branch_name, branch_address) 
                    VALUES (:branch_name, :branch_address)');
        $values = [
            'branch_name'=>$_POST['branch_name'],
            'branch_address'=>$_POST['branch_address']
        ];
        $stmt->execute($values);

        echo '<p>The new branch has been created!';

    }   else if (isset($_POST['deletebranch'])){

        $delete=$pdo->prepare('DELETE FROM branches WHERE branch_id = :branch_id LIMIT 1');
        $values=[
            'branch_id' => $_POST['branch_id']
        ];
        $delete->execute($values);

        echo '<p>The branch has been deleted!';

    }   else if(isset($_POST['editbranch'])){

        $update=$pdo->prepare('UPDATE branches SET branch_name = :branch_name, branch_address = :branch_address WHERE branch_id = :branch_id');
        $values=[
            'branch_name' => $_POST['branch_name'],
            'branch_address' => $_POST['branch_address'],
            'branch_id' => $_POST['branch_id']
        ];
        $update->execute($values);

        echo '<p>Changes completed!';

    }
?>

<form action="my-account.php" method="POST" class="simpleForm">
    <label>Branch Name: </label><input class="form-group" type="text" name="branch_name" required />
    <label>Branch Address: </label><input class="form-group" type="text" name="branch_address" required />
    <input class="form-group" type="submit" name="createbranch" value="Create" />
</form>

<form action="my-account.php" method="POST" class="">
    <?php
        $select = $pdo->prepare('SELECT * FROM branches ORDER BY branch_id DESC');
        $select->execute();	

        echo '<label>Delete branch:</label><select class="select" name="branch_id">';
        foreach ($select as $data) {
            echo '<option class="align" value="' . $data['branch_id'] . '">' . $data['branch_name'] . '</option>';
        }
        echo '</select>';
    ?>
    <input class="form-group" type="submit" name="deletebranch" value="Delete">
</form>
<form action="my-account.php" method="POST" class="">
    <?php
        $select = $pdo->prepare('SELECT * FROM branches ORDER BY branch_id DESC');
        $select->execute();	

        echo '<label>Edit branch:</label><select class="" name="branch_id">';
        foreach ($select as $data) {
            echo '<option class="align" value="' . $data['branch_id'] . '">' . $data['branch_name'] . " " . $data['branch_address'] .'</option>';
        }
        echo '<input class="form-group" type="text" pattern="[A-Za-z0-9]{1,}" name="branch_name" placeholder="New branch name" required>';
        echo '<input class="form-group" type="text" pattern="[A-Za-z0-9]{1,}" name="branch_address" placeholder="New branch address" required>';
        echo '</select>';
    ?>
    <input type="submit" name="editbranch" value="Change">
</form>