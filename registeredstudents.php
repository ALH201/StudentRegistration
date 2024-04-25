<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <title>Registered Students</title>
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    <center>
        <div class="container-sm pt-3" id="link">
                <ul>
                    <a class="home_page" href="index.php">Student Registration</a>
                </ul>

        </div>
        <div class = "container-sm pt-3" id="registered">
            <div class = "col" id ="title">
                <h1> Registered Students <h1>
            </div>
            <div class = "col" id ="info">
                <table>
                    <tr>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Project</th>
                        <th>E-mail</th>
                        <th>Number</th>
                        <th>Slot</th>
                        
                        <?php
                        $servername = "";
                        $username = "";
                        $password = "";
                        $dbname="";
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        if ($conn->connect_error){
                            die("Connection failed: " . $conn->connect_error); // return connection error
                        }
                        $sql = "SELECT * FROM registered";
                        $results = $conn->query($sql);

                        if ($results-> num_rows > 0){
                            while($row = $results->fetch_assoc()){
                                echo "</tr><td>" . $row["studentID"]."</td><td> ".$row["firstName"]. " ".$row["lastName"]. "</td><td>"
                                .$row["project"]. "</td><td>".$row["email"]. "</td><td>".$row["phone"]. "</td><td>".$row["slot"]. "</td></tr>";
                            }
                          
                        }
                        else{
                            echo "0 results";
                        }
                        
                        $conn->close();
                    ?>
                    
                </table>
            </div>
        </div>
    </center>
    </body>
</html>