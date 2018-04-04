
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Site Dieppe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href=".\assets\css\main.css" />
    <script src="main.js"></script>
</head>
<body>
<div id="container">
    <?php include "./includes/header.php"; ?>
    <main>
<?php 
callPage();
?>
    </main>

    <?php include "./includes/footer.php"; ?> 
</div>
</body>
</html>



<?php
function callPage() {
    if (isset($_GET['page'])&& $_GET['page'] != ""){
        $page = $_GET['page'];
    }

else {
    $page = "home";
}

$page = "./includes/" . $page . ".inc.php";

$incFiles = glob("./includes/*.inc.php");

if (in_array($page, $incFiles)){

include $page;
}

else{
    include "./includes/home.inc.php";
}
}