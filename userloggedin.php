

<?php
session_start();
if (isset($_SESSION['sessionId'])) {
  //echo $_SESSION['sessionEmail'];
  //echo $_SESSION['sessionPhoneNumber'];
  //echo $_SESSION['sessionUsername'];
}else {
  echo "wahala";
}
?>
<?php
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
                    <a href="userrequest.php">
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
         <div>
                     <form id = "textbox">
                         <label for = "from"> </label>
                         <input type="text" id="from" placeholder="Current Location">
                         <label for = "to"> </label>
                         <input type="text" id="to" placeholder="Enter Destination">
                         <button type="button" id="go-button"> GO </button>
                     </form>

                     <div id = "map"> </div>

                     <div id = "output"> </div>

                     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwXThDaYgYgDZb1a7Vpgy86U8KlXLwRN0&libraries=places"></script>
                     <script src="map.js" charset="utf-8"></script>


          </div>


        <!-- <div class="admin-top-bar">
            <div class="admin-search">
                <input type="search" name="search" placeholder="Search">
                <label for="search"><i class="fas fa-search"></i></label>
            </div>
            <i class="fas fa-bell"></i>
            <div class="admin-user">
                <img src="../public/images/3.jpg" alt="user profile">
            </div>
        </div> -->

        <!-- <div class="admin-tables">
                <div class="admin-awaiting-approval">
                        <div class="admin-heading">
                            <h2>Customers</h2>
                        </div>
                    <table class="awaiting-approval">
                            <thead>
                                <td>First Name</td>
                                <td>Last Name</td>
                                <td>Username</td>
                                <td>Email</td>
                                <td>Phone Number</td>
                            </thead>
                            <?php
                              //  $query = "SELECT * FROM vfyp_users  ORDER BY Username";
                              //  $query_run = mysqli_query($con, $query);
                              //  while($row = mysqli_fetch_array($query_run))
                            //{
                            ?>

                        <tbody>
                            <tr>
                                <td><?php// echo $row['FirstName']; ?></td>
                                <td><?php // echo $row['LastName']; ?></td>
                                <td><?php //echo $row['Username']; ?></td>
                                <td><?php //echo $row['Email']; ?></td>
                                <td><?php //echo $row['PhoneNumber']; ?></td>
                                <td>
                                    <a href="admin_approval.php">
                                       <i class="far fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php
                    //    }
                    ?>
                </div>
            </div> -->
</div>
</div>
</div>
