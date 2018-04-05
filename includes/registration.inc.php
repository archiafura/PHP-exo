<h1>registration</h1>
<?php
if (isset($_POST['frmRegistration'])) {
   /* if(isset($_POST['nom'])) {
        $nom = $_POST ['nom'];
    }
    else {
        $nom = "";
    }

    // $nom =isset($_POST['nom']) ? $_POST['nom] : "";  c'est un opérateur ternaire qui peut remplacer le code au-dessus
*/
    // opérateur null coalescent 
     $nom = $_POST['nom'] ?? "";
     $prenom = $_POST['prenom'] ?? "";
     $mail = $_POST['mail'] ?? "";
     $mdp = $_POST['mdp'] ?? "";

     $erreur = array();

     if ($nom == "") array_push($erreur, "Veuillez saisir votre nom");
     if ($prenom == "") array_push($erreur, "Veuillez saisir votre prenom");
     if ($mail == "") array_push($erreur, "Veuillez saisir votre mail");
     if ($mdp == "") array_push($erreur, "Veuillez saisir votre mdp");


     if (count($erreur) > 0) {
         $message = "<ul>";

         /* foreach($erreur as $ligneMessage){
             $message .= "<li>;
             $message .= $ligneMessage;
             $message .= "</li>;

         }
         */

         for($i = 0; $i < count($erreur) ; $i++){
             $message .= "<li>";
             $message .= $erreur[$i];
             $message .= "</li>";
         }



         $message .= "</ul>";

         echo $message;

         include "frmRegistration.php";

     }

     else {
        echo "Good Job!!!";

     }
    }

else{
    echo "Je ne viens pas du formulaire";
    include "frmRegistration.php";
}
