<?php

require_once ''

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../head.php'; ?>
    <title>Dashboard</title>
</head>
<body>
    <h1>what is your name?</h1>
    <?php echo !empty($message)?$message: ''; ?>
</body>
</html>