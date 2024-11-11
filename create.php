<?php

        //Create Record function
        function createRecord(){
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
            }else {
                echo 'Connection Successful';
            }

            //Storing userinput into variable

            $motorVehicleType = $_POST['create-vehicletype'];
            $energyType = $_POST['create-energytype'];
            $brand = $_POST['create-brand'];
            $model = $_POST['create-model'];
            $milage = $_POST['create-milage'];
            $cost = $_POST['create-cost'];
            $owner = $_POST['create-owner'];

            //Attempting to insert data into our table
            $sql = "INSERT INTO motorvehicle_table (vehicletype, energytype, brand, model, milage, cost, owner) VALUES ('$motorVehicleType', '$energyType', '$brand', '$model', '$milage', '$cost', '$owner')";

            //Check if inserting data was successful
            if(mysqli_query($connection, $sql)){
                echo '';
            } else {
                echo 'Error: '.$sql.mysqli_error($connection);
            }

            //Close Connection so it doesnt keep sending data when you refresh
            mysqli_close($connection);

            //Re-directing back to the main page index.php
            header('location: index.php');
        }

        if(isset($_POST['create-button'])){
            createRecord();
        }
?>