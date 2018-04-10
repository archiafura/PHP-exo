<?php
include("inc/pdo.php");

$sql = "SELECT * FROM country ORDER BY Name ASC";
$query = $pdo->prepare($sql);
$query->execute();

$countries = $query->fetchAll();
echo '<pre>';
print_r($countries);
echo '</pre>';

foreach ($countries as $countrie){
    
   echo '<div class="liste">' .
   '<h2>'. $countrie['Name']  .'</h2>' . 
   '<p>'. $countrie['Population']. '</p>' .
   '<p>' .$countrie['Code']. '</p>' .

   '</div>';

   /*On aurait pu écrire en alternant php et html comme ceci:

   foreach ($countries as $countrie){ ?>
    
   <div class="liste">
   <h2><?php echo $countrie['Name']; ?></h2> 
   <p><?php echo $countrie['Population']; ?></p> 
   <p><?= $countrie['Code']; ?></p>
    </div>
   <?PHP }

*/
  
}

$sql = "SELECT * FROM country WHERE Continent='Africa' ";
$query = $pdo->prepare($sql);
$query->execute();

$africa = $query->fetchAll();


foreach ($africa as $countrie){
    
    echo '<div class="liste">' .
    '<h2>'. $countrie['Name']  .'</h2>' . 
    '<p>'. $countrie['HeadOfState']. '</p>' .
    '<p>' .$countrie['GovernmentForm']. '</p>' .
 
    '</div>';
 
}

