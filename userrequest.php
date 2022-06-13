<?php
session_start();
if (isset($_SESSION['sessionId'])) {
  $userid = $_SESSION['sessionId'];

  //echo $_SESSION['sessionEmail'];
  //echo $_SESSION['sessionPhoneNumber'];
  //echo $_SESSION['sessionUsername'];
}else {
  echo "wahala";
}
?>
<?php
require_once 'includes\database.php';

//include('includes/dbcon.php');
    $page_title = "Admin Dashboard-Approvals";
//  include('header.php');
    ?>
<html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-USA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Monkey D. Spatch</title>
            <!-- ==== CSS Link === -->
            <link rel="stylesheet" href="loggedinstyle.css">

</head>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<div class="admin-body">
    <div class="admin-container">
        <div class="admin-sidebar">
            <ul>
                <li>
                    <a href="#">
                        <i class="fas fa-clinic-medical"></i>
                        <div class="admin-title"><?php echo $_SESSION['sessionUsername']; ?></div>
                    </a>
                </li>
                <li>
                    <a href="userloggedin.php">
                        <i class="fas fa-th-large"></i>
                        <div class="admin-title">Pricing Calculator</div>
                    </a>
                </li>
                <li>
                    <a href="availableriders.php">
                    <i class="fal fa-user-hard-hat"></i>
                        <div class="admin-title">Available Dispatch</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-user-friends"></i>
                        <div class="admin-title">Requests</div>
                    </a>
                </li>
                <!-- <li>
                    <a href="#">
                    <i class="far fa-building"></i>
                        <div class="admin-title">Companies</div>
                    </a>
                </li> -->
                <li>
                    <a href="userlog.php">
                        <i class="fal fa-sign-out"></i>
                        <div class="admin-title">Logout</div>
                    </a>
                </li>
            </ul>
         </div>
         <div class="admin-main">
           <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
           <div class="admin-tables">
                   <div class="admin-awaiting-approval">
                           <div class="admin-heading">
                               <h2>Requests Notifications</h2>
                           </div>
                       <table class="awaiting-approval">
                               <thead>
                                   <td>Notification</td>
                                   <td>Phone Number</td>
                                   <!-- <td>Username</td>
                                   <td>Email</td>
                                   <td>Phone Number</td> -->
                               </thead>
                               <?php
                              //    '<div id="riderid">' . $id . '</div>';
                                  $query = "SELECT * FROM users WHERE id = '$userid' ";
                                  $query_run = mysqli_query($conn, $query);
                                  while($row = mysqli_fetch_array($query_run))
                               {
                                 $request = $row['request'];
                                // echo '<div id="userid">' . $request . '</div>';
                               }
                               $query2 = "SELECT * FROM projectusers WHERE id = '$request' ";
                               $query2_run = mysqli_query($conn, $query2);
                               while($row = mysqli_fetch_array($query2_run))
                            {

                               ?>

                           <tbody>

                               <tr>
                                   <td><?php echo $row['firstname']; ?> has accepted your request</td>
                                   <td><?php echo $row['phoneNumber']; ?></td>
                                   <!-- <td>
                                     <div class="btns-group">
                                       <button type="submit" class="btn" id = "AcceptButton"> Accept
                                       <button type="submit" class="btn"> Decline

                                     </div>
                                   </td> -->
                                   <td><?php //echo $row['Username']; ?></td>
                                   <td><?php //echo $row['Email']; ?></td>
                                   <td><?php //echo $row['PhoneNumber']; ?></td>
                                   <td>
                                       <a href="admin_approval.php">
                                         <!-- <i class="far fa-edit"></i> -->
                                       </a>
                                   </td>
                               </tr>
                           </tbody>
                       </table>
                       <?php
                         }
                       ?>
                   </div>
               </div>
               <!-- <script src="requestbuttons.js" charset="utf-8"></script> -->

   </div>
   </div>
   </div>
