<?php 
    session_start();
    include_once './includes/functions.php'; ?>
<?php
      // ==================================================DEFINITION VARIABLES DE CONNECTION A LA BASE DE DONNEES======================================
      $servername="localhost";
      $username= "root";
      $password= "root";
      $dbname= "biblioteque";
      //=====================================================CONNECTION A LA BASE DE DONNEES====================================================================
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /*echo "la connexion a bien été établie";*/ 
      } catch (PDOException $e) {
        echo "la connexion a échoué" . $e->getMessage();
      }
      //=============================================================VERIFICATIONS CONDITIONS INSCRIPTIONS=================================================================
      if (isset($_POST['envoyer'])) {
        // Récupération des données du formulaire
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $login = $_POST['login'];
        $password = $_POST['password'];
        $password_bis = $_POST['password_bis'];

      if (!empty($_POST)) 
      {
        $errors=[];
        //traitement prenom
        if(empty($_POST['prenom']) || !preg_match("#^[a-zA-Z0-9-]*$#", $_POST['prenom'])) {
          $errors['prenom'] = "Remplir un prenom";
          var_dump($errors['prenom']);
        } else {
        
            }
            //traitement nom
            if(empty($_POST['nom']) || !preg_match("#^[a-zA-Z0-9-]*$#", $_POST['nom'])) {
              $errors['nom'] = "Remplir un nom de famille";
              var_dump($errors['nom']);
            } else {
            
                }
          //traitement Email
          if(empty($_POST['email']) || !filter_var($_POST['email'] , FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Votre email n'est pas valable";
            var_dump($errors['email']);
          } else {
          
              }
              //traitement login
      if(empty($_POST['login']) || !preg_match("#^[a-zA-Z0-9_]*$#", $_POST['login'])) {
        $errors['login'] = "Votre login n'est pas valable";
        var_dump($errors['login']);
      } else {

          }
          // Vérification que les mots de passe correspondent
        if (empty($_POST['password']) || $_POST['password'] !== $_POST['password_bis']) {
          $errors['password'] = "Le mot de passe est invalide.";
          var_dump($errors['password']);
      } else {
      
        }
        if (empty($errors)) {

        }
            // Préparation de la requête SQL et exécution
            $sql = "INSERT INTO `utilisateurs`(`prenom`, `nom`, `email`, `login`, `password`,`token`) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $password = password_hash($_POST['password'] , PASSWORD_BCRYPT);//Pour cripter le mot de passe
            
          $token = generateToken(100);
          
            $stmt->execute([$_POST['prenom'],$_POST['nom'],$_POST['email'],$_POST['login'],$password,$token]);
            $userId = $conn->lastInsertId();
            //Creation de 3 variables pour envoyer un message par email à l'utilisateur pour confirmer son inscription
          
            $mail=$_POST['email'];
            $objet="Confirmation de votre inscription";
            $message="Cliquer sur ce lien pour confirmer votre inscription \n\ 
            http://localhost/perso/forumV1/confirm.php?id=$userId&token=$token";
            $_SESSION['flash']['success'] = "Compte créé avec succès, veuillez vérifier votre mail pour confirmer";
            header("Location:login.php");
            exit;
            
            

              
            }
        }
      

          
        