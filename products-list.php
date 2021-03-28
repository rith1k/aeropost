<?php
//Connect to MongoDB
$mongoClient = new MongoClient();

//Select a database
$db = $mongoClient->ecommerce;

//Find all of the customers that match  this criteria
$cursor = $db->Products->find();

//Output each product as a JSON object with comma in between
$numResults = $cursor->count();//Number of products in database
$cntr = 0;//Enables us to add a comma after every product but the last

//Start array
echo '['; //Start of array of customers in JSON

//Work through the customers
foreach ($cursor as $customer){
    echo json_encode($customer);//Convert PHP representation of product into JSON 
    $cntr++;
        
    //Add comma after every customer but the last
    if($cntr != $numResults){
        echo ',';//Separator between products
    }
}

//Close array
echo ']';

//Close the connection
$mongoClient->close();

?>
