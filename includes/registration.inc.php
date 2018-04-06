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
         //mysqli_connect(adresse,utilisateur,mdp,base)
        $mdp = sha1($mdp);
        $token = uniqid(sha1(date('Y-m-d|H:m:s')), false);

        $connection = mysqli_connect("localhost","archiafura","123","phpdieppe");
        $requete = "INSERT INTO T_USERS
                (USERNAME, USERFIRSTNAME, USERMAIL, USERPASSWORD, ID_ROLE, USERTOKEN)
                VALUES ('$nom', '$prenom', '$mail' , '$mdp' , 3, '$token')";

        if(!$connection) {
            die("Erreur MySQL" . mysqli_connect_errno() . " | " . mysqli_connect_error());
        }

        else {
            if (mysqli_query($connection, $requete) ){
                echo "Données enregistrées";

                $id = mysqli_insert_id($connection);
                $messageMail = "<h1> Message envoyé ! </h1>";
                $messageMail .= "<p>Vous êtes inscrit ! </p>";
                $messageMail .= "<p> Mais vous devez valider votre inscription. </p>";
                $messageMail .= "<p><a href='http://localhost/PHP-exo/index.php?page=mailValidation&amp;id=$id&amp;token=$token'>";
                $messageMail .= "page=mailValidation'>Clique ici";
                $messageMail .= "</a></p>";

                
                $headers = "From: macron@elysees.fr" . "\r\n".
                            "Reply-to: edouard@matignon.com" . "\r\n".
                            "X-Mailer: PHP/" . phpversion();

                mail($mail, 'Inscription compte', $messageMail, $headers);




            }
            else {
                echo "Erreur";
                include "frmRegistration.php";

            }
            mysqli_close($connection);
        }
     }
    }

else{
    echo "Je ne viens pas du formulaire";
    include "frmRegistration.php";
}
