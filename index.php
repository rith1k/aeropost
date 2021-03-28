<?php
    //Include the PHP functions to be used on the page 
    include('common.php'); 

    //Output header and navigation bar
    outputHeader("index");
    outputNavigation("Home");
?>
<!--content class containing all the content-->
<div class="jumbotron container jumboSpacing">
  <h1 class="display-4 text-white">Exclusive Offer</h1>
  <p class="lead text-white">Shop above AED 50 and enter the promo code "GTO-shop" to get 10% OFF your order.</p>
  <hr class="my-2">
  <p class="text-white text-white">Offer valid till 31<sup>st</sup> March 2020*, until stocks last</p>
  <p class="lead">
    <a class="btn btn-light btn-lg" href="#!" role="button">Some action</a>
  </p>
</div>
        
<div class="container">
    <h1 class="display-4">New Items</h1>
    <div class="card-deck">
        <div class="card">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Hint Pack: Level 5</h5>
                <p class="card-text">Contain 50 hints for level 5, both easy and hard difficulty. </p>
                <p class="text-dark"> <strike>1500</strike></p>
    </div>
    <div class="card-footer">
    <button type="button" class="btn btn-outline-danger">Add to cart</button>
    </div>
  </div>
  <div class="card">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
    </div>
    <div class="card-footer">
      <small class="text-muted">Last updated 3 mins ago</small>
    </div>
  </div>
  <div class="card">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
    </div>
    <div class="card-footer">
      <small class="text-muted">Last updated 3 mins ago</small>
    </div>
  </div>
</div>
<h1>About the Game</h1>
</div>
<script src="js/script.js"></script>
<?php
    //Output the footer
    outputFooter();
?>