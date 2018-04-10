<?php include('inc/pdo2.php'); ?>

<?php print_r($_POST); 
$error = array();






if(!empty($_POST['submitted'])){
    
   

////////////
$nom = trim(strip_tags($_POST['nom']));

    if(!empty($nom)) {
        if(strlen($nom) < 2){
            $error['nom'] = 'min 2 caractères';
        }
        elseif(strlen($nom) > 35) {
            $error['nom'] = 'max 35 caractères';
        }
     }

    
    else{

    $error['nom'] = 'veuillez renseigner le champs' ;

    }

}
    

///////////
$code = trim(strip_tags($_POST['CountryCode']));

if(!empty($code)) {
    if(strlen($code) < 3){
        $error['Countrycode'] = 'min 3 caractères';
    }
    elseif(strlen($code) > 35) {
        $error['CountryCode'] = 'max 35 caractères';
    }
 }


else{

$error['CountryCode'] = 'veuillez renseigner le champs' ;

}





///////////
$population = trim(strip_tags($_POST['population']));


if(!empty($population)) {
    if(($population) < 2){
        $error['Population'] = 'Ne peut pas être inférieur à 2';
    }
    elseif(($nom) > 9935) {
        $error['opulation'] = 'Ne peut pas excéder 9935';
    }
 }


else{

$error['population'] = 'veuillez renseigner le champs' ;

}

if(count($error) == 0){

}

$sql = "INSERT INTO city (Name,CountryCode,District,Population)
        VALUES (:name,:code,:district,:pop)";

$query = $pdo->prepare($sql);
$query->bindValue(':nom',$nom,PDO::PARAM_STR);
$query->bindValue(':code',$CountryCode,PDO::PARAM_STR);
$query->bindValue(':district',$district,PDO::PARAM_STR);
$query->bindValue(':pop',$population,PDO::PARAM_INT);

$query->execute();



?>
<?php include('inc/header.php'); ?>

<form action="" method="post">
    <label for="name">Nom de la ville </label>
    <span class="error"><?php if(!empty($error['nom'])){echo $error['nom'];} ?>
    <input type="text" name="nom" value="<?php if(!empty($_POST['nom'])) {echo $_POST['nom'];} ?>"/>

    <label for="name">Code pays </label>
    <span class="error"><?php if(!empty($error['codePays'])){echo $error['codePays'];} ?>
    <input type="text" name="codePays" value="<?php if(!empty($_POST['codePays'])) {echo $_POST['codePays'];} ?>"/>

     <label for="name">Région </label>
    <span class="error"><?php if(!empty($error['region'])){echo $error['region'];} ?>
    <input type="text" name="region" value="<?php if(!empty($_POST['region'])) {echo $_POST['region'];} ?>"/>

    <label for="name">Population </label>
    <span class="error"><?php if(!empty($error['population'])){echo $error['population'];} ?>
    <input type="text" name="population" value="<?php if(!empty($_POST['population'])) {echo $_POST['population'];} ?>"/>

    


    <input type="submit" name="submitted" value="Envoyer"/>

   

    
    





</form>


    
<?php include('inc/footer.php'); ?>

