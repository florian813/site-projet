<?php


namespace model;


class CommentModel
{

    static function insertComment($content,$product,$account){
        $db = \model\Model::connect();
        date_default_timezone_set('Europe/Paris');

        $sql="INSERT INTO comment (content,date,id_product,id_account)
                  VALUES ('$content',NOW(),'$product','$account');";

        $req = $db->prepare($sql);
        $req->execute();

    }

    static function listComment($product){
        $db = \model\Model::connect();

        $sql="SELECT comment.content,comment.date,account.firstname,account.lastname
              FROM comment
              INNER JOIN account
              ON comment.id_account=account.id
              WHERE comment.id_product='$product';";

        $req = $db->prepare($sql);
        $req->execute();

        // Retourner les résultats (type array)
        return $req->fetchAll();
    }
}