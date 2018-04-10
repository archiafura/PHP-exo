<?php
include("inc/pdo2.php");

$name = 'Dieppe';
$countryCode = 'FRA';
$district = 'Normandie';
$population = 1120540;

/* INJECTION SQL DE DIEPPE

$sql = "INSERT INTO city (Name,CountryCode,District,Population)
        VALUES (:name,:code,:district,:pop)";

$query = $pdo->prepare($sql);
$query->bindValue(':name',$name,PDO::PARAM_STR);
$query->bindValue(':code',$countryCode,PDO::PARAM_STR);
$query->bindValue(':district',$district,PDO::PARAM_STR);
$query->bindValue(':pop',$population,PDO::PARAM_INT);

$query->execute();

*/

$district = 'Seine Maritime';

$sql = "UPDATE city
        SET District = :district
        WHERE ID = 4080";

$query = $pdo->prepare($sql);
$query->bindValue(':district',$district,PDO::PARAM_STR);
$query->execute();