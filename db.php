<?php


//if (!$connection){
//    echo "Failure";
//}else{
//    echo"Success";
//    $query= "insert into info(name,email,psw) values('".$_POST['name']."','".$_POST['email']."','".$_POST['psw']."')";
//    if($connection->query($query)){
//        echo "inserted";
//    }else{
//        echo "failed";
//    }
//}

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "vaccine";
    $active_group = 'default';
    $query_builder = TRUE;
    $conn = mysqli_connect($host, $username, $password, $database);


    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

?>