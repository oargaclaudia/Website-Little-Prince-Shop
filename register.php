<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/register.css"> 
</head>
<body>
    <div id="frm">
        <h1>Register</h1>
        <form action="register_process.php" method="POST">
            <p>
                <label>Email:</label>
                <input type="email" name="email" required>
            </p>
            <p>
                <label>Username:</label>
                <input type="text" name="user" required>
            </p>
            <p>
                <label>Password:</label>
                <input type="password" name="pass" required>
            </p>
            <p>
                <label>Confirm Password:</label>
                <input type="password" name="confirm_pass" required>
            </p>
            <p>
                <input type="submit" value="Register">
            </p>
        </form>
    </div>
</body>
</html>
