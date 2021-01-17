<?php
    session_start();
    $conn = mysqli_connect($_SESSION['domain'] , $_SESSION['user'] , $_SESSION['password'] , $_SESSION['database-name']);
    $sql = 'DELETE FROM `child` WHERE `parentid`='.$_POST["id"];
    $sql2= 'DELETE FROM `todolist` WHERE `id`='.$_POST["id"];
    if(mysqli_query($conn, $sql) and mysqli_query($conn, $sql2)){
        echo "تم حذف البيانات";
    }
    else{
        echo mysqli_error($conn);
    }
?>