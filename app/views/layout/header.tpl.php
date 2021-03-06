

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Default</title>
    <!-- Getting bootstrap (and reboot.css) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--
        And getting Font Awesome 4.7 (free)
        To get HTML code icons : https://fontawesome.com/v4.7.0/icons/
    -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />

    <!-- We can still have our own CSS file -->
    <link rel="stylesheet" href="<?= $_SERVER['BASE_URI']; ?>/assets/css/style.css">
</head>

<body>

    <?php
    // On inclut des sous-vues => "partials"
    include __DIR__ . '/../partials/nav.tpl.php';
    ?>
   
   <?php if(!isset($_SESSION['USER'])):?>
        <div class="layout-connexion">Bonjour Visiteur</div>
    <?php else :?>
       <a href="<?= $router->generate('profile');?>"><div class="layout-connexion">Bonjour <?= $_SESSION['USER']->getFirstName(); ?></div></a>
    <?php endif;?>