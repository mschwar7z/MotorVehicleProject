<?php

function deleteRecord(){
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $databasename = 'motorvehicle_database';

    //Creating a connection ot the database
    $connection = mysqli_connect($servername, $username, $password, $databasename);

    //Store user input inside variables
    $id = $_POST['delete-ID'];

    //Define SQL Query
    $sql = "DELETE FROM motorvehicle_table WHERE id = '$id'";

    //Execute SQL Query
    $deleteQuery = mysqli_query($connection, $sql);

    if(!$deleteQuery){
        echo 'Error:'.$sql.mysqli_error($connection);
    }

    //Close database connection
    mysqli_close($connection);

    //Redirect the user back to index.php

    header('location: index.php');
}


if(isset($_POST['submit-delete'])){
    deleteRecord();
}

?>