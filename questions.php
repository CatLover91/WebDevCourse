<?php

    //==========================================================================
    //                              Verify posts
    //==========================================================================

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["username"])) {
            $nameErr = "Username is required";
        } else {
            $tempName = cleanse($_POST["username"]);
            if(!preg_match("/^[a-zA-Z ]*$/", $tempName)) {
                $nameErr = "Only letters and white space allowed";
            } else {
                $sql = "SELECT name, id, password FROM users WHERE name='".$tempname."'";
                $result = $conn->query($sql);
                if ($result->num_rows != 0) {
                    if (empty($_POST["password"])) {
                        $passwordErr = "Password is required";
                    } else {
                        $row = $result->fetch_assoc();
                        $tempPass = cleanse($_POST["password"]);
                        if($row["name"] == $username && $row["password"] == $tempPass) {
                            $password = $tempPass;
                            $id = $row["id"];
                        } else {
                            $passwordErr = "Invalid Password";
                        }
                    }
                } else {
                    $nameErr = "Invalid username";
                }
            }
        }


        if (empty($_POST["qtitle"])) {
            $qtitleErr = "Title is required";
        }

        if (empty($_POST["qcontent"])) {
            $qcontentErr = "Content is required";
        }

        if (!empty($_POST["qtitle"]) && !empty($_POST["qcontent"])) {
            if (!empty($_POST["username"]) && !empty($_POST["password"])) {
                $sql = "SELECT content, title FROM questions WHERE title='".$_POST["qtitle"]."'";
                $result = $conn->query($sql);
                if ($result->num_rows != 0) {
                    $qtitleErr = "This title has already been used!";
                } else {

                    $sql = "SELECT content, title FROM questions WHERE content='".$_POST["qcontent"]."'";
                    $result = $conn->query($sql);
                    if ($result->num_rows != 0) {
                        $qcontentErr = "Someone has already written this!";
                    } else {

                        $sql = "SELECT id FROM users WHERE name='".$username."'";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        if ($result->num_rows > 0) {
                            $tempid = $row["id"];
                        } else {

                            $sql = "INSERT INTO questions (asker_id, title, content)
                            VALUES ('".$tempid."', '".cleanse($_POST["qtitle"])."', '".cleanse($_POST["qcontent"])."');";
                        }
                    }
                }
            } else {
                $qtitleErr = "You must be logged in to ask questions!";
            }
        }

        if (!empty($_POST["atitle"]) && !empty($_POST["acontent"])) {
            if (!empty($_POST["username"]) && !empty($_POST["password"])) {
                $sql = "SELECT content, title FROM answers WHERE title='".$_POST["atitle"]."'";
                $result = $conn->query($sql);
                if ($result->num_rows != 0) {
                    $atitleErr = "This title has already been used!";
                } else {

                    $sql = "SELECT content, title FROM answers WHERE content='".$_POST["acontent"]."'";
                    $result = $conn->query($sql);
                    if ($result->num_rows != 0) {
                        $acontentErr = "Someone has already written this!";
                    } else {

                        $sql = "SELECT id FROM users WHERE name='".$username."'";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        if ($result->num_rows > 0) {
                            $tempid = $row["id"];
                        } else {

                            $sql = "INSERT INTO answers (asker_id, title, content)
                            VALUES ('".$tempid."', '".cleanse($_POST["atitle"])."', '".cleanse($_POST["acontent"])."');";
                        }
                    }
                }
            } else {
                $atitleErr = "You must be logged in to answer questions!";
            }
        }
    }





    //==========================================================================
    //                              Read Questions
    //==========================================================================



    echo "<div class=\"panel\">";

    $sql = "SELECT content, title FROM questions";
    $qresult = $conn->query($sql);
    if ($qresult->num_rows > 0) {

        while($qrow = $result->fetch_assoc()){

            $questionTitle = $qrow["title"];
            $questionContent = $qrow["content"];
            $sql = "SELECT content, title FROM questions";
            $aresult = $conn->query($sql);

            //==============================================================================
            //                               question preview
            //==============================================================================
            echo "<a href=\"#\" data-reveal-id=\"questionModal-".$i."\" class=\"callout panel\">".
            "<h3>".$questionTitle."</h3>".
            "<p>";

            //if 140 characters is good enough for twitter, than it is good enough for our question preview
            if(strlen($questionContent) <= 140){
                echo $questionContent;
            } else {
                echo substr($questionContent, 0, 140)."...";
            }

            echo "</p>".
            "</a>";

            //=============================================================================
            //                                  question
            //=============================================================================
            echo "<div id=\"QuestionModal-".$i."\" class=\"reveal-modal\" data-reveal>".
                "<h2>".$questionTitle."</h2>".
                "<p>".$questionContent."</p>";

            //=============================================================================
            //                                  Answer question
            //=============================================================================

            echo
                "<form method=\"post\" action=\"".htmlspecialchars($_SERVER["PHP_SELF"])."\">
                    <h3>Answer question</h3>
                    <input type=\"text\" placeholder=\"Title\" name=\"qtitle\"/><br/>
                    <span class=\"error\">* ".$qtitleErr."</span>
                    <input type=\"text\" placeholder=\"Content\" name=\"qcontent\"/><br/>
                    <span class=\"error\">* ".$qcontentErr."</span>
                    <a href=\"#\" class=\"small button\" type=\"submit\">Ask Question</a>
                </form>>";



            if ($aresult->num_rows > 0) {
                // output data of each row
                while($arow = $aresult->fetch_assoc()) {
                    $answerAuthor = $arow["answerer"];
                    $answerTitle = $arow["title"];
                    $answerContent = $arow["content"];
                    $answerVoteLevel = $arow["value"];
                    $answerBest = $arow["best"];

                    //======================================================================
                    //                             answer preview
                    //======================================================================
                    echo "<a href=\"#\" data-reveal-id=\"answerModal-".$i."-".$j."\" class=\"secondary button\">".
                            "<div class=\"row\">".
                                "<div class=\"small-1 columns\">";
                                    if($answerBest == "y"){
                                        //  display best
                                    } elseif($username != $answerAuthor) {
                                        //  display not best
                                    } else {
                                        //  display not best as button
                                    }
                                "</div>".
                                "<div class=\"small-2 columns\">".
                                    //if already voted
                                    //  display vote
                                    //  display vote level
                                    //else
                                    //  display vote level
                                "</div>".
                                "<div class=\"small-9 solumns\">".
                                    "<h3>".$answerTitle."</h3>".
                                    "<p>".$answerContent."</p>".
                                "</div>".
                                "<div class=\"small-12 columns\">".
                                    "<p>Author: ".$answerAuthor."</p>".
                                "</div>".
                            "</div>".
                        "</a>".
                        "<a class=\"close-reveal-modal\">&#215;</a></div>".
                        //==================================================================
                        //                         answer
                        //==================================================================
                        "<div id=\"answerModal-".$i."-".$j."\" class=\"reveal-modal\" data-reveal>".
                            "<h2>".$answerTitle."</h2>".
                            "<p>".$answerContent."</p>".
                            "<a class=\"close-reveal-modal\">&#215;</a>".
                        "</div>";
                }
            }
            echo "</div>";
        }
    }



    echo "</div>";
    //close database
    $conn->close();
?>
