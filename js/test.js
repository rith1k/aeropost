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
        htmlStr += '<button type="button" class="btn btn-outline-danger">' + 'Add to cart' + '</button>';
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
        htmlStr += '<button type="button" class="btn btn-outline-danger">' + 'Add to cart' + '</button>';
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
        htmlStr += '<button type="button" class="btn btn-outline-danger">' + 'Add to cart' + '</button>';
        htmlStr += "</div>";
        htmlStr += "</div>";
    }
    htmlStr += "</div>";




    //Finish off table and add to document

    document.getElementById("products").innerHTML = htmlStr;
}