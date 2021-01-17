<?php
    session_start();
    $conn = mysqli_connect($_SESSION['domain'] , $_SESSION['user'] , $_SESSION['password'] , $_SESSION['database-name']);
    $result = mysqli_query($conn, "SELECT MAX(id) FROM `todolist`");
    $row = mysqli_fetch_array($result);
    $num = $row[0] + 1;
    @$sql = "INSERT INTO `todolist`(`id`, `sub`, `case`) VALUES ('".$num."', '".$_POST['sub']."', '".$_POST['case']."')";
    if(@$_POST['sub'] == "" or null){
        echo "أضف عنوان";
    }
    else{
        if($conn->query($sql)){
            echo "تم ادخال البيانات";
        }
        else{
            echo "error line : " . mysqli_error($conn);
        }
    }
?>