<?php 
    require_once "include/config.php";
    include "include/admin-navbar.php";
    include("db/DBConnection.php");
?>

<div class="container" style="margin-bottom: 5em;">

    <!-- Stats -->
    <div class="row bg-primary rounded mt-5 py-3 border border-white">
        <div class="col-md-6">
            <div><h4 class="m-0 text-center text-light ">
        
            <!-- No. of tickets submitted -->
            <?php 
                $adminID = $_SESSION["AdminID"];
                $sql = "SELECT * FROM Ticket WHERE AdminID = '$adminID'";
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
                $sql = "SELECT * FROM Ticket WHERE AdminID = '$adminID' AND TicketStatus = 'Resolved'";
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
        <div class="col-md-12">
            <div style="min-height:5em;">
                <ul class="list-group">

                    <?php
                        $sql = "SELECT * FROM Ticket WHERE AdminID = '$adminID' AND TicketStatus != 'Resolved'";
                        $result = mysqli_query($conn, $sql);
                        
                        /* Getting the number of records in each table */
                        $resultCheck = mysqli_num_rows($result);
                        
                        if($resultCheck > 0){
                            while($row = mysqli_fetch_array($result)){
                                echo '<a href="admin-ind-ticket.php?admin='.$row['TicketID'].'" style="color: #000;text-decoration: none;"><li class="list-group-item">'
                                .$row['TicketSubject'].'</li></a>';
                            }
                        }else{
                            echo '<li class="list-group-item">No tickets</li>';
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