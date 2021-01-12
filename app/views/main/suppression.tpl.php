


    <?php 
        $supp->delete($user);
        session_destroy();
        header('location:' . $router->generate('main-home'));

    ?>

