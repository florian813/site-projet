<?php

namespace controller;

class StoreController {

  public function store(): void
  {
      $search=null;
      $prix=null;
      $category=null;
    // Communications avec la base de données
    $categories = \model\StoreModel::listCategories();
    $products = \model\StoreModel::listProducts($search,$prix,$category);
    // Variables à transmettre à la vue
      $params = array(
      "title" => "Store",
      "module" => "store.php",
      "categories" => $categories,
        "products"=>  $products

    );

    // Faire le rendu de la vue "src/view/Template.php"
    \view\Template::render($params);
  }
    public function product(int $id): void{

      // Communications avec la base de données
        $product = \model\StoreModel::infoProduct($id);
        $comments=\model\CommentModel::listComment($id);
        $_SESSION['productid']=$id;
        $params = array(
            "title" => "Store",
            "module" => "product.php",
            "product"=>$product,
            "comments"=>$comments
        );

        //faire le rendu
        if($product==null) {
            header('Location:/store');
            exit();
        }else{
            \view\Template::render($params);
        }

    }

    public function search():void {
        $search=htmlspecialchars($_POST["search"]);

        if(isset($_POST["order"])){
            $prix=htmlspecialchars($_POST["order"]);
        }
        else
            $prix=null;

        if(isset($_POST["category"])){
            $category=htmlspecialchars($_POST["category"]);
        }
        else
            $category=null;

        $categories = \model\StoreModel::listCategories();
        $products=\model\StoreModel::listProducts($search,$prix,$category);

        $params = array(
            "title" => "Store",
            "module" => "store.php",
            "categories" => $categories,
            "products"=> $products

        );
        // Faire le rendu de la vue "src/view/Template.php"
        \view\Template::render($params);
    }
}