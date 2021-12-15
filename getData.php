<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="images/title.png" sizes="16x16" type="image/png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    

</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-md bg-secondary navbar-dark nav-tabs fixed-top">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
          <ul class="navbar-nav ">
            <li class="nav-item ">
                <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="user.html" id="userpost">User Post</a>
            </li>
            
            <li class="nav-item active">
              <a class="nav-link " href="">Get Data</a>
            </li>    
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Partner</a>
              </li>
            <li class="nav-item">
                <a class="nav-link " href="#footer">Footer</a>
            </li> 
          </ul>
        </div>  
    </nav>


    <div class="container pb-5 pt-5" id="userDetails">
        <div class="container update">
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title"><br><br>
            <label for="body">Body:</label><br>
            <textarea name="body" id="body" cols="60" rows="6"></textarea><br><br>
            <input type="button" value="Update" id="formUpdateBtn">

        </div>
        <table class="table table-bordered mt-5" id="table">

            <thead>
                <!-- <th>Id</th> -->
                <th>UserId</th>
                <th>Title</th>
                <th>Body</th>
                <th>Action</th>
            </thead>
            <tbody>

            <?php
                $servername = "localhost";
                $username = "riponm";
                $password = "Mripon1611@";
                $dbname = "person";
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM userpost";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                    echo "<tr>";
                    echo "<td style='display:none'>".$row["id"]."</td>";
                    echo "<td>".$row["userId"]."</td>";
                    echo "<td>".$row["title"]."</td>";
                    echo "<td>".$row["body"]."</td>";
                    echo '<td> <button class="delBtn"><i class="fas fa-trash"></i></button> <Button class="updateBtn"><i class="fas fa-pen-alt"></i></button> </td>';
                    echo "</tr>";
                }
                } else {
                echo "0 results";
                }
                $conn->close();
            ?>

            </tbody>
            
        </table>

    </div>


    <!-- Footer -->
    <div id="footer" class="bg-dark pt-3">
        <div  class="container text-light pt-5">
        
            <div class="row">
                <div class="col-sm-4">
                    <h3>Get in Touch</h3>
                    <div class="mt-4 mb-5">
                        <a href="#" style="padding-right: 10px;"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" style="padding-right: 10px;"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" style="padding-right: 10px;"><i class="fab fa-twitter"></i></a>
                        <a href="#" style="padding-right: 10px;"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-sm-4 mb-5">
                    <h3>Address</h3>
                    <div class="mt-4">
                        <p>Head office: Rangs Fortune Square, House - 32, Road - 2, Dhanmondi, Dhaka - 1205.</p>
                        <p>Singapore Office: 3 Shenton Way, #07-09, Shenton House, Singapore-068805.</p>
                        <p>10AM - 6PM (Saturday - Thursday)</p>
                    </div>
                  
                </div>
                <div class="col-sm-4">
                    <h3>Contact Us</h3> 
                    <div class="mt-4 mb-5">
                        <p>Phone: (+88) 029665379</p>
                        <p>Email: info@ebsbd.com</p>
                    </div>
                  
                </div>
              </div>
        
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://kit.fontawesome.com/0d8d64e94a.js" crossorigin="anonymous"></script>
    <script src="script2.js"></script>

    
</body>
</html>