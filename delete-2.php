<?php
    session_start();
    $conn = mysqli_connect($_SESSION['domain'] , $_SESSION['user'] , $_SESSION['password'] , $_SESSION['database-name']);
    $sql = "DELETE FROM child WHERE id='".$_POST['id']."'";
    if(mysqli_query($conn, $sql)){
        echo "تم حذف البيانات";
    }else{
        mysqli_error($conn);
    }
?>