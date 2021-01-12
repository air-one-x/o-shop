<div class="container my-4">
        <a href="<?=$router->generate('products-listProducts');?>" class="btn btn-success float-right">Retour</a>
        <h2>Ajouter un produit</h2>
        
        <form action="" method="POST" class="mt-5">
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" class="form-control" id="name" placeholder="Nom du produit" name="name">
            </div>

            <div class="form-group">
                <label for="name">Description</label>
                <input type="text" class="form-control" id="name" placeholder="Nom du produit" name="description">
            </div>
            
            <div class="form-group">
                <label for="picture">pictue</label>
                <input type="text" class="form-control" id="picture" placeholder="image jpg, gif, svg, png" aria-describedby="pictureHelpBlock" name="picture">
                <small id="pictureHelpBlock" class="form-text text-muted">
                    URL relative d'une image (jpg, gif, svg ou png) fournie sur <a href="https://benoclock.github.io/S06-images/" target="_blank">cette page</a>
                </small>
            </div>

            <div class="form-group">
                <label for="name">Prix</label>
                <input type="text" class="form-control" id="name" placeholder="prix" name="price">
            </div>

            <div class="form-group">
                <label for="name">Marque</label>
                <input type="text" class="form-control" id="name" placeholder="Numéro marque" name="brandId">
            </div>
            <div class="form-group">
                <label for="name">categorie</label>
                <input type="text" class="form-control" id="name" placeholder="Numéro catégorie" name="categoryId">
            </div>
            <div class="form-group">
                <label for="name">type</label>
                <input type="text" class="form-control" id="name" placeholder="Numéro type" name="typeId">
            </div>
            <input type="submit">
        </form>
    </div>
