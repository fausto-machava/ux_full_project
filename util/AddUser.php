<?php
    include './conection.php';
    use \Exception;

    $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    
    try {
        $name = $data['name']; 
        $email = $data['email']; 
        $message = $data['message'];
        $query = "INSERT INTO user(name, email, message) VALUES (?, ?, ?)";
        $result = $conection->prepare($query);
        $result->bind_param("sss", $name, $email, $message);
        $result->execute();
        if($result->affected_rows > 0){
            header('Location: http://'.$_SERVER['HTTP_HOST'].'/contact/index.php?resp=1');
        } else{
            header('Location: http://'.$_SERVER['HTTP_HOST'].'/contact/index.php?resp=0');
        }
    } catch (Exception $e) {
        header('Location: http://'.$_SERVER['HTTP_HOST'].'/contact/index.php?resp=0&exception='.$e->getMessage());
    }
