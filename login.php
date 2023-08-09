<?php
    include("database.php");
    function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    
            if (empty($username)) {
                echo "Please enter a username";
            }
            if (empty($password)) {
                echo "Please enter a password";
            }
            else{
                $hash = password_hash($password, PASSWORD_DEFAULT);
            }
    }
    }
    mysqli_close($conn);
?>