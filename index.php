<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Employés</title>
    <link rel="stylesheet" href="style.css">
</head>
<!-- Header section -->
<header>
    <h1>
      <img src="https://www.wildcodeschool.com/assets/logo_main-e4f3f744c8e717f1b7df3858dce55a86c63d4766d5d9a7f454250145f097c2fe.png" alt="Wild Code School logo" />
      Les Argonautes
    </h1>
    <link rel="stylesheet" type="text/css" href="style.css"/>
  </header>
  
  <!-- Main section -->
  <main>
     <div>
        <a href="ajouter.php" class="Btn_add"> <img src="images/plus.png"> Ajouter</a>
    <!-- New member form --><div>
    <?php
       //vérifier que le bouton ajouter a bien été cliqué
       if(isset($_POST['button'])){
           //extraction des informations envoyé dans des variables par la methode POST
           extract($_POST);
           //verifier que tous les champs ont été remplis
           if(isset($nom) && isset($prenom) && $age){
                //connexion à la base de donnée
                include_once "connexion.php";
                //requête d'ajout
                $requete = mysqli_query($con , "INSERT INTO Argonaute VALUES(NULL, '$nom', '$prenom','$age')");
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
    <h2>Ajouter un(e) Argonaute</h2>
    <form action="" method="POST">
      <label>Nom</label>
      <input type="text" name="nom">
      <label>Prénom</label>
      <input type="text" name="prenom">
      <label>Age</label>
      <input type="number" name="age">
      <input type="submit" value="Ajouter" name="button">
    </form>

    <h2>Membres de l'équipage</h2>
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
        <div class="element"><?=$row['prenom']?></div>
        <div class="element"><?=$row['age']?></div>
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