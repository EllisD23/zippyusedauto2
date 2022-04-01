<?php
    $dsn = 'l0ebsc9jituxzmts.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
    $username = 'vrlapm0xtaz74m0n';
    $password = 'iuv8t948bhem0mj6';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../zippyusedauto/view/databaseerror.php');
        exit();
    }
?>