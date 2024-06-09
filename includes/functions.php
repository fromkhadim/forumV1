<?php 
session_start();?>
<?php
function generateToken($length)
{
// Creation de la variable token
$alphaNum="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
return (substr(str_shuffle(str_repeat($alphaNum,$length)),0,$length));
}
?>