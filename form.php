<?php
    $servername = "";
    $username = "";
    $password = "";
    $dbname="";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error); // return connection error
    }

    $slot1 = "\"5/3/2024, 6:00 PM - 7:00 PM\"";
    $sql1 = "SELECT COUNT(*) FROM `registered` WHERE slot = $slot1;";
    $results = $conn->query($sql1);
    $c = $results->fetch_assoc();
    $s1 = 6 - $c["COUNT(*)"] ; 
    
    $slot2 = "\"5/3/2024, 7:00 PM - 8:00 PM\"";
    $sql2 = "SELECT COUNT(*) FROM `registered` WHERE slot = $slot2;";
    $results2 = $conn->query($sql2);
    $c2 = $results2->fetch_assoc();
    $s2 = 6 - $c2["COUNT(*)"] ; 

    $slot3 = "\"5/3/2024, 8:00 PM - 9:00 PM\"";
    $sql3 = "SELECT COUNT(*) FROM `registered` WHERE slot = $slot3;";
    $results3 = $conn->query($sql3);
    $c3 = $results3->fetch_assoc();
    $s3 = 6 - $c3["COUNT(*)"] ; 

    $slot4 = "\"5/4/2024, 6:00 PM - 7:00 PM\"";
    $sql4 = "SELECT COUNT(*) FROM `registered` WHERE slot = $slot4;";
    $results4 = $conn->query($sql4);
    $c4 = $results4->fetch_assoc();
    $s4 = 6 - $c4["COUNT(*)"] ; 

    $slot5 = "\"5/4/2024, 7:00 PM - 8:00 PM\"";
    $sql5 = "SELECT COUNT(*) FROM `registered` WHERE slot = $slot5;";
    $results5 = $conn->query($sql5);
    $c5 = $results5->fetch_assoc();
    $s5 = 6 - $c5["COUNT(*)"] ; 

    $slot6 = "\"5/4/2024, 8:00 PM - 9:00 PM\"";
    $sql6 = "SELECT COUNT(*) FROM `registered` WHERE slot = $slot6;";
    $results6 = $conn->query($sql6);
    $c6 = $results6->fetch_assoc();
    $s6 = 6 - $c6["COUNT(*)"] ; 

    $conn->close();

?>
