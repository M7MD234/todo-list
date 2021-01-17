<?php
    session_start();
    $conn = mysqli_connect($_SESSION['domain'] , $_SESSION['user'] , $_SESSION['password'] , $_SESSION['database-name']);
    $result = mysqli_query($conn, "SELECT MAX(id) FROM `child`");
    $row = mysqli_fetch_array($result);
    $num = $row[0] + 1;
    @$sql = "INSERT INTO `child`(`parentid`,`id`, `sub`, `case`) VALUES ('".$_POST['parent_id']."', '".$num."', '".$_POST['text_ch_in']."', '".$_POST['cas']."')";
    if(@$_POST['text_ch_in'] == ""){
        echo "أضف عنوان";
    }
    else {
        if($conn->query($sql)){
            echo "تم ادخال البيانات";
        }
        else{
            mysqli_error($conn);
        }
    }
?>