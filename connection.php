<?php
$servername="localhost";
$username= "root";
$password= "root";
$dbname= "biblioteque";

$connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

if (isset($_POST['valider'])) 
{
  if (!empty($_POST['login']) AND !empty($_POST['password']))
  { 
$login =htmlspecialchars($_POST['login']);
$password =sha1($_POST['password']);
$sql="SELECT * FROM utilisateurs WHERE login=? AND password =?";
$sql=$connection->prepare($sql);
$sql->execute(array($login,$password));
$totalUsers=$sql->rowCount();

if ($totalUsers==1){ 
  $message="Votre compte a bien été retrouvé";
   echo "$message";

}else {  
  $message="Aucun compte à ce nom !";
  echo "$message";
}


  }else { 
    $message= "Remplissez tous les champs";
    echo "$message";
  } 
}
?>