<?php 

use \Hcode\Page;
use \Hcode\Model\Product;
use \Hcode\Model\Category;
use \Hcode\Model\User;

$app->get('/', function() {
    $products = Product::checkList(Product::listAll());

    $page = new Page();

    $page->setTpl("index", array(
        "products"=>$products
    ));  

});


$app->get('/categories/:idcategory', function($idcategory) {

    $pageCount = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
    
    $category = new Category();
    $category->get((int)$idcategory);

    $pagination = $category->getProductsPage($pageCount, 4);

    $pages = [];
    for ($i=1; $i <= $pagination['pages']; $i++) { 
        array_push($pages, [
            'page'=>$i,
            'link'=>'/categories/' . $category->getidcategory() . '?page=' . $i
        ]);
    }

    $page = new Page();

    $page->setTpl("category", array(
        "category"=>$category->getValues(),
        "products"=>$pagination["data"],
        "pages"=>$pages,
    ));

});


 ?>