<!DOCTYPE html>
<html>

<head>
    <title>List all Products</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
    <h1>Products</h1>
    <div id="products"></div>

    <script>
        //Download products when page loads
        window.onload = loadProducts;

        //Downloads JSON description of products from server
        function loadProducts() {
            //Create request object 
            var request = new XMLHttpRequest();

            //Create event handler that specifies what should happen when server responds
            request.onload = function () {
                //Check HTTP status code
                if (request.status === 200) {
                    //Add data from server to page
                    displayProducts(request.responseText);
                }
                else
                    alert("Error communicating with server: " + request.status);
            };

            //Set up request and send it
            request.open("GET", "products-list.php");
            request.send();
        }

        //Loads products into page
        function displayProducts(jsonProducts) {
            //Convert JSON to array of product objects
            var prodArray = JSON.parse(jsonProducts)

            //Create HTML table containing product data
            htmlStr += '<div class="card-deck row">';
            var counter;
            for (counter = 0; counter < 3; ++counter) {
                htmlStr += '<div class="card">';
                htmlStr += '<div class="card-body">';
                htmlStr += '<h5 class="card-title">' + prodArray[counter].name + '</h5>';
                htmlStr += '<p class="card-text">' + prodArray[counter].desc + '</p>';
                htmlStr += '<p class="text-dark">' + prodArray[counter].price + '</p>';
                htmlStr += "</div>";
                htmlStr += '<div class="card-footer">';
                htmlStr += '<button type="button" class="btn btn-outline-danger">'+ 'Add to cart' +'</button>';
                htmlStr += "</div>";
                htmlStr += "</div>";
            }

            htmlStr += '</div>';
            htmlStr += '<div class="card-deck row mt-3">';
            for (counter = 3; counter < 6; ++counter) {
            htmlStr += '<div class="card col-3.5">';
            htmlStr += '<div class="card-body">';
            htmlStr += '<h5 class="card-title">' + prodArray[counter].name + '</h5>';
            htmlStr += '<p class="card-text">' + prodArray[counter].desc + '</p>';
            htmlStr += '<p class="text-dark">' + prodArray[counter].price + '</p>';
            htmlStr += "</div>";
            htmlStr += '<div class="card-footer">';
            htmlStr += '<button type="button" class="btn btn-outline-danger">'+ 'Add to cart' +'</button>';
            htmlStr += "</div>";
            htmlStr += "</div>";
        }
            
            htmlStr += '</div>';
            htmlStr += '<div class="card-deck row mt-3">';
            for (counter = 6; counter < 9; ++counter) {
            htmlStr += '<div class="card col-3.5">';
            htmlStr += '<div class="card-body">';
            htmlStr += '<h5 class="card-title">' + prodArray[counter].name + '</h5>';
            htmlStr += '<p class="card-text">' + prodArray[counter].desc + '</p>';
            htmlStr += '<p class="text-dark">' + prodArray[counter].price + '</p>';
            htmlStr += "</div>";
            htmlStr += '<div class="card-footer">';
            htmlStr += '<button type="button" class="btn btn-outline-danger">'+ 'Add to cart' +'</button>';
            htmlStr += "</div>";
            htmlStr += "</div>";
        }
            htmlStr += "</div>";
    
                

            
            //Finish off table and add to document
            
            document.getElementById("products").innerHTML = htmlStr;
        }
    </script>
     
        
                
</body>

</html>