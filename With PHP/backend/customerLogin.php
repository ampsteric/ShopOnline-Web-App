<?php

$custEmail = $_POST['custEmail'];
$custPassword = $_POST['custPassword'];

// $host = "localhost";
// $dbUsername = "admin";
// $dbPassword = "admin";
// $dbname = "shoponline";

$host = "sql206.epizy.com";
$dbUsername = "epiz_29762748";
$dbPassword = "CrifBpYoOS3lWg";
$dbname = "epiz_29762748_shoponline";
//create connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
$crctPassTEMP = $conn->query("SELECT accountpassword from persons where accesslevel='customer' and email='".$custEmail."'");
$crctPass = mysqli_fetch_array($crctPassTEMP);
$custNameTEMP = $conn->query("SELECT fname from persons where email='".$custEmail."'");
$custName = mysqli_fetch_array($custNameTEMP);

$conn->close();

if($crctPass[0]==$custPassword)
{ ?>

    <script>
        localStorage.setItem('loggedCustomer','<?php echo $custName[0]; ?>');
        localStorage.setItem('loggedCustomerEmail','<?php echo $custEmail; ?>');
        location.replace("../customerProductView.php");
    </script>

<?php
}
else
{
    header("Location: wrongLoginCustomer.html");
    exit();
}
?>