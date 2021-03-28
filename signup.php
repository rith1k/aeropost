<?php
    //Include the PHP functions to be used on the page 
    include('common.php'); 

    //Output header and navigation bar
    outputHeader("Register");
    outputNavigation("Signup");

?>

<h1 class = "display-4 text-center">Signup</h1>
<div class ="container border border-warning rounded container-box p-3">
<form action="signup.php" method="POST" autocomplete="off">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4" autocomplete="off">Email</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" name="password" placeholder="Enter Password" required>
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Confirm Password</label>
      <input type="password" class="form-control" id="inputPassword4" name="psw-repeat" placeholder="Confirm Password" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputState">City</label>
      <select id="inputState" class="form-control" name ="city" required>
        <option selected>Choose...</option>
        <option>Abu Dhabi</option>
        <option>Dubai</option>
        <option>Sharjah</option>
        <option>Ajman</option>
        <option>Ras Al Khaimah</option>
        <option>Fujairah</option>
      </select>
    </div>
    <div class="form-group col-8">
        <label for="inputAddress">Address</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Enter Address" name="address" required>
    </div>
</div>
<h5> By creating an account you agree to our terms and conditions.
    <button type="submit" class="btn btn-primary">Register</button>
</form>
</div>
<script>

      function validate(){
        var psw = document.getElementById('pass').value
        var confpsw = document.getElementById('conf-pass').value

        if(psw != confpsw){
            alert("Passwords don't match!");
        }
      }

  </script>

<?php
    $mongo = new MongoClient();
    $db=$mongo->ecommerce;
    $collection=$db->customers;
    
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confpass = $_POST['psw-repeat'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    
    $findCriteria = [

      "email" => $email,
    ];
    
    $cursor = $db->customers->find($findCriteria);

    
    if($password == $confpass && $_POST)
    {
    $insert = array(
        "email"=> $_POST['email'],
        "password"=> $_POST['password'],
        "city" => $_POST['city'],
        "address" => $_POST['address']
    
    );

      if($cursor->count() === 1){
        echo 'Email already in use, Please login';
        return;
      }
    
        if($collection->insert($insert))
        {
            echo "data is inserted";
            echo '<script>window.location.href = "login.php";</script>';
        }
        else{
            echo "some Issue";
        }
    
    }
    elseif($password != $confpass){
        echo "Passwords don't match!";
    }
    //Output the footer
    outputFooter();
?>