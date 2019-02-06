<?php 
    require_once "include/config.php";
    include "include/login-signup-navbar.php"; 

    if(isset($_GET['signup'])){
        if($_GET['signup'] == 'usernameinvalid'){
          $var = "Invalid username!";
          echo "<script>";
          echo "alert('".$var."');";
          echo "</script>"; 
        }else if($_GET['signup'] == 'phoneinvalid'){
          $var = "Phone number invalid!";
          echo "<script>";
          echo "alert('".$var."');";
          echo "</script>"; 
        }else if($_GET['signup'] == 'userEmailAlreadyExists'){
            $var = "Email already exists!";
            echo "<script>";
            echo "alert('".$var."');";
            echo "</script>"; 
        }
    }
?>

<!-- Signup form -->
<div class="container mt-4">
    <div class="row">

        <div class="col-md-3"></div>
        <div class="col-md-6 bg-light">

            <!-- Form -->
            <form action="<?php echo BASE_URL; ?>controller/signup-controller.php" method="POST">

                <h2 class="text-center mt-3">Signup with your details</h2>

                <div class="input-group mt-3 mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="email" class="form-control" placeholder="Email" name="email" required>
                </div>

                <div class="input-group mb-2">
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

                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="number" class="form-control" placeholder="Phone number" name="phoneNumber" required>
                </div>

                <div class="container mb-5">
                    <button type="submit" class="btn btn-success btn-block" name="submit">Signup</button>
                </div>
            
            </form>

        </div>
        <div class="col-md-3"></div>

    </div>
</div> 

<?php
  include "include/footer.php";
?>