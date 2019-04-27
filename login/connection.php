<?php

  $link = mysqli_connect("localhost","root","","smartgrid");
        if(mysqli_connect_error()){
            
            die("Database Connection Error!");   
        }
        
?>