<?php 
include "config/connection.php";
include "config/function.php";

$email = $password = '';
$errors = array("email" => '', 'password' => '');

if (isset($_POST['submit'])) {

    // check email
    if (empty($_POST['email'])) {
        $errors['email'] = "A email is required!";
    } else {
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Email must be valid email address";
        }
    }

    // passward
    if (empty($_POST['password'])) {
        $errors['password'] = "A password is required!";
    }

    if (array_filter($errors)) {
        // echo "form is not valid";
    } else {

        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);

  
        // read from databse
        $sql = "SELECT * FROM parm WHERE parm_email = '$email' LIMIT 1";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {

                $user_data = mysqli_fetch_assoc($result);
                $_SESSION['username'] = $user_data['parm_name'];

                $_SESSION['user_id'] = $user_data["id"];
                if ($user_data['parm_pass'] === $password) {
                  echo 'valid';
                    header('Location: index.php');
                    die;
                }else{
                    $errors['password'] = "Invalid password or Username";
                }
            }else{
                $errors['email'] = "Account doesn't exists";
            }
        }else{
            
            echo 'query error:'.mysqli_error($conn);
        }
    }
}



?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}


.Login{
    margin-left: 450px;

   
    

}
.wholepage{
    display:flex;

}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  

  
  
}

button {
  background-color: navy;
  color: white;
  padding: 12px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}


.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 100px;
}
.loginbutton{
    width:400px;
    text-align: center;
}

span.psw {
  float: right;
  padding-top: 16px;
}

@media screen and (max-width: 250px) {
  span.psw {
     display: block;
     float: none;
  }
  
}
</style>
</head>
<body>
<div class="wholepage">

<div class="Login">
<h2>Login</h2>

<h4>Welcome back! Please login to your account</h4>

<form action="login.php" method="post">
 

  <div class="container">
    <div class="Enter">
        <input type="text" placeholder="Enter Email" name="email" required>
        <div class="red-text"><?php echo $errors['email'];  ?></div>
        <input type="password" placeholder="Enter Password" name="password" required>
        <div class="red-text"><?php echo $errors['password'];  ?></div>
    </div>
    
    <div class="loginbutton">
    <button type="submit" value="Login" name="submit">Login</button></div>
    </div>
  <div class="Haveanacc" style="background-color:#f1f1f1">
    <h4> Don't have an account?<span class="Sign"><a href="signup.php">Sign Up</h4>

  </div>
</form>
</div> 
</div> 
</body>
</html>


