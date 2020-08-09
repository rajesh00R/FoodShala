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
            <a class="nav-item nav-link" href="<?php echo site_url(); ?>">Menu</a>
            <?php
            $sess_cn = $this->session->userdata('c_name');
            $sess_rn = $this->session->userdata('r_name');

            if(empty($sess_cn)){  ?>
            <a class="nav-item nav-link" href="<?php echo site_url("Welcome/login"); ?>">Customer Login</a>
            <a class="nav-item nav-link active" href="<?php echo site_url("Welcome/register"); ?>">Customer Register</a> 
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
      <div class="container jumbotron view">
        <h2>Customer Registration</h2><hr>
        <h4><?php echo @$error; ?></h4>
        <form method='POST'>
                <div class="form-group">
                  <label for="InputName">Name</label>
                  <input type="text" class="form-control" id="InputName" name="name" required>
                </div>
                <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email"  required>
                </div>
                <div class="form-group">
                        <label for="InputPhone">Phone</label>
                        <input type="number" class="form-control" id="InputPhone" name="phone" required>
                </div>
                <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" class="form-control" id="pass" name="pass" required>
                </div>
                <div class="form-group">
                        <label for="address">Address</label>
                        <textarea type="password" class="form-control" id="address" name="address" rows="2" required> </textarea>
                </div>
                <div class="form-group">
                    <label for="pref">Select Preference</label>
                    <select class="form-control" id="pref" name="pref">
                    <option>Veg</option>
                    <option>Non-Veg</option>
                    </select>
                </div>
                
                <div class="form-group">
				            <input type="submit" name="register" id="register" class="btn btn-info" value="Submit">
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