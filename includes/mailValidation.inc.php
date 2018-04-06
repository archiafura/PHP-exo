<?php

if (isset($_GET['id']) && isset ($_GET['token'])) {
    $id = $_GET['id'];
    $token = $_GET['token'];
// connection base de données
    $connection = mysqli_connect("localhost","archiafura","123","phpdieppe");
// on vérifie si connection ok, si non ok afficher erreur   
    if(!$connection) {
        die("Erreur MySQL" . mysqli_connect_errno() . " | " . mysqli_connect_error());
    }
    
    else {
        $requeteVerif = "SELECT * FROM T_USERS
        WHERE ID_USERS = $id
        AND USERTOKEN = '$token'";

    if ($resultatRequete = mysqli_query($connection, $requeteVerif)) {
        $nbrResultats = mysqli_num_rows($resultatRequete);
        mysqli_free_result($resultatRequete);
        if ($nbrResultats > 0) {
            $requeteUpdate = "UPDATE T_USERS
                            SET USERVERIF=1
                            WHERE ID_USERS=$id";
            if (mysqli_query($connection, $requeteUpdate)) {
                echo "Inscription validée";
            }
            else {
                echo "Inscription pas validée, mais alors pas validée du tout";
            }
        }
        else {
            echo "<h1>Bien tenté, mais essaie encore</h1>";
        }
    }
    else {
        echo "Erreur";
    }
    mysqli_close($connection);
}
}

else {
echo "<h1>Bien tenté, mais essaie encore</h1>";
}

