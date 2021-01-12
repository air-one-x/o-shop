
<nav>
   
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        
            <a class="navbar-brand" href="<?=$router->generate('main-home');?>">oShop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse navbar-accueil" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active <?php if($currentPage==='main/home'){echo 'target';}?>">
                        <a class="nav-link" href="<?=$router->generate('main-home');?>">Accueil <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item <?php if($currentPage==='main/listCategory'){echo 'target';}?>">
                        <a class="nav-link" href="<?=$router->generate('ListCategory');?>">Catégories</a>
                    </li>
                    <li class="nav-item <?php if($currentPage==='main/listProducts'){echo 'target';}?>">
                        <a class="nav-link" href="<?=$router->generate('products-listProducts');?>">Produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Types</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Marques</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tags</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sélections Accueil &amp; Footer</a>
                    </li>
                    <li class="nav-item <?php if($currentPage==='main/users'){echo 'target';}?>">
                        <a class="nav-link" href="<?=$router->generate('users-list');?>">Liste utilisateurs</a>
                    </li>
                   
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Rechercher">
                    <button class="btn btn-outline-info my-2 my-sm-0 button-nav" type="submit">Rechercher</button>
                </form>
                <?php if(!isset($_SESSION['USER'])):?>
                <a href="<?=$router->generate('connexion');?>"><button type="button" class="btn btn-primary btn-sm button-nav">Connexion</button></a>
                
                <?php else:?>
                    <a href="<?=$router->generate('deconnexion');?>"><button type="button" class="btn btn-primary btn-sm button-nav">Deconnexion</button></a>
                    <a href="<?=$router->generate('inscription');?>"><button type="button" class="btn btn-secondary btn-sm button-nav">Ajouter un utilisateur</button></a>
                   
                <?php endif;?>
                
            </div>
        
    </nav>
</nav>