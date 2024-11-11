<!DOCTYPE html>
<html>
<head>
        <title>Motor Vehicle Register</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <style>

            body {
                font-family: 'Roboto', sans-serif;
            }
            
            #create-form, #update-form, #delete-form {
                display: none;
            }
            
            .main-div {
                width: 80vw;
                margin: 0 auto;
            }

            h2 {
                text-align: center;
            }

            table {
                margin: 15px auto;
                width: 50vw;
                text-align: center;
            }

            table tr td {
                padding: 12px;
            }

            .content-wrapper {
                width: 100%;
                margin: 0 auto;
                text-align: center;
            }

            #create-button, #update-button, #delete-button {
                width: 140px;
                height: 37.5px;
                background-color: blue;
                color: #FFFFFF;
                border-radius: 4px;
                border: 1.5px solid black;
                letter-spacing: 1.5px;
                cursor: pointer;

            }

            .small-button {
                width: 76px;
                height: 30px;
                background-color: blue;
                color: #FFFFFF;
                border-radius: 2px;
                border: none;
                cursor: pointer;
            }

            input[type="text"] {
                margin: 6px;
                width: 260px;
                height: 32px;
                padding: 3px;
            }

            p {
                text-align: center;
            }


        </style>

</head>

<body>
    <div class="main-div">
        <?php require_once 'create.php'; ?>

        <h2>Motor Vehicle Data Log</h2>
    <?php

            $servername = 'localhost';
            $username = 'root';
            $password = '';
            $databasename = 'motorvehicle_database';

            //Creating a connection to the database
            $connection = mysqli_connect($servername, $username, $password, $databasename);

            //Check if connection was successful or not
            //if we didn't have a connection
            if(!$connection){
                die('Connection Unsuccessful :'.mysqli_connect_error());
            }

            //Query the table for the Records
            $sql = "SELECT * FROM motorvehicle_table"; //set up our query
            $result = mysqli_query($connection, $sql); //store the result of the query into the $result
            $rowCount = mysqli_num_rows($result);

            if($rowCount > 0){
                echo "
                    <table>
                        <thead>
                            <tr>
                                <th>Record ID</th>
                                <th>Vehicle Type</th>
                                <th>Energy Type</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Milage</th>
                                <th>Cost</th>
                                <th>Owner</th>
                            </tr>
                        </thead>
                ";
            }
            ?> <!--End PHP code block -->
            <?php
        
                while($row = $result->fetch_assoc()): ?> <!--fetch the row in the query-->
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['vehicletype'] ?></td>
                        <td><?php echo $row['energytype'] ?></td>
                        <td><?php echo $row['brand'] ?></td>
                        <td><?php echo $row['model'] ?></td>
                        <td><?php echo $row['milage'] ?></td>
                        <td><?php echo $row['cost'] ?></td>
                        <td><?php echo $row['owner'] ?></td>
                    </tr>
                <?php endwhile ?>
            </table>

        </div>
        <p>Register your motor vehicle here! We will accept all various types from trucks to motorcycles! Just input the information, and it'll pop up <i>here</i>!</p>
        <br />
        <div class="content-wrapper">
            <button id="create-button">Create Record</button>
            <button id="update-button">Edit Record</button>
            <button id="delete-button">Delete Record</button>
        <br /><br />

        <form action="create.php" method="POST" id="create-form">
            <label>
                Select Vehicle Type:
                <select name="create-vehicletype">
                    <option value="sedan">Sedan</option>
                    <option value="hatchback">Hatchback</option>
                    <option value="coupe">Coupe</option>
                    <option value="stationWagon">Station Wagon</option>
                    <option value="minivan">Mini Van</option>
                    <option value="pickupTruck">Pick-Up Truck</option>
                    <option value="SUV">SUV</option>
                    <option value="sportsCar">Sports Car</option>
                    <option value="convertible">Convertible</option>
                    <option value="sportbike">Sport Motorcycle</option>
                    <option value="motorcycle">Motorcycle</option>
                </select>
            </label><br />
            <input type="text" placeholder="Enter gas type or electric" name="create-energytype"/><br />
            <input type="text" placeholder="Enter brand" name="create-brand"/><br />
            <input type="text" placeholder="Enter model type" name="create-model"/><br />
            <input type="text" placeholder="Enter the full-tank milage" name="create-milage"/><br />
            <input type="text" placeholder="Enter the cost" name="create-cost"/><br />
            <input type="text" placeholder="Enter vehice owner" name="create-owner"/><br />
            <input type="submit" value="Save" name="create-button" class= "small-button"/>

        </form>

        <form action="update.php" method="POST" id="update-form">
            <input type="text" placeholder="Enter Record ID" name="update-ID"/><br />
            <label>
                Select Vehicle Type:
                <select name="update-vehicletype">
                    <option value="sedan">Sedan</option>
                    <option value="hatchback">Hatchback</option>
                    <option value="coupe">Coupe</option>
                    <option value="stationWagon">Station Wagon</option>
                    <option value="minivan">Mini Van</option>
                    <option value="pickupTruck">Pick-Up Truck</option>
                    <option value="SUV">SUV</option>
                    <option value="sportsCar">Sports Car</option>
                    <option value="convertible">Convertible</option>
                    <option value="sportbike">Sport Motorcycle</option>
                    <option value="motorcycle">Motorcycle</option>
                </select>
            </label><br />
            <input type="text" placeholder="Enter gas type or electric" name="update-energytype"/><br />
            <input type="text" placeholder="Enter brand" name="update-brand"/><br />
            <input type="text" placeholder="Enter model type" name="update-model"/><br />
            <input type="text" placeholder="Enter the full-tank milage" name="update-milage"/><br />
            <input type="text" placeholder="Enter the cost" name="update-cost"/><br />
            <input type="text" placeholder="Enter vehice owner" name="update-owner"/><br />
            <input type="submit" value="Save" name="submit-update" class="small-button"/>

        </form>

        <form action="delete.php" method="POST" id="delete-form">
            <input type="text" placeholder="Enter Record ID" name="delete-ID"/><br />
            <input type="submit" value="Save" name="submit-delete" class="small-button"/>
        </form>
        </div> 
    </div>
    
    <script src="script.js"></script>

</body>

</html>