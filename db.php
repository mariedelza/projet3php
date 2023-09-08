<?php
/* connexion a la base de donnee */
$nom_serveur="localhost"; 
$nom_base_de_donnee="inscription";
$utilisateur="root";
$mdp="";

/* exception en cas ou la connexion ne passe pas */

    $conn=mysqli_connect($nom_serveur,$nom_base_de_donnee, $utilisateur,$mdp);

  if (!$conn) {
    die("erreur de connexion au serveur".mysqli_connect_error());
  }   
  ?>