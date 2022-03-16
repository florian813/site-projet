<?php


namespace controller;


class AproposController
{
 public function apropos():void {
     // Variables à transmettre à la vue
     $params = [
         "title"  => "À propos",
         "module" => "apropos.php"
     ];

     // Faire le rendu de la vue "src/view/Template.php"
     \view\Template::render($params);
 }
}