<?php 
  require_once "include/config.php";
  include_once "db/DBConnection.php";
  include "include/login-signup-navbar.php";

  if(isset($_GET['login'])){
    if(($_GET['login'] == 'invaliduser') || ($_GET['login'] == 'invalidadmin') || ($_GET['login'] == 'invalid')){
      $var = "Invalid username or password!";
      echo "<script>";
      echo "alert('".$var."');";
      echo "</script>"; 
    }else if($_GET['login'] == 'usernotapproved'){
      $var = "You are not approved!";
      echo "<script>";
      echo "alert('".$var."');";
      echo "</script>"; 
    }
  }
?>

    <!-- Showcase and form -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-7 my-auto"><img src="<?php echo BASE_URL; ?>images/Showcase.png" alt="" class="img-fluid mt-4"></div>

        <div class="col-md-5 px-5 my-auto">

            <div class="container bg-light mt-4">
              <div class="row">
                <div class="col-md-12">

                <!-- Form -->
                  <form action="<?php echo BASE_URL; ?>controller/login-controller.php" method="POST">

                    <div class="input-group mt-5 mb-2">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                      </div>
                      <input type="text" class="form-control" placeholder="Username" name="username" required>
                    </div>

                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                      </div>
                      <input type="password" class="form-control" placeholder="Password" name="password" required>
                    </div>

                    <div class="container mb-5">
                      <button type="submit" class="btn btn-primary btn-block" id="login-button" name="login">Login</button>
                      <p class="text-center my-1">or</p>
                      <button type="button" class="btn btn-success btn-block" id="signup-button" 
                      onclick="window.location.href='<?php echo BASE_URL; ?>signup.php'">Signup</button>
                    </div>
                    
                  </form>

                </div>
              </div>
            </div>  

        </div>

      </div>
    </div>

<?php
  include "include/footer.php";
?>