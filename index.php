<?php
include 'config.php';
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: home.html");
    exit();
}
 
if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = hash('sha256', $_POST['password']); 
    
    // Hash the input password using SHA-256
 
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
 
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: home.html");
        exit();
    } else {
        echo "<script>alert('Email atau password Anda salah. Silakan coba lagi!')</script>";
    }
}
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="try.css">    
</head>
<body>
<div class="container">
    <form action="index.php" method="POST" class="login-email">
        <!-- Tombol close -->
        <button type="button" class="btn-close" onclick="window.location.href='saran.html';">?</button>
        
        <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p><br>
        <div class="input-group">
            <input type="email" placeholder="Email" name="email" required>
        </div>
        <div class="input-group">
            <input type="password" placeholder="Password" name="password" required>   
        </div>
        <center><div class="input-group-login">
            <button name="submit">Login</button>
        </div></center><br>
        <h3><center><p>&copy;@aprianoap_</p></center></h3>
    </form>
</div>

</body>
</html>

<script>
    $( "see_pass" ).click(function(){
        var x = documen.getElementById("password");
                if (input.type == "password") {
                    input.type = "text";
                } else {
                    input.type = "password"
                }
    });
</script>