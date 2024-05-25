<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .form3 {
    text-align: center;
    margin: 50px auto;
    padding: 20px;
    width: 80%;
    max-width: 400px;
    background:url('images/bk11.jpg') center / cover no-repeat;
    border: 1px solid #000000;
    border-radius: 5px;
}

.form3 h3 {
    color: #ffb700;
    font-size: 20px;
    margin-bottom: 20px;
}

.form3 p {
    font-size: 16px;
    margin-top: 10px;
    color: aliceblue;
}

.form3 .link a {
    color: #ffd900;
    text-decoration: none;
}

.form3 .link a:hover {
    text-decoration: underline;
    color: #00065b;
}
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="styles2.css">
</head>
<body>
<?php
    require('connection.php');
    if (isset($_REQUEST['username'])) {
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);

        // Check if email already exists
        $email_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $result = mysqli_query($con, $email_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) { // if email exists
            if ($user['email'] === $email) {
                echo "<div class='form3'>
                      <h3>Account already exists</h3><br/>
                      <p class='link'>Click here to <a href='signup.php'>Register</a> again.</p>
                      </div>";
            }
        } else {
            $query = "INSERT into `users` (username, password, email)
                      VALUES ('$username', '$password', '$email')";
            $result = mysqli_query($con, $query);
            if ($result) {
                echo "<div class='form1'>
                      <h3>Account Successfully Created</h3><br/>
                      <p class='link'>Click here to <a href='index.php'>Login</a></p>
                      </div>";
            } else {
                echo "<div class='form2'>
                      <h3>Required fields are missing.</h3><br/>
                      <p class='link'>Click here to <a href='signup.php'>Register</a> again.</p>
                      </div>";
            }
        }
    } else {
?>
    <div class="signup-container">
        <h2 style="color:yellow">Sign up</h2>
        <form action="signup.php" method="post">
            <input type="text" class="signup-input" name="username" placeholder="Username" required>
            <input type="email" class="signup-input" name="email" placeholder="Email" required>
            <input type="password" class="signup-input" name="password" placeholder="Password" required>
            <button type="submit" class="signup-button">Sign Up</button>
            <p style="color: white;">Already Have an Account?</p>
            <a href="index.php" class="signup-link">Login</a>
        </form>
        <?php
    }
?>
    </div>
</body>
</html>
