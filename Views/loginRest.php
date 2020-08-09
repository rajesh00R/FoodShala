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
            <a class="nav-item nav-link" href="<?php echo site_url(); ?>">Menu </a>
            <?php
            $sess_cn = $this->session->userdata('c_name');
            $sess_rn = $this->session->userdata('r_name');

            if(empty($sess_cn)){  ?>
            <a class="nav-item nav-link" href="<?php echo site_url("Welcome/login"); ?>">Customer Login</a>
            <a class="nav-item nav-link" href="<?php echo site_url("Welcome/register"); ?>">Customer Register</a> 
            <?php 
              if(empty($sess_rn)){ ?>
                <a class="nav-item nav-link active" href="<?php echo site_url("Welcome/loginRest"); ?>">Restaurant Login</a>
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
    <div class="container jumbotron view">
        <hr><h2>Restaurant Login</h2><hr>
        <form method='POST'>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" name="email"  value="">
                  
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" name="pass" value="">
                </div>
                
                <div class="form-group">
				            <input type="submit" name="loginR" id="loginR" class="btn btn-info" value="Login">
			          </div>
              </form>
  
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>