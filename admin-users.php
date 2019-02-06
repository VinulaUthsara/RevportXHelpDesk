<?php 
    require_once "include/config.php";
    include "include/admin-navbar.php";
    require "db/DBConnection.php";
?>

<div class="container mb-4">

    <!-- Status and back button -->
    <div class="row mt-5">
        <div class="col-md-5"></div>
        <div class="col-md-2">
            <div class="bg-success border border-white rounded p-2">
            <h3 id="num-of-reqs" class="text-center text-light my-auto">
            <?php
                $sql = "SELECT * FROM Customer WHERE isApproved IS NULL";
                $result = mysqli_query($conn, $sql);

                /* Getting the number of records in each table */
                $resultCheck = mysqli_num_rows($result);

                echo $resultCheck;
            ?>
            </h3>
            <h5 class="text-center text-light my-auto">Request(s)</h5>
            </div>
        </div>
        <div class="col-md-5"></div>
    </div>

    <div class="row mt-4">

        <!-- Users -->
        <div class="col-md-12" style="margin-bottom:5em;">
            <div style="min-height:5em;">
                <ul id="users" class="list-group">
                    <!-- List of NULL users from the DB -->
                    <?php
                    $sql = "SELECT * FROM Customer WHERE isApproved IS NULL";
                    $result = mysqli_query($conn, $sql);
                    
                    /* Getting the number of records in each table */
                    $resultCheck = mysqli_num_rows($result);
                    
                    if($resultCheck > 0){
                        while($row = mysqli_fetch_array($result)){
                            echo '<li class="list-group-item" data-id="'.$row["CustomerID"].'"><b>Name: </b>'.$row['CustomerName'].
                            '<br><b>Email: </b>'.$row['CustomerEmail'].
                            '<br><b>Phone: </b>'.$row['CustomerPhoneNumber'].
                            '<span class="float-right"><button class="btn btn-success yesBtn" data-id="'.$row["CustomerID"].'">yes</button><button class="btn btn-danger noBtn" data-id="'.$row["CustomerID"].'">no</button></span></li>';
                        }
                    }else{
                        echo '<li class="list-group-item">No requests</li>';
                    }
                    ?>
                </ul>
            </div>
        </div>

    </div>

</div>
<?php
  include "include/footer.php";
?>