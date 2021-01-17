<?php session_start();?>
<!DOCTYPE html>
<html lang="en" dark="true">

<head>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <meta name="color-scheme" content="dark">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الواجبات</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="icon" href="/Favicon.jpg">
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />
    <link rel="stylesheet" href="css/style.css">
    <!-- icon -->
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
</head>

<body class="container" dir="rtl">
    <div class="btn btn-primary btn_login p-2 mx-2" onclick="window.location.href='login.php'">تسجيل الدخول</div>
    <!--header text-->
    <h2 class="text-center m-3">قائمة واجبات الدروس</h2>
    <!--search-->
    <div class="m-3">
        <input id="saerch" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="بحث" dir='rtl'>
    </div>
    <!-- toggle list item-->
    <h2>الدروس :</h2>
    <div id="live_data"></div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="js/fontawesome.min.js"></script>
<script type="text/javascript">
    //search code
    $("#saerch").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".item").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    }); // get lsit
    function fetch_data() {
        $.ajax({
            url: "get.php",
            method: "POST",
            success: function(data) {
                $("#live_data").html(data);
            }
        });
    }
    fetch_data();
</script>
<?php
    if($_COOKIE['admin'] = $_SESSION['admin']){
        ?>
        <script src='js/script-admin.js'></script>
        <?php
    }
?>
</html>