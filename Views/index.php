<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href = "<?php echo base_url(); ?>/css/style.css" type="text/css">
    <title>Welcome To FoodShala</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
    <a class="navbar-brand text-light font-weight-bold" href="<?php echo site_url(); ?>">FoodShala</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-item nav-link active" href="<?php echo site_url(); ?>">Menu </a>
            <?php
            $sess_cn = $this->session->userdata('c_name');
            $sess_rn = $this->session->userdata('r_name');

            if(empty($sess_cn)){  ?>
            <a class="nav-item nav-link" href="<?php echo site_url("Welcome/login"); ?>">Customer Login</a>
            <a class="nav-item nav-link" href="<?php echo site_url("Welcome/register"); ?>">Customer Register</a> 
            <?php 
              if(empty($sess_rn)){ ?>
                <a class="nav-item nav-link" href="<?php echo site_url("Welcome/loginRest"); ?>">Restaurant Login</a>
                <a class="nav-item nav-link" href="<?php echo site_url("Welcome/registerRest"); ?>">Register your Restaurant</a>
            <?php  }else{ ?>
                <a class="nav-item nav-link" href="<?php echo site_url("Welcome/Orders"); ?>">View Orders</a>
                <a class="nav-item nav-link" href="<?php echo site_url("Welcome/AddItem"); ?>">Add Menu Item</a>
                <a class="nav-item nav-link" href="<?php echo site_url("Welcome/logout"); ?>">Logout Restaurant</a>
                
            <?php  }} 
            else{  ?>  
              <a class="nav-item nav-link" href="<?php echo site_url("Welcome/cart"); ?>">Cart</a>
              <a class="nav-item nav-link" href="<?php echo site_url("Welcome/loginRest"); ?>">Restaurant Login</a>
              <a class="nav-item nav-link" href="<?php echo site_url("Welcome/registerRest"); ?>">Register your Restaurant</a>
              <a class="nav-item nav-link" href="<?php echo site_url("Welcome/logout"); ?>">Logout</a>
            <?php } ?>
            
          </div>
        </div>
    </nav>
      <div class="jumbotron" style="background-image: url('<?php echo base_url(); ?>/images/back.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">

      <h1 class="display-5 d-flex justify-content-center font-weight-bold">Welcome To FoodShala</h1>
        <p class="lead d-flex justify-content-center">Order food from your favourite restaurants</p>
        
      </div>

      <div class="container view" id="pr">
        <hr>
        <div class="card-deck-wrapper row">
          <?php
		        foreach($data as $row){ ?>
              <div class="card-deck col-lg-4 col-sm-6">
              <div class="card">
              <img class="card-img-top" src='<?php echo base_url('images/'.$row->item_image); ?>' alt="Card image cap" height=200px>
              <div class="card-body">
              <h6 class="card-title"><?php echo $row->item_name?> (<?php echo $row->item_quantity; ?>) - ₹<?php echo $row->item_price ?> </h6>
              <h6 class="card-title"><?php echo $row->r_name ?></h6>
              <?php
              $sess_rn = $this->session->userdata('r_name');
              if(empty($sess_rn)){  ?>
              <a class="btn btn-info" href="<?php echo site_url("Welcome/Order/");echo $row->item_id ?>" role="button">Order</a>
                <a class="btn btn-info" href="<?php echo site_url("Welcome/AddCart/");echo $row->item_id ?>" role="button">Add To Cart</a>
              <?php } ?>
              </div>
              </div>
      
              </div>
            <?php } ?>
        </div>
        <hr>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>