<?php
include("auth_session.php");
?>
<html lang="en">

<head>
    <title>Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="dashboard-style.css?version=51"/>
    <script src="validation.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="header" style="height: 100px;">
        <h1>Get Vaccinated</h1>
        <p>Vaccine Slot Booking</p>
    </div>

    <div class="navbar">
        <a href="bookings.php">My Bookings</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="row">
        <div class="side" style="padding: 30px;">
        <?php
    require('db.php');

        if (isset($_POST['fname'])) {
            $booking_account_id=stripslashes($_SESSION['username']);
            $booking_account_id = mysqli_real_escape_string($conn, $booking_account_id);
            $fname = stripslashes($_REQUEST['fname']);
            $fname = mysqli_real_escape_string($conn, $fname);
            $lname = stripslashes($_REQUEST['lname']);
            $lname = mysqli_real_escape_string($conn, $lname);
            $age =$_REQUEST['age'];
            $address = stripslashes($_REQUEST['address']);
            $address = mysqli_real_escape_string($conn, $address);
            $date = stripslashes($_REQUEST['date']);
            $date = mysqli_real_escape_string($conn, $date);
            $vaccine = stripslashes($_REQUEST['vaccine']);
            $vaccine = mysqli_real_escape_string($conn, $vaccine);
            $vaccine_taken_till_date = stripslashes($_REQUEST['vaccine_taken_till_date']);
            $vaccine_taken_till_date = mysqli_real_escape_string($conn, $vaccine_taken_till_date);
            $email = stripslashes($_REQUEST['email']);
            $email = mysqli_real_escape_string($conn, $email);
            $risk_category = isset($_POST['risk_category']) ? 1 : 0;
            $query    = "INSERT into `bookings` (First_Name, Last_Name, Age, Address, Bookings_Date, Vaccine, Vaccine_Taken_Till_Date, Email, Risk_Category, Booking_Account_Id)
        VALUES ('$fname', '$lname', $age, '$address', '$date', '$vaccine', '$vaccine_taken_till_date', '$email', $risk_category, '$booking_account_id')";
            $result   = mysqli_query($conn, $query);
            if($result){
                header("Location: bookings.php");
            }else{
                echo "<div class='form'>
            <h3>Error: Either db server is down or null data was passed in the form</h3><br/>
            </div>";
            }
        }
        else {
            ?>


        <div style="width: 50%; margin: auto;" class="align-item-center">

            <h2>Book Slot</h2>
            Note: You can book vaccination slots for your family members as well as yourself.<br><br>

            <form class="form form-control" method="post" name="book" onsubmit="return validateBooking()">
                <label for="fname">First name:</label><br>
                <input class="form form-control" type="text" id="fname" name="fname"><br>
                <label for="lname">Last name:</label><br>
                <input class="form form-control" type="text" id="lname" name="lname"><br>
                <label for="age">Age:</label><br>
                <input class="form form-control" type="number" id="age" name="age"><br>
                <label for="address">Address:</label><br>
                <input class="form form-control" type="text" id="address" name="address"><br>
                <label for="vaccine">Vaccine name:</label><br>
                <select class="form form-control" id="vaccine" name="vaccine">
                    <option value="Pfizer">Pfizer</option>
                    <option value="Moderna">Moderna</option>
                    <option value="Johnson &amp; Johnson">Johnson & Johnson</option>
                    <option value="AstraZeneca">AstraZeneca</option>
                </select>
                <br>
                <label for="vaccines_taken">Vaccines taken till date:</label><br>
                <input class="form form-control" type="text" id="vaccines_taken" name="vaccines_taken"><br>
                <label for="email">Email:</label><br>
                <input class="form form-control" type="email" id="email" name="email"><br>
                <label for="risk_category">Are you in a high-risk category?</label><br>
                <input class="form-check-input" type="checkbox" id="risk_category" name="risk_category" value="yes"><br><br>
                <label for="date">Select Vaccination Date:</label><br>
                <input class="form form-control" type="date" id="date" name="date"><br><br>
                <input class="btn btn-primary" type="submit" value="Submit">
            </form>

        </div>
<?php
    }
?>
           
        </div>

</body>

</html>