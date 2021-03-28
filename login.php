

<?php    //Include the PHP functions to be used on the page 
    include('common.php'); 

    //Output header and navigation bar
    outputHeader("Login");
    outputNavigation("Login");
?>
    <div id="holder">
    <h1 class = "display-4 text-center">Login</h1>
    <div class ="container border border-warning rounded container-box p-3">
    <form method="POST">
    <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" name="email">
    <small id="emailHelp" class="form-text text-muted">We will never share your email with anyone else.</small>
    </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
    </div>
    <button type="submit" class="btn btn-primary" onclick="login()">Submit</button>
    </form>
    </div>
    </div>
    <p id="ErrorMessages"></p>

  <script>

  //Login script 
var loggedInStr = "Logged in <button onclick='logout()'>Logout</button>";
var loginStr = document.getElementById("holder").innerHTML;
var request = new XMLHttpRequest();

      window.onload = checkLogin;

        //Checks whether user is logged in.
        function checkLogin() {
            //Create event handler that specifies what should happen when server responds
            request.onload = function () {
                if (request.responseText === "ok") {
                    document.getElementById("holder").innerHTML = loggedInStr;
                }
                else {
                    console.log(request.responseText);
                    document.getElementById("holder").innerHTML = loginStr;
                }
            };
            //Set up and send request
            request.open("GET", "check_login.php");
            request.send();
        }
console.log("hello")
function login() {
    //Create event handler that specifies what should happen when server responds
    request.onload = function () {
        //Check HTTP status code
        if (request.status === 200) {
            //Get data from server
            var responseData = request.responseText;

            //Add data to page
            if (responseData === "ok") {
                document.getElementById("holder").innerHTML = loggedInStr;
                document.getElementById("ErrorMessages").innerHTML = "";//Clear error messages
            }
            else
                document.getElementById("ErrorMessages").innerHTML = request.responseText;
        }
        else
            document.getElementById("ErrorMessages").innerHTML = "Error communicating with server";
    };

    //Extract login data
    var usrEmail = document.getElementById("email").value;
    var usrPassword = document.getElementById("password").value;

    //Set up and send request
    request.open("POST", "customer_login.php");
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send("email=" + usrEmail + "&password=" + usrPassword);
}


</script>
  <?php
  
  //Output the footer
  outputFooter();
  ?>