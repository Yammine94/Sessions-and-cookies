<?php
    session_start();
   $link =  mysqli_connect("shareddb1a.hosting.stackcp.net","MyDataBase-34a8ae","George1234","MyDataBase-34a8ae");

    if(mysqli_connect_error()){
        die( "There was an error connecting to database");
    } 

    if(array_key_exists('email', $_POST) OR array_key_exists('password', $_POST)){

        if($_POST['email'] == ""){

            echo "<p>Email address is requried!</p>";

        }
        else if($_POST['password'] == ""){

            echo "<p>Password is requried!</p>";

        } else {
            $query = "SELECT `id` FROM `Users` WHERE Email ='".mysqli_escape_string($link, $_POST['email'])."'";

            $result = mysqli_query($link, $query); 

            if(mysqli_num_rows($result )){

                echo "<p>That email adress has already been taken!</p>";

            } else {

                $query = "INSERT INTO `Users` (`Email`, `Password`) VALUES ('".mysqli_escape_string($link, $_POST['email'])."',
                '".mysqli_escape_string($link, $_POST['password'])."')";

                if(mysqli_query($link, $query)){

                    $_SESSION['email'] = $_POST['email'];

                    header("Location: http://yammine94webdev-com.stackstaging.com/MySQL/session.php");

                } else {

                    echo "<p>There was a problem signing you up - please try again later.</p>";
                }
            }
        }
    }

  // //$query = "INSERT INTO `Users`(`Email`, `Password`) VALUES('lekha-hoareau@hotmail.com', 'Roselinn1234')";

  // $query = "UPDATE `Users` SET Password = 'newPassword' WHERE Email = 'georgeyammine1994@gmail.com' LIMIT 1";

  // mysqli_query($link, $query);

  // $query = 'SELECT * FROM Users';

  // if($result = mysqli_query($link, $query)) {

  //    while($row  = mysqli_fetch_array($result)){

  //      echo "Your e-mail is: ".$row[1]." and your password is ".$row[Password];
  //      
  //    }

  // } 


?>


<form method="POST">
    <input name="email" type="text" placeholder="Email Adress">
    <input name="password" type="password" placehold="Password">
    <input type="checkbox">;
    <input type="submit" value="Sign Up">
</form>