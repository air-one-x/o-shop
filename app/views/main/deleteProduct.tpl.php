<?php
$supp->deleteTest($product);

header('location:'.$router->generate('products-listProducts'));