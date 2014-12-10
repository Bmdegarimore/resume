<?php

    //Connect to the database
    $username = "brandond";
    $password = "Brandino15@";
    $hostname = "localhost";

    try {
        $dbh = new PDO("mysql:host=$brandond;
                       dbname=brandond_contact", $username, $password);
        //echo "Connected to database.";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    //See if the form has been submitted
    if(isset($_POST['submit'])){
        echo "From was submitted.";
    
        
        //Flag variable for valid data
        
    
        //Get the data from the form
        if(!empty($_POST['email'])) {
            $email = $_POST['email'];
            } 
            else {
                echo "<p class='error'>Email Required.</p>";
            }

        //First name
        if(!empty($_POST['first'])) {
            $sid = $_POST['first'];
        } else {
            echo "<p class='error'>First Name is required.</p>";
        }
 
        //Last name
        if(!empty($_POST['last'])) {
            $sid = $_POST['last'];
        } else {
            echo "<p class='error'>Last Name is required.</p>";
        }
        
        //If the data is valid, write to DB
        if ($valid) {
            $sql = "INSERT INTO contact (Email, Last_Name, First_Name)
            VALUES (:Email, :Last_Name, :First_Name)";
            $statement = $dbh->prepare($sql);
            $statement->bindParam(':Email', $email, PDO::PARAM_STR);
            $statement->bindParam(':Last_Name', $last, PDO::PARAM_STR);
            $statement->bindParam(':First_Name', $first, PDO::PARAM_STR);
            $statement->execute();
        }
    }
?>