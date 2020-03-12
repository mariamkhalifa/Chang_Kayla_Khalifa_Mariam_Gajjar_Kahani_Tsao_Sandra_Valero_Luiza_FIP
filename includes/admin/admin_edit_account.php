<?php
    require_once '../../load.php';
    confirm_logged_in();

    $id = $_SESSION['user_id'];
    // $id = 'randomID';
    $current_user = getSingleUser($id);
    
    if(!$current_user){
        $message = 'Failed to get user info.';
    }

    if(isset($_POST['submit'])){
        $fname = trim($_POST['fname']);
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $email = trim($_POST['email']);

        if(empty($fname) || empty($username)|| empty($password) || empty($email)) {
            $message = 'Please fill the required fields';
        } else {
            // data pre process, and good to go
            $message = editUser($id, $fname, $username, $password, $email);
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../head.php'; ?>
    <title>Edit Account</title>
</head>
<body>
    <div class="userForms">
        <?php echo !empty($message)? $message:''; ?>
        <form action="admin_edit_account.php" method="post">
        <h2>Edit Account Info</h2>
            <?php if ($current_user):?>
                <?php while($user_info = $current_user->fetch(PDO::FETCH_ASSOC)):?>
                <div class="row">
                    <label>First Name:</label>
                    <input type="text" name="fname" value="<?php echo $user_info['user_fname']; ?>">
                </div>
                <div class="row">
                    <label>Username:</label>
                    <input type="text" name="username" value="<?php echo $user_info['user_name']; ?>">
                </div>
                <div class="row">
                    <label>Password:</label>
                    <input type="password" name="password" value="<?php echo $user_info['user_pass']; ?>">
                </div>
                <div class="row">
                    <label>Email:</label>
                    <input type="email" name="email" value="<?php echo $user_info['user_email']; ?>">
                </div>
                    <button type="submit" name="submit">Save</button>
                <?php endwhile;?>
            <?php endif;?>
        </form>
    </div>
</body>
</html>