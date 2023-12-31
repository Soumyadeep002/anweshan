<?php
include "database/db_conn.php";
session_start();
?>

<?php


define('my-site', true);

if (!defined('my-site')) {

    Header("location:access-denied.html");
}
?>


<?php

//Starting Session
// session_start();



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ANWESHAN - ADMIN</title>

    <!-- logo -->
    <link rel="icon"  href="../assets/icon1.png" />
    <!-- BootStrap CDNs -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- Linking External CSS From CSS Folder -->
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/card.css">


    <script src="404.js"></script>
</head>

<body>

    <!-- navbar  -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand"><img style="height:40px;" src="../assets/logo.png" alt=""></a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="../index.html" class="nav-item nav-link active">Website</a>
                    <a href="index.php#events-section" class="nav-item active nav-link">Events</a>
                </div>
                <div class="navbar-nav ms-auto">
                    <a href="../src/tech.php" class="nav-item active nav-link"><strong>Tech</strong></a>
                    <a href="../src/cultural.php" class="nav-item active nav-link"><strong>Cultural</strong></a>
                    <a href="signup-login/login.php" class="nav-item active nav-link"><strong>Admin</strong></a>
                    <a href="super-admin/super-admin.php" class="nav-item active nav-link"><strong>Super Admin</strong></a>
                    
                </div>
            </div>
        </div>
    </nav>
    <div class="container">

        <!-- home-heading  -->
        <div class="p-5 home-heading">
            <div class="home-heading-content">
                <h1>Welcome to ANWESHAN 2K23</h1>
                <p class="lead">Login to continue </p>
                <div id="home-buttons">
                    
                    <a href="./super-admin/sa-login.php" type="button" class="btn btn-primary btn-lg">Login</a>
                </div>

            </div>
        </div>

        <!-- events-section -->
        <div id="events-section">
            <div class="content">
                <div id="events-section-heading">
                    <h3>Register for Upcoming Events</h3>
                </div>
                <div class="search-container">
                    <input type="text" id="myFilter" name="search" class="form-control" onkeyup="myFunction()" placeholder="Search for events...">
                </div>

                <!-- card div -->
                <div id="card-div" class="card-div row">

                    <!-- Fetching Data From DataBase -->
                    <?php

                    $sql = "SELECT * FROM events WHERE approval = 1 ORDER BY event_s_date;";
                    $result = $conn->query($sql);

                    //Checking Wether
                    if ($result->num_rows > 0) {

                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            // $_SESSION['event_id'] = $row['event_id'];
                    ?>

                            <!-- card  -->
                            <div class="card">
                                <div class="card-header">
                                    <!-- showing background image -->
                                    <div style="background-image: url('event-assets/c_image/<?php echo $row['c_image1']; ?>');" class="img">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="card-detais">

                                        <!-- printing event details using php -->
                                        <h3 class=" card-title"><?php echo $row["event_name"] ?> </h3>
                                        <p><span><strong>BY : </strong></span><?php echo $row["organizer"] ?></p>
                                        <p><span><strong>VENUE : </strong></span><?php echo $row["event_venue"] ?></p>
                                        <p><span><strong>START DATE : </strong></span>[<?php echo $row['event_s_date']; ?>]</p>
                                        <p><span><strong>START TIME : </strong></span> [<?php echo $row['event_s_time']; ?>] </p>
                                        <!-- <P><span><strong>SLOTS : </strong></span>UNLIMITED</P> -->


                                        <!-- redirecting to event.php along with event-id using get method -->
                                        <a href="../src/event.php?event_id=<?php echo $row['event_id'] ?>" class="btn">View Details</a>
                                    </div>
                                </div>
                            </div>

                    <?php
                        }
                    } else {
                        echo  "<div style=\" padding: 10px; display:flex; margin: auto; align-items: center; border-radius: 10px; font-size: medium; font-weight: lighter;\" id=\"pre\" class=\"w-25 container info text-center bg-info\"> <p class=\"text-danger\" style=\"margin: auto;\" >No Event to Show</p></div>";
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- footer  -->
        <footer>
            <div class="footer-content">
                
                <p>Copyright © 2023 ANWESHAN</p>
            </div>
        </footer>

        <!-- search event -->

        <script>
            // search box js function start   
            function myFunction() {
                var input, filter, cards, cardContainer, title, eTitle, i;
                input = document.getElementById("myFilter").value.toUpperCase().replace(/\s/g, "");
                cardContainer = document.getElementById("card-div");
                cards = cardContainer.getElementsByClassName("card");
                for (i = 0; i < cards.length; i++) {
                    title = cards[i].querySelector(".card-title").innerText.toUpperCase().replace(/\s/g, "");
                    if (title.indexOf(input) > -1) {
                        cards[i].style.display = "";
                    } else {
                        cards[i].style.display = "none";
                    }
                }
            }
            // search box js function end
        </script>
</body>

</html>