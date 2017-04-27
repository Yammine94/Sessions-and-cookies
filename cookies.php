<?php
    $hash = password_hash("mypassword", PASSWORD_DEFAULT);
    echo $hash;
echo "<br><br>";
    if(password_verify("password", $hash)){
        echo "Password Valid!";
    } else {
        echo "Invalid Password!";
    }
?>