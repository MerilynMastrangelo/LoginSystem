<?php
/*if the user has pressed the submit button to syncronize with this include file*/
if(isset($_POST['signup-submit'])){ 
    require 'dhb.inc.php';
    
    $username = $_POST['uid'];
    $mail = $_POST['mail'];
    $pwd = $_POST['pwd'];
    $passwordRepeat = $_POST['repeat-password']; 

    /*ERROR HANDLERS*/
    #1. error message if the user DON'T FILL AN INPUT PROPERLY
    if(empty($username) || empty($mail) || empty($pwd) || empty($passwordRepeat)){
        header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$mail);
        exit(); /**If the user commits any mistake THE PROGRAM STOPS */
    }
    #2. Validate a proper email AND username
    else if(!filter_var($mail, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location: ../signup.php?error=invalidmail&uid");
        exit();
    }
    #3. Validate email
    else if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){ 
        header("Location: ../signup.php?error=invalidmail&uid=".$username);
        exit(); 
    }
    #4. Validate an username (search patterns with NO symbols)
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){ 
        header("Location: ../signup.php?error=invaliduid&mail=".$mail);
        exit();
    }
    #5. Validate the passwords if they're identical
    else if($pwd !== $passwordRepeat){
        header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$mail);
        exit();
    }
    #6. If the user already exist into DB 
    /*-- USING PRERARED STATEMENT --*/
    else{

        $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";

        #initializing PREPARED STATEMENT
        $stmt = mysqli_stmt_init($conn);
        
        #Test if sqlfails -- CHECKING ERROR STATEMENT ON DB --
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "s", $username);   
            mysqli_stmt_execute($stmt); /** RUN THE INFO USER INTO DB*/

            mysqli_stmt_store_result($stmt);/**get the results from DB and stores back into stmt*/

            $result = mysqli_stmt_num_rows($stmt);
            #HOW MANY RESULTS WE HAVE INSIDE VARIABLE CALLED STMT?
            if($result > 0){
            #ALREADY EXISTS THIS USER IN DB
                header("Location: ../signup.php?error=usertaken&mail=".$mail);
                exit();
            }else{
                $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../signup.php?error=sqlerror2");
                    exit();
                }else{
                    /**HASH PASSWORD */
                    $pwdhash = password_hash($pwd, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sss", $username, $mail, $pwdhash);
                    mysqli_stmt_execute($stmt);
                    
                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }
        }
    }
    msqli_stmt_close($stmt);
    msqli_close($conn);
}   
else{
    header("Location: ../signup.php");
    exit();
}