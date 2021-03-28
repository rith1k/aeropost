<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
    </head>
    <body>
        <form action="register.php" method="post" method="post">
            <div class="container">
              <h1>Register</h1>
              <p>Please fill in this form to create an account.</p>
              <hr>
          
              <label for="username"><b>Username</b></label>
              <input type="text" placeholder="Enter Username" name="username" required>
          
              <label for="psw"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="password" id="pass" required>
          
              <label for="psw-repeat"><b>Repeat Password</b></label>
              <input type="password" placeholder="Repeat Password" name="psw-repeat" id="conf-pass" required>
              <hr>
          
              <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
              <button type="submit" class="registerbtn" onclick="validate()">Register</button>
            </div>
          
            <div class="container signin">
              <p>Already have an account? <a href="login.html">Log in</a>.</p>
            </div>
          </form>

          <script>

              function validate(){
                var psw = document.getElementById('pass').value
                var confpsw = document.getElementById('conf-pass').value

                if(psw != confpsw){
                    alert("Passwords don't match!");
                }
              }

          </script>
    </body>
</html>
<?php 

$mongo = new MongoClient();
$db=$mongo->ecommerce;
$collection=$db->customers;

$username = $_POST['username'];
$password = $_POST['password'];
$confpass = $_POST['psw-repeat'];


if($password == $confpass && $_POST)
{
$insert = array(
    "username"=> $_POST['username'],
    "password"=> $_POST['password']
);

    if($collection->insert($insert))
    {
        echo "data is inserted";
    }
    else{
        echo "some Issue";
    }

}
elseif($password != $confpass){
    echo "Passwords don't match!";
}

?>