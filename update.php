<?php

/*
1 - isset to call a function
2 - create a connection to the database
3 - store the user input into variables
4 - set up our INSERT query, run it
5 - close connection
6 - redirect the user back to index.php
*/

function updateRecord(){
    //Create a connection to our database
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $databasename = 'motorvehicle_database';

    $connection = mysqli_connect($servername, $username, $password, $databasename);

    //store user input into variables

    $id = $_POST['update-ID'];
    $motorType = $_POST['update-vehicletype'];
    $energyType = $_POST['update-energytype'];
    $brand = $_POST['update-brand'];
    $model = $_POST['update-model'];
    $milage = $_POST['update-milage'];
    $cost = $_POST['update-cost'];
    $owner = $_POST['update-owner'];

    //INSERT query into our database
    $sql = "UPDATE motorvehicle_table SET vehicletype='$motorType', energytype='$energyType', brand='$brand', model='$model', milage='$milage', cost='$cost', owner='$owner' WHERE id='$id'";
    $updateQuery = mysqli_query($connection, $sql); //executed our query here

    if(!$updateQuery){
        echo 'Error :'.$sql.mysqli_error($connection);
    }

    //close connection
    mysqli_close($connection);

    //Redirect back to index.php
    header('location: index.php');
}

if(isset($_POST['submit-update'])){
    updateRecord();
}
?>