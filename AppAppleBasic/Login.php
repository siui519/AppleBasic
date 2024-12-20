<?php
    include 'connection.php';
    session_start();
     
    if (isset($_SESSION['username'])) {
        header("Location: homepage.php");
        exit();
    }
     
    if (isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = hash('sha256', $_POST['password']); // Hash the input password using SHA-256
     
        $sql = "SELECT idmuser, kdmuser FROM tblmusers WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            //var_dump($row['kdmuser']);
            $_SESSION['idmuser'] = $row['idmuser'];
            $_SESSION['username'] = $row['kdmuser'];
            header("Location: homepage.php");
            exit();
        } else {
            echo "<script>alert('Email atau password Anda salah. Silakan coba lagi!')</script>";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' type='text/css' href='CSS/Style.css'>
</head>
<body>
    <div class='clock' id='dc'></div>  
    <div class='dH' id='day_year'></div>    
    <div class="login-email">
        <form action="" method="POST" class="form-email">
            <p class="login-text">Login</p>
            <div class="input-group">
                <label for="uname"><b>Username</b></label>
                <input type="email" placeholder="Enter Email" name="email" required>
            </div>
            <div class="input-group">
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Login</button>
            </div>
        </form>   
    </div>  
</body>
<script src="scripts/Digital_Time_Script.js"></script>
</html> 