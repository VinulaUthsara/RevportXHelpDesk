<?php
require_once "include/config.php";
include "include/user-navbar.php";
include("db/DBConnection.php");
?>

    <div class="container">

        <!-- Status and back button -->
        <div class="row mt-5">
            <div class="col-md-1">
                <a href="user-main.php" type="button" class="btn btn-block p-0"> <i
                            class="fas fa-angle-left fa-2x mt-1"></i></a>
            </div>
            <div class="col-md-11">
                <div class="bg-success border border-white rounded p-2">
                    <h5 class="text-center text-light my-auto">Status : 

                        <?php
                        $ticket_id = $_GET['user'];
                        $status_query = $db->prepare("SELECT * FROM  Ticket WHERE TicketID='$ticket_id'");
                        $status_query->execute();
                        $status = $status_query->fetch(PDO::FETCH_ASSOC);
                        echo $status['TicketStatus'];          
                        ?>

                    </h5>

                </div>
            </div>
        </div>

        <!-- Chatbox -->
        <div class="row mb-5">

            <div class="col-md-12 my-5">

                <div class="chatbox mx-auto container">

                    <h5 class="text-center"> 
                    
                        <?php
                            $subject_query = $db->prepare("SELECT TicketSubject FROM  Ticket WHERE TicketID='$ticket_id'");
                            $subject_query->execute();
                            $ticket_subject = $subject_query->fetch(PDO::FETCH_ASSOC);
                            echo $ticket_subject['TicketSubject'];
                        ?>

                    </h5>

                    <div class="chatlogs col-md-12" id="chat_messages">

                        <?php
                            $message_query = $db->prepare("SELECT * FROM Message WHERE TicketID='$ticket_id'");
                            $message_query->execute();

                            $desc_query = $db->prepare("SELECT TicketDescription FROM Ticket WHERE TicketID = '$ticket_id'");
                            $desc_query->execute();

                            $descFetch = $desc_query->fetch(PDO::FETCH_ASSOC);
                            $desc = $descFetch['TicketDescription'];
                            $cust = "Customer";
                            echo " <div class=\"chat friend\"> <li class='chat-message'><b>" . ucwords($cust) . "</b> - " . $desc . "</li></div>";

                            while ($fetch = $message_query->fetch(PDO::FETCH_ASSOC)) {
                                $name = $fetch['Sender'];
                                $message = $fetch['Message'];
                                if ($name == 'Admin') {

                                    echo " <div class=\"chat self d-flex justify-content-end\"> <li class='chat-message'><b>" . ucwords($name) . "</b> - " . $message . "</li> </div>";

                                } else {
                                    echo " <div class=\"chat friend\"> <li class='chat-message'><b>" . ucwords($name) . "</b> - " . $message . "</li></div>";

                                }

                            }
                        ?>

                    </div>

                    <form action="#" method="post"
                          onSubmit='return false;' autocomplete="off"
                          class="row" id="userChatForm">
                        <div class="col-md-6 form-group">
                            <textarea class="form-control textarea" id="text" rows="2" placeholder="Reply"></textarea>
                        </div>

                        <div class="col-md-3">
                            <button value="Post" id="send" name="submit" type="submit"
                                    class="btn btn-info btn-block">Send
                            </button>
                        </div>

                        <div class="col-md-3">

                            <button type="button" id="close_ticket_user" value="Post"
                                    class="btn btn-info btn-block">Close ticket
                            </button>

                        </div>
                    </form>


                </div>

            </div>

        </div>


    </div>
  

<?php
include "include/footer.php";
?>