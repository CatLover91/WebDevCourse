<?php
    //for logging in, dun try and hack me you sneaky tanooki
    function cleanse($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $sqlservername = "localhost";
    $sqlusername = "admin";
    $sqlpassword = "5pR1nG2OlS";

    $username = "";
    $password = "";
    $id = "";
    // Create connection
    $conn = mysqli_connect($sqlservername, $sqlusername, $sqlpassword);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";

    //======================================================================
    //                      Create database
    //======================================================================
    $sql = "CREATE DATABASE NGcs418";
    if (mysqli_query($conn, $sql)) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: ".mysqli_error($conn);
    }

    $conn->select_db("NGcs418");

    //=================   Create User Table  ===============================

    $sql = "CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL
    )";

    if($conn->query($sql) === TRUE){
        echo "Table users created successfully";
    } else {
        echo "Error creating table: ".$conn->error;
    }

    $userfile = fopen("users.txt", "r+");
    $temp = fread($userfile, filesize($userfile));
    fclose($userfile);
    $filecontent = explode($temp);
    for($i = 0; $i < count($filecontent); $i = $i + 2){
        $sql = "INSERT INTO users (name, password)
        VALUES ('".cleanse($filecontent[i])."', '".cleanse($filecontent[i+1])."');";
    }

    if ($conn->multi_query($sql) === TRUE) {
        echo "User records created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    //=================   Create Questions Table  ==========================

    $sql = "CREATE TABLE questions (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    asker_id INT(6) UNSIGNED NOT NULL,
    title VARCHAR(30) NOT NULL,
    content VARCHAR(500) NOT NULL,
    bestanswer_id INT(6)
    )";

    if($conn->query($sql) === TRUE){
        echo "Table Questions created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    //=================   Create answers Table  ============================

    $sql = "CREATE TABLE answers (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    answerer INT(6) UNSIGNED,
    title VARCHAR(30) NOT NULL,
    content VARCHAR(30) NOT NULL,
    value INT(9),
    best VARCHAR(1)
    )";


    if($conn->query($sql) === TRUE){
        echo "Table answers created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
    
    //==========================================================================
    //                                  Log In
    //==========================================================================


    echo "<form method=\"post\" action=\"".htmlspecialchars($_SERVER["PHP_SELF"])."\">
            <input type=\"text\" placeholder=\"Username\" name=\"username\"/><br/>
            <span class=\"error\">* ".$usernameErr."</span>
            <input type=\"password\" placeholder=\"Password\" name=\"password\"/><br/>
            <span class=\"error\">* ".$passwordErr."</span>
            <input type=\"submit\" class=\"small button\">Log in</a>
        </form>";
?>