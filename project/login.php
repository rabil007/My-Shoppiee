<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN/SIGNUP</title>
<div class="login-page">
  <div class="form">
    
    <h1>LOGIN</h1><br>
    <form class="login-form" method="post">
      <input type="text" name="name" placeholder="username" required>
      <input type="password" name="pass" placeholder="password" required>
      <button name="ok">login</button>
      <p class="message">Not registered? <a href="reg.php">Create an account</a></p>
      <p class="message" > Login as a <a href="dashboardlogin.php"><u>admin</u></a></p>
    </form>

    <?php
    session_start();
    include_once('connection.php');
    if(isset($_POST['ok'])){
      $name = $_POST['name'];
      $pass = $_POST['pass'];
      

      $sql1 = "SELECT * FROM user WHERE uname='$name'";

      $data1 = mysqli_query($connection,$sql1);

      $num = mysqli_num_rows($data1);

      if($num>0){
        $row = mysqli_fetch_array($data1);
        if(password_verify($pass,$row['pass'])){
          $_SESSION['id'] = $row['id'];
          $_SESSION['username']=$name;
          header("location:index.php");
        }else{
          echo "password missmatch";
        }
      }else{
        echo "not found";
      }

      
    }
    ?>
    
  </div>
</div>



    
</body>
<style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: orange;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: orange;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  background: orange; /* fallback for old browsers */
  /* background: rgb(141,194,111); */
  /* background: linear-gradient(90deg, rgba(141,194,111,1) 0%, rgba(118,184,82,1) 50%); */
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}
h1{
    
    text-shadow: #FFA500 5px 5px 5px;
}
    </style>
</html>