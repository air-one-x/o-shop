<div class="container my-4">
        <a href="<?=$router->generate('products-listProducts');?>" class="btn btn-success float-right">Retour</a>
        <h2>Modifier le produit "<?=$product->getName();?>"</h2>
        <img src="<?=$_SERVER['BASE_URI'];?>/<?=$product->getPicture();?>"alt="<?= $product->getName(); ?>" class="img-fluid imageList" >
        
        <form action="" method="POST" class="mt-5">
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" class="form-control" id="name" placeholder="Nom du produit" name="name" value="<?=$product->getName();?>">
            </div>

            <div class="form-group">
                <label for="name">Description</label>
                <input type="text" class="form-control" id="name" placeholder="Nom du produit" name="description" value="<?=$product->getDescription();?>">
            </div>
            
            <div class="form-group">
                <label for="picture">pictue</label>
                <input type="text" class="form-control" id="picture" placeholder="image jpg, gif, svg, png" aria-describedby="pictureHelpBlock" name="picture" value="<?=$product->getPicture();?>">
                <small id="pictureHelpBlock" class="form-text text-muted">
                    URL relative d'une image (jpg, gif, svg ou png) fournie sur <a href="https://benoclock.github.io/S06-images/" target="_blank">cette page</a>
                </small>
            </div>

            <div class="form-group">
                <label for="name">Prix</label>
                <input type="text" class="form-control" id="name" placeholder="prix" name="price" value="<?=$product->getPrice();?>">
            </div>

            <div class="form-group">
                <label for="name">Marque</label>
                <input type="text" class="form-control" id="name" placeholder="Numéro marque" name="brandId" value="<?=$product->getBrandId();?>">
            </div>
            <div class="form-group">
                <label for="name">categorie</label>
                <input type="text" class="form-control" id="name" placeholder="Numéro catégorie" name="categoryId" value="<?=$product->getCategoryId();?>">
            </div>
            <div class="form-group">
                <label for="name">type</label>
                <input type="text" class="form-control" id="name" placeholder="Numéro type" name="typeId" value="<?=$product->getTypeId();?>">
            </div>
            <input type="submit">
        </form>
    </div>
