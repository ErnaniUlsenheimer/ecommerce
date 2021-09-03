<?php

use \Hcode\PageAdmin;
use \Hcode\Model\User;
use \Hcode\Model\Category;
use \Hcode\Model\Product;


$app->get("/admin/categories", function() {
     User::verifyLogin();
    $categories = Category::listAll();

    $page = new PageAdmin();

    $page->setTpl("categories", array(
        'categories'=>$categories));
});

$app->get("/admin/categories/create", function() {
    User::verifyLogin();
    $page = new PageAdmin();

    $page->setTpl("categories-create");
});

$app->post('/admin/categories/create', function() {
    $category = new Category();

    $category->setData($_POST);

    $category->save();

    header("Location: /admin/categories");
    exit;
});


$app->get('/admin/categories/:idcategory/delete', function($idcategory){
    User::verifyLogin();
    $category = new Category();

    $category->get((int)$idcategory);

    $category->delete();

    header("Location: /admin/categories");
    exit;

});



$app->get('/admin/categories/:idcategory', function($idcategory) {
    //echo "/admin/users/:idcategory";
    User::verifyLogin();

    $category = new Category();
    $category->get((int)$idcategory);

    $page = new PageAdmin();
    $page->setTpl("categories-update", array(
        "category"=>$category->getValues()
    ));

});

$app->post('/admin/categories/:idcategory', function($idcategory) {
    $category = new Category();

    $category->get((int)$idcategory);
    $category->setData($_POST);
    $category->save();

    header("Location: /admin/categories");
    exit;
});




$app->get('/admin/categories/:idcategory/products', function($idcategory) {
    
    User::verifyLogin();

    $category = new Category();
    $category->get((int)$idcategory);

    $prodctsRelated = $category->getProducts(true);
    $productsNotRelated = $category->getProducts(false);

    $page = new PageAdmin();
    $page->setTpl("categories-products", array(
        "category"=>$category->getValues(),
        "productsRelated"=>$prodctsRelated,
        "productsNotRelated"=>$productsNotRelated    ));

});


$app->get('/admin/categories/:idcategory/products/:idproduct/add', function($idcategory, $idproduct) {
     $category = new Category();

     $category->get((int)$idcategory);

     $prodct = new Product();
     $prodct->get((int)$idproduct);

     $category->addProduct($prodct);

    $prodctsRelated = $category->getProducts(true);
    $productsNotRelated = $category->getProducts(false);

    $page = new PageAdmin();
    $page->setTpl("categories-products", array(
        "category"=>$category->getValues(),
        "productsRelated"=>$prodctsRelated,
        "productsNotRelated"=>$productsNotRelated    ));

});

$app->get('/admin/categories/:idcategory/products/:idproduct/remove', function($idcategory, $idproduct) {
     $category = new Category();

     $category->get((int)$idcategory);

     $prodct = new Product();
     $prodct->get((int)$idproduct);

     $category->removeProduct($prodct);

    $prodctsRelated = $category->getProducts(true);
    $productsNotRelated = $category->getProducts(false);

    $page = new PageAdmin();
    $page->setTpl("categories-products", array(
        "category"=>$category->getValues(),
        "productsRelated"=>$prodctsRelated,
        "productsNotRelated"=>$productsNotRelated    ));

});


?>