


    <div class="container my-4">
        <a href="<?=$router->generate('addProduct-addProduct');?>" class="btn btn-success float-right">Ajouter</a>
        <h2>Liste des produits</h2>
        <table class="table table-hover mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Sous-titre</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($allProducts as $product):?>
                <tr>
                    <th scope="row"><?=$product->getId();?></th>
                    <td><?=$product->getName();?></td>
                    <td><img src="<?=$_SERVER['BASE_URI'];?>/<?=$product->getPicture();?>"alt="<?= $product->getName(); ?>" class="img-fluid imageList" ></td>
                    <td class="text-right">
                        <a href="<?=$router->generate('update-product',['productId'=>$product->getId()]);?>" class="btn btn-sm btn-warning" data-toggle="<?=$product->getId();?>">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        <!-- Example single danger button -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-danger dropdown-toggle"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?=$router->generate('delete-product',['productId'=>$product->getId()]);?>">Oui, je veux supprimer</a>
                                <a class="dropdown-item" href="#" data-toggle="dropdown">Oups !</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endforeach;?>
                
               
            </tbody>
        </table>
    </div>