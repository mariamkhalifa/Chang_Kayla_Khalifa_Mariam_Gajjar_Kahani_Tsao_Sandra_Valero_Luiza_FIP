<?php 
    require_once '../../load.php';
    confirm_logged_in();

    $currentId = $_SESSION['user_id'];
    // echo $currentId;
    // exit;

    $users = getAllUsers();
    if(!$users){
        $message = 'Failed to get user list';
    }

    if(isset($_GET['id'])){
        $user_id = $_GET['id'];
        $delete_result = deleteUser($user_id, $currentId);
        $message = $delete_result;

        if(!$delete_result){
            $message = 'Failed to delete user';
        }
    }

    if(!empty($_GET['delete'])){
        $msg = $_GET['delete'];
        $message = '<p class="actions">'.$msg.'</p>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../template/head.php'; ?>
    <title>Delete User</title>
</head>
<body>
    <div class="userCMS">
        <div id="deleteT">
            <h2>Delete User</h2><p><a href="index.php">Go Back</a></p>
            <?php echo !empty($message)?$message:'';?>
            <table>
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>User Firstname</th>
                        <th>Username</th>
                        <th>User Email</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($user = $users->fetch(PDO::FETCH_ASSOC)):?>
                    <tr>
                        <td><?php echo $user['user_id'];?></td>
                        <td><?php echo $user['user_fname'];?></td>
                        <td><?php echo $user['user_name'];?></td>
                        <td><?php echo $user['user_email'];?></td>
                        <td><a href="admin_delete_user.php?id=<?php echo $user['user_id'];?>">Delete</a></td>
                    </tr>
                <?php endwhile;?>
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript" src="../js/main.js"></script>
</body>
</html>