<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Employés</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:weight@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<!-- Header section -->
<header>
    <h1>
      <img class="wild" src="https://www.wildcodeschool.com/assets/logo_main-e4f3f744c8e717f1b7df3858dce55a86c63d4766d5d9a7f454250145f097c2fe.png" alt="Wild Code School logo" />
      Les Argonautes
    </h1>
    <link rel="stylesheet" type="text/css" href="style.css"/>
  </header>
  
  <!-- Main section -->
  <main>
     
    <!-- New member form --><div>
    <?php
       //vérifier que le bouton ajouter a bien été cliqué
       if(isset($_POST['button'])){
           //extraction des informations envoyé dans des variables par la methode POST
           extract($_POST);
           //verifier que tous les champs ont été remplis
           if(isset($nom) && isset($prenom) && $age && isset($descriptif)){
                //connexion à la base de donnée
                include_once "connexion.php";
                //requête d'ajout
                $requete = mysqli_query($con , "INSERT INTO Argonaute VALUES(NULL, '$nom', '$prenom', '$age', '$descriptif')");
                if($requete){//si la requête a été effectuée avec succès , on fait une redirection
                    header("location: index.php");
                }else {//si non
                    $message = "Employé non ajouté";
                }

           }else {
               //si non
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>
    </div>
    
<?php
   if (isset($_POST['submit']))
   {
       #TRAITEMENT DE TON FORMULAIRE VALIDE
      $alerte = "Votre message a bien été envoyé";

      #TRAITEMENT DE TON FORMULAIRE NON VALIDE
      $alerte = "Echec de l'envoi";
   }
?>

    <form action="" method="POST">
      <label class ="form-css">Nom</label>
      <input class ="form-css" placeholder="Exodale" type="text" name="nom">
      <label class ="form-css">Prénom</label>
      <input class ="form-css" placeholder="Romwdolane" type="text" name="prenom">
      <label class ="form-css">Age</label>
      <input class ="form-css" placeholder="22" type="number" name="age">
      <label class ="form-css">Descriptif</label>
      <input class ="form-css" placeholder="Calme.." type="text" name="descriptif">
      <input class ="form-css" type="submit" value="Ajouter" name="button">
    </form>

        <div class="mmb"><img class="img-mmb" src="nv.png"><h2 class="hdo">Membres de l'équipage</h2>
        </div>

<div class="container">
    <?php 
    //inclure la page de connexion
    include_once "connexion.php";
    $requete = mysqli_query($con , "SELECT * FROM Argonaute");
    if(mysqli_num_rows($requete) == 0){
      echo "Il n'y a pas d'argonaute" ;

    }else
    while($row=mysqli_fetch_assoc($requete)){
      ?>

    

          <div class="items">
        <div class="element"><?=$row['nom']?></div>
        <div class="prename"><?=$row['prenom']?></div>
        <div class="age"><?=$row['age']?>&nbsp;ans</div>
        <p class="desp"><?=$row['descriptif']?></p>
        <a href="supprimer.php?id=<?=$row['id']?>"><img src="rejected.png" class="rejec"></a>
          </div>
        

      
    
      <?php
      }
      
      ?>
</div>
<?php 

?>



    
    <!-- Member list -->
    
  </main>
  
  <footer>
    
    <p>Réalisé par Jason en Anthestérion de l'an 515 avant JC</p>
  </footer>
</html>