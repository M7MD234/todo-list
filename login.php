<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحة تسجيل الدخول</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
        .red-text{
            color:#d73038;
            text-align:right;
        }
        .container{
            max-width:500px;
        }
    </style>
</head>
<body>
<?php if(isset($_COOKIE['admin'])){echo "<h1 class='p-3 m-3 text-center text-primary'>welcome admin</h1><div class='d-flex justify-content-center'><button class='btn btn-dark' onclick=\"window.location.href='index.php'\">العودة للصفحة الرئيسية</button></div>";}else{
    ?>
    <div class="container px-1 mx-auto">
        <form action="<?php $_SERVER['PHP_SELF']?>" method="post" >
            <h1 class="text-center">pleas login</h1>
        <div class="mb-3">
            <label for="nameinp" class="form-label">name</label>
            <input type="text" class="form-control" id="nameinp" aria-describedby="name" name="name">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <input type="submit" class="btn btn-primary" name="Submit" value='Submit'/>
        </form>
            <div class="d-flex justify-content-center">
                <button class="btn btn-dark" onclick='window.location.href="index.html"'>العودة للصفحة الرئيسية</button>
            </div>
<?php
}
if(isset($_POST["Submit"])){
    if($_POST['name'] == $_SESSION['admin'] and $_POST['password'] == $_SESSION['admin']){
        setcookie("admin", "true", time() + (10 * 365 * 24 * 60 * 60));
        header("Refresh:0");
    }
    else{
        echo '<h3 class="text-center">معلومات غير صحيحة</h3>';
    }
}
?>
</div>
</body>
</html>