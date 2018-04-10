<?php
include("inc/pdo2.php");

$sql = "SELECT * FROM city WHERE countryCode='FRA'  ORDER BY NAME ASC";
$query = $pdo->prepare($sql);
$query->execute();

$cities = $query->fetchAll();


?>
<?php include('inc/header.php'); ?>


<?php foreach ($cities as $citie){
    
    ?>

    <a href="detail.php?id=<?php echo $citie['ID']; ?>">
        <?php echo $citie['Name']; ?> 
    </a>;

<?php } ?>

<?php include('inc/footer.php'); ?>
 

