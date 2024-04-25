<?php 
include('form.php');
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Student Registration</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php 

    // define variables and set to empty values
    $studentidErr = $firstnameErr = $lastnameErr = $projecttitleErr = $emailErr = $numberErr = $slotErr = "";
    $studentid = $firstname = $lastname = $projecttitle = $email = $number = $slot = "";
    $se = $fe = $le = $pe =$ee = $ne = $se = "";
    $servername = "";
    $username = "";
    $password = "";
    $dbname="";
    $issue = true;
    $sucess = "";
    $confirm = "";
    $record2 ="false";
    // check if the form was submitted, validate fields filled out
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if (empty($_POST["studentid"])){
            $studentidErr = "Student ID is required.";
        }
        else{
            $studentid = test_input($_POST["studentid"]);
            if(!preg_match(("/^[0-9]{8}$/"),$studentid)){
                $studentidErr = "Only numbers are allowed, needs to be 8 characters.";
            }
        }
        if (empty($_POST["firstname"])){
            $firstnameErr = "First Name is required.";
        }
        else{
            $firstname = test_input($_POST["firstname"]);
        }
        if (empty($_POST["lastname"])){
            $lastnameErr = "Last Name is required.";
        }
        else{
            $lastname = test_input($_POST["lastname"]);
        }
        if (empty($_POST["projecttitle"])){
            $projecttitleErr = "Project Title is required.";
        }
        else{
            $projecttitle = test_input($_POST["projecttitle"]);
        }
        if (empty($_POST["email"])){
            $emailErr = "Email is required.";
        }
        else{
            $email = test_input($_POST["email"]);
            if(!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$email)){
                $emailErr = "Invalid email format";
            }
        }
        if (empty($_POST["number"])){
            $numberErr = "Number is required.";
        }
        else{
            $number = test_input($_POST["number"]);
            if(!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/",$number)){
                $numberErr = "Invalid number format, xxx-xxx-xxxx";
            }
        }
        if (empty($_POST["slot"])){
            $slotErr = "Slot is required.";
        }
        else{
            $slot=test_input(substr($_POST["slot"],0,-1));
            $check = substr($_POST["slot"], -1);
            if($check <= 0){
                $slotErr = "This slot is fully booked.";
            }
        }

        if ($studentidErr == "" && $firstnameErr == "" && $lastnameErr == "" && $projecttitleErr == ""
        && $emailErr =="" && $numberErr == "" && $slotErr =="" ){
            $issue=false;
        }
        //check if in studentid in database 
        $record = "";
        //$record2 ="false";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error){
            die("Connection failed: " . $conn->connect_error); // return connection error
        }
        $sql22 = "SELECT * FROM registered";
        $res = $conn->query($sql22);
        if($res-> num_rows > 0){
            while ($row = $res->fetch_assoc()){
                if ($studentid != $row["studentID"]){
                    $record = "false";
                } 
                else{
                    $record = "true";
                    $record2 = "true";
                }
            }
            
        }
        $conn->close();
        
      
        if ($issue != true){
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error){
                die("Connection failed: " . $conn->connect_error); // return connection error
            }

            if($record2 == "true"){

                $sql="UPDATE registered SET slot='$slot' WHERE studentID = $studentid;";
            }
            else{
                $sql = "INSERT INTO registered (studentID, firstName, lastName, project, email, phone, slot) 
                VALUES ('$studentid','$firstname','$lastname','$projecttitle','$email','$number','$slot')"; //);
            }

            if($conn->query($sql) === TRUE){
                $last_id = $conn->insert_id; // returns the value generated for AUTO_INCREMENT column by the last query
                $sucess="true";
            }
            else{
                echo "Error creating record: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
            $studentid = $firstname = $lastname = $projecttitle = $email = $number = $slot = "";
        }
        
    }
 
    function test_input($data){
        $data = trim($data); //stripping unnecessary characters (extra space, tab, newlines) from the user input data 
        $data = stripslashes($data); //removing the backslash (\) from the user input data
        $data = htmlspecialchars($data); //if user tries to submit the following in a text field: <script>location.href('http://www.hacked.com')</script>, the attempt will fail, because it would be saved as HTML escaped code like this: &lt;script&gt;location.href('http://www.hacked.com')&lt;/script&gt; Thus rendering the code safe to be displayed on a page or inside an e-email
        return $data;
    }
   ?>
