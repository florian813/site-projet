<?php


namespace controller;


class CartController
{
    public function cart(): void
    {
        // Variables à transmettre à la vue
        $params = [
            "title"  => "Cart",
            "module" => "cart.php"
        ];

        // Faire le rendu de la vue "src/view/Template.php"
        \view\Template::render($params);
    }

    public function add(){

        //ajouter le produit au panier



        //redirige vers le panier
        header("location:/cart");
    }
}