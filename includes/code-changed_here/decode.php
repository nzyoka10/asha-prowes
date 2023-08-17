<!DOCTYPE html>
<html>
<head>
    <title>Display Hashed Password</title>
</head>
<body>
    <?php
    $plainPassword = 'user_password';
    $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);
    ?>

    <h2>Hashed Password:</h2>
    <p><?php echo $hashedPassword; ?></p>
</body>
</html>
