<?php
    //================================================================
    //                          SQL
    //================================================================
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
    
    // Check if Database is there
    
    // if it is, connect

    // if not, export it
                         
    //================================================================
    //                      Question
    //================================================================
    class Question
    {
        function _construct($questionTitle, $questionContent, $questionAuthor, $questionVote){
            $Title = $questionTitle;
            $Content = $questionContent;
            $Author = $qustionAuthor;
            $Vote = $QuestionVote;
            $Answers = [];
            
            //if 140 characters is good enough for twitter, than it is good enough for our question preview
            if(strlen($Content) <= 140){
                $ContentLite =  $Content;
            } else {
                $ContentLite =  substr($Content, 0, 140)."...";
            }   
        }
        
        //================Up Vote Question============================
        function up($voter_id){
            
        }
        
        //================Down Vote Question==========================
        function down($voter_id){
            
        }
        
        //================Mark Best Answer============================
        function best($marker_id, $theQuestion){
            
        }
        
        //================Add Answer==================================
        function add($theAnswer){
            
        }
        
        //================Sort Answers================================
        function sortAnswers(){
            
            
        }
        
        
    }
    //================================================================
    //                      Answer
    //================================================================
    class Answer
    {
        function _construct($answerer, $title, $content, $value, $best) { 
            $Author = $answerer;
            $Title = $title;
            $Content = $content;
            $Vote = $value;
            $Best = $best;
        }
        
        //==================Up Vote Answer============================
        function up($voter_id){
            
        }
        
        //==================Down Vote Answer==========================
        function down($voter_id){
            
        }
        
        //==================Mark Best=================================
        function best(){
            if($Best == True){
                $Best = False;
            } else {
                $Best = True;
            }
            
            //Update SQL
        }
    }

    //================================================================
    //                      Sort Questions
    //================================================================

    //================================================================
    //                      Add Question
    //================================================================

    
    
    

    //================================================================
    //                      Input Cleaner
    //================================================================
    //for logging in, dun try and hack me you sneaky tanooki
    function cleanse($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>