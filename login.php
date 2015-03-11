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

    // Create connection
    $conn = mysqli_connect($sqlservername, $sqlusername, $sqlpassword);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";
    
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