<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="#">Brand</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="catalog-page.php">Catalog</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="product-page.php">Product</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="Account.php">Account</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="shopping-cart.php"><i class='fas fa-shopping-cart' style='font-size:25px'></i></a></li>
                    <li class="nav-item" role="presentation">
                        <div class="container h-100">
                            <div class="d-flex justify-content-center h-100">
                                <form class="searchbar" action="search.php" method="get">
                                    <input class="search_input" type="text" name="search" placeholder="Search...">
                                    <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
                                </form>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <main class="page registration-page" id="proff">
        <div class="limiter" id="LoginPara" style="display: block">
            <div class="container-login100">
                <div class="wrap-login100">
                    <div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
                        <span class="login100-form-title-1">
                            Sign In
                        </span>
                    </div>

                    <form class="login100-form" method="POST">
                        <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                            <span class="label-input100">Username</span>
                            <input class="input100" type="text" name="email" placeholder="Enter username" id="name">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
                            <span class="label-input100">Password</span>
                            <input class="input100" type="password" name="password" placeholder="Enter password" id="password">
                            <span class="focus-input100"></span>
                        </div>
                        <div>
                            <a href="registration.php" class="txt1">
                                Don't have an account? Create one!
                            </a>
                        </div>



                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn " onclick="login()">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <p style="color: red" id="ErrorMessages"></p>

    </main>
    <script>
        //Global variables 
        var loggedInStr = "Logged in <button onclick='logout()'>Logout</button>";
        var loginStr = document.getElementById("LoginPara").innerHTML;
        var request = new XMLHttpRequest();

        //Check login when page loads
        window.onload = checkLogin;

        //Checks whether user is logged in.
        function checkLogin() {
            //Create event handler that specifies what should happen when server responds
            request.onload = function() {
                if (request.responseText === "ok") {
                    document.getElementById("LoginPara").innerHTML = loadContent();
                    document.getElementById("LoginPara").style.display = "none";

                    request.open("GET", "check_profile.php");
                    request.send();

                } else {
                    console.log(request.responseText);
                    document.getElementById("LoginPara").innerHTML = loginStr;

                }
            };
            //Set up and send request
            request.open("GET", "check_login.php");
            request.send();
        }

        //Attempts to log in user to server
        function login() {
            var usrName = document.getElementById("email").value;
            var usrPassword = document.getElementById("password").value;

            //Create event handler that specifies what should happen when server responds
            request.onload = function() {
                //Check HTTP status code
                if (request.status === 200) {
                    //Get data from server
                    var responseData = request.responseText;

                    //Add data to page
                    if (responseData === "ok") {

                        loadContent();
                        document.getElementById("LoginPara").style.display = "none";

                        var usrNme = document.getElementById("email").value;
                        var usrPssword = document.getElementById("password").value;

                        document.getElementById("usrnm").innerHTML = "";


                        document.getElementById("ErrorMessages").innerHTML = ""; //Clear error messages
                    } else
                        document.getElementById("ErrorMessages").innerHTML = request.responseText;
                } else
                    document.getElementById("ErrorMessages").innerHTML = "Error communicating with server";
            };

            //Extract login data

            //Set up and send request
            request.open("POST", "customer_login.php");
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send("email=" + usrName + "&password=" + usrPassword);
        }

        

        //Logs the user out.
        function logout() {

            //Create event handler that specifies what should happen when server responds
            request.onload = function() {
                checkLogin();
            };
            //Set up and send request
            request.open("GET", "logout.php");
            request.send();

        }
    </script>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>


</body>