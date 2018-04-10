<?php include('inc/pdo2.php');
    // verification qu'il existe , n'est pas vide et bien numérique
if(!empty($_GET['id']) && is_numeric($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT * FROM  city WHERE ID = $id";
    $query = $pdo->prepare($sql);
    // Bind Valuer 
    $query->execute();

    $city = $query->fetch();

    if(empty($city)){

        die('404 Cette ville n\'existe pas');
    }

} else{
    die('404');
}
?>

 

<?php include('inc/header.php'); ?>

        <?php echo $city['Name']; ?> 
        <?php echo $city['CountryCode']; ?> 
        <?php echo $city['District']; ?> 
        <?php echo $city['Population']; ?>

<?php include('inc/footer.php'); ?>


