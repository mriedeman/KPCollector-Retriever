<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $loginData = array(
        'username' => $username,
        'password' => $password
    );

    // Initialize cURL session
    $ch = curl_init();

    //Setup cURL options
    curl_setopt($ch, CURLOPT_URL, 'http://localhost:3000/users/login');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($loginData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);

    $response = curl_exec($ch);

    // Close cURL session
    curl_close($ch);

    // Decode cURL session
    $responseData = json_decode($response, true);
    echo($responseData);

    //Check if login was successful based on API response
    if (isset($responseData['success']) && $responseData['success'] === true) {
        //Redirect to api_access.php
        header("Location: api_access.php");
        exit;
    } else {
        //Login Failure
        echo "Invalid username or password";
    }


    //SERVER_URL = 'http://localhost:3000/users/login'
    // const reqestObject: ILogin = {
    //   username: username,
    //   password: password
    //  };

//     if ($username === $validUsername && $password === $validPassword) {
//         header("Location: api_access.php");
//         exit;
//     } else {
//         //Handle logiin failure
//         echo "Invalid username or password";
//     }
}

?>