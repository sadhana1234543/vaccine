<?php

include("auth_session.php");
include("db.php");
?>

<html lang="en">

<head>
    <title>My Bookings</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="dashboard-style.css?version=51"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>
    <div class="header py-3">
        <h1>Your Bookings</h1>
        <p>Vaccination Appointments registered under this account will appear here</p>
    </div>

    <div style="margin: 30px;">

        <?php
        $booking_account_id = $_SESSION['username'];
        $result = mysqli_query($conn, "SELECT * FROM bookings WHERE Booking_Account_Id='$booking_account_id' ");

        echo "<table class='table table-striped m-2' style='border-radius: 20px;'>
<tr>
<th>First Name</th>
<th>Last Name</th>
<th>Age</th>
<th>Address</th>
<th>Date of Vaccination Appointment</th>
<th>Vaccine</th>
<th>Vaccine Taken Till Date</th>
<th>Email</th>
<th>Risk Category</th>
</tr>";

        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['First_Name'] . "</td>";
            echo "<td>" . $row['Last_Name'] . "</td>";
            echo "<td>" . $row['Age'] . "</td>";
            echo "<td>" . $row['Address'] . "</td>";
            echo "<td>" . $row['Bookings_Date'] . "</td>";
            echo "<td>" . $row['Vaccine'] . "</td>";
            echo "<td>" . $row['Vaccine_Taken_Till_Date'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "<td>" . $row['Risk_Category'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        mysqli_close($conn);
        ?>

    </div>

</body>

</html>