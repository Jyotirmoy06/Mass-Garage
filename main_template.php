<?php 
session_start();
include 'includes/header.php';
?>
<h1>You're From City of 
<?php echo $city_name; ?>, <?php echo $state_name; ?>  </h1>
<button onclick="show_workiz()" role="button" id="book_an_appointment" class="btn1">BOOK AN APPOINTMENT</button>
<?php
include 'includes/footer.php';
?>