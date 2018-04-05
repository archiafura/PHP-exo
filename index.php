<?php
include "./functions/callPage.php";
?>
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

