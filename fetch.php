<?php
include('admin/dbconn.php');
include('nav.php');

if(isset($_POST['view'])){

      $findbranchadmin="SELECT * FROM users where position='Admin' and branch_id='$branch'";
                              $findBAresult=mysqli_query($conn,$findbranchadmin);
                              $findBArow=mysqli_fetch_array($findBAresult);
                              $admin=$findBArow['user_id'];
                              $findchatid="SELECT * FROM chats where cusid='$logged' and empid='$admin'";
                              $findCIresult=mysqli_query($conn,$findchatid);
                              $findCIrow=mysqli_fetch_array($findCIresult);
                              $chat_id=$findCIrow['chat_id'];

                              $status_query = "SELECT * FROM messages WHERE chat_id='$chat_id' and mess_status=0 ";
                              $result_query = mysqli_query($conn, $status_query);
                              $count= mysqli_num_rows($result_query);
                             
                              $data = array('unseen_notification'  => $count);

                              echo json_encode($data);

                                    }

?>