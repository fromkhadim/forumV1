<?php

$servername="localhost";
$username= "root";
$password= "root";
$dbname= "biblioteque";
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  /*echo "la connexion a bien été établie";*/ 
} catch (PDOException $e) {
  echo "la connexion a échoué" . $e->getMessage();
}

if (isset($_POST['envoyer'])) {
  // Récupération des données du formulaire
  $prenom = $_POST['prenom'];
  $nom = $_POST['nom'];
  $email = $_POST['email'];
  $login = $_POST['login'];
  $password = $_POST['password'];
  $password_bis = $_POST['password_bis'];

  // Vérification que les mots de passe correspondent
  if ($password !== $password_bis) {
      $message = "Les mots de passe ne correspondent pas.";
  } else {
      // Préparation de la requête SQL et exécution
      $sql = "INSERT INTO `utilisateurs`(`prenom`, `nom`, `email`, `login`, `password`) VALUES (:prenom, :nom, :email, :login, :password)";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':prenom', $prenom);
      $stmt->bindParam(':nom', $nom);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':login', $login);
      $stmt->bindParam(':password', $password);
      if ($stmt->execute()) {
          $message = "$prenom $nom est inséré avec succès.";
      } else {
          $message = "Erreur lors de l'insertion de l'utilisateur.";
      }
  }
  echo"$message";
}

    
   