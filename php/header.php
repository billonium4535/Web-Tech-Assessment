<!-- header.php is a file that is displayed on most pages -->
<!-- It is stored like this so that if there is a change, it only needs to be altered once -->
<!-- preventing different information displaying on different pages -->

<?php session_start();

// Checks if the user is logged in
function loggedOut() {
    echo "Not";
}

set_error_handler("loggedOut");
?>

<!-- Displays the navigation bar on all pages -->
<ul>
    <li><a href="../index.html" style="color: #f3f0d1"><img src="../images/logo.png" alt="Home" style="width: 16px; height: 16px;"></a></li>
    <li><a href="../html/cv.html" style="color: #f3f0d1">CV</a></li>
    <li><a href="../html/login.html" style="color: #f3f0d1">Login</a></li>
    <li><a href="../html/weather-data.html" style="color: #f3f0d1">Weather Data</a></li>
    <li><a href="../html/list.html" style="color: #f3f0d1">List</a></li>
    <li><a href="../html/display.html" style="color: #f3f0d1">Display</a></li>

    <!-- Checks if the user is logged in then displays the submit page if they are -->
    <?php if(!isset($_SESSION['loggedIn']) || empty($_SESSION['loggedIn'])){
        ?><li></li><?php
    } else { ?>
        <li><a href="../html/submit.html" style="color: #f3f0d1">Submit</a></li>
        <?php
    } ?>
</ul>

<!-- Displays the current time -->
<div id="currentTime" class="right" style="color: #f3f0d1">Time Loading...</div>
<br>

<!-- Displays the currently logged in user -->
<div class="right" style="color: #f3f0d1"><?php echo $_SESSION['username'];?> Logged In</div>

<!-- Imports the javascript file -->
<script src="../js/date-time.js"></script>
