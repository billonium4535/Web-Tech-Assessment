<ul>
    <li><a href="../index.html" style="color: #f3f0d1"><img src="../images/logo.png" alt="Home" style="width: 16px; height: 16px;"></a></li>
    <li><a href="../html/cv.html" style="color: #f3f0d1">CV</a></li>
    <li><a href="../html/login.html" style="color: #f3f0d1">Login</a></li>
    <li><a href="../html/weather-data.html" style="color: #f3f0d1">Weather Data</a></li>
</ul>
<div id="currentTime" class="right" style="color: #f3f0d1">Time Loading...</div>
<br>
<?php session_start();

function loggedOut() {
    echo "Not";
}

set_error_handler("loggedOut");
?>
<div class="right" style="color: #f3f0d1"><?php echo $_SESSION['username']; ?> Logged In</div>
<script src="../js/date-time.js"></script>
