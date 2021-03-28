<!DOCTYPE html>
<html>
    <head>
        <title>Customer Login</title>
    </head>
    <body>
        <h1>Customer Login</h1>

        <form action="login.php" method="post">
            Username: <input type="text" name="username" required>
            Password: <input type="password" name="password" required>
            <input type="submit">
        </form>
    </body>
</html>
<?php 

session_start();

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

$mongoClient = new MongoClient();
$db = $mongoClient->ecommerce;
$collection = $db->customers;

$findCriteria = [
    "username" => $username,
];

$cursor = $db->customers->find($findCriteria);

if($cursor->count()==0){
    echo 'username not recognized';
    return;
}
else if($cursor->count() > 1){
    echo 'Database Error: Multiple customers have same email address';
    return;
}

$customer = $cursor->getNext();

if($customer['password'] != $password){
    echo 'Incorrect Password!';
    return;
}

$_SESSION['loggedInUserName'] = $username;

echo 'ok';


?>