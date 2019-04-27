<?php
    
     session_start();
     $error = "";
    
    if(array_key_exists("logout",$_GET)){
        
        unset($_SESSION);
        setcookie("id","",time()-60*60);
        $_COOKIE["id"] = "";   
    }else if((array_key_exists("id", $_SESSION) AND $_SESSION['id']) OR (array_key_exists("id", $_COOKIE) AND $_COOKIE['id'])){
        
        header("Location:php/home.php");
    }
    if(array_key_exists("submit", $_POST)){
            
        include("login/connection.php");
        if(!$_POST["email"]){
            
            $error .= "An email is required<br>";
        }
        
        if(!$_POST["password"]){
            
            $error .= "A password is required<br>";
        }
        
        if($error != ""){
            
            $error = "<div>there were error(s) in your form:</div>".$error;
        }else{
            if($_POST['signUp'] == '1'){
            $query = "SELECT id FROM `users` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1 ";
            
            $result = mysqli_query($link , $query);
            if(mysqli_num_rows($result) > 0 ){
                
                $error = "that email address is taken."; 
            }else{
                
                $query = "INSERT INTO `users` (`email` , `password`) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."', '".mysqli_real_escape_string($link, $_POST['password'])."' )";
                
                if(!mysqli_query($link , $query)){
                    
                  $error = "<p>could not sign you up - please try again later</p>";  
                    
                }else{
                    
                    $query = "UPDATE `users` SET password = '".md5(md5(mysqli_insert_id($link)).$_POST['password'])."' WHERE id = ".mysqli_insert_id($link)." LIMIT 1 ";
                    mysqli_query($link, $query);
                    $_SESSION['id'] = mysqli_insert_id($link);
                    if($_POST['stayLogedIn'] == '1'){
                        
                        setcookie("id",mysqli_insert_id($link),time()+60*60*24*365);
                    }
                    
                    header("Location:php/home.php");
                  
                }
            }
                
        }else{

                $query = "SELECT * FROM `users` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";
                
                $result = mysqli_query($link, $query);
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                
                if(isset($row)){
                    
                    $hashedpassword = md5(md5($row["id"]).$_POST["password"]);
                    
                    if($hashedpassword == $row['password']){
                        
                        $_SESSION['id'] = $row['id'];
                        
                        if($_POST['stayLoggedIn'] == '1'){
                            
                             setcookie("id",$row['id'],time()+60*60*24*365);
                    }
                    
                    header("Location:php/home.php");
       
                        }else{
                             
                    $error = "this email/password combination could not be found";
                   
                    }
                        
                    }else{
                    
                    
                    $error = "this email/password combination could not be found";
                    print_r($row . "second");
                    }
                    
                }
            }
    }


?>
<?php include("login/header.php"); ?>
    <div class="container" id="homePageContainer">
        
        <h1>Smart Grid!</h1>
        <p><strong>take your system to the higher level.</strong></p>

        <div id="error"> <?php echo $error; ?> </div> 
        <form method="POST" id="signUpForm" action="<?php $_SERVER['PHP_SELF']; ?>">
            <p>intersted? sign up now.</p>
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Your email">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="passwword">
            </div>
            <div class="checkbox">
                <input type="checkbox" name="stayLogedIn" value=1>Remember me
             </div>
                <input type="hidden" name="signUp" value= 1>
            <div class="form-group">
                <input class="btn btn-success" type="submit" name="submit" value="Sign Up!">
            </div>
            <p><a class="toggleForms" href="#">Log in</a></p>
        </form>

       <form method="POST" id="logInForm" action="<?php $_SERVER['PHP_SELF']; ?>">
           <p>log in using your name and password.</p>
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Your email">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="passwword">
            </div>
            <div class="checkbox">
                <input type="checkbox" name="stayLogedIn" value=1>Remember me
             </div>
                <input type="hidden" name="signUp" value= 0>
            <div class="form-group">
                <input class="btn btn-success" type="submit" name="submit" value="log in!">
            </div>
           <p><a class="toggleForms" href="#">sign up</a></p>
        </form>
    </div>
<?php include("login/footer.php"); ?>