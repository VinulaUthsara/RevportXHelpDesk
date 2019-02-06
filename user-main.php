<?php 
    require_once "include/config.php";
    include "include/user-navbar.php"; 
    include("db/DBConnection.php");
?>

<div class="container" style="margin-bottom: 5em;">

    <!-- Stats -->
    <div class="row bg-primary rounded mt-5 py-3 border border-white">
        <div class="col-md-6">
            <div><h4 class="m-0 text-center text-light ">

            <!-- No. of tickets submitted -->
            <?php 
                $customerID = $_SESSION["CustomerID"];
                $sql = "SELECT * FROM Ticket WHERE CustomerID = '$customerID'";
                $result = mysqli_query($conn, $sql);

                /* Getting the number of records in each table */
                $resultCheck = mysqli_num_rows($result);

                echo $resultCheck;
            ?>

            </h4><p class="m-0 text-center text-light">Tickets submitted</p></div>
        </div>
        <div class="col-md-6">
            <div><h4 class="m-0 text-center text-light">
            
            <!-- No. of tickets resolved -->
            <?php
                $sql = "SELECT * FROM Ticket WHERE CustomerID = '$customerID' AND TicketStatus = 'Resolved'";
                $result = mysqli_query($conn, $sql);

                /* Getting the number of records in each table */
                $resultCheck = mysqli_num_rows($result);

                echo $resultCheck;
            ?>
            
            </h4><p class="m-0 text-center text-light">Tickets resolved</p></div>
        </div>
    </div>

    <div class="row mt-4">

        <!-- Tickets -->
        <div class="col-md-9">
            <div style="min-height:5em;">
                <ul class="list-group">
                
                    <?php
                        $sql = "SELECT * FROM Ticket WHERE CustomerID = '$customerID' AND TicketStatus != 'Resolved'";
                        $result = mysqli_query($conn, $sql);
                        
                        /* Getting the number of records in each table */
                        $resultCheck = mysqli_num_rows($result);
                        
                        if($resultCheck > 0){
                            while($row = mysqli_fetch_array($result)){
                                echo '<a href="user-ind-ticket.php?user='.$row['TicketID'].'" style="color: #000;text-decoration: none;"><li class="list-group-item">'
                                .$row['TicketSubject'].'</li></a>';
                            }
                        }else{
                            echo '<li class="list-group-item">No tickets</li>';
                        }
                    ?>

                </ul>
            </div>
        </div>

        <div class="col-md-3">
            <div class="bg-white m-auto" style="height:23em;">

                <div class="container pt-2">

                    <!-- Form -->
                    <form action="<?php echo BASE_URL; ?>controller/user-main-controller.php" method="POST">

                        <div>
                            <h4 class="text-center">Submit ticket</h4>
                        </div>

                        <div class="input-group mt-3 mb-3">
                            <input type="text" class="form-control" placeholder="Subject" name="subject" required>
                        </div>

                        <div class="form-group">
                            <select class="form-control" id="selectCategory" name="category" required>
                                <option value="">Choose category</option>
                                <option>Bug-website</option>
                                <option>Bug-mobile app</option>
                                <option>Bug-dashboard</option>
                                <option>Change request</option>
                                <option>Server issue</option>
                                <option>Emails</option>
                                <option>How to</option>
                                <option>Technical issue</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="form-control" id="selectPriority" name="priority" required>
                                <option value="">Choose priority</option>
                                <option>High</option>
                                <option>Medium</option>
                                <option>Low</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" rows="3" id="comment" placeholder="Description" name="desc" required></textarea>
                        </div>

                        <div class="container mb-5">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
</div>

<?php
  include "include/footer.php";
?>