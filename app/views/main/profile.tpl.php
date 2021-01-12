

    <div class="container connexion">

    <div class="row">
        <div class="col-lg-12">
            <form action="" method="POST">
                <h1>MODIFICATION DES INFORMATIONS</h1>
                <div class="form-group">
                    <label for="exampleInputEmail1">Adresse mail</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"name="email" value="<?=$user->getEmail();?>">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mot de passe</label>
                    <input type="text" class="form-control" id="exampleInputPassword1"name="password"value="<?=$user->getPassword();?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Prenom</label>
                    <input type="text" class="form-control" id="exampleInputPassword1"name="prenom"value="<?=$user->getFirstName();?>">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Nom</label>
                    <input type="text" class="form-control" id="exampleInputPassword1"name="nom"value="<?=$user->getLastName();?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">role</label>
                    <input type="text" class="form-control" id="exampleInputPassword1"name="role"value="<?=$user->getRole();?>">
                </div>


                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>
</div>

<a href="<?=$router->generate('suppression');?>"><div class="layout-suppression">Suppression du compte</div></a>

