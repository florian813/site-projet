<?php

namespace model;

class StoreModel
{

    static function listCategories(): array
    {
        // Connexion à la base de données
        $db = \model\Model::connect();

        // Requête SQL
        $sql = "SELECT id, name FROM category";

        // Exécution de la requête
        $req = $db->prepare($sql);
        $req->execute();

        // Retourner les résultats (type array)
        return $req->fetchAll();
    }

    static function listProducts($search,$prix,$category): array
    {
        // Connexion à la base de données
        $db = \model\Model::connect();
        // Requête SQL

        //tout null
        if($search==null and $prix==null and $category==null){
        $sql = "SELECT product.id,product.name,price,image,category.name AS namecat
              FROM product
              JOIN category
              ON product.category=category.id;";
            // Exécution de la requête
            $req = $db->prepare($sql);
            $req->execute();
            // Retourner les résultats (type array)
            return $req->fetchAll();
        }

        //prix croissant
        else if($search==null and $prix=="croissant" and $category==null){
            $sql = " SELECT product.id,product.name,price,image,category.name AS namecat
              FROM product
              JOIN category
              ON product.category=category.id
              ORDER BY product.price ASC;";
            // Exécution de la requête
            $req = $db->prepare($sql);
            $req->execute();
            // Retourner les résultats (type array)
            return $req->fetchAll();
        }

        //prix décroissant
        else if($search==null and $prix=="decroissant" and $category==null){
            $sql = " SELECT product.id,product.name,price,image,category.name AS namecat
              FROM product
              JOIN category
              ON product.category=category.id
              ORDER BY product.price DESC;";
            // Exécution de la requête
            $req = $db->prepare($sql);
            $req->execute();
            // Retourner les résultats (type array)
            return $req->fetchAll();

        }

        //que categorie Creator Expert
        else if($search==null and $prix==null and $category=="Creator Expert") {
            $sql = " SELECT product.id,product.name,price,image,category.name AS namecat
              FROM product
              JOIN category
              ON product.category=category.id
              WHERE product.category=1;";
            // Exécution de la requête
            $req = $db->prepare($sql);
            $req->execute();
            // Retourner les résultats (type array)
            return $req->fetchAll();
        }

        //que category Technic
        else if($search==null and $prix==null and $category=="Technic") {
            $sql = "  SELECT product.id,product.name,price,image,category.name AS namecat
              FROM product
              JOIN category
              ON product.category=category.id
              WHERE product.category=2;";
            // Exécution de la requête
            $req = $db->prepare($sql);
            $req->execute();
            // Retourner les résultats (type array)
            return $req->fetchAll();
        }

        //que category Architec
        else if($search==null and $prix==null and $category=="Architecture") {
            $sql = " SELECT product.id,product.name,price,image,category.name AS namecat
              FROM product
              JOIN category
              ON product.category=category.id
              WHERE product.category=3;";
            // Exécution de la requête
            $req = $db->prepare($sql);
            $req->execute();
            // Retourner les résultats (type array)
            return $req->fetchAll();
        }

        //categorie Creator+ prix asc
        else if($search==null and $prix=="croissant" and $category=="Creator Expert") {
            $sql = " SELECT product.id,product.name,price,image,category.name AS namecat
              FROM product
              JOIN category
              ON product.category=category.id
              WHERE product.category=1
              ORDER BY product.price ASC;";
            // Exécution de la requête
            $req = $db->prepare($sql);
            $req->execute();
            // Retourner les résultats (type array)
            return $req->fetchAll();
        }

        //categorie Technic+ prix asc
        else if($search==null and $prix=="croissant" and $category=="Technic") {
            $sql = " SELECT product.id,product.name,price,image,category.name AS namecat
              FROM product
              JOIN category
              ON product.category=category.id
              WHERE product.category=2
              ORDER BY product.price ASC;";
            // Exécution de la requête
            $req = $db->prepare($sql);
            $req->execute();
            // Retourner les résultats (type array)
            return $req->fetchAll();
        }

        //categorie archi+prix asc
        else if($search==null and $prix=="croissant" and $category=="Architecture") {
            $sql = " SELECT product.id,product.name,price,image,category.name AS namecat
              FROM product
              JOIN category
              ON product.category=category.id
              WHERE product.category=3
              ORDER BY product.price ASC;";
            // Exécution de la requête
            $req = $db->prepare($sql);
            $req->execute();
            // Retourner les résultats (type array)
            return $req->fetchAll();
        }

        //categorie creator+prix desc
        else if($search==null and $prix=="decroissant" and $category=="Creator Expert") {
            $sql = " SELECT product.id,product.name,price,image,category.name AS namecat
              FROM product
              JOIN category
              ON product.category=category.id
              WHERE product.category=1
              ORDER BY product.price DESC;";
            // Exécution de la requête
            $req = $db->prepare($sql);
            $req->execute();
            // Retourner les résultats (type array)
            return $req->fetchAll();
        }
        //categorie technic + prix desc
        else if($search==null and $prix=="decroissant" and $category=="Technic") {
            $sql = " SELECT product.id,product.name,price,image,category.name AS namecat
              FROM product
              JOIN category
              ON product.category=category.id
              WHERE product.category=2
              ORDER BY product.price DESC;";
            // Exécution de la requête
            $req = $db->prepare($sql);
            $req->execute();
            // Retourner les résultats (type array)
            return $req->fetchAll();
        }

        //categorie Archi +prix desc
        else if($search==null and $prix=="decroissant" and $category=="Architecture") {
            $sql = " SELECT product.id,product.name,price,image,category.name AS namecat
              FROM product
              JOIN category
              ON product.category=category.id
              WHERE product.category=3
              ORDER BY product.price DESC;";
            // Exécution de la requête
            $req = $db->prepare($sql);
            $req->execute();
            // Retourner les résultats (type array)
            return $req->fetchAll();
        }

        //search+categorie Creator Expert
        else if($search!=null and $category=="Creator Expert" and $prix==null){
           $sql=" SELECT product.id,product.name,price,image,category.name AS namecat
              FROM product
              JOIN category
              ON product.category=category.id 
              WHERE product.name LIKE '%$search%' and product.category=1;";

            // Exécution de la requête
            $req = $db->prepare($sql);
            $req->execute();
            // Retourner les résultats (type array)
            return $req->fetchAll();
        }

        //search+categorie Technic
        else if($search!=null and $category=="Technic" and $prix==null){
            $sql=" SELECT product.id,product.name,price,image,category.name AS namecat
              FROM product
              JOIN category
              ON product.category=category.id 
              WHERE product.category=2 and product.name LIKE '%$search%';";

            // Exécution de la requête
            $req = $db->prepare($sql);
            $req->execute();
            // Retourner les résultats (type array)
            return $req->fetchAll();
        }

        //search+catégorie Architecture
        else if($search!=null and $category=="Architecture" and $prix==null){
            $sql=" SELECT product.id,product.name,price,image,category.name AS namecat
              FROM product
              JOIN category
              ON product.category=category.id 
              WHERE product.name LIKE '%$search%' and product.category=3;";

            // Exécution de la requête
            $req = $db->prepare($sql);
            $req->execute();
            // Retourner les résultats (type array)
            return $req->fetchAll();

        }
        //search+croissant
        else if($search!=null and $prix=="croissant" and $category==null){
            $sql = "SELECT product.id,product.name,price,image,category.name AS namecat
              FROM product
              JOIN category
              ON product.category=category.id 
              WHERE product.name LIKE '%$search%'
              ORDER BY product.price ASC;";
            // Exécution de la requête
            $req = $db->prepare($sql);
            $req->execute();
            // Retourner les résultats (type array)
            return $req->fetchAll();

        }
            //search+décroissant
        else if($search!=null and $prix=="decroissant" and $category==null){
            $sql = "SELECT product.id,product.name,price,image,category.name AS namecat
              FROM product
              JOIN category
              ON product.category=category.id 
              WHERE product.name LIKE '%$search%'
              ORDER BY product.price DESC;";
            // Exécution de la requête
            $req = $db->prepare($sql);
            $req->execute();
            // Retourner les résultats (type array)
            return $req->fetchAll();
        }
        //prix desc+search+ categorie creator expert
        else if($search!=null and $prix=="decroissant" and $category=="Creator Expert"){
            $sql = "SELECT product.id,product.name,price,image,category.name AS namecat
              FROM product
              JOIN category
              ON product.category=category.id 
              WHERE product.category=1 AND product.name LIKE '%$search%'
              ORDER BY product.price DESC;";

            // Exécution de la requête
            $req = $db->prepare($sql);
            $req->execute();
            // Retourner les résultats (type array)
            return $req->fetchAll();
        }

        //prix desc+search+categorie technic
        else if($search!=null and $prix=="decroissant" and $category=="Technic"){
            $sql = "SELECT product.id,product.name,price,image,category.name AS namecat
              FROM product
              JOIN category
              ON product.category=category.id 
              WHERE product.category=2 AND product.name LIKE '%$search%'
              ORDER BY product.price DESC;";

        // Exécution de la requête
            $req = $db->prepare($sql);
        $req->execute();
    // Retourner les résultats (type array)
        return $req->fetchAll();
}

        //prix desc+search+categorie Architecture
        else if($search!=null and $prix=="decroissant" and $category=="Architecture"){
            $sql = "SELECT product.id,product.name,price,image,category.name AS namecat
              FROM product
              JOIN category
              ON product.category=category.id 
              WHERE product.category=3 AND product.name LIKE '%$search%'
              ORDER BY product.price DESC;";

            // Exécution de la requête
            $req = $db->prepare($sql);
            $req->execute();
            // Retourner les résultats (type array)
            return $req->fetchAll();
        }

        //prix asc+search+ categorie creator expert
        else if($search!=null and $prix=="croissant" and $category=="Creator Expert"){
            $sql = "SELECT product.id,product.name,price,image,category.name AS namecat
              FROM product
              JOIN category
              ON product.category=category.id 
              WHERE product.category=1 AND product.name LIKE '%$search%'
              ORDER BY product.price ASC;";

            // Exécution de la requête
            $req = $db->prepare($sql);
            $req->execute();
            // Retourner les résultats (type array)
            return $req->fetchAll();
        }

        //prix asc+search+categorie technic

        else if($search!=null and $prix=="croissant" and $category=="Technic"){
            $sql = "SELECT product.id,product.name,price,image,category.name AS namecat
              FROM product
              JOIN category
              ON product.category=category.id 
              WHERE product.category=2 AND product.name LIKE '%$search%'
              ORDER BY product.price ASC;";

            // Exécution de la requête
            $req = $db->prepare($sql);
            $req->execute();
            // Retourner les résultats (type array)
            return $req->fetchAll();
        }

        //prix asc+search+categorie Architecture
        else if($search!=null and $prix=="croissant" and $category=="Architecture"){
            $sql = "SELECT product.id,product.name,price,image,category.name AS namecat
              FROM product
              JOIN category
              ON product.category=category.id 
              WHERE product.category=3 AND product.name LIKE '%$search%'
              ORDER BY product.price ASC;";

            // Exécution de la requête
            $req = $db->prepare($sql);
            $req->execute();
            // Retourner les résultats (type array)
            return $req->fetchAll();
        }


        // que search
        else{
            $sql = "SELECT product.id,product.name,price,image,category.name AS namecat
              FROM product
              JOIN category
              ON product.category=category.id 
              WHERE product.name LIKE '%$search%';";
            // Exécution de la requête
            $req = $db->prepare($sql);
            $req->execute();
            // Retourner les résultats (type array)
            return $req->fetchAll();
        }

    }

    static function infoProduct(int $id): array
    {
        // Connexion à la base de données
        $db = \model\Model::connect();
        // Requête SQL
        $sql = "SELECT product.name,price,image,image_alt1,image_alt2,image_alt3,spec,category.name AS namecat
              FROM product
              INNER JOIN category
              ON product.category=category.id
              WHERE product.id=$id";

        // Exécution de la requête
        $req = $db->prepare($sql);
        $req->execute();

        // Retourner les résultats (type array)
        return $req->fetchAll();
    }
}