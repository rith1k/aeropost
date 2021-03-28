<?php
    //Include the PHP functions to be used on the page 
    include('common.php'); 

    //Output header and navigation bar
    outputHeader("Products");
    outputNavigation("Products");
?>
<div class="container ">
<div class="jumbotron">
  <h1 class="display-4 text-center">Products</h1>
  <hr class="my-4">
  <div class="d-flex flex-row justify-content-around">
  <div class="dropdown show">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Sort by
  </a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="#">Highest Price</a>
    <a class="dropdown-item" href="#">Lowest Price</a>
    <a class="dropdown-item" href="#">Popularity</a>
  </div>
</div>
</div>
</div>
</div>
<div class="container">
<div id="products">
</div>
</div>




<script src="js/script.js"></script>
<?php
    //Output the footer
    outputFooter();
?>