<center>

        <script>
            const myModal = document.getElementById('myModal')
            const myInput = document.getElementById('myInput')
            myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus()
            })
        </script>

        <div class="container-sm pt-3" id="link">
                <ul>
                    <a class="home_page" href="registeredstudents.php">Registered Students</a>
                </ul>
        </div>
        <div class = "container-sm pt-3" id="registration">
            <?php
            if ($sucess == "true" && $record2 != "true"){
                print("<p>You've sucessfully registered</p>");
            }

            if ($sucess != "true"){
                print("<p>Register for a course now!</p>");
            }
            if ($record2 == "true"){
                print("Your slot was updated!");

            }
            ?>

        </div>

        <div class= "container-sm pt-3 " id="registration">
            <div class="col" id="title">
                <h1>Registration Form</h1>
            </div>
            <div class="col" id="form">
                <p><span class="error">* required field</span></p>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                    <div class="input-sec p-3">
                        <span class="error"><?php echo $studentidErr;?></span>
                        <h3><input type="text" placeholder="ID" class="input" name="studentid" value="<?php echo $studentid?>"> * </h3>
                        <span class="error"><?php echo $firstnameErr;?></span>
                        <h3><input type="text" placeholder="First Name" class="input" name="firstname" value="<?php echo $firstname?>" > *</h3>
                        <span class="error"><?php echo $lastnameErr;?></span>
                        <h3><input type="text" placeholder="Last Name" class="input" name="lastname" value="<?php echo $lastname?>"> *</h3>
                        <span class="error"><?php echo $projecttitleErr;?></span>
                        <h3><input type="text" placeholder="Project Title" class="input" name="projecttitle" value="<?php echo $projecttitle?>"> *</h3>
                        <span class="error"><?php echo $emailErr;?></span>
                        <h3><input type="text" placeholder="Email Address" class="input" name="email" value="<?php echo $email?>"> *</h3>
                        <span class="error"><?php echo $numberErr;?></span>
                        <h3><input type="phone" placeholder="Phone Number" class="input" name="number" value="<?php echo $number?>"> *</h3>
                        <span class="error"><?php echo $slotErr;?></span>
                        <h4>Slot:<select name="slot" value="<?php echo $slot?>">
                            <option></option>
                            <option value="5/3/2024, 6:00 PM - 7:00 PM <?php echo $s1?>" <?php if (isset($slot) && $slot =="5/3/2024, 6:00 PM - 7:00 PM") 
                            echo "selected" ?>>5/3/2024, 6:00 PM - 7:00 PM, <?php echo $s1?> seats remaining</option>
                            <option value="5/3/2024, 7:00 PM - 8:00 PM <?php echo $s2?>"<?php if (isset($slot) && $slot =="5/3/2024, 7:00 PM - 8:00 PM") 
                            echo "selected" ?>>5/3/2024, 7:00 PM - 8:00 PM, <?php echo $s2?> seats remaining</option>
                            <option value="5/3/2024, 8:00 PM - 9:00 PM <?php echo $s3?>"<?php if (isset($slot) && $slot =="5/3/2024, 8:00 PM - 9:00 PM") 
                            echo "selected" ?>>5/3/2024, 8:00 PM - 9:00 PM, <?php echo $s3?> seats remaining</option>
                            <option value="5/4/2024, 6:00 PM - 7:00 PM <?php echo $s4?>"<?php if (isset($slot) && $slot =="5/4/2024, 6:00 PM - 7:00 PM") 
                            echo "selected" ?>>5/4/2024, 6:00 PM - 7:00 PM, <?php echo $s4?> seats remaining</option>
                            <option value="5/4/2024, 7:00 PM - 8:00 PM <?php echo $s5?>"<?php if (isset($slot) && $slot =="5/4/2024, 7:00 PM - 8:00 PM") 
                            echo "selected" ?>>5/4/2024, 7:00 PM - 8:00 PM, <?php echo $s5?> seats remaining</option>
                            <option value="5/4/2024, 8:00 PM - 9:00 PM <?php echo $s6?>"<?php if (isset($slot) && $slot =="5/4/2024, 8:00 PM - 9:00 PM") 
                            echo "selected" ?>>5/4/2024, 8:00 PM - 9:00 PM, <?php echo $s6?> seats remaining</option>
                        </select> *</h4>
                        <input type="submit" class="submit">
                    </div>
                </form>
            </div>
        </div>

        <div>

        </div>
    </center>
</body>
</html>

