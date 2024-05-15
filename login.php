<?php session_start();?>
<?php 
require_once './includes/header.php'; 
?>


<?php if (isset($_SESSION['flash'])):  ?>
<?php foreach ($_SESSION['flash'] as $type => $message): ?>
<div class="container col-md-8 col-md-offset-2">
    <div class="alert alert-<?= $type ?>">
        <?= $message ?>
    </div>
</div>
<?php endforeach;?>
<?php unset($_SESSION['flash']) ?>
<?php endif;?>


<!-- Affichage des messages flash ici -->