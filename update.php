<?php
    session_start();
    $conn = mysqli_connect($_SESSION['domain'] , $_SESSION['user'] , $_SESSION['password'] , $_SESSION['database-name']);
    @$sql = "UPDATE `todolist` SET `sub`='".$_POST['sub']."',`case`='".$_POST['case']."' WHERE `id`=".$_POST['id'];
    if(@$_POST['sub'] == "" or null){
        echo "أضيف عنوان";
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